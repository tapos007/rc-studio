<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class View_profile extends CI_Controller {

    public function index() {
        
    }

    public function teacher_profile($user_email) {
        $email = $this->tank_auth->get_user_email();
        if ($this->input->post('TimeZone'))
            $data['TimeZoneUR'] = $this->input->post('TimeZone');
        else
            $data['TimeZoneUR'] = $this->session->userdata('TimeZone');
        $username = '';
        $var_role = '';
        $SQLComm = "SELECT role from users WHERE email = '" . $email . "' ";
        $transaction = $this->db->query($SQLComm);
        foreach ($transaction->result() as $trans) {
            $var_role = $trans->role;
        }
        $SQLComm1 = "SELECT username from users WHERE email = '" . base64_decode($user_email) . "' ";
        $transaction1 = $this->db->query($SQLComm1);
        foreach ($transaction1->result() as $trans1) {
            $username = $trans1->username;
        }
        if ($var_role == "teacher") {
            $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';
            $data['user_profile'] = 'dashboard/notification/user_profile_teacher';

            $data['content_right'] = '';
            $data['main_content'] = 'dashboard/content/teacher/profile';
            $data['content_right'] = '';
            $data['teacher_email'] = $user_email;
            $data['username'] = $username;
            $this->load->model('teacher_profile_model');
            $data['teacher_profile'] = $this->teacher_profile_model->get_ProfileInformation(base64_decode($user_email)); //***
            $user_rating = $this->teacher_profile_model->get_RatingPointAvg($user_email); //*** Calculate teacher Rating from Table
            foreach ($user_rating as $i) {   // To get Rating
                $user_rating = $i->RatingPointTeacher;
            }
            $data['user_rating'] = $user_rating;
            $this->load->view('dashboardTemplate1', $data);
        } elseif ($var_role == "student") {
            $data['main_menu'] = 'dashboard/menu/main_ menu_student';
            $data['user_profile'] = 'dashboard/notification/user_profile_student';

            $data['content_right'] = '';




            $data['main_content'] = 'dashboard/content/teacher/profile';
            $data['content_right'] = '';
            $data['teacher_email'] = $user_email;
            $data['username'] = $username;
            $this->load->model('teacher_profile_model');
            $data['teacher_profile'] = $this->teacher_profile_model->get_ProfileInformation(base64_decode($user_email)); //***
            $user_rating = $this->teacher_profile_model->get_RatingPointAvg($user_email); //*** Calculate teacher Rating from Table
            foreach ($user_rating as $i) {   // To get Rating
                $user_rating = $i->RatingPointTeacher;
            }
            $data['user_rating'] = $user_rating;
            $this->load->view('dashboardTemplate1', $data);
        } else { //for unregistered
            $data['main_content'] = 'dashboard/content/teacher/profile';
            $data['content_right'] = '';
            $data['teacher_email'] = $user_email;
            $data['username'] = $username;
            $this->load->model('teacher_profile_model');
            $data['teacher_profile'] = $this->teacher_profile_model->get_ProfileInformation(base64_decode($user_email)); //***
            $user_rating = $this->teacher_profile_model->get_RatingPointAvg($user_email); //*** Calculate teacher Rating from Table
            foreach ($user_rating as $i) {   // To get Rating
                $user_rating = $i->RatingPointTeacher;
            }
            $data['user_rating'] = $user_rating;
            $this->load->view('dashboardTemplate2', $data);
        }
    }

    public function student_profilebyemail($user_email) {
        $email = $this->tank_auth->get_user_email();
        $username = '';
        $var_role = '';
        $SQLComm = "SELECT role from users WHERE email = '" . $email . "' ";
        $transaction = $this->db->query($SQLComm);
        foreach ($transaction->result() as $trans) {
            $var_role = $trans->role;
        }
        $SQLComm1 = "SELECT username from users WHERE email = '" . base64_decode($user_email) . "' ";
        $transaction1 = $this->db->query($SQLComm1);
        foreach ($transaction1->result() as $trans1) {
            $username = $trans1->username;
        }
        if ($var_role == "teacher") {
            $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';
            $data['user_profile'] = 'dashboard/notification/user_profile_teacher';

            $data['content_right'] = '';




            $data['main_content'] = 'dashboard/content/teacher/profile';
            $data['content_right'] = '';
            $data['teacher_email'] = $user_email;
            $data['username'] = $username;
            $this->load->model('teacher_profile_model');
            $data['teacher_profile'] = $this->teacher_profile_model->get_ProfileInformation(base64_decode($user_email)); //***
            $user_rating = $this->teacher_profile_model->get_RatingPointAvg($user_email); //*** Calculate teacher Rating from Table
            foreach ($user_rating as $i) {   // To get Rating
                $user_rating = $i->RatingPointTeacher;
            }
            $data['user_rating'] = $user_rating;
            $this->load->view('dashboardTemplate1', $data);
        } elseif ($var_role == "student") {
            $data['main_menu'] = 'dashboard/menu/main_ menu_student';
            $data['user_profile'] = 'dashboard/notification/user_profile_student';

            $data['content_right'] = '';




            $data['main_content'] = 'dashboard/content/teacher/profile';
            $data['content_right'] = '';
            $data['teacher_email'] = $user_email;
            $data['username'] = $username;
            $this->load->model('teacher_profile_model');
            $data['teacher_profile'] = $this->teacher_profile_model->get_ProfileInformation(base64_decode($user_email)); //***
            $user_rating = $this->teacher_profile_model->get_RatingPointAvg($user_email); //*** Calculate teacher Rating from Table
            foreach ($user_rating as $i) {   // To get Rating
                $user_rating = $i->RatingPointTeacher;
            }
            $data['user_rating'] = $user_rating;
            $this->load->view('dashboardTemplate1', $data);
        } else { //for unregistered
            $data['main_content'] = 'dashboard/content/teacher/profile';
            $data['content_right'] = '';
            $data['teacher_email'] = $user_email;
            $data['username'] = $username;
            $this->load->model('teacher_profile_model');
            $data['teacher_profile'] = $this->teacher_profile_model->get_ProfileInformation(base64_decode($user_email)); //***
            $user_rating = $this->teacher_profile_model->get_RatingPointAvg($user_email); //*** Calculate teacher Rating from Table
            foreach ($user_rating as $i) {   // To get Rating
                $user_rating = $i->RatingPointTeacher;
            }
            $data['user_rating'] = $user_rating;
            $this->load->view('dashboardTemplate1', $data);
        }
    }

}
