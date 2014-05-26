<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Student extends CI_Controller {
    var $upload_data;
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

    public function index() {

        $this->load->view('welcome');
    }

    public function confirm() {
        
    }

    public function payment_paypal() {
        require_once APPPATH."/third_party/paypalfunctions.php";// (base_url()."third_party/paypalfunctions.php");
					echo APPPATH;
		$CourseID = $this->input->post('courseID');
		$BatchID= $this->input->post('batchID'); 
                $email = $this->tank_auth->get_user_email();
		$PaymentOption = "PayPal";
		$IsEnrolled = 'NO';
		$SQLComm = "SELECT  UserID from tbl_useronbatch where UserID = '".$email."' and BatchID = '".$BatchID."'";
		$IsUserEnrolled_Array = $this->db->query($SQLComm);
		foreach ($IsUserEnrolled_Array->result() as $IsUserEnrolled) {
			$IsEnrolled = $IsUserEnrolled->UserID;
		
		}
		
		if ($IsEnrolled == "NO"){
			if ( $PaymentOption == "PayPal")
			{
					// ==================================
					// PayPal Express Checkout Module
					// ==================================
			
				
						
					//'------------------------------------
					//' The paymentAmount is the total value of 
					//' the purchase.
					//'
					//' TODO: Enter the total Payment Amount within the quotes.
					//' example : $paymentAmount = "15.00";
					//'------------------------------------
			
					//$paymentAmount = "15.00";
					$SQLComm = "SELECT  CouseFree from tbl_course where CourseID = ".$CourseID."";
					$Amount_raw = $this->db->query($SQLComm);
					foreach ($Amount_raw->result() as $Amount) {
						$paymentAmount = $Amount->CouseFree;
					}
					
					//'------------------------------------
					//' The currencyCodeType  
					//' is set to the selections made on the Integration Assistant 
					//'------------------------------------
					$currencyCodeType = "USD";
					$paymentType = "Authorization";
			
					//'------------------------------------
					//' The returnURL is the location where buyers return to when a
					//' payment has been succesfully authorized.
					//'
					//' This is set to the value entered on the Integration Assistant 
					//'------------------------------------
					$returnURL = base_url()."student/my_courses";
			
					//'------------------------------------
					//' The cancelURL is the location buyers are sent to when they hit the
					//' cancel button during authorization of payment during the PayPal flow
					//'
					//' This is set to the value entered on the Integration Assistant 
					//'------------------------------------
					$cancelURL = base_url()."paypal/cancel.php";
			
					//'------------------------------------
					//' Calls the SetExpressCheckout API call
					//'
					//' The CallSetExpressCheckout function is defined in the file PayPalFunctions.php,
					//' it is included at the top of this file.
					//'-------------------------------------------------
			
					
					$items = array();
					$items[] = array('name' => 'Course', 'amt' => $paymentAmount, 'qty' => 1);
				
					//::ITEMS::
					
					// to add anothe item, uncomment the lines below and comment the line above 
					// $items[] = array('name' => 'Item Name1', 'amt' => $itemAmount1, 'qty' => 1);
					// $items[] = array('name' => 'Item Name2', 'amt' => $itemAmount2, 'qty' => 1);
					// $paymentAmount = $itemAmount1 + $itemAmount2;
					
					// assign corresponding item amounts to "$itemAmount1" and "$itemAmount2"
					// NOTE : sum of all the item amounts should be equal to payment  amount 
					//$this->load->library('paypalfunctions');
                                        
                                        $resArray = SetExpressCheckoutDG( $paymentAmount, $currencyCodeType, $paymentType, 
															$returnURL, $cancelURL, $items );
			
					$ack = strtoupper($resArray["ACK"]);
					if($ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING")
					{
							$token = urldecode($resArray["TOKEN"]);
							 RedirectToPayPalDG( $token );
					} 
					else  
					{
							//Display a user friendly Error on the page using any of the following error information returned by PayPal
							$ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
							$ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
							$ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
							$ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);
							
							echo "SetExpressCheckout API call failed. ";
							echo "Detailed Error Message: " . $ErrorLongMsg;
							echo "Short Error Message: " . $ErrorShortMsg;
							echo "Error Code: " . $ErrorCode;
							echo "Error Severity Code: " . $ErrorSeverityCode;
					}
			}
		}
		else {
		 	//Flash Data
            $this->session->set_flashdata('msg', 'You are already enrolled into this course...');
            //Flash Data
			redirect('student/my_courses');
		}
			
    }

    public function rate_teacher_view() {
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
        $data['user_profile'] = 'dashboard/notification/user_profile_student';
        $data['main_content'] = 'dashboard/content/student/rate_teacher';
        $data['content_right'] = '';
        $this->load->view('dashboardTemplate1', $data);
    }

    public function rate_teacher() {
        $rating_data = array(
            'BatchID' => $this->input->post('BatchID'),
            'StudentID' => $this->tank_auth->get_user_email(),
            'CommentsForTeacher' => $this->input->post('CommentsForTeacher'),
            'RatingPointTeacher' => $this->input->post('RatingPointTeacher'),
            'ModifiedBy' => $this->tank_auth->get_user_email(),
            'LastModifiedDate' => date('Y/m/d h:i:s')
        );

        $TeacherID = $this->input->post('TeacherID');
        $BatchID = $this->input->post('BatchID');
        $CourseID = $this->input->post('CourseID');
        $StudentID = $this->tank_auth->get_user_email();
        //echo $TeacherID."<br> ---BatchID: ".$BatchID."<br> ---StudentID: ".$StudentID."<br> Comments: ".$this->input->post('CommentsForTeacher');
        $this->load->model('rating_model');
        $this->rating_model->update_rating($rating_data, $CourseID, $BatchID, $StudentID);
        //email to user and teacher
        $query_course = $this->db->query('SELECT CourseName, Category, SubCategory, CouseFree FROM tbl_course WHERE CourseID="' . $this->input->post('CourseID') . '"');
        $course_result = $query_course->row();
        $query_batch = $this->db->query('SELECT StartDate, EndDate FROM tbl_batch WHERE BatchID="' . $this->input->post('BatchID') . '"');
        $batch_result = $query_batch->row();
        $tname = explode(' ', $this->tank_auth->get_username());
        $email_data['users_first_name'] = $tname[0];
        $email_data['link'] = '<a href="' . site_url("messaging") . '" >Click here to access your Studionear inbox</a>';
        $email_data['course_name'] = $course_result->CourseName;
        $email_data['category'] = $course_result->CourseName;
        $email_data['subcategory'] = $course_result->SubCategory;
        $email_data['start_date_time'] = $batch_result->StartDate;
        $email_data['end_date_time'] = $batch_result->EndDate;
        $email_data['fees'] = $course_result->CouseFree;
        $email_data['link'] = '<br/><a href="' . base_url() . 'teacher/view_course/' . $this->input->post('CourseID') . '/' . $this->input->post('BatchID') . '" ><b><u>Click here</u></b></a> to access the course page<br />';
        $email_data['subject'] = 'Course ' . $course_result->CourseName . ' complete!';
        $a = $this->sysmail->initialize($email_data);
        //student
        $this->sysmail->send_mail($this->tank_auth->get_user_email(), '208', $a);
        //teacher
        $this->sysmail->send_mail($TeacherID, '208', $a);
        $data['main_menu'] = 'dashboard/menu/main_ menu_student';
        $data['user_profile'] = 'dashboard/notification/user_profile_student';
        $data['main_content'] = 'dashboard/content/student/my_courses';
        $data['content_right'] = '';
        $this->load->view('dashboardTemplate1', $data);
    }
    public function my_courses() {
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
        $data['user_profile'] = 'dashboard/notification/user_profile_student';
        $data['main_content'] = 'dashboard/content/student/my_courses';
        $data['content_right'] = '';
        $this->load->view('dashboardTemplate1', $data);
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
        $data['user_profile'] = 'dashboard/notification/user_profile_student';
        $data['main_content'] = 'dashboard/content/student/transaction';
        $data['content_right'] = '';
        //$this->lang->load('tank_auth');
        $email = $this->tank_auth->get_user_email();
        $data['username'] = $this->tank_auth->get_username();
        $data['userid'] = $this->tank_auth->get_user_id();
        $data['user_email'] = $email;
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
        $data['user_profile'] = 'dashboard/notification/user_profile_student';
        $data['main_content'] = 'dashboard/content/student/course_history';
        $data['content_right'] = '';
        $this->lang->load('tank_auth');
        $email = $this->tank_auth->get_user_email();
        $data['username'] = $this->tank_auth->get_username();
        $data['userid'] = $this->tank_auth->get_user_id();
        $this->load->view('dashboardTemplate1', $data);
    }

    public function profile() {
        $data['main_menu'] = 'dashboard/menu/main_ menu_student';
        $data['user_profile'] = 'dashboard/notification/user_profile_student';
        $data['main_content'] = 'dashboard/view_profile/student_profile';
        $data['content_right'] = '';
        $email = $this->tank_auth->get_user_email();
        $this->load->model('student_profile_model');
        $data['student_profile'] = $this->student_profile_model->get_ProfileInformation($email); //***
        $user_rating = $this->student_profile_model->get_RatingPointAvg($email); //*** Calculate Student Rating from Table
        foreach ($user_rating as $i) {   // To get Rating
            $user_rating = $i->RatingPointStudent;
        }

        $data['user_rating'] = $user_rating;
        $data['student_email'] = base64_encode($email);
        $data['username'] = $this->tank_auth->get_username();
        $data['userid'] = $this->tank_auth->get_user_id();
        $this->load->view('dashboardTemplate1', $data);
    }

    public function edit_password() {
        $data['main_menu'] = 'dashboard/menu/main_ menu_student';
        $data['user_profile'] = 'dashboard/notification/user_profile_student';
        $data['main_content'] = 'dashboard/content/student/change_password';
        $data['content_right'] = '';
        $this->load->view('dashboardTemplate1', $data);
    }

    public function edit_profile() {
        $data['main_menu'] = 'dashboard/menu/main_ menu_student';
        $data['user_profile'] = 'dashboard/notification/user_profile_student';
        $data['main_content'] = 'dashboard/content/student/edit_my_profile';
        $data['content_right'] = '';
        $data['username'] = $this->tank_auth->get_username();
        $data['userid'] = $this->tank_auth->get_user_id();
        $data['user_email'] = $this->tank_auth->get_user_email();
        $this->load->view('dashboardTemplate1', $data);
    }

    public function start_session($course_name, $c_batch, $c_courseID) {
        $this->load->helper('string');
        $email = $this->tank_auth->get_user_email();
        $U_Name = '';
        //Select User Name by Email
        $UserNameGet = $this->db->query('SELECT username FROM users where email ="' . $email . '"');
        foreach ($UserNameGet->result() as $UserName) {
            $U_Name = $UserName->username;
        }
        //End Select User Name
        $IP = "192.95.38.81";
        $Port = 81;
        $CurrentDateTime = date('y-m-d');
        $MeetingID = $CurrentDateTime . $c_courseID . $c_batch . $c_batch . date('H');
        $MeetingID = str_replace('%20', '+', $MeetingID);
        $MeetingID = str_replace(' ', '+', $MeetingID);
        $MeetingID = str_replace('%3Cdiv%20style=', '+', $MeetingID);
        //Search If Meeting Already Created
        $MeetingDetail = $this->db->query('SELECT MeetingID,StudentPWD FROM tbl_session_log where 	MeetingID ="' . $MeetingID . '"');
        //End Search
        foreach ($MeetingDetail->result() as $MeetingLog) {
            $StudentPWD = $MeetingLog->StudentPWD;
        }
        $MeetingName = str_replace('%20', '+', $course_name);
        $MeetingName = str_replace(' ', '+', $course_name);
        $StudentName = str_replace('%20', '+', $U_Name);
        $StudentName = str_replace(' ', '+', $StudentName);
        //echo $ModeratorName."<br>";
        $session_data = array(
            'MeetingName' => $MeetingName,
            'MeetingID' => $MeetingID,
            'CourseID' => $c_courseID,
            'BatchID' => $c_batch,
        );
        if ($MeetingDetail->num_rows() <= 0) { //if Meeting Already not Created
            echo "Instructor is not joined yet... You cannot Join the Class before your Instructor";
        } Else {
            //echo $MeetingDetail->num_rows();
            $JoinMeetingStudentString = "joinfullName=" . $StudentName . "&meetingID=" . $MeetingID . "&password=" . $StudentPWD;
            $salt = "6ce484d8fac5159323e222e450877498";
            $sha = sha1($JoinMeetingStudentString . $salt);
            $link = "fullName=" . $StudentName . "&meetingID=" . $MeetingID . "&password=" . $StudentPWD . "&checksum=" . $sha;
            //echo "<br>".$sha."<br>";
            $data['bbb_link'] = "http://" . $IP . "/bigbluebutton/api/join?" . $link;
            $data['main_menu'] = 'dashboard/menu/main_ menu_student';
            $data['user_profile'] = 'dashboard/notification/user_profile_student';
            $data['main_content'] = 'dashboard/content/bbb';
            $data['content_right'] = '';    
            $this->load->view('dashboardTemplate1', $data);
        }
    }

    /* 	public function view_allNotification()
      {
      $data['main_menu'] = 'dashboard/menu/main_ menu_student';
      $data['user_profile'] = 'dashboard/notification/user_profile_student';
      $data['main_content'] = 'dashboard/content/student/edit_my_profile';
      $data['content_right'] = '';
      $data['username'] = $this->tank_auth->get_username();
      $data['userid'] = $this->tank_auth->get_user_id();
      $data['user_email'] = $this->tank_auth->get_user_email();
      $user_email =  $this->notification_model->get_UnReadNotification($this->tank_auth->get_user_id());
      foreach($user_email as $i){
        $email = $i->email;
      }
      $data['notifications'] = $this->notification_model->get_UnReadNotification($email);
      $this->load->view('dashboardTemplate1', $data); }
     */

    public function save_my_profile(){
        //$this->form_validation->set_rules('username', 'Name', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('country', 'Country', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('state', 'State', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('mobile', 'Phone', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('alternateEmail', 'Alternate Email', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('Overview', 'Alternate Email', 'trim|required|xss_clean');
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
            //'RatePerHour' => $this->input->post('RatePerHour'),
            //'YearOfExperince' => $this->input->post('YearOfExperince'),
            'AlternateEmail' => $this->input->post('alternateEmail'),
            'Overview' => $this->input->post('Overview'),
            'OtherQualification' => $this->input->post('otherQualification'),
            'ModifiedBy' => $this->tank_auth->get_username(),
            'LastModifiedDate' => date('Y-m-d H:i:s', local_to_gmt(time(), $this->input->post('timezones'), $this->input->post('DayLightSaving'))),
                //'VideoLinks' => $this->input->post('VideoLinks'),				
        );

        //Upload new Picture
        if ($this->now_upload('picture')) {
            $fileData = array('Picture' => $this->upload_data['file_name']);
            $profile_data = array_merge($profile_data, $fileData);
        }

        //End Upload new picture

        /* $education_data = array(
          'Address' => $this->input->post('address'),
          'State' => $this->input->post('state'),
          //'zipCode' => $this->input->post('address'),
          'Country' => $this->input->post('country'),
          'Phone' => $this->input->post('phone'),
          'Mobile' => $this->input->post('mobile'),
          'AlternateEmail' => $this->input->post('alternateEmail'),
          //'DoB' => $this->input->post('address'),
          'Overview' => $this->input->post('Overview'),
          'OtherQualification' => $this->input->post('otherQualification'),
          'ModifiedBy' => $this->tank_auth->get_username(),
          'LastModifiedDate' = date('Y-m-d H:i:s'),
          ); */
        // Count Existing education
        $SQLComm = "SELECT * from tbl_education WHERE UserID = '" . $this->tank_auth->get_user_email() . "' ";
        $CountInst = $this->db->query($SQLComm);
        $innitialCount = $CountInst->num_rows();
        // End Count
        for ($i = 1; $i < $innitialCount; $i++) {
            $education_data = array(
                'Institute' => $this->input->post('Institute' . $i),
                'Degree' => $this->input->post('Degree' . $i),
                'Major' => $this->input->post('Major' . $i),
                'StartYear' => $this->input->post('StartYear' . $i),
                'EndYear' => $this->input->post('EndYear' . $i),
                'EndYear' => $this->input->post('EndYear' . $i),
                'UserID' => $this->tank_auth->get_user_email(),
            );
            $this->load->model('teacher_profile_model');
            $this->teacher_profile_model->update_educationData($education_data, $this->input->post('EducationID' . $i));
        }

        //Adding additional rows from edit
        //echo $innitialCount."<br>".$this->input->post('countRow');

        if ($innitialCount < $this->input->post('countRow')) {
            for ($i = $innitialCount + 1; $i < $this->input->post('countRow'); $i++) {
                $education_data = array(
                    'Institute' => $this->input->post('Institute' . $i),
                    'Degree' => $this->input->post('Degree' . $i),
                    'Major' => $this->input->post('Major' . $i),
                    'StartYear' => $this->input->post('StartYear' . $i),
                    'EndYear' => $this->input->post('EndYear' . $i),
                    'UserID' => $this->tank_auth->get_user_email(),
                );
                $this->load->model('teacher_profile_model');
                $this->teacher_profile_model->insert_education($education_data);
                //echo $this->input->post('Institute'.$i+1)."<br>".$this->input->post('Major'.$i+1)."<br>";
            }
        }
        //end adding additional rows
        $this->load->model('student_profile_model');
        if ($this->student_profile_model->update_student_profile($profile_data, $this->tank_auth->get_user_email())) {
            //Flash Data
            $this->session->set_flashdata('msg', 'Successfully Updated your Profile');
            //Flash Data
            redirect('student/edit_profile/');
            //$this->load->view('dashboardTemplate1', $data);
        }
    }

    public function advance_search() {
        $data['main_menu'] = 'dashboard/menu/main_ menu_student';
        $data['user_profile'] = 'dashboard/notification/user_profile_student';
        $data['main_content'] = 'dashboard/content/advance_search';
        $data['content_right'] = '';
        $data['ListingOption'] = '';
        $data['Role'] = 'student';
        $data['keyword'] = $this->input->post('keyword');
        $this->load->view('dashboardTemplate1', $data);
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
                        $query .= " OR LOWER(u.username) LIKE '%" . strtolower($key_array[$i]) . "%'";
                        $query .= " OR LOWER(p.Address) LIKE '%" . strtolower($key_array[$i]) . "%'";
                        $query .= " OR LOWER(p.Overview) LIKE '%" . strtolower($key_array[$i]) . "%'";
                        $query .= " OR LOWER(p.OtherQualification) LIKE '%" . strtolower($key_array[$i]) . "%'";
                    } else {
                        $query .= " OR LOWER(s.Keywords) LIKE '%" . strtolower($key_array[$i]) . "%'";
                        $query .= " OR LOWER(u.username) LIKE '%" . strtolower($key_array[$i]) . "%'";
                        $query .= " OR LOWER(p.Address) LIKE '%" . strtolower($key_array[$i]) . "%'";
                        $query .= " OR LOWER(p.Overview) LIKE '%" . strtolower($key_array[$i]) . "%'";
                        $query .= " OR LOWER(p.OtherQualification) LIKE '%" . strtolower($key_array[$i]) . "%'";
                    }
                }
            }
            $data['main_menu'] = 'dashboard/menu/main_ menu_student';
            $data['user_profile'] = 'dashboard/notification/user_profile_student';
            $data['main_content'] = 'dashboard/content/advance_search';
            $data['content_right'] = '';
            $data['ListingOption'] = $ListingOption;
            $data['Query'] = $query;
            $data['Role'] = 'student';
            $data['keyword'] = $this->input->post('keyword');
            $this->load->view('dashboardTemplate1', $data);
        } elseif ($ListingOption == 'Course') {
            $query1 = "select distinct c.*, p.YearOfExperince, b.BatchID  from tbl_course as c INNER JOIN tbl_profile as p ON c.InstructorID = p.UserID INNER JOIN tbl_batch as b ON b.CourseID = c.CourseID where c.IsActive = 'Yes' and CourseName <> 'Demo Session' ";
            $query1 .= " AND c.CouseFree between " . $min_range . " AND " . $max_range;
            $query1 = "select distinct c.*, p.YearOfExperince, b.BatchID  from tbl_course as c INNER JOIN tbl_profile as p ON c.InstructorID = p.UserID INNER JOIN tbl_batch as b ON b.CourseID = c.CourseID where c.IsActive = 'Yes' and CourseName <> 'Demo Session' ";
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
            $data['main_menu'] = 'dashboard/menu/main_ menu_student';
            $data['user_profile'] = 'dashboard/notification/user_profile_student';
            $data['main_content'] = 'dashboard/content/advance_search';
            $data['content_right'] = '';
            $data['ListingOption'] = $ListingOption;
            $data['Query'] = $query1;
            $data['keyword'] = $this->input->post('keyword');
            $data['Role'] = 'student';
            $this->load->view('dashboardTemplate1', $data);
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

    public function deactivate_confirmation() {
        $data['main_menu'] = 'dashboard/menu/main_ menu_student';
        $data['user_profile'] = 'dashboard/notification/user_profile_student';
        $data['main_content'] = 'dashboard/content/login_deactivate';
        $data['role'] = 'student';
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
                //Update a User at tbl_users activated to 0
                $this->db->query('Update users set activated = 0 where email ="' . $this->tank_auth->get_user_email() . '"');
                $this->session->sess_destroy();
                $this->session->set_flashdata('msg', 'Your account successfully deactivate...');
                redirect('welcome');
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
            } 
            else {
                $data['captcha_html'] = $this->_create_captcha();
            }
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

    function purchase($courseID, $batchID) {
        $data['courseID'] = $courseID;
        $data['batchID'] = $batchID;
        $data['user_profile'] = 'dashboard/notification/user_profile_student';
        $data['main_content'] = 'dashboard/content/student/course_purchase';
        $data['content_right'] = '';
        $this->lang->load('tank_auth');
        $email = $this->tank_auth->get_user_email();
        $data['main_menu'] = 'dashboard/menu/main_ menu_student';
        $data['username'] = $this->tank_auth->get_username();
        $data['userid'] = $this->tank_auth->get_user_id();
        $this->load->view('dashboardTemplate1', $data);
    }

    function save_payment_info() {
        // Load PayPal library
        $this->config->load('paypal');
		if($this->input->post('cardProfile')== 'New'){
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('frist_name', 'Frist Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('zip', 'Zip', 'required');
        $this->form_validation->set_rules('telephone', 'Telephone', 'required');
        $this->form_validation->set_rules('card_type', 'Card Type', 'required');
        $this->form_validation->set_rules('card_no', 'Card No', 'required');
        $this->form_validation->set_rules('cvv', 'Cvv', 'required');
		}else {
			$this->form_validation->set_rules('paypal_check', 'Privacy Policy', 'required');
			$this->form_validation->set_rules('beta_check', 'Beta User Policy', 'required');
		}

        if ($this->form_validation->run() == FALSE) {
            redirect('student/purchase/' . $this->input->post('courseID') . '/' . $this->input->post('batchID'));
        } 
        else {
            $config = array(
                'Sandbox' => $this->config->item('Sandbox'), // Sandbox / testing mode option.
                'APIUsername' => $this->config->item('APIUsername'), // PayPal API username of the API caller
                'APIPassword' => $this->config->item('APIPassword'), // PayPal API password of the API caller
                'APISignature' => $this->config->item('APISignature'), // PayPal API signature of the API caller
                'APISubject' => '', // PayPal API subject (email address of 3rd party user that has granted API permission for your app)
                'APIVersion' => $this->config->item('APIVersion')  // API version you'd like to use for your call.  You can set a default version in the class and leave this blank if you want.
            );

            if ($config['Sandbox']) {
                error_reporting(E_ALL);
                ini_set('display_errors', '1');
            }
            $this->load->library('paypal/Paypal_pro', $config);
            $query_course = $this->db->query('SELECT CourseName, Category, SubCategory, CouseFree FROM tbl_course WHERE CourseID="' . $this->input->post('courseID') . '"');
            $query_cardInfo = $this->db->query('SELECT distinct(acct), creditcardtype, currencycode, cvv2, acct, expdate, phonenum, salutation, firstname, lastname, street, city, state, countrycode , zip, phonenum FROM tbl_paypal_transaction_detail WHERE student_id="' . $this->tank_auth->get_user_email() . '" AND acct LIKE "%4094%"');
            $cartInfo = $query_cardInfo->row();
            if ($this->input->post('cardProfile') and $this->input->post('cardProfile') != "New") {
                 $creditcardtype = $cartInfo->creditcardtype;
                 $acct = $cartInfo->acct;
                 $expdate = $cartInfo->expdate;
                 $cvv2 = $cartInfo->cvv2;
                 $currencycode = $cartInfo->currencycode;
                 $salutation = $cartInfo->salutation;
                 $firstname = $cartInfo->firstname;
                 $lastname = $cartInfo->lastname;
                 $street = $cartInfo->street;
                 $city = $cartInfo->city;
                 $state = $cartInfo->state;
                 $zip = $cartInfo->zip;
                 $phonenum = $cartInfo->phonenum;
                 $countrycode = $cartInfo->countrycode;
            } 
            else {
                 $creditcardtype = trim($this->input->post('card_type', true));
                 $acct = trim($this->input->post('card_no', true));
                 $expdate = trim($this->input->post('exp_month', true) . $this->input->post('exp_year', true));
                 $cvv2 = trim($this->input->post('cvv', true));
                 $currencycode = 'USD';
                 $salutation = trim($this->input->post('title', true));
                 $firstname = trim($this->input->post('frist_name', true));
                 $lastname = trim($this->input->post('last_name'));
                 $street = trim($this->input->post('address', true));
                 $city = trim($this->input->post('city', true));
                 $state = trim($this->input->post('state', true));
                 $zip = trim($this->input->post('zip', true));
                 $phonenum = trim($this->input->post('telephone', true));
                 $countrycode = 'US';  
            }

            $course_result = $query_course->row();
            $DPFields = array(
                'paymentaction' => 'Authorization', // How you want to obtain payment.  Authorization indidicates the payment is a basic auth subject to settlement with Auth & Capture.  Sale indicates that this is a final sale for which you are requesting payment.  Default is Sale.
                'ipaddress' => $_SERVER['REMOTE_ADDR'], // Required.  IP address of the payer's browser.
                'returnfmfdetails' => '1'      // Flag to determine whether you want the results returned by FMF.  1 or 0.  Default is 0.
            );

            $CCDetails = array(
                'creditcardtype' => $creditcardtype, // Required. Type of credit card.  Visa, MasterCard, Discover, Amex, Maestro, Solo.  If Maestro or Solo, the currency code must be GBP.  In addition, either start date or issue number must be specified.
                'acct' => $acct, // Required.  Credit card number.  No spaces or punctuation.  
                'expdate' => $expdate, // Required.  Credit card expiration date.  Format is MMYYYY
                'cvv2' => $cvv2, // Requirements determined by your PayPal account settings.  Security digits for credit card.
                'startdate' => '', // Month and year that Maestro or Solo card was issued.  MMYYYY
                'issuenumber' => ''       // Issue number of Maestro or Solo card.  Two numeric digits max.
            );
				
            $PayerInfo = array(
                'email' => '', // Email address of payer.
                'payerid' => '', // Unique PayPal customer ID for payer.
                'payerstatus' => '', // Status of payer.  Values are verified or unverified
                'business' => ''        // Payer's business name.
            );

            $PayerName = array(
                'salutation' => $salutation, // Payer's salutation.  20 char max.
                'firstname' => $firstname, // Payer's first name.  25 char max.
                'middlename' => '', // Payer's middle name.  25 char max.
                'lastname' => $lastname, // Payer's last name.  25 char max.
                'suffix' => ''        // Payer's suffix.  12 char max.
            );

            $BillingAddress = array(
                'street' => $street, // Required.  First street address.
                'street2' => '', // Second street address.
                'city' => $city, // Required.  Name of City.
                'state' => $state, // Required. Name of State or Province.
                'countrycode' => $countrycode, // Required.  Country code.
                'zip' => $zip, // Required.  Postal code of payer.
                'phonenum' => $phonenum       // Phone Number of payer.  20 char max.
            );

            $ShippingAddress = array(
                'shiptoname' => '', // Required if shipping is included.  Person's name associated with this address.  32 char max.
                'shiptostreet' => '', // Required if shipping is included.  First street address.  100 char max.
                'shiptostreet2' => '', // Second street address.  100 char max.
                'shiptocity' => '', // Required if shipping is included.  Name of city.  40 char max.
                'shiptostate' => '', // Required if shipping is included.  Name of state or province.  40 char max.
                'shiptozip' => '', // Required if shipping is included.  Postal code of shipping address.  20 char max.
                'shiptocountry' => '', // Required if shipping is included.  Country code of shipping address.  2 char max.
                'shiptophonenum' => ''     // Phone number for shipping address.  20 char max.
            );

            $PaymentDetails = array(
                'amt' => $course_result->CouseFree, // Required.  Total amount of order, including shipping, handling, and tax.  
                'currencycode' => $currencycode, // Required.  Three-letter currency code.  Default is USD.
                'itemamt' => $course_result->CouseFree, // Required if you include itemized cart details. (L_AMTn, etc.)  Subtotal of items not including S&H, or tax.
                'shippingamt' => '', // Total shipping costs for the order.  If you specify shippingamt, you must also specify itemamt.
                'shipdiscamt' => '', // Shipping discount for the order, specified as a negative number.  
                'handlingamt' => '', // Total handling costs for the order.  If you specify handlingamt, you must also specify itemamt.
                'taxamt' => '', // Required if you specify itemized cart tax details. Sum of tax for all items on the order.  Total sales tax. 
                'desc' => 'Purchase ' . $course_result->CourseName, // Description of the order the customer is purchasing.  127 char max.
                'custom' => '', // Free-form field for your own use.  256 char max.
                'invnum' => '', // Your own invoice or tracking number
                'notifyurl' => ''      // URL for receiving Instant Payment Notifications.  This overrides what your profile is set to use.
            );

            $OrderItems = array();
            $Item = array(
                'l_name' => $course_result->CourseName, // Item Name.  127 char max.
                'l_desc' => 'Thank for purchase the course ' . $course_result->CourseName, // Item description.  127 char max.
                'l_amt' => $course_result->CouseFree, // Cost of individual item.
                'l_number' => $this->input->post('courseID'), // Item Number.  127 char max.
                'l_qty' => '1', // Item quantity.  Must be any positive integer.  
                'l_taxamt' => '', // Item's sales tax amount.
                'l_ebayitemnumber' => '', // eBay auction number of item.
                'l_ebayitemauctiontxnid' => '', // eBay transaction ID of purchased item.
                'l_ebayitemorderid' => ''     // eBay order ID for the item.
            );
            array_push($OrderItems, $Item);

            $Secure3D = array(
                'authstatus3d' => '',
                'mpivendor3ds' => '',
                'cavv' => '',
                'eci3ds' => '',
                'xid' => ''
            );

            $PayPalRequestData = array(
                'DPFields' => $DPFields,
                'CCDetails' => $CCDetails,
                'PayerInfo' => $PayerInfo,
                'PayerName' => $PayerName,
                'BillingAddress' => $BillingAddress,
                'ShippingAddress' => $ShippingAddress,
                'PaymentDetails' => $PaymentDetails,
                'OrderItems' => $OrderItems,
                'Secure3D' => $Secure3D
            );

            $PayPalResult = $this->paypal_pro->DoDirectPayment($PayPalRequestData);
            $CourseID = $this->input->post('courseID');
            $BatchID = $this->input->post('batchID');

            if (!$this->paypal_pro->APICallSuccessful($PayPalResult['ACK'])) {
                $error_data = $PayPalResult['ERRORS'][0]['L_LONGMESSAGE'];
                $this->session->set_flashdata('msg', $error_data);
                redirect('student/purchase/' . $CourseID . '/' . $BatchID);
            } else {
                $PayPalResult;
                $this->load->model('paypal_trasaction_model');

                $data = array(
                    'timestamp1' => $PayPalResult['TIMESTAMP'],
                    'correlationid' => $PayPalResult['CORRELATIONID'],
                    'ack' => $PayPalResult['ACK'],
                    'build' => $PayPalResult['BUILD'],
                    'l_errorcode0' => $PayPalResult['L_ERRORCODE0'],
                    'l_shortmessage0' => $PayPalResult['L_SHORTMESSAGE0'],
                    'l_longmessage0' => $PayPalResult['L_LONGMESSAGE0'],
                    'l_severitycode0' => $PayPalResult['L_SEVERITYCODE0'],
                    'l_errorparamid0' => $PayPalResult['L_ERRORPARAMID0'],
                    'l_errorparamvalue0' => $PayPalResult['L_ERRORPARAMVALUE0'],
                    'amount' => $PayPalResult['AMT'],
                    'currencycode' => $PayPalResult['CURRENCYCODE'],
                    'avscode' => $PayPalResult['AVSCODE'],
                    'cvv2match' => $PayPalResult['CVV2MATCH'],
                    'transactionid' => $PayPalResult['TRANSACTIONID'],
                    'buttonsource' => $PayPalResult['REQUESTDATA']['BUTTONSOURCE'],
                    'ipaddress' => $PayPalResult['REQUESTDATA']['IPADDRESS'],
                    'returnfmfdetails' => $PayPalResult['REQUESTDATA']['RETURNFMFDETAILS'],
                    'creditcardtype' => $PayPalResult['REQUESTDATA']['CREDITCARDTYPE'],
                    'acct' => $PayPalResult['REQUESTDATA']['ACCT'],
                    'expdate' => $PayPalResult['REQUESTDATA']['EXPDATE'],
                    'cvv2' => $PayPalResult['REQUESTDATA']['CVV2'],
                    'salutation' => $PayPalResult['REQUESTDATA']['SALUTATION'],
                    'firstname' => $PayPalResult['REQUESTDATA']['FIRSTNAME'],
                    'lastname' => $PayPalResult['REQUESTDATA']['LASTNAME'],
                    'street' => $PayPalResult['REQUESTDATA']['STREET'],
                    'city' => $PayPalResult['REQUESTDATA']['CITY'],
                    'state' => $PayPalResult['REQUESTDATA']['STATE'],
                    'countrycode' => $PayPalResult['REQUESTDATA']['COUNTRYCODE'],
                    'zip' => $PayPalResult['REQUESTDATA']['ZIP'],
                    'phonenum' => $PayPalResult['REQUESTDATA']['PHONENUM'],
                    'student_id' => $this->tank_auth->get_user_email(),
                    'course_id' => $this->input->post('courseID'),
                    'batch_id' => $this->input->post('batchID'),
                    'status' => $this->input->post('status')
                );




                $this->paypal_trasaction_model->insert_entry($data);

                redirect('teacher/enroll_into_course/' . $CourseID . '/' . $BatchID);
            }
        }
    }
	

}
