<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Teacher extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('security');
        $this->load->library('tank_auth');
        $this->lang->load('tank_auth');
        $this->load->library('session');
        $this->load->library('sysmail');
        if (!$this->tank_auth->is_logged_in()) {         // logged in
            redirect('auth/');
        }
    }

    public function view_approve_reject($CourseID, $BatchID) { // View
        $data['CourseID'] = $CourseID;
        $data['BatchID'] = $BatchID;
        $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';
        $data['user_profile'] = 'dashboard/notification/user_profile_teacher';
        $data['main_content'] = 'dashboard/content/teacher/approve_reject';
        $data['content_right'] = '';
        $this->load->view('dashboardTemplate1', $data);
    }

    public function operation_approve_reject() { // Operation
        $TeacherID = $this->tank_auth->get_user_email();
        $StudentID = $this->input->post('StudentID');
        $BatchID = $this->input->post('BatchID');
        $CourseID = $this->input->post('CourseID');

        if ($this->input->post('approve')) {

            $this->approve_student($StudentID, $TeacherID, $BatchID, $CourseID, $this->input->post('CommentsForStudent'));
            //Flash Data
            $this->session->set_flashdata('msg', 'You have successfully accepted the student...');
            //Flash Data
        } elseif ($this->input->post('reject')) {
            $this->reject_student($StudentID, $TeacherID, $BatchID, $CourseID, $this->input->post('CommentsForStudent'));
            //Flash Data
            $this->session->set_flashdata('msg', 'Your have successfully reject the student...');
            //Flash Data
        }
        redirect('teacher/my_courses');
    }

    public function approve_student($StudentID, $TeacherID, $BatchID, $CourseID, $AcceptNote) { //Sub Module
        //teacher name
        $query_teacher = $this->db->query('SELECT username FROM users WHERE email="' . $TeacherID . '"');
        $teacher_name = $query_teacher->row();

        //student name
        $query_student = $this->db->query('SELECT username FROM users WHERE email="' . $StudentID . '"');
        $student_name = $query_student->row();

        $query_course = $this->db->query('SELECT CourseName, CouseFree, TotalHour FROM tbl_course WHERE CourseID="' . $CourseID . '"');
        $c_name = $query_course->row();

        $query_batch = $this->db->query('SELECT SessionDuration,StartDate, EndDate, NextSessionDate FROM tbl_batch WHERE BatchID="' . $BatchID . '"');
        $b_name = $query_batch->row();

        if ($c_name->CourseName == 'Demo Session') {
            $enrollment_record = array(
                'AcceptNote' => $AcceptNote,
                'DateOfEnrollment' => date('Y/m/d h:i:s'),
                'ModifiedOn' => date('Y/m/d h:i:s'),
            );

            //notification to teacher 123
            $notificationDataStu = array(
                'Email' => $TeacherID,
                'DateTime' => date('Y/m/d h:i:s'),
                'Notification' => 'Demo to ' . $teacher_name->username . ' approved.',
                'Status' => 'Un-Read'
            );

            //notification to student 212
            $notificationDataIns = array(
                'Email' => $StudentID,
                'DateTime' => date('Y/m/d h:i:s'),
                'Notification' => "Your demo request from " . $student_name->username . " was approved..",
                'Status' => 'Un-Read'
            );

            $useronbatchData = array(
                'UserID' => $StudentID,
                'BatchID' => $BatchID,
                'IsCompleted' => 'No',
                'LastModifiedDate' => date('Y/m/d h:i:s'),
            );

            $this->load->model('enrollment_record');
            $this->enrollment_record->approve_student($enrollment_record, $StudentID, $CourseID, $BatchID);
            $this->load->model('useronbatch');
            $this->useronbatch->update_entry($useronbatchData, $notificationDataStu, $notificationDataIns, $StudentID, $BatchID);

            //send email for teacher 123
            $tname = explode(' ', $student_name->username);
            $email_data['users_first_name'] = $tname[0];
            $email_data['student_name'] = '<a href="' . base_url() . 'view_profile/student_profilebyemail/' . base64_encode($StudentID) . '">' . $student_name->username . '</a>';
            $email_data['link'] = '<a href="' . base_url() . 'dashboard/students_dashboard">Click here to view the demo request and make changes.</a>';
            $email_data['date_time'] = $b_name->NextSessionDate;
            $email_data['subject'] = 'Demo approved!';
            $email_data['demo_duration'] = $b_name->SessionDuration;

            $a = $this->sysmail->initialize($email_data);


            $this->sysmail->send_mail($TeacherID, '123', $a);
            //end email
            //send email for student 212
            $tname = explode(' ', $student_name->username);
            $email_data['users_first_name'] = $tname[0];
            $email_data['instructor_name'] = '<a href="' . base_url() . 'view_profile/student_profilebyemail/' . base64_encode($StudentID) . '">' . $teacher_name->username . '</a>';
            $email_data['link'] = '<a href="' . base_url() . 'notification">Click here to view the demo request and message the instructor.</a>';
            $email_data['date_time'] = $b_name->NextSessionDate;
            $email_data['subject'] = 'Demo approved!';
            $email_data['demo_duration'] = $b_name->SessionDuration;

            $a = $this->sysmail->initialize($email_data);


            $this->sysmail->send_mail($StudentID, '212', $a);
            //end email

            $this->session->set_flashdata('msg', 'You just approved a demo request from ' . $student_name->username);
        } else {

            $enrollment_record = array(
                'AcceptNote' => $AcceptNote,
                'DateOfEnrollment' => date('Y/m/d h:i:s'),
                'ModifiedOn' => date('Y/m/d h:i:s'),
            );

            $this->load->model('enrollment_record');
            // paypal Authorization transaction data----------------
            $query_paypal = $this->db->query('SELECT transactionid, amount, currencycode FROM tbl_paypal_transaction_detail WHERE course_id="' . $CourseID . '" and batch_id="' . $BatchID . '" and student_id = "' . $StudentID . '"');
            $paypal_transaction = $query_paypal->row();

            $DCFields = array(
                'authorizationid' => $paypal_transaction->transactionid, // Required. The authorization identification number of the payment you want to capture. This is the transaction ID returned from DoExpressCheckoutPayment or DoDirectPayment.
                'amt' => $paypal_transaction->amount, // Required. Must have two decimal places.  Decimal separator must be a period (.) and optional thousands separator must be a comma (,)
                'completetype' => 'Complete', // Required.  The value Complete indiciates that this is the last capture you intend to make.  The value NotComplete indicates that you intend to make additional captures.
                'currencycode' => $paypal_transaction->currencycode, // Three-character currency code
                'invnum' => now(), // Your invoice number
                'note' => 'You have purchased a course from STUDIO NEAR, LLC.', // Informational note about this setlement that is displayed to the buyer in an email and in his transaction history.  255 character max.
                'softdescriptor' => 'STUDIO NEAR, LLC', // Per transaction description of the payment that is passed to the customer's credit card statement.
                'storeid' => '', // ID of the merchant store.  This field is required for point-of-sale transactions.  Max: 50 char
                'terminalid' => ''      // ID of the terminal.  50 char max.  
            );

            //paypal configuration ---------------------------------
            // Load PayPal library
            $this->config->load('paypal');

            $config = array(
                'Sandbox' => $this->config->item('Sandbox'), // Sandbox / testing mode option.
                'APIUsername' => $this->config->item('APIUsername'), // PayPal API username of the API caller
                'APIPassword' => $this->config->item('APIPassword'), // PayPal API password of the API caller
                'APISignature' => $this->config->item('APISignature'), // PayPal API signature of the API caller
                'APISubject' => '', // PayPal API subject (email address of 3rd party user that has granted API permission for your app)
                'APIVersion' => $this->config->item('APIVersion')  // API version you'd like to use for your call.  You can set a default version in the class and leave this blank if you want.
            );

            // Show Errors
            if ($config['Sandbox']) {
                error_reporting(E_ALL);
                ini_set('display_errors', '1');
            }

            $this->load->library('paypal/Paypal_pro', $config);
            //End Paypal configuration -------------------------- 

            $PayPalRequestData = array('DCFields' => $DCFields);
            $PayPalResult = $this->paypal_pro->DoCapture($PayPalRequestData);

            if (!$this->paypal_pro->APICallSuccessful($PayPalResult['ACK'])) {
                $errors = array('Errors' => $PayPalResult['ERRORS']);
                $this->load->view('paypal_error', $errors);
            } else {
                //approve student
                if ($this->enrollment_record->approve_student($enrollment_record, $StudentID, $CourseID, $BatchID)) {
                    //notification 218 for student
                    $notificationDataStu = array(
                        'Email' => $StudentID,
                        'DateTime' => date('Y/m/d h:i:s'),
                        'Notification' => 'Signed up for ' . $c_name->CourseName,
                        'Status' => 'Un-Read'
                    );

                    //notification 128 
                    $notificationDataIns = array(
                        'Email' => $TeacherID,
                        'DateTime' => date('Y/m/d h:i:s'),
                        'Notification' => $student_name->username . "'s signup request approved.",
                        'Status' => 'Un-Read'
                    );

                    //email 128 for teacher
                    $tname = explode(' ', $teacher_name->username);
                    $email_data['users_first_name'] = $tname[0];
                    $email_data['student_name'] = $student_name->username;
                    $email_data['course_name'] = $c_name->CourseName;
                    $email_data['start_date_time'] = $b_name->StartDate;
                    $email_data['end_date_time'] = $b_name->EndDate;
                    $email_data['number_of_sessions'] = $c_name->TotalHour;
                    $email_data['fees'] = $c_name->CouseFree;
                    $email_data['link'] = '<a href="' . base_url() . 'teacher/my_courses">Click here </a>';
                    $email_data['subject'] = 'Student signup accepted!';

                    $a = $this->sysmail->initialize($email_data);
                    $this->sysmail->send_mail($TeacherID, '128', $a);

                    //email 218 for student
                    $tname = explode(' ', $student_name->username);
                    $email_data['users_first_name'] = $tname[0];
                    $email_data['course_name'] = $c_name->CourseName;
                    $email_data['instructor_name'] = $teacher_name->username;
                    $email_data['start_date_time'] = $b_name->StartDate;
                    $email_data['end_date_time'] = $b_name->EndDate;
                    $email_data['number_of_sessions'] = $c_name->TotalHour;
                    $email_data['link'] = '<a href="' . base_url() . 'teacher/view_course' . $CourseID . '/' . $BatchID . '">Click here </a>';
                    $email_data['subject'] = 'Studionear Course Signup Confirmation!';

                    $a = $this->sysmail->initialize($email_data);
                    $this->sysmail->send_mail($StudentID, '128', $a);

                    $useronbatchData = array(
                        'UserID' => $StudentID,
                        'BatchID' => $BatchID,
                        'IsCompleted' => 'No',
                        'LastModifiedDate' => date('Y/m/d h:i:s'),
                    );

                    $paypal_auth_data = array(
                        'authorizationid' => $PayPalResult["AUTHORIZATIONID"],
                        'timestamp1' => $PayPalResult['TIMESTAMP'],
                        'correlationid' => $PayPalResult['CORRELATIONID'],
                        'ack' => $PayPalResult['ACK'],
                        'build' => $PayPalResult['BUILD'],
                        'l_errorcode0' => $PayPalResult['L_ERRORCODE0'],
                        'l_shortmessage0' => $PayPalResult['L_SHORTMESSAGE0'],
                        'l_longmessage0' => $PayPalResult['L_LONGMESSAGE0'],
                        'l_severitycode0' => $PayPalResult['L_SEVERITYCODE0'],
                        'transactionid' => $PayPalResult['TRANSACTIONID'],
                        'parenttransactionid' => $PayPalResult['PARENTTRANSACTIONID'],
                        'receiptid' => $PayPalResult['RECEIPTID'],
                        'transactiontype' => $PayPalResult['TRANSACTIONTYPE'],
                        'paymenttype' => $PayPalResult['PAYMENTTYPE'],
                        'ordertime' => $PayPalResult['ORDERTIME'],
                        'amt' => $PayPalResult['AMT'],
                        'feeamt' => $PayPalResult['FEEAMT'],
                        'taxamt' => $PayPalResult['TAXAMT'],
                        'currencycode' => $PayPalResult['CURRENCYCODE'],
                        'paymentstatus' => $PayPalResult['PAYMENTSTATUS'],
                        'pendingreason' => $PayPalResult['PENDINGREASON'],
                        'reasoncode' => $PayPalResult['REASONCODE'],
                        'protectioneligibility' => $PayPalResult['PROTECTIONELIGIBILITY'],
                        'protectioneligibilitytype' => $PayPalResult['PROTECTIONELIGIBILITYTYPE'],
                        'invnum' => $PayPalResult['REQUESTDATA']['INVNUM'],
                        'note' => $PayPalResult['REQUESTDATA']['NOTE'],
                        'softdescriptor' => $PayPalResult['REQUESTDATA']['SOFTDESCRIPTOR'],
                        'student_id' => $StudentID,
                        'course_id' => $CourseID,
                        'batch_id' => $BatchID);

                    //insert paypal capture date
                    $this->load->model('paypal_trasaction_model');
                    $this->paypal_trasaction_model->insert_auth_capture($paypal_auth_data);

                    $this->load->model('useronbatch');
                    $this->useronbatch->update_entry($useronbatchData, $notificationDataStu, $notificationDataIns, $StudentID, $BatchID);
                    $this->session->set_flashdata('msg', '<a href="' . site_url('view_profile/student_profilebyemail/' . base64_encode($StudentID)) . '" >' . $student_name->username . '</a> just registered to signup for your course ' . $c_name->CourseName . '. The registration and payment are pending your acceptance.');
                } else {

                    //alert 129 for instractor
                    $this->session->set_flashdata('msg', 'Attempt to accept' . $student_name->username . '\'s course signup request failed! Please try again.');
                }
            }
        }
    }

    public function reject_student($StudentID, $TeacherID, $BatchID, $CourseID, $RejNote) { // Sub Module
        $query_course = $this->db->query('SELECT CourseName, CouseFree, TotalHour FROM tbl_course WHERE CourseID="' . $CourseID . '"');
        $c_name = $query_course->row();

        $query_batch = $this->db->query('SELECT SessionDuration,StartDate, EndDate, NextSessionDate FROM tbl_batch WHERE BatchID="' . $BatchID . '"');
        $b_name = $query_batch->row();

        $query_student = $this->db->query('SELECT username FROM users WHERE email="' . $StudentID . '"');
        $student_name = $query_student->row();

        $query_teacher = $this->db->query('SELECT id, username FROM users WHERE email="' . $TeacherID . '"');
        $teacher_name = $query_teacher->row();

        if ($c_name->CourseName == 'Demo Session') {
            $enrollment_record = array(
                'RejectNote' => $RejNote,
                'DateOfEnrollment' => date('Y/m/d h:i:s'),
                'ModifiedOn' => date('Y/m/d h:i:s'),
            );


            $notificationDataStu = array(
                'Email' => $StudentID,
                'DateTime' => date('Y/m/d h:i:s'),
                'Notification' => 'Demo request denied.',
                'Status' => 'Un-Read'
            );


            $notificationDataIns = array(
                'Email' => $TeacherID,
                'DateTime' => date('Y/m/d h:i:s'),
                'Notification' => 'Demo to ' . $student_name->username . ' denied.',
                'Status' => 'Un-Read'
            );

            $useronbatchData = array(
                'UserID' => $StudentID,
                'BatchID' => $BatchID,
                'IsCompleted' => 'ReJ',
                'LastModifiedDate' => date('Y/m/d h:i:s'),
            );

            $this->load->model('enrollment_record');
            $this->enrollment_record->reject_student($enrollment_record, $StudentID, $CourseID, $BatchID);
            $this->load->model('useronbatch');
            $this->useronbatch->update_entry($useronbatchData, $notificationDataStu, $notificationDataIns, $StudentID, $BatchID);
            $this->session->set_flashdata('msg', 'You just denied a demo request from ' . $student_name->username);


            $query_useronbatch_info = $this->db->query('SELECT CreatedOn FROM  tbl_useronbatch WHERE BatchID = "' . $BatchID . '" AND UserID = "' . $StudentID . '"');
            $useronbatch_info = $query_useronbatch_info->row();
            //email 125 for Instractor
            $tname = explode(' ', $teacher_name->username);
            $email_data['users_first_name'] = $tname[0];
            $email_data['requested_date_time'] = $useronbatch_info->CreatedOn;
            $email_data['demo_duration'] = $b_name->SessionDuration . ' min';
            $email_data['student_name'] = $student_name->username;

            $email_data['link'] = '<a href="' . base_url() . 'teacher/view_course' . $CourseID . '/' . $BatchID . '"><b><u>Click here</u></b></a>';
            $email_data['subject'] = 'Studionear Course Signup Confirmation!';

            $a = $this->sysmail->initialize($email_data);
            $this->sysmail->send_mail($StudentID, '125', $a);
        } else {
            $enrollment_record = array(
                'RejectNote' => $RejNote,
                'DateOfEnrollment' => date('Y/m/d h:i:s'),
                'ModifiedOn' => date('Y/m/d h:i:s'),
            );



            $this->load->model('enrollment_record');
            if ($this->enrollment_record->reject_student($enrollment_record, $StudentID, $CourseID, $BatchID)) {
                $notificationDataStu = array(
                    'Email' => $StudentID,
                    'DateTime' => date('Y/m/d h:i:s'),
                    'Notification' => 'You requested is Rejected by Instructor',
                    'Status' => 'Un-Read'
                );

                //notification 130 for instractor
                $notificationDataIns = array(
                    'Email' => $TeacherID,
                    'DateTime' => date('Y/m/d h:i:s'),
                    'Notification' => $student_name->username . "'s signup request rejected",
                    'Status' => 'Un-Read'
                );



                //email 219 for student
                $tname = explode(' ', $student_name->username);
                $email_data['users_first_name'] = $tname[0];
                $email_data['course_name'] = $c_name->CourseName;
                $email_data['instructor_name'] = $teacher_name->username;
                $email_data['link'] = '<a href="' . base_url() . 'messaging/sms_from_email/' . $teacher_name->id . '">Click here </a>';
                $email_data['subject'] = 'Course Registration Request Denied!';

                $a = $this->sysmail->initialize($email_data);
                $this->sysmail->send_mail($StudentID, '219', $a);

                //email 130 for teacher
                $tname = explode(' ', $teacher_name->username);
                $email_data['users_first_name'] = $tname[0];
                $email_data['course_name'] = $c_name->CourseName;
                $email_data['student_name'] = $student_name->username;
                $email_data['start_date_time'] = $b_name->StartDate;
                $email_data['end_date_time'] = $b_name->EndDate;
                $email_data['number_of_sessions'] = $c_name->TotalHour;
                $email_data['fees'] = $c_name->CouseFree;
                $email_data['link'] = '<a href="' . base_url() . 'teacher/my_courses">Click here </a>';
                $email_data['subject'] = 'Student Signup rejected!';

                $a = $this->sysmail->initialize($email_data);
                $this->sysmail->send_mail($StudentID, '130', $a);

                $useronbatchData = array(
                    'UserID' => $StudentID,
                    'BatchID' => $BatchID,
                    'IsCompleted' => 'ReJ',
                    'LastModifiedDate' => date('Y/m/d h:i:s'),
                );
                $this->load->model('useronbatch');
                $this->useronbatch->update_entry($useronbatchData, $notificationDataStu, $notificationDataIns, $StudentID, $BatchID);

                $this->session->set_flashdata('msg', 'Your just rejected <a href="' . site_url('view_profile/student_profilebyemail/' . base64_encode($StudentID)) . '" >' . $student_name->username . '</a>\'s signup request for ' . $c_name->CourseName . '.');
            } else {

                $this->session->set_flashdata('msg', 'Attempt to reject <a href="' . site_url('view_profile/student_profilebyemail/' . base64_encode($StudentID)) . '" >' . $student_name->username . '</a>\'s course request failed! Please try again.');
            }
        }
    }

    public function demo_request_success($StudentID, $TeacherID, $BatchID, $CourseID) {
        $useronbatchData = array(
            'UserID' => $StudentID,
            'Rolle' => 'Student',
            'BatchID' => $BatchID,
            'IsCompleted' => 'Req',
            'CreatedBy' => $StudentID,
            'LastModifiedDate' => date('Y/m/d h:i:s'),
        );

        $result = $this->db->query("SELECT username FROM users where email='" . $TeacherID . "'");
        $tname = $result->row();

        //notification to student 210
        $notificationDataStu = array(
            'Email' => $StudentID,
            'DateTime' => date('Y/m/d h:i:s'),
            'Notification' => 'Demo Request sent to ' . $tname->username . '. You requested for Demo Session. Please wait for Instructor Approval',
            'Status' => 'Un-Read'
        );



        //notification to teacher 210
        $notificationDataIns = array(
            'Email' => $TeacherID,
            'DateTime' => date('Y/m/d h:i:s'),
            'Notification' => "A student requested for Demo Session Please contact Student.",
            'Status' => 'Un-Read'
        );


        $this->load->model('useronbatch');
        if ($this->useronbatch->insert_entry($useronbatchData, $notificationDataStu, $notificationDataIns)) {


            //Flash Data
            $this->session->set_flashdata('msg', 'Demo Request sent to ' . $tname->username);
        } else {

            //Flash Data
            $this->session->set_flashdata('msg', 'Demo Request sent to ' . $tname->username . '  could not be sent. Please refresh the page and try again.');
            //Flash Data
        }
    }

    public function demo_request() {

        $TeacherID = $this->input->post('TeacherID');
        $var_role = '';
        $CourseID = '';
        $BatchID = '';
        $EnrollFlag = 0;
        $email = $this->tank_auth->get_user_email();
        $SQLComm = "SELECT role from users WHERE email = '" . $email . "' ";
        $transaction = $this->db->query($SQLComm);
        foreach ($transaction->result() as $trans) {
            $var_role = $trans->role;
            $data['Role'] = $var_role;
        }

        $course_name = $this->db->query("SELECT c.CourseName, c.CourseID, b.BatchID from tbl_course as c INNER JOIN tbl_batch as b ON c.CourseID = b.CourseID where c.CourseName ='Demo Session' AND c.InstructorID = '" . base64_decode($TeacherID) . "'");

        foreach ($course_name->result() as $co_name) {
            $BatchID = $co_name->BatchID;
            $CourseID = $co_name->CourseID;
        }

        $is_already_enrolled = $this->db->query("SELECT * from tbl_useronbatch where UserID = '" . $email . "' and BatchID = '" . $BatchID . "'");

        if ($is_already_enrolled->num_rows() != 0) {
            $EnrollFlag = 1;
            $Notification = "You already requested for demo...";
        }

        if ($var_role == "teacher") {
            $Notification = "Your are not authorized to request for demo...";
            //Flash Data
            $this->session->set_flashdata('msg', $Notification);
            //Flash Data
            redirect('teacher/my_courses');
        } elseif ($var_role == "student") {
            if ($EnrollFlag == 0) {
                $Notification = "You have successfully requested for demo";
                $this->db->query("Update tbl_useronbatch set IsCompleted = 'Req' where UserID = '" . base64_decode($TeacherID) . "' and BatchID = '" . $BatchID . "'");
                $this->demo_request_success($this->tank_auth->get_user_email(), base64_decode($TeacherID), $BatchID, $CourseID);
            }
            //Flash Data
            $this->session->set_flashdata('msg', $Notification);
            //Flash Data
            redirect('student/my_courses');
        } else {
            redirect('welcome/login');
        }
    }

    public function my_courses() {
        $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';
        $data['user_profile'] = 'dashboard/notification/user_profile_teacher';
        $data['main_content'] = 'dashboard/content/teacher/my_courses';
        //Get TimeZone and DayLightSaving
        $email = $this->tank_auth->get_user_email();
        $TimeZone = $this->db->query('SELECT TimeZone, DayLightSaving FROM tbl_profile where UserID ="' . $email . '"');
        foreach ($TimeZone->result() as $TimeZ) {
            $data['TimeZone'] = $TimeZ->TimeZone;
            $data['DayLightSaving'] = $TimeZ->DayLightSaving;
        }
        //End TimeZone 

        $data['content_right'] = '';
        $this->load->view('dashboardTemplate1', $data);
    }

    public function end_demo($batch_id, $course_id) {
        $EndDemo = $this->db->query('Update tbl_useronbatch set IsCompleted = "Yes" where BatchID ="' . $batch_id . '"');
        if ($EndDemo) {
            //Flash Data
            $this->session->set_flashdata('msg', 'You have successfully finished the demo...');
            //Flash Data
        } else {
            //Flash Data
            $this->session->set_flashdata('msg', 'Demo End Request Unsuccessfull please try again later...');
            //Flash Data
        }
        redirect('teacher/my_courses');
    }

    public function un_publish($course_id, $batch_id) {
        //Get TimeZone and DayLightSaving
        $email = $this->tank_auth->get_user_email();
        $TimeZone = $this->db->query('SELECT TimeZone, DayLightSaving FROM tbl_profile where UserID ="' . $email . '"');
        foreach ($TimeZone->result() as $TimeZ) {
            $data['TimeZone'] = $TimeZ->TimeZone;
            $data['DayLightSaving'] = $TimeZ->DayLightSaving;
        }
        //End TimeZone 
        $Flag = 0;
        $IsEnrolled = $this->db->query('SELECT * from tbl_useronbatch where IsCompleted = "No" AND BatchID ="' . $batch_id . '" and Rolle = "Student"');
        foreach ($IsEnrolled->result() as $IsEnr) {
            if ($IsEnr->UserID) {
                //Flash Data
                $this->session->set_flashdata('msg', 'Your cannot unpublished a course where students are enrolled...');
                //Flash Data
                $Flag = 1;
                redirect('teacher/my_courses');
            }
        }

        if ($Flag == 0) {
            //Flash Data
            $this->session->set_flashdata('msg', 'Your have successfully unpublished the course...');
            //Flash Data
            //Update All User at tbl_useronbatch IsCompleted to Yes
            $this->db->query('Update tbl_useronbatch set IsCompleted = "Unpublished" where BatchID ="' . $batch_id . '"');
            //Update tbl_batch IsActive No
            $this->db->query('Update tbl_batch set IsActive = "No" where BatchID ="' . $batch_id . '" and CourseID = "' . $course_id . '"');
            redirect('teacher/my_courses');
        }
    }

    public function finish_course($course_id, $batch_id) {
        //Get TimeZone and DayLightSaving
        $email = $this->tank_auth->get_user_email();
        $TimeZone = $this->db->query('SELECT TimeZone, DayLightSaving FROM tbl_profile where UserID ="' . $email . '"');

        foreach ($TimeZone->result() as $TimeZ) {
            $data['TimeZone'] = $TimeZ->TimeZone;
            $data['DayLightSaving'] = $TimeZ->DayLightSaving;
        }

        //End TimeZone 
        //Update All User at tbl_useronbatch IsCompleted to Yes
        $this->db->query('Update tbl_useronbatch set IsCompleted = "Yes" where BatchID ="' . $batch_id . '"');
        //Update tbl_batch IsActive No
        $this->db->query('Update tbl_batch set IsActive = "No" where BatchID ="' . $batch_id . '" and CourseID = "' . $course_id . '"');

        //send email
        $this->load->library('sysmail');
        //get course information for email
        $course_info = $this->db->query('SELECT CourseName, Category, SubCategory, CouseFree FROM tbl_course where CourseID ="' . $course_id . '"');
        foreach ($course_info->result() as $course) {
            $course_name = $course->CourseName;
            $category = $course->Category;
            $subcategory = $course->SubCategory;
            $fees = $course->CouseFree;
        }

        //get batch information for email
        $batch_info = $this->db->query('SELECT StartDate, EndDate from tbl_batch where BatchID ="' . $batch_id . '" and CourseID = "' . $course_id . '"');
        foreach ($batch_info->result() as $batches) {
            $start_date_time = $batches->StartDate;
            $end_date_time = $batches->EndDate;
        }

        //get username for email
        $e_username = $this->db->query('SELECT username from users where email = "' . $email . '"');
        foreach ($e_username->result() as $e_info) {
            $email_name = $e_info->username;
        }

        $email_data['course_name'] = $course_name;
        $email_data['users_first_name'] = $email_name;
        $email_data['category'] = $category;
        $email_data['subcategory'] = $subcategory;
        $email_data['start_date_time'] = $start_date_time;
        $email_data['end_date_time'] = $end_date_time;

        $email_data['subject'] = 'Course ' . $course_name . '  complete!';
        $email_data['link'] = '<a href="' . site_url('student/course_history') . '"><b><u>Click Here</u></b></a> ';
        $a = $this->sysmail->initialize($email_data);

        $this->sysmail->send_mail($this->tank_auth->get_user_email(), '113', $a);
        //Send Notification
        $notification_data = array(
            'Email' => $this->tank_auth->get_user_email(),
            'Notification' => 'The course ' . $course_name . ' complete and rated',
            'Status' => 'Un-Read'
        );

        $this->load->model('notification_model');
        $this->notification_model->insert_entry($notification_data);

        //Flash Data
        $this->session->set_flashdata('msg', 'Your have successfully finished the course please rate your students...');
        //Flash Data
        $data['CourseID'] = $course_id;
        $data['BatchID'] = $batch_id;
        $data['TeacherID'] = $email;
        $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';
        $data['user_profile'] = 'dashboard/notification/user_profile_teacher';
        $data['main_content'] = 'dashboard/content/teacher/rate_student';
        $data['content_right'] = '';
        $data['content_right'] = '';
        $this->load->view('dashboardTemplate1', $data);
    }

    public function rate_all_students() {

        for ($i = 1; $i <= $this->input->post('TotalStudent'); $i++) {

            $rating_data = array(
                'CourseID' => $this->input->post('CourseID'),
                'CourseName' => $this->input->post('CourseName'),
                'BatchID' => $this->input->post('BatchID'),
                'TeacherID' => $this->tank_auth->get_user_email(),
                'StudentID' => $this->input->post('StudentID' . $i),
                //'CommentsForTeacher' => $this->input->post('CommentsForTeacher'),
                'CommentsForStudent' => $this->input->post('CommentsForStudent' . $i),
                'StartDate' => $this->input->post('StartDate'),
                'EndDate' => $this->input->post('EndDate'),
                'RatingPointStudent' => $this->input->post('RatingPointStudent' . $i),
                //'RatingPointTeacher' => $this->input->post('RatingPointTeacher'),
                'HideCommentsTeacher' => "No",
                'HideCommentsStudent' => "No",
                'CreatedBy' => $this->tank_auth->get_user_email(),
                'ModifiedBy' => $this->tank_auth->get_user_email(),
                'CreatedOn' => date('Y/m/d h:i:s'),
                'LastModifiedDate' => date('Y/m/d h:i:s'),
            );
            $this->load->model('rating_model');
            if ($this->rating_model->insert_rating($rating_data)) {
                $notification_data = array(
                    'Email' => $this->input->post('StudentID' . $i),
                    'Notification' => $this->input->post('CourseName') . ' complete and rated! ',
                    'Status' => 'Un-Read'
                );

                $this->load->model('notification_model');
                $this->notification_model->insert_entry($notification_data);
            } else {
                $notification_data = array(
                    'Email' => $this->tank_auth->get_user_email(),
                    'Notification' => 'Something wrong the student' . $this->input->post('StudentID' . $i),
                    'Status' => 'Un-Read'
                );

                $this->load->model('notification_model');
                $this->notification_model->insert_entry($notification_data);
            }
        }

        $notification_data = array(
            'Email' => $this->tank_auth->get_user_email(),
            'Notification' => $this->input->post('CourseName') . ' complete and rated! ',
            'Status' => 'Un-Read'
        );
        //Flash Data
        $this->session->set_flashdata('msg', 'Great! You just completed the course' . $this->input->post('CourseName') . '. Make sure to enter your feedback and rate the instructor. Your feedback and rating will help other users make better course choices.');
        //Flash Data
        redirect('teacher/my_courses');
    }

    public function save_create_couse() {

        $course_data = array(
            'InstructorID' => $this->tank_auth->get_user_email(),
            'CourseName' => $this->input->post('course_name'),
            'Category' => $this->input->post('tip_category'),
            'SubCategory' => $this->input->post('tip_subcategory'),
            'MaxofStudet' => $this->input->post('maximum_students'),
            'HourPerSession' => $this->input->post('duration_session'),
            'CouseFree' => $this->input->post('fees_per_student'),
            'TotalHour' => $this->input->post('number_of_session'),
            'Overview' => $this->input->post('Overview'),
            'QualificationForStudent' => $this->input->post('QualificationForStudent'),
            'Requirements' => $this->input->post('Requirements'),
            'VideoLink' => $this->input->post('VideoLink'),
            'IsActive' => 'Yes',
        );

        $this->load->model('create_course_model');
        if ($this->create_course_model->insert_course($course_data)) {
            $query = $this->db->query('SELECT max(CourseID) as max_id FROM tbl_course');
            $row = $query->row_array();
            $max_id = $row['max_id'];
            //Get TimeZone and DayLightSaving
            $email = $this->tank_auth->get_user_email();
            $TimeZone = $this->db->query('SELECT TimeZone, DayLightSaving FROM tbl_profile where UserID ="' . $email . '"');
            foreach ($TimeZone->result() as $TimeZ) {
                $TimeZone = $TimeZ->TimeZone;
                $DayLightSaving = $TimeZ->DayLightSaving;
            }
            //End TimeZone 

            $batch_data = array(
                'CourseID' => $max_id,
                'TeacherID' => $this->tank_auth->get_user_email(),
                'StartDate' => date('Y/m/d', (strtotime($this->input->post('start_date')))),
                'EndDate' => date('Y/m/d', (strtotime($this->input->post('end_date')))),
                'SessionDuration' => $this->input->post('duration_session'),
                'NextSessionDate' => '0000-00-00 00:00:00',
                'IsActive' => 'Yes',
                'CreatedBy' => $this->tank_auth->get_user_email(),
            );

            $this->create_course_model->insert_batch($batch_data);
            $query = $this->db->query('SELECT max(BatchID) as max_id_b FROM tbl_batch');
            $row = $query->row_array();
            $max_id_b = $row['max_id_b'];
            for ($i = 1; $i <= $this->input->post('number_of_session'); $i++) {
                $schedule_data = array(
                    'BatchID' => $max_id_b,
                    'schedule_date' => $newDate = date("Y-m-d", strtotime($this->input->post('day' . $i))),
                    'StartTime' => //$this->input->post('start_time'.$i),
                    date('H:i:s', $this->convert_to_gmt(strtotime($this->input->post('start_time' . $i)), $TimeZone, $DayLightSaving)),
                    'EndTime' => //$this->input->post('end_time'.$i),
                    date('H:i:s', $this->convert_to_gmt(strtotime($this->input->post('end_time' . $i)), $TimeZone, $DayLightSaving)),
                    'Flexiblity' => $this->input->post('Flexibility' . $i),
                    'CreatedBy' => $this->tank_auth->get_user_email(),
                );

                $this->create_course_model->insert_schedule($schedule_data);
            }

            $useronbatch_data = array(
                'UserID' => $this->tank_auth->get_user_email(),
                'Rolle' => 'Teacher',
                'BatchID' => $max_id_b,
                'IsCompleted' => 'No',
                'CreatedBy' => $this->tank_auth->get_user_email(),
                'CreatedOn' => date('Y/m/d h:i:s'),
            );

            $this->create_course_model->insert_useronbatch($useronbatch_data);

            /* send email to the user */
            $this->load->library('sysmail');
            $user_fname = explode(' ', $this->tank_auth->get_username());

            $email_data['users_first_name'] = $user_fname[0];
            $email_data['course_name'] = $this->input->post('course_name');
            $email_data['instructor_name'] = $this->tank_auth->get_username();
            $email_data['category'] = $this->input->post('tip_category');
            $email_data['subject'] = 'Course ' . $this->input->post('course_name') . ' created!';
            $email_data['subcategory'] = $this->input->post('tip_subcategory');

            $email_data['fees'] = $this->input->post('fees_per_student');
            $email_data['link'] = 'Click here to access the course page: &nbsp;&nbsp;&nbsp;<a href="' . base_url() . 'teacher/my_courses" >' . base_url() . 'teacher/my_courses</a></br></br>';
            $a = $this->sysmail->initialize($email_data);
            $this->sysmail->send_mail($this->tank_auth->get_user_email(), '105', $a);
            /* end email */

            //send notification
            $query = $this->db->query('SELECT count(InstructorID) as total FROM tbl_course WHERE InstructorID = "' . $email . '"');
            $count = $query->row_array();
            if ($count['total'] == 2) {
                //104
                $notification_data = array(
                    'Email' => $email,
                    'Notification' => 'FIRST session message!',
                    'Status' => 'Un-Read'
                );

                $this->load->model('notification_model');
                $this->notification_model->insert_entry($notification_data);

                $notification_data = array(
                    'Email' => $email,
                    'Notification' => '<a href="' . base_url() . 'teacher/view_course/' . $max_id . '/' . $max_id_b . '">Created ' . $this->input->post('course_name') . ' successfully.</a>',
                    'Status' => 'Un-Read'
                );

                $this->load->model('notification_model');
                $this->notification_model->insert_entry($notification_data);
            } else {

                $notification_data = array(
                    'Email' => $email,
                    'Notification' => '<a href="' . base_url() . 'teacher/view_course/' . $max_id . '/' . $max_id_b . '">Created ' . $this->input->post('course_name') . ' successfully.</a>',
                    'Status' => 'Un-Read'
                );

                $this->load->model('notification_model');
                $this->notification_model->insert_entry($notification_data);
            }
        }


        //Flash Data
        redirect('teacher/my_courses');
    }

    public function transaction_history() {
        $var_role = '';
        $email = $this->tank_auth->get_user_email();
        $SQLComm = "SELECT role from users WHERE email = '" . $email . "' ";
        $transaction = $this->db->query($SQLComm);
        foreach ($transaction->result() as $trans) {
            $var_role = $trans->role;
            $data['Role'] = $var_role;
        }

        if ($var_role == "teacher") {
            $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';
        } elseif ($var_role == "student") {
            $data['main_menu'] = 'dashboard/menu/main_ menu_student';
        }

        $data['user_profile'] = 'dashboard/notification/user_profile_teacher';
        $data['main_content'] = 'dashboard/content/teacher/transaction';
        $data['content_right'] = '';
        $this->load->view('dashboardTemplate1', $data);
    }

    public function course_history() {
        $var_role = '';
        $email = $this->tank_auth->get_user_email();
        $SQLComm = "SELECT role from users WHERE email = '" . $email . "' ";
        $transaction = $this->db->query($SQLComm);
        foreach ($transaction->result() as $trans) {
            $var_role = $trans->role;
            $data['Role'] = $var_role;
        }

        if ($var_role == "teacher") {
            $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';
        } elseif ($var_role == "student") {
            $data['main_menu'] = 'dashboard/menu/main_ menu_student';
        }
        $data['user_profile'] = 'dashboard/notification/user_profile_teacher';
        $data['main_content'] = 'dashboard/content/teacher/course_history';
        $data['content_right'] = '';
        $this->load->view('dashboardTemplate1', $data);
    }

    public function profile() {
        $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';
        $data['user_profile'] = 'dashboard/notification/user_profile_teacher';
        $data['main_content'] = 'dashboard/content/teacher/profile';
        $data['content_right'] = '';
        $data['username'] = $this->tank_auth->get_username();
        $data['userid'] = $this->tank_auth->get_user_id();
        $data['teacher_email'] = base64_encode($this->tank_auth->get_user_email());
        $this->load->model('teacher_profile_model');
        $data['teacher_profile'] = $this->teacher_profile_model->get_ProfileInformation($this->tank_auth->get_user_email()); //***
        $user_rating = $this->teacher_profile_model->get_RatingPointAvg($this->tank_auth->get_user_email());
        //*** Calculate teacher Rating from Table
        foreach ($user_rating as $i) {   // To get Rating
            $user_rating = $i->RatingPointTeacher;
        }
        $data['user_rating'] = $user_rating;
        $this->load->view('dashboardTemplate1', $data);
    }

    public function profile_by_email($user_email) {
        $var_role = '';
        $email = $this->tank_auth->get_user_email();
        $SQLComm = "SELECT role from users WHERE email = '" . $email . "' ";
        $transaction = $this->db->query($SQLComm);
        foreach ($transaction->result() as $trans) {
            $var_role = $trans->role;
            $data['Role'] = $var_role;
        }
        if ($var_role == "teacher") {
            $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';
        } elseif ($var_role == "student") {
            $data['main_menu'] = 'dashboard/menu/main_ menu_student';
        }

        $data['user_profile'] = 'dashboard/notification/user_profile_teacher';
        $data['main_content'] = 'dashboard/content/teacher/profile';
        $data['content_right'] = '';
        $this->load->model('teacher_profile_model');
        $data['teacher_profile'] = $this->teacher_profile_model->get_ProfileInformation($user_email); //***
        $user_rating = $this->teacher_profile_model->get_RatingPointAvg($user_email); //*** Calculate teacher Rating from Table

        foreach ($user_rating as $i) {   // To get Rating
            $user_rating = $i->RatingPointTeacher;
        }

        $data['user_rating'] = $user_rating;
        $this->load->view('dashboardTemplate1', $data);
    }

    public function edit_password() {
        $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';
        $data['user_profile'] = 'dashboard/notification/user_profile_teacher';
        $data['main_content'] = 'dashboard/content/teacher/change_password';
        $data['content_right'] = '';
        $this->load->view('dashboardTemplate1', $data);
    }

    public function getSubCategoryByCategory($category = NULL) {
        $subcategories = $this->db->query('SELECT SubCategory FROM tbl_subcategory where Category ="' . $category . '"');
        ?><option value="Any">-Any- </option>  <?php
        foreach ($subcategories->result() as $subcategory):
            ?>
            <option value="<?php echo $subcategory->SubCategory; ?>"><?php echo $subcategory->SubCategory; ?>
            </option>    
            <?php
        endforeach;
    }

    public function start_session($course_name, $c_batch, $c_courseID) {
        $this->load->helper('string');
        $email = $this->tank_auth->get_user_email();
        $U_Name = '';
        $course_name = str_replace('%20', '+', $course_name);
        $course_name = str_replace('\'', '', $course_name);
        $course_name = str_replace("'", '', $course_name);
        $course_name = str_replace(' ', '+', $course_name);
        $course_name = str_replace('%3Cdiv%20style=', '+', $course_name);
        $c_batch = str_replace('%20', '+', $c_batch);
        $c_batch = str_replace(' ', '+', $c_batch);
        $c_batch = str_replace('%3Cdiv%20style=', '+', $c_batch);
        $c_courseID = str_replace('%20', '+', $c_courseID);
        $c_courseID = str_replace(' ', '+', $c_courseID);
        $c_courseID = str_replace('%3Cdiv%20style=', '+', $c_courseID);

        //Select User Name by Email
        $UserNameGet = $this->db->query('SELECT username FROM users where email ="' . $email . '"');
        foreach ($UserNameGet->result() as $UserName) {
            $U_Name = $UserName->username;
        }
        //End Select User Name
        $IP = "192.95.38.81";
        $Port = 81;

        $CurrentDateTime = date('y-m-d');
        $CurrentDateTime = str_replace('%20', '+', $CurrentDateTime);
        $CurrentDateTime = str_replace(' ', '+', $CurrentDateTime);
        $CurrentDateTime = str_replace('%3Cdiv%20style=', '+', $CurrentDateTime);
        $MeetingID = $CurrentDateTime . $c_courseID . $c_batch . $c_batch . date('H');
        $MeetingID = str_replace('%20', '+', $MeetingID);
        $MeetingID = str_replace(' ', '+', $MeetingID);
        $MeetingID = str_replace('%3Cdiv%20style=', '+', $MeetingID);
        $StudentPWD = random_string('numeric', 6);
        $ModeratorPW = random_string('numeric', 6);
        $ModeratorName = str_replace(' ', '+', $U_Name);
        $ModeratorName = str_replace('%20', '+', $ModeratorName);
        $StudentName = "Student";
        $MeetingName = str_replace('%20', '+', $course_name);
        $MeetingName = str_replace("'", '', $course_name);
        $MeetingName = str_replace(' ', '+', $MeetingName);

        //echo $ModeratorName."<br>";
        //Search If Meeting Already Created

        $MeetingDetail = $this->db->query('SELECT MeetingID FROM tbl_session_log where MeetingID ="' . $MeetingID . '"');
        //End Search
        $data['bbb_link_create'] = "";

        if ($MeetingDetail->num_rows() == 0) { //if Meeting Already not Created
            $session_data = array(
                'MeetingName' => $MeetingName,
                'MeetingID' => $MeetingID,
                'StudentPWD' => $StudentPWD,
                'ModeratorPW' => $ModeratorPW,
                'CourseID' => $c_courseID,
                'BatchID' => $c_batch,
            );

            $CreateMeetingString = "createname=" . $MeetingName . "&meetingID=" . $MeetingID . "&attendeePW=" . $StudentPWD . "&moderatorPW=" . $ModeratorPW;
            $salt = "6ce484d8fac5159323e222e450877498";
            $sha = sha1($CreateMeetingString . $salt);
            $link = "name=" . $MeetingName . "&meetingID=" . $MeetingID . "&attendeePW=" . $StudentPWD . "&moderatorPW=" . $ModeratorPW . "&checksum=" . $sha;
            //Insert Meeting Info into Session Table
            if ($this->db->query('Insert into tbl_session_log values ("","' . $MeetingName . '","' . $MeetingID . '","' . $StudentPWD . '","' . $ModeratorPW . '","' . $c_courseID . '","' . $c_batch . '",NOW() )')) {
                //notification 
                $batch_user = $this->db->query('SELECT `UserID` FROM `tbl_useronbatch` WHERE BatchID ="' . $c_batch . '"');
                foreach ($batch_user->result() as $user) {
                    $notification_data = array(
                        'Email' => $user->UserID,
                        'Notification' => $course_name . ' session started!',
                        'Status' => 'Un-Read'
                    );

                    $this->load->model('notification_model');
                    $this->notification_model->insert_entry($notification_data);
                }

                //Flash Data
                $this->session->set_flashdata('msg', 'The studio is ready for your use.');
                //Flash Data 
            } else {
                $batch_user = $this->db->query('SELECT `UserID` FROM `tbl_useronbatch` WHERE BatchID ="' . $c_batch . '"');
                foreach ($batch_user->result() as $user) {
                    $notification_data = array(
                        'Email' => $user->UserID,
                        'Notification' => $course_name . 'session attempt unsuccessful!',
                        'Status' => 'Un-Read'
                    );

                    $this->load->model('notification_model');
                    $this->notification_model->insert_entry($notification_data);
                }

                //Flash Data
                $this->session->set_flashdata('msg', 'Attempt to start the ' . $course_name . ' session was unsuccessful! Please try again!');
                //Flash Data 
            }
            //End Insert

            $JoinMeetingString = "joinfullName=" . $ModeratorName . "&meetingID=" . $MeetingID . "&password=" . $ModeratorPW;

            $sha1 = sha1($JoinMeetingString . $salt);
            $link1 = "fullName=" . $ModeratorName . "&meetingID=" . $MeetingID . "&password=" . $ModeratorPW . "&checksum=" . $sha1;
            $data['course_name'] = $course_name;
            $data['c_batch'] = $c_batch;
            $data['c_courseID'] = $c_courseID;
            $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';
            $data['user_profile'] = 'dashboard/notification/user_profile_teacher';
            $data['content_right'] = '';
            $data['main_content'] = 'dashboard/content/bbb_create';
            $data['bbb_link_create'] = "http://" . $IP . "/bigbluebutton/api/create?" . $link;
            $data['bbb_link'] = "http://" . $IP . "/bigbluebutton/api/join?" . $link1;


            $this->load->view('dashboardTemplate1', $data);
        } else {
            $MeetingDetail = $this->db->query('SELECT MeetingID,ModeratorPW FROM tbl_session_log where MeetingID ="' . $MeetingID . '"');
            //End Search

            foreach ($MeetingDetail->result() as $MeetingLog) {
                $ModeratorPW = $MeetingLog->ModeratorPW;
            }
            //echo $ModeratorPW;
            $StudentName = $U_Name;
            //echo $MeetingDetail->num_rows();
            $JoinMeetingString = "joinfullName=" . $ModeratorName . "&meetingID=" . $MeetingID . "&password=" . $ModeratorPW;
            $salt1 = "6ce484d8fac5159323e222e450877498";
            $sha1 = sha1($JoinMeetingString . $salt1);
            $link1 = "fullName=" . $ModeratorName . "&meetingID=" . $MeetingID . "&password=" . $ModeratorPW . "&checksum=" . $sha1;

            //echo "<br>".$sha1."<br>";
            // Send Notification
            $notification_data = array(
                'Email' => $email,
                'Notification' => 'Next session date time of the ' . $course_name . ' updated',
                'Status' => 'Un-Read'
            );

            $this->load->model('notification_model');
            // $this->notification_model->insert_entry($notification_data);
            //end notification

            $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';
            $data['user_profile'] = 'dashboard/notification/user_profile_teacher';
            $data['main_content'] = 'dashboard/content/bbb';
            $data['content_right'] = '';
            $data['bbb_link'] = "http://" . $IP . "/bigbluebutton/api/join?" . $link1;
            $data['bbb_link_create'] = "http://" . $IP . "/bigbluebutton/api/create?" . $link1;



            $this->load->view('dashboardTemplate1', $data);
        }
    }

    public function edit_profile() {

        $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';

        $data['user_profile'] = 'dashboard/notification/user_profile_teacher';

        $data['main_content'] = 'dashboard/content/teacher/edit_my_profile';

        $data['content_right'] = '';

        $data['username'] = $this->tank_auth->get_username();

        $data['userid'] = $this->tank_auth->get_user_id();



        $data['user_email'] = $this->tank_auth->get_user_email();

        $this->load->view('dashboardTemplate1', $data);
    }

    public function save_my_profile() {

        //$this->form_validation->set_rules('username', 'Name', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('country', 'Country', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('state', 'State', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('mobile', 'Phone', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('alternateEmail', 'Alternate Email', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('Overview', 'Alternate Email', 'trim|required|xss_clean');
        // if ($this->form_validation->run()) {

        $SQLCommUpdate = "Update users SET username = '" . $this->input->post('username') . "' where email = '" . $this->tank_auth->get_user_email() . "' ";

        $CountInst = $this->db->query($SQLCommUpdate);



        $profile_data = array(
            'TimeZone' => $this->input->post('timezones'),
            'DayLightSaving' => $this->input->post('DayLightSaving'),
            'DoB' => date('Y-m-d H:i:s', strtotime($this->input->post('DoB'))),
            'Address' => $this->input->post('address'),
            'Address1' => $this->input->post('address1'),
            'City' => $this->input->post('City'),
            'State' => $this->input->post('state'),
            'zipCode' => $this->input->post('ZipCode'),
            'Country' => $this->input->post('country'),
            'Language' => $this->input->post('Language'),
            'Phone' => $this->input->post('phone'),
            'Mobile' => $this->input->post('mobile'),
            'RatePerHour' => $this->input->post('RatePerHour'),
            'YearOfExperince' => $this->input->post('YearOfExperince'),
            'AlternateEmail' => $this->input->post('alternateEmail'),
            'Overview' => $this->input->post('Overview'),
            'OtherQualification' => $this->input->post('otherQualification'),
            'ModifiedBy' => $this->tank_auth->get_username(),
            'LastModifiedDate' => date('Y-m-d H:i:s', local_to_gmt(time(), $this->input->post('timezones'), $this->input->post('DayLightSaving'))),
            'VideoLinks' => $this->input->post('VideoLinks'),
        );

        //Upload new Picture

        if ($this->now_upload('picture')) {

            $fileData = array('Picture' => $this->upload_data['file_name']);

            $profile_data = array_merge($profile_data, $fileData);
        }

        //End Upload new picture
        // Count Existing education

        $SQLComm = "SELECT * from tbl_education WHERE UserID = '" . $this->tank_auth->get_user_email() . "' ";

        $CountInst = $this->db->query($SQLComm);

        $innitialCount = $CountInst->num_rows();



        // End Count

        for ($i = 1; $i <= $innitialCount; $i++) {

            $education_data = array(
                'Institute' => $this->input->post('Institute' . $i),
                'Degree' => $this->input->post('Degree' . $i),
                'Major' => $this->input->post('Major' . $i),
                'StartYear' => $this->input->post('StartYear' . $i),
                //'EndYear' => $this->input->post('EndYear'.$i),		
                'UserID' => $this->tank_auth->get_user_email(),
            );

            $this->load->model('teacher_profile_model');

            $this->teacher_profile_model->update_educationData($education_data, $this->input->post('EducationID' . $i));
        }

        //Adding additional rows from edit
        //echo $innitialCount."<br>".$this->input->post('countRow');

        if ($innitialCount < $this->input->post('countRow')) {

            for ($i = $innitialCount + 1; $i < $this->input->post('countRow') + 1; $i++) {

                $education_data = array(
                    'Institute' => $this->input->post('Institute' . $i),
                    'Degree' => $this->input->post('Degree' . $i),
                    'Major' => $this->input->post('Major' . $i),
                    'StartYear' => $this->input->post('StartYear' . $i),
                    //'EndYear' => $this->input->post('EndYear'.$i),	
                    'UserID' => $this->tank_auth->get_user_email(),
                );

                if ($this->input->post('Institute' . $i) != 0 || $this->input->post('Institute' . $i) != NULL) {

                    $this->load->model('teacher_profile_model');

                    $this->teacher_profile_model->insert_education($education_data);
                }

                //echo $this->input->post('Institute'.$i+1)."<br>".$this->input->post('Major'.$i+1)."<br>";
            }
        }

        //end adding additional rows
        // Count Existing experience

        $SQLComm = "SELECT * from tbl_experience WHERE UserID = '" . $this->tank_auth->get_user_email() . "' ";

        $CountInstExp = $this->db->query($SQLComm);

        $innitialCount = $CountInstExp->num_rows();



        // End Count

        for ($i = 1; $i <= $innitialCount; $i++) {

            $experience_data = array(
                'Position' => $this->input->post('Position' . $i),
                'Employer' => $this->input->post('Employer' . $i),
                'StartYear' => $this->input->post('StartYear' . $i),
                'EndYear' => $this->input->post('EndYear' . $i),
                'UserID' => $this->tank_auth->get_user_email(),
            );

            $this->load->model('teacher_profile_model');

            $this->teacher_profile_model->update_experienceData($experience_data, $this->input->post('experienceID' . $i));
        }

        //Adding additional rows from edit



        if ($innitialCount < $this->input->post('countRowExperience')) {

            for ($i = $innitialCount + 1; $i < $this->input->post('countRowExperience') + 1; $i++) {

                $experience_data = array(
                    'Position' => $this->input->post('Position' . $i),
                    'Employer' => $this->input->post('Employer' . $i),
                    'StartYear' => $this->input->post('StartYear' . $i),
                    'EndYear' => $this->input->post('EndYear' . $i),
                    'UserID' => $this->tank_auth->get_user_email(),
                );

                if ($this->input->post('Position' . $i) != 0 || $this->input->post('Position' . $i) != NULL) {

                    $this->load->model('teacher_profile_model');

                    $this->teacher_profile_model->insert_experience($experience_data);
                }
            }
        }

        //end adding additional rows experience
        // End Adding experience





        $this->load->model('teacher_profile_model');

        if ($this->teacher_profile_model->update_teacher_profile($profile_data, $this->tank_auth->get_user_email())) {

            $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';

            $data['user_profile'] = 'dashboard/notification/user_profile_teacher';

            $data['main_content'] = 'dashboard/content/teacher/edit_my_profile';

            $data['content_right'] = '';

            $data['username'] = $this->input->post('username');

            $data['userid'] = $this->tank_auth->get_user_id();

            $data['user_email'] = $this->tank_auth->get_user_email();

            //Flash Data

            $this->session->set_flashdata('msg', 'Your Profile Updated Successfully...');

            //Flash Data
            //send notification
            $notification_data = array(
                'Email' => $this->tank_auth->get_user_email(),
                'Notification' => 'Profile updated',
                'Status' => 'Un-Read'
            );

            $this->load->model('notification_model');
            $this->notification_model->insert_entry($notification_data);
        } else {
            $this->session->set_flashdata('msg', 'Profile could not be updated. Please refresh the page and try again!');
        }

        redirect('teacher/edit_profile');
        //}
    }

    function edit_course($course_id, $batch_id) {
        $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';
        $data['user_profile'] = 'dashboard/notification/user_profile_teacher';
        $data['main_content'] = 'dashboard/content/teacher/edit_course';
        $data['content_right'] = '';
        $this->load->model('create_course_model');
        $data['course'] = $this->create_course_model->get_course($course_id);
        $data['batch'] = $this->create_course_model->get_batch($batch_id);
        $data['schedules'] = $this->create_course_model->get_schedules($batch_id);
        $this->load->view('dashboardTemplate1', $data);
    }

    function view_course($course_id, $batch_id, $time_zone = 'UTC') {

        if ($this->input->post('TimeZone')) {
            $data['TimeZoneUR'] = $this->input->post('TimeZone');
        } else
            $data['TimeZoneUR'] = $time_zone;

        $var_role = '';
        $Template = 'unregistered';
        $email = $this->tank_auth->get_user_email();
        $SQLComm = "SELECT role from users WHERE email = '" . $email . "' ";
        $transaction = $this->db->query($SQLComm);
        foreach ($transaction->result() as $trans) {
            $var_role = $trans->role;
            $data['Role'] = $var_role;
        }

        if ($var_role == "teacher") {
            $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';
            $Template = 'dashboardTemplate1';
        } elseif ($var_role == "student") {
            $data['main_menu'] = 'dashboard/menu/main_ menu_student';
            $Template = 'dashboardTemplate1';
        }

        $data['user_profile'] = 'dashboard/notification/user_profile_teacher';
        $data['main_content'] = 'dashboard/content/teacher/view_course';
        $data['course_id'] = $course_id;
        $data['batch_id'] = $batch_id;
        $data['content_right'] = '';
        $this->load->model('create_course_model');
        $data['course'] = $this->create_course_model->get_course($course_id);
        $data['batch'] = $this->create_course_model->get_batch($batch_id);
        $data['schedules'] = $this->create_course_model->get_schedules($batch_id);
        $this->load->view($Template, $data);
    }

    function save_update_couse_data() {

        $course_data = array(
            'CourseName' => $this->input->post('course_name'),
            'Category' => $this->input->post('tip_category'),
            'SubCategory' => $this->input->post('tip_subcategory'),
            'TotalHour' => $this->input->post('number_of_session'),
            'HourPerSession' => $this->input->post('duration_session'),
            'MaxofStudet' => $this->input->post('maximum_students'),
            'Overview' => $this->input->post('Overview'),
            'QualificationForStudent' => $this->input->post('QualificationForStudent'),
            'Requirements' => $this->input->post('Requirements'),
            'VideoLink' => $this->input->post('VideoLink'),
            'CouseFree' => $this->input->post('fees_per_student'),
        );

        $course_id = $this->input->post('course_id');
        $this->load->model('create_course_model');

        if ($this->create_course_model->update_course($course_data, $course_id)) {
            $batch_data = array(
                'StartDate' => date('Y/m/d', (strtotime($this->input->post('start_date')))),
                'EndDate' => date('Y/m/d', (strtotime($this->input->post('end_date')))), //$this->input->post('end_date'),
                'SessionDuration' => $this->input->post('duration_session'),
                'NextSessionDate' => '0000-00-00 00:00:00',
            );
            $batch_id = $this->input->post('batch_id');
            $this->create_course_model->update_batch($batch_data, $batch_id);
            // Count Existing Schedule
            $SQLComm = "SELECT * from tbl_schedule WHERE BatchID = '" . $this->input->post('batch_id') . "' ";
            $CountBatch = $this->db->query($SQLComm);
            $innitialCount = $CountBatch->num_rows();
            // End Count

            for ($i = 1; $i <= $innitialCount; $i++) {
                $schedule_data = array(
                    'Day' => $this->input->post('day' . $i),
                    'schedule_date' => date('Y/m/d H:i:s', $this->convert_to_gmt(strtotime($this->input->post('schedule_date' . $i)))),
                    'StartTime' => $this->input->post('start_time' . $i),
                    'EndTime' => $this->input->post('end_time' . $i),
                    'Flexiblity' => $this->input->post('Flexibility' . $i),
                    'ModifiedBy' => $this->tank_auth->get_user_email(),
                );

                $schedule_id = $this->input->post('schedule_id' . $i);

                $this->create_course_model->update_schedule($schedule_data, $schedule_id);
            }

            //Adding additional rows from edit
            //echo $innitialCount."<br>".$this->input->post('countRow');

            if ($innitialCount < $this->input->post('countRow')) {
                for ($i = $innitialCount + 1; $i <= $this->input->post('countRow'); $i++) {
                    $schedule_data = array(
                        'BatchID' => $this->input->post('batch_id'),
                        'schedule_date' => $this->input->post('schedule_date' . $i),
                    'Day' => $this->input->post('day' . $i),
                        'StartTime' => $this->input->post('start_time' . $i),
                        'EndTime' => $this->input->post('end_time' . $i),
                        'Flexiblity' => $this->input->post('Flexibility' . $i),
                        'CreatedBy' => $this->tank_auth->get_user_email(),
                    );

                    if ($this->input->post('batch_id') != 0) {

                        $schedule_id = $this->input->post('schedule_id' . $i);

                        $this->create_course_model->insert_schedule($schedule_data, $schedule_id);
                    }
                }
            }

            //end adding additional rows
            // Email update 111

            $this->load->library('sysmail');
            $tname = explode(' ', $this->tank_auth->get_username());
            $email_data['users_first_name'] = $tname[0];
            $email_data['link'] = '<a href="' . site_url("teacher/view_course/" . $course_id . "/" . $this->input->post("batch_id")) . '" ><b><u>Click Here</u></b></a>';
            $email_data['course_name'] = $this->input->post('course_name');
            $email_data['instructor_name'] = $this->tank_auth->get_username();
            $email_data['category'] = $this->input->post('tip_category');
            $email_data['subcategory'] = $this->input->post('tip_subcategory');
            $datestring = "%m/%d/%Y  -  %h:%i %a";
            $time = time();
            $email_data['date_time'] = mdate($datestring, $time);
            $email_data['fees'] = $this->input->post('fees_per_student');
            $email_data['subject'] = ' Course ' . $this->input->post("course_name") . ' updated!';
            $a = $this->sysmail->initialize($email_data);


            $this->sysmail->send_mail($this->tank_auth->get_user_email(), '111', $a);
            // End Email
            // Send Notification

            $notification_data = array(
                'Email' => $this->tank_auth->get_user_email(),
                'Notification' => 'Edited ' . $this->input->post("course_name"),
                'Status' => 'Un-Read'
            );

            $this->load->model('notification_model');
            $this->notification_model->insert_entry($notification_data);

            //Flash Data

            $this->session->set_flashdata('msg', $this->input->post("course_name") . ' was Updated Successfully...');

            //Flash Data
        } else {
            //Flash Data
            $this->session->set_flashdata('msg', 'Something went wrong. Please refresh the page and try again!');
            //Flash Data
        }



        redirect('teacher/my_courses/');
    }

    public function search_preference() {

        $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';

        $data['user_profile'] = 'dashboard/notification/user_profile_teacher';

        $data['main_content'] = 'dashboard/content/teacher/search_preference';

        $data['content_right'] = '';

        $this->load->view('dashboardTemplate1', $data);
    }

    public function advance_search() {

        $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';

        $data['user_profile'] = 'dashboard/notification/user_profile_teacher';

        $data['main_content'] = 'dashboard/content/advance_search';

        $data['content_right'] = '';

        $data['ListingOption'] = '';

        $email = $this->tank_auth->get_user_email();

        $var_role = '';

        $SQLComm = "SELECT role from users WHERE email = '" . $email . "' ";

        $transaction = $this->db->query($SQLComm);

        foreach ($transaction->result() as $trans) {

            $var_role = $trans->role;

            $data['Role'] = $var_role;
        }

        $data['keyword'] = $this->input->post('keyword');

        $this->load->view('dashboardTemplate1', $data);
    }

    public function save_keyword_preference() {



        $SubCategory = $this->input->post('AllSubCatList');
        ;

        $Keyword = $this->input->post('Keyword');







        //$SubCategory = $this->input->post('SubCatPost');
        //echo $SubCategory."<br>".$this->input->post('SubCatPost3');



        $data_search_preference = array(
            'UserID' => $this->tank_auth->get_user_email(),
            'Keywords' => $Keyword,
            'SubCategory' => $SubCategory,
        );



        $this->load->model('teacher_profile_model');

        if ($this->teacher_profile_model->update_search_preference($data_search_preference, $this->tank_auth->get_user_email())) {
            $this->session->set_flashdata('msg', 'Set Preference successfully updated.');
        } else {
            $this->session->set_flashdata('msg', 'The Set Preference could not be updated. Please refresh the page and try again!');
        }

        $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';

        $data['user_profile'] = 'dashboard/notification/user_profile_teacher';

        $data['main_content'] = 'dashboard/content/teacher/search_preference';

        $data['content_right'] = '';


        //send notification
        $notification_data = array(
            'Email' => $this->tank_auth->get_user_email(),
            'Notification' => 'Set Preference Updated',
            'Status' => 'Un-Read'
        );

        $this->load->model('notification_model');
        $this->notification_model->insert_entry($notification_data);

        redirect('teacher/search_preference');
    }

    public function change_session_time() {

        //Get TimeZone and DayLightSaving

        $email = $this->tank_auth->get_user_email();

        $TimeZone = $this->db->query('SELECT TimeZone, DayLightSaving FROM tbl_profile where UserID ="' . $email . '"');

        foreach ($TimeZone->result() as $TimeZ) {

            $TimeZone = $TimeZ->TimeZone;

            $DayLightSaving = $TimeZ->DayLightSaving;
        }

        //End TimeZone 

        $NextSessionDate = date('Y/m/d H:i:s', $this->convert_to_gmt(strtotime($this->input->post('NextSessionTime')), $TimeZone, $DayLightSaving));



        $batch_id = $this->input->post('BatchID');

        $data_update_session_time = array(
            'NextSessionDate' => $NextSessionDate,
        );



        $this->load->model('teacher_profile_model');

        if ($this->teacher_profile_model->update_next_session_date($data_update_session_time, $batch_id)) {

            //notification 
            $batch_user = $this->db->query('SELECT `UserID` FROM `tbl_useronbatch` WHERE BatchID ="' . $batch_id . '"');
            $query_course = $this->db->query('SELECT CourseName FROM tbl_course WHERE CourseID ="' . $batch_id . '"');
            $course_info = $query_course->row();
            foreach ($batch_user->result() as $user) {
                $notification_data = array(
                    'Email' => $user->UserID,
                    'Notification' => '<b>' . $course_info->CourseName . '</b>  Date & Time updated',
                    'Status' => 'Un-Read'
                );

                $this->load->model('notification_model');
                $this->notification_model->insert_entry($notification_data);
            }

            //Flash Data
            $this->session->set_flashdata('msg', 'Next Session Date & Time Successfully Updated.');
        } else {
            //Flash Data
            $this->session->set_flashdata('msg', 'Something went wrong. Please refresh the page and try again!');
        }
        redirect('teacher/my_courses');
    }

    public function get_search_data() {

        $keyword = $this->input->post('keyword');

        $min_range = $this->input->post('min_range');

        $max_range = $this->input->post('max_range');

        $category = $this->input->post('category');

        $subcategory = $this->input->post('subcategory');

        $experience = $this->input->post('experience');

        $ListingOption = $this->input->post('ListingOption');



        if ($ListingOption == 'Instructor') {

            $query = "select distinct p.*, u.username, s.Keywords, s.SubCategory from tbl_profile as p INNER JOIN users as u on u.email = p.UserID INNER JOIN tbl_search_preference as s ON s.UserID = u.email and u.role = 'teacher'";

            $query .= " Where p.RatePerHour between " . $min_range . " AND " . $max_range;

            $query .= " AND p.YearOfExperince between " . $experience;

            if ($subcategory != "Any") {

                $query .= " AND LOWER(s.SubCategory) LIKE '%" . strtolower($subcategory) . "%'";
            }

            if ($keyword != "") {

                $key_array = explode(" ", $keyword);

                for ($i = 0; $i < count($key_array); $i++) {

                    if ($i == 0) {

                        $query .= " AND LOWER(s.Keywords) LIKE '%" . strtolower($key_array[$i]) . "%'";

                        $query .= " OR LOWER(s.SubCategory) LIKE '%" . strtolower($key_array[$i]) . "%'";

                        $query .= " OR LOWER(u.username) LIKE '%" . strtolower($key_array[$i]) . "%'";

                        $query .= " OR LOWER(p.Address) LIKE '%" . strtolower($key_array[$i]) . "%'";

                        $query .= " OR LOWER(p.Overview) LIKE '%" . strtolower($key_array[$i]) . "%'";

                        $query .= " OR LOWER(p.OtherQualification) LIKE '%" . strtolower($key_array[$i]) . "%'";
                    } else {

                        $query .= " OR LOWER(s.Keywords) LIKE '%" . strtolower($key_array[$i]) . "%'";

                        $query .= " OR LOWER(s.SubCategory) LIKE '%" . strtolower($key_array[$i]) . "%'";

                        $query .= " OR LOWER(u.username) LIKE '%" . strtolower($key_array[$i]) . "%'";

                        $query .= " OR LOWER(p.Address) LIKE '%" . strtolower($key_array[$i]) . "%'";

                        $query .= " OR LOWER(p.Overview) LIKE '%" . strtolower($key_array[$i]) . "%'";

                        $query .= " OR LOWER(p.OtherQualification) LIKE '%" . strtolower($key_array[$i]) . "%'";
                    }
                }
            }



            $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';

            $data['user_profile'] = 'dashboard/notification/user_profile_teacher';

            $data['main_content'] = 'dashboard/content/advance_search';

            $data['content_right'] = '';

            $data['ListingOption'] = $ListingOption;

            $data['Query'] = $query;

            $data['Role'] = 'teacher';

            $data['keyword'] = $this->input->post('keyword');

            $this->load->view('dashboardTemplate1', $data);
        } elseif ($ListingOption == 'Course') {

            $query1 = "select distinct c.*, p.YearOfExperince, b.BatchID  from tbl_course as c INNER JOIN tbl_profile as p ON c.InstructorID = p.UserID INNER JOIN tbl_batch as b ON b.CourseID = c.CourseID where c.IsActive = 'Yes' and c.CourseName <> 'Demo Session' ";

            $query1 .= " AND c.CouseFree between " . $min_range . " AND " . $max_range;

            if ($experience != "Any" && $experience != "") {

                $query1 .= " AND p.YearOfExperince between " . $experience;
            }

            if ($category != "Any" && $category != "") {

                $query1 .= " AND c.Category='" . $category . "'";
            }



            if ($subcategory != "Any" && $subcategory != "") {

                $query1 .= " AND c.SubCategory='" . $subcategory . "'";
            }

            if ($keyword != "") {

                $key_array = explode(" ", $keyword);

                for ($i = 0; $i < count($key_array); $i++) {

                    if ($i == 0) {

                        $query1 .= " AND LOWER(c.CourseName) LIKE '%" . strtolower($key_array[$i]) . "%'";
                    } else {

                        $query1 .= " OR LOWER(c.CourseName) LIKE '%" . strtolower($key_array[$i]) . "%'";
                    }
                }

                for ($i = 0; $i < count($key_array); $i++) {

                    if ($i == 0) {

                        $query1 .= " OR LOWER(c.Category) LIKE '%" . strtolower($key_array[$i]) . "%'";
                    } else {

                        $query1 .= " OR LOWER(c.Category) LIKE '%" . strtolower($key_array[$i]) . "%'";
                    }
                }



                for ($i = 0; $i < count($key_array); $i++) {

                    if ($i == 0) {

                        $query1 .= " OR LOWER(c.Overview) LIKE '%" . strtolower($key_array[$i]) . "%'";
                    } else {

                        $query1 .= " OR LOWER(c.Overview) LIKE '%" . strtolower($key_array[$i]) . "%'";
                    }
                }
            }



            $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';

            $data['user_profile'] = 'dashboard/notification/user_profile_teacher';

            $data['main_content'] = 'dashboard/content/advance_search';

            $data['content_right'] = '';

            $data['ListingOption'] = $ListingOption;

            $data['Query'] = $query1;

            $data['Role'] = 'teacher';

            $data['keyword'] = $this->input->post('keyword');

            $this->load->view('dashboardTemplate1', $data);
        }
    }

    public function enroll_into_course($CourseID, $BatchID) {

        $this->lang->load('tank_auth');



        //find student name
        $SQLComm = "SELECT username from users WHERE email = '" . $this->tank_auth->get_user_email() . "' ";
        $student_name = $this->db->query($SQLComm);

        //find teacher name
        $query_teacher = $this->db->query("SELECT u.UserName, u.email, b.BatchID FROM users AS u INNER JOIN tbl_batch AS b ON u.email = b.TeacherID WHERE `BatchID` = '" . $BatchID . "' ");
        $teacher_name = $query_teacher->row();

        foreach ($student_name->result() as $student) {
            $Studentname = $student->username;
        }

        if ($this->tank_auth->is_logged_in()) {

            $enrollment_record = array(
                'CourseID' => $CourseID,
                'BatchID' => $BatchID,
                'TeacherID' => $teacher_name->email,
                'StudentID' => $this->tank_auth->get_user_email(),
                'DateOfEnrollment' => date('Y/m/d h:i:s'),
                'ModifiedOn' => date('Y/m/d h:i:s'),
            );

            $this->load->model('enrollment_record');

            $this->enrollment_record->insert_enrollment($enrollment_record);

            //email to user(student), have find course name from course id
            $query_course = $this->db->query('SELECT CourseName, Category, SubCategory, CouseFree FROM tbl_course WHERE CourseID="' . $CourseID . '"');
            $course_result = $query_course->row();
            $CourseName = $course_result->CourseName;

            $query_batch = $this->db->query('SELECT StartDate FROM tbl_batch WHERE BatchID="' . $BatchID . '"');
            $batch_result = $query_batch->row();

            //student email
            $tname = explode(' ', $this->tank_auth->get_username());
            $email_data['users_first_name'] = $tname[0];
            $email_data['link'] = '<a href="' . site_url("messaging") . '" >Click here to access your Studionear inbox</a>';
            $email_data['course_name'] = $course_result->CourseName;
            $email_data['category'] = $course_result->CourseName;
            $email_data['subcategory'] = $course_result->SubCategory;
            $email_data['start_date_time'] = $batch_result->StartDate;
            $email_data['fees'] = $course_result->CouseFree;
            $email_data['link'] = '<a href="' . base_url() . 'teacher/view_course/' . $CourseID . '/' . $BatchID . '" >Click here to access the course page</a><br />';
            $email_data['subject'] = 'Course ' . $course_result->CourseName . ' signup pending!';

            $a = $this->sysmail->initialize($email_data);
            $this->sysmail->send_mail($this->tank_auth->get_user_email(), '206', $a);

            //teacher email
            $teachername = explode(' ', $teacher_name->UserName);
            $email_data['users_first_name'] = $teachername[0];
            $email_data['student_name'] = $this->tank_auth->get_username();
            $email_data['link'] = '<a href="' . base_url() . 'teacher/view_course/' . $CourseID . '/' . $BatchID . '" >' . $course_result->CourseName . '</a><br />';
            $email_data['link1'] = '<a href="' . base_url() . 'teacher/view_approve_reject/' . $CourseID . '/' . $BatchID . '" ><b>CLICK HERE</b></a><br />';
            $email_data['subject'] = 'You have a Studionear Session Request!';

            $b = $this->sysmail->initialize($email_data);
            $this->sysmail->send_mail($this->input->post('InstructorID'), '127', $b);


            $transactionData = array(
                'TransactionType' => 'TBD',
                'Date' => date('Y/m/d h:i:s'),
                'Description' => $course_result->CourseName . ' is PURCHASED by ' . $Studentname . ' Fees Paid ' . $this->input->post('CouseFree') . '(USD)',
                'Status' => 'Pending',
                'Amount' => $course_result->CouseFree,
                'TeacherID' => $this->input->post('InstructorID'),
                'StudentID' => $this->tank_auth->get_user_email(),
                'CourseID' => $CourseID,
                'BatchID' => $BatchID,
                'CreatedBy' => $this->tank_auth->get_user_email(),
                'LastModifiedDate' => date('Y/m/d h:i:s')
            );


            $useronbatchData = array(
                'UserID' => $this->tank_auth->get_user_email(),
                'Rolle' => 'Student',
                'BatchID' => $BatchID,
                'IsCompleted' => 'Req',
                'CreatedBy' => $this->tank_auth->get_user_email(),
                'LastModifiedDate' => date('Y/m/d h:i:s'),
            );

            //notification 206 //
            $notificationDataStu = array(
                'Email' => $this->input->post('StudentID'),
                'DateTime' => date('Y/m/d h:i:s'),
                'Notification' => 'Course ' . $CourseName . 'signup pending for instructor\'s approval.',
                'Status' => 'Un-Read'
            );


            //127 notification //'Notification' => $this->input->post('CourseName') . ' is PURCHASED by ' . $Studentname . ' Fees Paid ' . $this->input->post('CouseFree') . '(USD) Please Contact Student.',
            $notificationDataIns = array(
                'Email' => $this->input->post('InstructorID'),
                'DateTime' => date('Y/m/d h:i:s'),
                'Notification' => 'Course ' . $course_result->CourseName . ' signup request from ' . $this->tank_auth->get_username(),
                'Status' => 'Un-Read'
            );



            $this->load->model('useronbatch');
            $this->useronbatch->insert_entry($useronbatchData, $notificationDataStu, $notificationDataIns);
            $email = $this->tank_auth->get_user_email();

            $SQLComm = "SELECT role from users WHERE email = '" . $email . "' ";
            $transaction = $this->db->query($SQLComm);
            foreach ($transaction->result() as $trans) {
                $var_role = $trans->role;
            }

            if ($var_role == "teacher") {
                $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';
                $data['user_profile'] = 'dashboard/notification/user_profile_teacher';
                $data['main_content'] = 'dashboard/content/teacher/my_courses';
                $Template = 'dashboardTemplate1';
            } elseif ($var_role == "student") {
                $data['main_menu'] = 'dashboard/menu/main_ menu_student';
                $data['user_profile'] = 'dashboard/notification/user_profile_student';
                $data['main_content'] = 'dashboard/content/student/my_courses';
                $Template = 'dashboardTemplate1';
            }

            $data['content_right'] = '';

            //Flash Data
            $this->session->set_flashdata('msg', 'Your purchase of <a href="' . base_url() . 'teacher/view_course/' . $CourseID . '/' . $BatchID . '" >' . $course_result->CourseName . '</a> is pending the instructor’s approval. As soon as the instructor accepts your registration, an email confirmation will be sent to you.  <b>Your card will not be charged until your request has been accepted by the instructor.</b> To view the course details, simply click on the course name. You can also view a list of all the courses you’ve signed up for by clicking on the “My Courses” tab.
');

            //Flash Data
            //redirect('student/purchase/'.$this->input->post('CourseID').'/'.$this->input->post('BatchID'));
            $this->load->view($Template, $data);
        } else {

            $data['main_content'] = 'dashboard/content/loginUnregistered';

            $this->load->view('unregistered', $data);
        }
    }

    protected function now_upload($photo) {

        $setConfig['upload_path'] = './public/dashboard/upl';

        $setConfig['allowed_types'] = 'BMP|GIF|JPG|PNG|JPEG|gif|jpg|png|jpeg|bmp';

        $setConfig['encrypt_name'] = TRUE;

        $setConfig['max_size'] = '';

        $setConfig['max_width'] = '';

        $setConfig['max_height'] = '';

        $this->load->library('upload');

        $this->upload->initialize($setConfig);



        if (!$this->upload->do_upload($photo)) {

            $this->data['admin_message'] = $this->upload->display_errors("<p style='color:#FF0000; font-weight:bold;'>", "</p>");

            return FALSE;
        } else {

            $this->upload_data = $this->upload->data();

            return TRUE;
        }
    }

    function convert_to_gmt($time = '', $timezone = 'UTC', $dst = FALSE) {

        if ($time == '') {

            return now();
        }

        $time -= timezones($timezone) * 3600;

        if ($dst == TRUE) {

            $time -= 3600;
        }

        return $time;
    }

    function timeshow() {

        $this->load->helper('date');



        $a = array(
            'title' => "Kazi Chairman Saab: ",
            'start' => now(),
            'end' => now()
        );



        echo json_encode($a);
    }

    public function upload_video() {



        $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';

        $data['user_profile'] = 'dashboard/notification/user_profile_teacher';

        $data['main_content'] = 'dashboard/content/teacher/upload_videos';

        $data['content_right'] = '';

        $this->load->view('dashboardTemplate1', $data);
    }

    public function save_video_links() {

        $video_counter = $this->input->post('video_counter');

        $email = $this->tank_auth->get_user_email();



        for ($i = 1; $i < $video_counter; $i++) {

            $url = $this->input->post('link' . $i);

            parse_str(parse_url($url, PHP_URL_QUERY), $links);

            $data = array(
                'UserID' => $email,
                'video_link' => $links['v']
            );



            $this->load->model('video_model');

            $this->video_model->insert_video($data);
        }
    }

    public function deactivate_confirmation() {

        $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';

        $data['user_profile'] = 'dashboard/notification/user_profile_teacher';

        $data['main_content'] = 'dashboard/content/login_deactivate';

        $data['role'] = 'teacher';

        $data['content_right'] = '';

        $this->load->view('dashboardTemplate1', $data);
    }

    public function deactivate_account() {

        $data['login_by_username'] = ($this->config->item('login_by_username', 'tank_auth') AND
                $this->config->item('use_username', 'tank_auth'));

        $data['login_by_email'] = $this->config->item('login_by_email', 'tank_auth');



        $this->form_validation->set_rules('login', 'Login', 'trim|required|xss_clean');

        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        $this->form_validation->set_rules('remember', 'Remember me', 'integer');



        // Get login for counting attempts to login

        if ($this->config->item('login_count_attempts', 'tank_auth') AND
                ($login = $this->input->post('login'))) {

            $login = $this->security->xss_clean($login);
        } else {

            $login = '';
        }



        $data['use_recaptcha'] = $this->config->item('use_recaptcha', 'tank_auth');

        if ($this->tank_auth->is_max_login_attempts_exceeded($login)) {

            if ($data['use_recaptcha'])
                $this->form_validation->set_rules('recaptcha_response_field', 'Confirmation Code', 'trim|xss_clean|required|callback__check_recaptcha');
            else
                $this->form_validation->set_rules('captcha', 'Confirmation Code', 'trim|xss_clean|required|callback__check_captcha');
        }

        $data['errors'] = array();



        if ($this->form_validation->run()) {        // validation ok
            if ($this->tank_auth->login(
                            $this->form_validation->set_value('login'), $this->form_validation->set_value('password'), $this->form_validation->set_value('remember'), $data['login_by_username'], $data['login_by_email'])) {        // success
                $Flag = 0;



                $email = $this->tank_auth->get_user_email();

                $SQLComm = "SELECT distinct b.BatchID, c.* FROM tbl_batch b INNER JOIN tbl_course c ON b.CourseID = c.CourseID WHERE b.TeacherID = '" . $email . "' AND b.IsActive =  'Yes'";

                $ongoing_courses = $this->db->query($SQLComm);

                foreach ($ongoing_courses->result() as $course) {

                    $course_id = $course->CourseID;

                    $batch_id = $course->BatchID;

                    $IsEnrolled = $this->db->query('SELECT * from tbl_useronbatch where IsCompleted = "No" AND BatchID ="' . $batch_id . '" and Rolle = "Student"');



                    foreach ($IsEnrolled->result() as $IsEnr) {

                        if ($IsEnr->UserID) {

                            //Flash Data

                            $this->session->set_flashdata('msg', 'Your cannot deactivate your account where students are enrolled...');

                            //Flash Data

                            $Flag = 1;

                            $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';

                            $data['user_profile'] = 'dashboard/notification/user_profile_teacher';

                            $data['main_content'] = 'dashboard/content/teacher/my_courses';

                            $data['content_right'] = '';

                            $this->load->view('dashboardTemplate1', $data);
                        }
                    }
                }



                if ($Flag == 0) {

                    //Flash Data

                    $this->session->set_flashdata('msg', 'Your account successfully deactivate...');

                    //Flash Data
                    //Update All User at tbl_useronbatch IsCompleted to Yes

                    $this->db->query('Update users set activated = 0 where email ="' . $this->tank_auth->get_user_email() . '"');

                    //Update tbl_batch IsActive No

                    $this->db->query('Update tbl_batch set IsActive = "No" where BatchID ="' . $batch_id . '" and CourseID = "' . $course_id . '"');

                    $this->session->sess_destroy();

                    redirect('welcome');
                }
            } else {

                $errors = $this->tank_auth->get_error_message();

                if (isset($errors['banned'])) {        // banned user
                    $this->_show_message($this->lang->line('auth_message_banned') . ' ' . $errors['banned']);
                } elseif (isset($errors['not_activated'])) {    // not activated user
                    redirect('/auth/send_again/');
                } else {             // fail
                    foreach ($errors as $k => $v)
                        $data['errors'][$k] = $this->lang->line($v);
                }
            }
        }

        $data['show_captcha'] = FALSE;

        if ($this->tank_auth->is_max_login_attempts_exceeded($login)) {

            $data['show_captcha'] = TRUE;

            if ($data['use_recaptcha']) {

                $data['recaptcha_html'] = $this->_create_recaptcha();
            } else {

                $data['captcha_html'] = $this->_create_captcha();
            }
        }
    }

    public function test() {



        echo now();
    }

}
