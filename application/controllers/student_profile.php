<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Student_profile extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('security');
        $this->load->library('tank_auth');
        $this->lang->load('tank_auth');
    }

    public function index() {
        $data['main_menu'] = 'dashboard/menu/main_ menu_student';
        $data['user_profile'] = 'dashboard/notification/user_profile_student'; //For Picture at this moment
        $data['main_content'] = 'dashboard/view_profile/student_profile';  // We need to change this content Middle PORTION
        $data['content_right'] = '';
        $data['username'] = $this->tank_auth->get_username();
        $email = $this->tank_auth->get_user_email();
        $data['student_profile'] = $this->db->query("select * from tbl_education where UserID = '".$email."'");
        $data['student_education'] = $this->student_profile_model->get_EducationInformation($email); //***
        $user_rating = $this->student_profile_model->get_RatingPointAvg($email); //*** Calculate Student Rating from Table
        foreach ($user_rating as $i) {   // To get Rating
            $user_rating = $i->RatingPointStudent;
        }
        $data['user_rating'] = $user_rating;
        $this->load->view('dashboardTemplate1', $data);
    }
}
