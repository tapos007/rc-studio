<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('security');
        $this->load->library('tank_auth');
        $this->lang->load('tank_auth');
        $this->load->library('session');
    }

    public function index() {

        $this->load->view('myhomel1');
    }
	
	 public function getSubCategoryByCategory($catnane) {
		
        $subcategories = $this->db->query('SELECT SubCategory FROM tbl_subcategory where Category ="' . $catnane . '"');
     	
          ?>
        <option value="Any">-Any- </option>  <?php
        foreach ($subcategories->result() as $subcategory):
            ?>
            <option value="<?php echo $subcategory->SubCategory; ?>"><?php echo $subcategory->SubCategory; ?>
            </option>  
            
            <?php
        endforeach;
		
		//echo   json_encode($Res);
    }

    public function step1() {

        $role = $this->input->post('regType');
        $this->load->library('session');
        $this->session->set_userdata('user_role', $role);
        $data['content'] = 'home/step1';
        $data['captcha_html'] = $this->_create_captcha();

        if ($this->session->userdata('user_role')) {
            $this->load->view('myhome2', $data);
        } else {
            $this->session->set_flashdata('msg', 'User role did not selected. Please select user role');
            redirect('welcome');
        }
    }

    public function step1_validate() {

        $this->form_validation->set_rules('inputFristName', 'Frist Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('inputLastName', 'Last Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('inputDoB', 'Date of Birth', 'trim|required|xss_clean');
        $this->form_validation->set_rules('inputEmail', 'Email', 'trim|required|xss_clean|valid_email');
        $this->form_validation->set_rules('inputpassword', 'Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('inputrepassword', 'Verify Password', 'trim|required|xss_clean|matches[inputpassword]');
        $this->form_validation->set_rules('captcha', 'Captcha code not match', 'trim|xss_clean|required|callback__check_captcha');
        if ($this->form_validation->run()) {
            $session_data['frist_name'] = $this->input->post('inputFristName');
            $session_data['lastName'] = $this->input->post('inputLastName');
            $session_data['DoB'] = date('Y/m/d', strtotime($this->input->post('inputDoB')));
            $session_data['email'] = $this->input->post('inputEmail');
            $session_data['password'] = $this->input->post('inputpassword');
            $this->session->set_userdata($session_data);
            redirect('welcome/step2');
        } else {
            echo validation_errors();
            exit();
            $data['content'] = 'home/step1';
            $data['captcha_html'] = $this->_create_captcha();
            $data['word'] = $this->session->flashdata('captcha_word');
            $this->form_validation->set_message('captcha', 'Captcha code not match"');
            $this->load->view('myhome2', $data);
        }
    }

    public function step2() {
        if ($this->session->userdata('user_role')) {
            $this->form_validation->set_rules('Phone', 'Phone', 'trim|required|xss_clean');
            $this->form_validation->set_rules('Address', 'Address Line 1', 'trim|required|xss_clean');
            $this->form_validation->set_rules('City', 'City', 'trim|required|xss_clean');
            $this->form_validation->set_rules('State', 'State', 'trim|required|xss_clean');
            $this->form_validation->set_rules('Zipcode', 'Zip Code', 'trim|required|xss_clean');
            $this->form_validation->set_rules('Country', 'Country', 'trim|required|xss_clean');
            if ($this->form_validation->run()) {
                $session_data['Phone'] = $this->input->post('Phone');
                $session_data['Address'] = $this->input->post('Address');
                $session_data['Address1'] = $this->input->post('Address1');
                $session_data['City'] = $this->input->post('City');
                $session_data['State'] = $this->input->post('State');
                $session_data['Zipcode'] = $this->input->post('Zipcode');
                $session_data['Country'] = $this->input->post('Country');
                $this->session->set_userdata($session_data);
                redirect('welcome/step3');
            } else {

                $data['content'] = 'home/step2';
                $this->load->view('myhome2', $data);
            }
        } else {
            $this->session->set_flashdata('msg', 'User role did not selected. Please select user role');
            redirect('welcome');
        }
    }

    public function step3() {
        if ($this->session->userdata('user_role')) {
            $data['content'] = 'home/step3';
            $this->load->view('myhome2', $data);
        } else {
            $this->session->set_flashdata('msg', 'User role did not selected. Please select user role');
            redirect('welcome');
        }
    }

    public function save_profile() {
        $username = $this->session->userdata('frist_name') . " " . $this->session->userdata('lastName');
        $email = $this->session->userdata('email');
        $password = $this->session->userdata('password');
        $role = $this->session->userdata('user_role');



        //-------------------------------------------------start saving -------------------------
        //*****picture 
        $user_data = array(
            'UserID' => $this->session->userdata('email'),
            'Address' => $this->session->userdata('Address'),
            'Address1' => $this->session->userdata('Address1'),
            'City' => $this->session->userdata('City'),
            'State' => $this->session->userdata('State'),
            'zipCode' => $this->session->userdata('Zipcode'),
            'Country' => $this->session->userdata('Country'),
            'Phone' => $this->session->userdata('Phone'),
            'DoB' => $this->session->userdata('DoB'),
        );

        if ($this->now_upload('picture')) {
            $fileData = array('Picture' => $this->upload_data['file_name']);
            $user_data = array_merge($user_data, $fileData);
        }

        $this->load->model('student_profile_model');
        $this->student_profile_model->insert_student_profile($user_data);

        $unset_data = array(
            'frist_name' => '',
            'lastName' => '',
            'email' => '',
            'password' => '',
            'Phone' => '',
            'State' => '',
            'Zipcode' => '',
            'Country' => '',
            'DoB' => '',
            'captcha_word' => '',
            'captcha_time' => ''
        );

        // Start Creating Demo Session for Teacher

        if ($role == "teacher") {


            $SearchPref = array(
                'UserID' => $email,
                'Keywords' => " ",
                'SubCategory' => " ",
            );
            $this->load->model('teacher_profile_model');
            $this->teacher_profile_model->search_pref($SearchPref);
            //End Insert Default Search Keyword


            $course_data = array(
                'InstructorID' => $email,
                'CourseName' => "Demo Session",
                'Category' => "Demo Session",
                'SubCategory' => "Demo Session",
                'TotalHour' => "1",
                'HourPerSession' => "1",
                'MaxofStudet' => "1",
                'QualificationForStudent' => "N/A",
                'Requirements' => "N/A",
                'VideoLink' => "N/A",
                'CouseFree' => "0",
                'IsActive' => 'Yes',
            );



            $this->load->model('create_course_model');
            if ($this->create_course_model->insert_course($course_data)) {

                $query = $this->db->query('SELECT max(CourseID) as max_id FROM tbl_course');
                $row = $query->row_array();
                $max_id = $row['max_id'];


                $batch_data = array(
                    'CourseID' => $max_id,
                    'TeacherID' => $email,
                    'StartDate' => "1-1-2000",
                    'EndDate' => "1-1-2020",
                    'SessionDuration' => "30",
                    'NextSessionDate' => '0000-00-00 00:00:00',
                    'IsActive' => 'Yes',
                    'CreatedBy' => 'System',
                );
                $this->create_course_model->insert_batch($batch_data);


                $query = $this->db->query('SELECT max(BatchID) as max_id_b FROM tbl_batch');
                $row = $query->row_array();
                $max_id_b = $row['max_id_b'];


                $schedule_data = array(
                    'BatchID' => $max_id_b,
                    'Day' => "Sunday",
                    'StartTime' => "10:00 AM",
                    'EndTime' => "11:00 PM",
                    'Flexiblity' => 'Flexible',
                    'CreatedBy' => 'System',
                );
                $this->create_course_model->insert_schedule($schedule_data);


                $useronbatch_data = array(
                    'UserID' => $email,
                    'Rolle' => 'Teacher',
                    'BatchID' => $max_id_b,
                    'IsCompleted' => 'No',
                    'CreatedBy' => 'System',
                    'CreatedOn' => 'GETDATE()',
                );
                $this->create_course_model->insert_useronbatch($useronbatch_data);
            }
        }

        //create user
        $email_activation = $this->config->item('email_activation', 'tank_auth');

        if (!is_null($data = $this->tank_auth->create_user($username, $email, $password, $role, $email_activation))) {         // success
            $data['site_name'] = "Studionear";

            if ($email_activation) {         // send "activate" email
                $data['activation_period'] = $this->config->item('email_activation_expire', 'tank_auth') / 3600;

                $this->_send_email('join', $data['email'], $data);

                unset($data['password']); // Clear password (just for any case)
                $this->session->set_flashdata('msg', 'Your account has been created and a confirmation link has been sent to your email. Please click the link in your email to activate your account.');
                //notification 101 Registration Teacher Success

                $notification_data = array(
                    'Email' => $email,
                    'Notification' => 'Welcome to Studionear!',
                    'Status' => 'Un-Read'
                );

                $this->load->model('notification_model');
                $this->notification_model->insert_entry($notification_data);

                redirect('welcome/login');
            } else {
                if ($this->config->item('email_account_details', 'tank_auth')) { // send "welcome" email
                    $this->_send_email('welcome', $data['email'], $data);
                    $this->session->set_flashdata('msg', 'Your account has been created and a confirmation link has been sent to your email. Please click the link in your email to activate your account.');
                    redirect('auth');
                }
            }
        } else {
            $errors = $this->tank_auth->get_error_message();
            foreach ($errors as $k => $v)
                $data['errors'][$k] = $this->lang->line($v);
            $this->session->set_flashdata('msg', $data['errors']);
            redirect('auth');
        }
    }

    /* public function login()
      {
      if ($this->tank_auth->is_logged_in()) {									// logged in
      redirect('');
      }
      else{
      $data['content'] = 'home/login';
      $this->load->view('welcome', $data);
      }
      } */

    public function forget_password() {
        $data['content'] = 'home/forget_password';
        $this->load->view('myhome1', $data);
    }

    public function password_reset_confirmation() {
        $data['content'] = 'home/password_reset_confirmation';
        $this->load->view('welcome', $data);
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

    public function loginUnregistered() {
        if ($this->tank_auth->is_logged_in()) {         // logged in
            redirect('');
        } else {
            $data['main_content'] = 'dashboard/content/loginUnregistered';
            $this->load->view('unregistered', $data);
        }
    }

    public function advance_search_unregistered() {
        if ($this->tank_auth->is_logged_in()) {         // logged in
            $email = $this->tank_auth->get_user_email();
            $SQLComm = "SELECT role from users WHERE email = '" . $email . "' ";
            $transaction = $this->db->query($SQLComm);
            foreach ($transaction->result() as $trans) {
                $var_role = $trans->role;
                $data['Role'] = $var_role;
            }

            if ($var_role == "teacher") {
                $data['main_menu'] = 'dashboard/menu/main_ menu_teacher';
                $data['user_profile'] = 'dashboard/notification/user_profile_teacher';
            } elseif ($var_role == "student") {
                $data['main_menu'] = 'dashboard/menu/main_ menu_student';
                $data['user_profile'] = 'dashboard/notification/user_profile_student';
            }

            $data['main_content'] = 'dashboard/content/advance_search';
            $data['content_right'] = '';
            if ($this->input->post('keyword') != NULL) {
                $KeyWord = $this->input->post('keyword');
            } else {
                $KeyWord = '';
            }
            $data['keyword'] = $KeyWord;
            $data['ListingOption'] = '';
            $this->load->view('dashboardTemplate1', $data);
        } else {
            if ($this->input->post('keyword') != NULL) {
                $KeyWord = $this->input->post('keyword');
            } else {
                $KeyWord = '';
            }
            $data['main_content'] = 'dashboard/content/advance_search_unregistered';
            $data['keyword'] = $KeyWord;
            $data['ListingOption'] = '';
            $this->load->view('unregistered', $data);
        }
    }

    public function help() {
        if ($this->tank_auth->is_logged_in()) {         // logged in
            $var_role = '';
            $email = $this->tank_auth->get_user_email();
            $SQLComm = "SELECT role from users WHERE email = '" . $email . "' ";
            $transaction = $this->db->query($SQLComm);
            foreach ($transaction->result() as $trans) {
                $var_role = $trans->role;
                $data['Role'] = $var_role;
            }
            if ($var_role == "teacher") {
                $data['main_menu'] = 'dashboard/menu/main_ menu_teacher';
            } elseif ($var_role == "student") {
                $data['main_menu'] = 'dashboard/menu/main_ menu_student';
            }
            $data['user_profile'] = 'dashboard/notification/user_profile_teacher';
            $data['main_content'] = 'dashboard/content/help';
            $data['content_right'] = '';

            $this->load->view('dashboardTemplate1', $data);
        } else {
            $data['main_content'] = 'dashboard/content/help';
            $data['keyword'] = $this->input->post('keyword');
            $data['ListingOption'] = '';
            $this->load->view('unregistered', $data);
        }
    }

    public function get_search_data() {
        $this->session->set_userdata('TimeZone', $this->input->post('TimeZone4'));
        if ($this->input->post('keyword')) {
            $keyword = $this->input->post('keyword');
        } else {
            $keyword = $this->input->post('keyword');
        }

        if ($this->input->post('min_range')) {
            $min_range = $this->input->post('min_range');
        } else {
            $min_range = '10';
        }

        if ($this->input->post('max_range')) {
            $max_range = $this->input->post('max_range');
        } else {
            $max_range = '2000';
        }

        if ($this->input->post('category')) {
            $category = $this->input->post('category');
        } else {
            $category = 'Any';
        }

        if ($this->input->post('subcategory')) {
            $subcategory = $this->input->post('subcategory');
        } else {
            $subcategory = 'Any';
        }

        if ($this->input->post('experience')) {
            $experience = $this->input->post('experience');
        } else {
            $experience = '0 and 100';
        }

        if ($this->input->post('ListingOption')) {
            $ListingOption = $this->input->post('ListingOption');
        } else {
            $ListingOption = 'Course';
        }
        $var_role = '';
        $email = $this->tank_auth->get_user_email();
        $SQLComm = "SELECT role from users WHERE email = '" . $email . "' ";
        $transaction = $this->db->query($SQLComm);
        foreach ($transaction->result() as $trans) {
            $var_role = $trans->role;
            $data['Role'] = $var_role;
        }
        $Template = 'dashboardTemplate2';
        if ($var_role == "teacher") {
            $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';
            $data['user_profile'] = 'dashboard/notification/user_profile_teacher';
            $data['content_right'] = '';
            $Template = 'dashboardTemplate1';
        } elseif ($var_role == "student") {
            $data['main_menu'] = 'dashboard/menu/main_ menu_student';
            $data['user_profile'] = 'dashboard/notification/user_profile_teacher';
            $data['content_right'] = '';
            $Template = 'dashboardTemplate1';
        }
		else {
		 $data['main_menu'] = '';
            $data['user_profile'] = '';
            $data['content_right'] = '';
		}

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


            $data['main_content'] = 'dashboard/content/advance_search_unregistered';
            $data['ListingOption'] = $ListingOption;
            $data['Query'] = $query;
            $data['keyword'] = $this->input->post('keyword');
            $this->load->view($Template, $data);
        } elseif ($ListingOption == 'Course') {
            $query1 = "select distinct c.*, p.YearOfExperince, b.BatchID  from tbl_course as c INNER JOIN tbl_profile as p ON c.InstructorID = p.UserID INNER JOIN tbl_batch as b ON b.CourseID = c.CourseID where c.IsActive = 'Yes' and c.CourseName <> 'Demo Session'";
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
                        $query1 .= " OR LOWER(c.SubCategory) LIKE '%" . strtolower($key_array[$i]) . "%'";
                    } else {
                        $query1 .= " OR LOWER(c.SubCategory) LIKE '%" . strtolower($key_array[$i]) . "%'";
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

            $data['main_content'] = 'dashboard/content/advance_search_unregistered';
            $data['ListingOption'] = $ListingOption;
            $data['Query'] = $query1;

            $data['keyword'] = $this->input->post('keyword');
            $this->load->view($Template, $data);
        }
    }

    function view_course($course_id, $batch_id) {

        $data['main_content'] = 'dashboard/content/teacher/view_course';
        $data['course_id'] = $course_id;
        $data['batch_id'] = $batch_id;
        if ($this->input->post('TimeZone')) {
            $data['TimeZoneUR'] = $this->input->post('TimeZone');
        } else
            $data['TimeZoneUR'] = "UTC";
        $var_role = '';
        $email = $this->tank_auth->get_user_email();
        $SQLComm = "SELECT role from users WHERE email = '" . $email . "' ";
        $transaction = $this->db->query($SQLComm);
        foreach ($transaction->result() as $trans) {
            $var_role = $trans->role;
            $data['Role'] = $var_role;
        }
        $Template = 'dashboardTemplate2';
        if ($var_role == "teacher") {
            $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';
            $data['user_profile'] = 'dashboard/notification/user_profile_teacher';
            $data['content_right'] = '';
            $Template = 'dashboardTemplate1';
        } elseif ($var_role == "student") {
            $data['main_menu'] = 'dashboard/menu/main_ menu_student';
            $data['user_profile'] = 'dashboard/notification/user_profile_teacher';
            $data['content_right'] = '';

            $Template = 'dashboardTemplate1';
        }

        $this->load->model('create_course_model');
        $data['course'] = $this->create_course_model->get_course($course_id);
        $data['batch'] = $this->create_course_model->get_batch($batch_id);
        $data['schedules'] = $this->create_course_model->get_schedules($batch_id);

        $this->load->view($Template, $data);
        /* 	 if ($this->input->post('TimeZone')) {
          $data['TimeZoneUR'] = $this->input->post('TimeZone');
          }
          else
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
          $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1'; $Template = 'dashboardTemplate1';
          }
          elseif ($var_role == "student") {
          $data['main_menu'] = 'dashboard/menu/main_ menu_student'; $Template = 'dashboardTemplate1';
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
          $this->load->view($Template, $data); */
    }

    public function advance_search() {
        $data['main_content'] = 'dashboard/content/advance_search_unregistered';
        $data['ListingOption'] = '';
        $data['keyword'] = $this->input->post('keyword');
        $this->load->view('unregistered', $data);
    }

    function _create_captcha() {
        $this->load->helper('captcha');

        $cap = create_captcha(array(
            'img_path' => './' . $this->config->item('captcha_path', 'tank_auth'),
            'img_url' => base_url() . $this->config->item('captcha_path', 'tank_auth'),
            'font_path' => './' . $this->config->item('captcha_fonts_path', 'tank_auth'),
            'font_size' => $this->config->item('captcha_font_size', 'tank_auth'),
            'img_width' => $this->config->item('captcha_width', 'tank_auth'),
            'img_height' => $this->config->item('captcha_height', 'tank_auth'),
            'show_grid' => $this->config->item('captcha_grid', 'tank_auth'),
            'expiration' => $this->config->item('captcha_expire', 'tank_auth'),
        ));

        // Save captcha params in session
        $this->session->set_userdata(array(
            'captcha_word' => $cap['word'],
            'captcha_time' => $cap['time'],
        ));

        return $cap['image'];
    }

    function _check_captcha($code) {
        $time = $this->session->userdata('captcha_time');
        $word = $this->session->userdata('captcha_word');

        //echo $this->lang->line('auth_incorrect_captcha');
        //echo $word."xXx".$code;
        list($usec, $sec) = explode(" ", microtime());
        //print_r(explode(" ", microtime()));
        $now = ((float) $usec + (float) $sec);

        if ($now - $time > $this->config->item('captcha_expire', 'tank_auth')) {
            $this->form_validation->set_message('_check_captcha', $this->lang->line('auth_captcha_expired'));
            return FALSE;
        } elseif (($this->config->item('captcha_case_sensitive', 'tank_auth') AND
                $code != $word) OR
                strtolower($code) != strtolower($word)) {
            $this->form_validation->set_message('_check_captcha', $this->lang->line('auth_incorrect_captcha'));
            return FALSE;
        }
        return TRUE;
    }

    function _show_message($message) {
        $this->session->set_flashdata('msg', $message);
        redirect('/auth/');
    }

    function _send_email($type, $email, &$data) {
        $this->load->library('email');
        $this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
        $this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
        $this->email->to($email);
        $this->email->subject(sprintf($this->lang->line('auth_subject_' . $type), $this->config->item('website_name', 'tank_auth')));
        $this->email->message($this->load->view('email/' . $type . '-html', $data, TRUE));
        $this->email->set_alt_message($this->load->view('email/' . $type . '-txt', $data, TRUE));
        $this->email->send();
    }

    function _send_again($email) {

        $data['errors'] = array();

        $data['site_name'] = 'Studionear';
        $data['activation_period'] = $this->config->item('email_activation_expire', 'tank_auth') / 3600;

        $this->_send_email('activate', $email, $data);

        return true;
    }

    function show_mydata($data) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }

    function email_available() {
        $email = $this->input->post('inputEmail');
        if ($this->tank_auth->is_email_available($email)) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    //contact us send email to help@studionear.com

    function contact_us() {
        $email = $this->input->post('email_contact');
        $subject = $this->input->post('subject_contact');
        $msg = $this->input->post('description_contact');

        $this->load->library('email');

        $this->email->from($email, 'Someone wants to contact');
        $this->email->to('help@studionear.com');


        $this->email->subject($subject);
        $this->email->message('Contact person email : ' . $email . '<br />' . $msg);

        $this->email->send();

        redirect('welcome');
    }

    function login() {
        $data['main_content'] = 'dashboard/content/loginUnregistered';
        $this->load->view('unregistered', $data);
    }

    function faq() {
        $data['content'] = 'home/faq';
        $this->load->view('myhome2', $data);
    }

    function how_it_works() {
        $data['content'] = 'home/how-it-works';
        $this->load->view('myhome2', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */