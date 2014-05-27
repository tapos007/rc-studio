<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Messaging extends CI_Controller {

    function __construct() {

        parent::__construct();



        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->load->library('security');

        $this->load->library('tank_auth');

        $this->lang->load('tank_auth');

        $this->load->library('mahana_messaging');

        $this->lang->load('mahana');
    }

    public function index() {
        
    }

    public function rating() {

        $rating_value = $this->input->post("rate_val", true);

        $designId = $this->input->post("id", true);

        $user = $this->tank_auth->get_user_email();

        $rating_date = date("Y-m-d");



        if ($user) {   //logged in user id
            if (!$this->model_name->is_design_rated($designId, $user)) {

                if ($this->model_name->insert_rating($designId, $user, $rating_value, $rating_date)) {

                    echo json_encode(array("code" => "Success", "msg" => "Your Design Rating has been posted"));
                } else {

                    echo json_encode(array("code" => "Error", "msg" => "There was a problem rating your design"));
                }
            } else {

                echo json_encode(array("code" => "Error", "msg" => "You have already rated this design"));
            }
        } else {

            echo json_encode(array("code" => "Error", "msg" => "You have to login to rate the design"));
        }

        exit(0);
    }

    public function sms() {

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

            $data['user_profile'] = 'dashboard/notification/user_profile_teacher';
        } elseif ($var_role == "student") {

            $data['main_menu'] = 'dashboard/menu/main_ menu_student';

            $data['user_profile'] = 'dashboard/notification/user_profile_student';
        }

        $data['content_right'] = '';

        $data['recipient'] = $this->input->post('recipient');

        $data['recipientname'] = $this->input->post('recipientname');

        $data['main_content'] = 'dashboard/content/compose_new';

        $this->load->view('dashboardTemplate1', $data);
    }

}
