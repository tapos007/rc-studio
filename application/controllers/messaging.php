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
        $this->load->library('sysmail');
        $this->lang->load('mahana');
        if (!$this->tank_auth->is_logged_in()) {         // logged in
            redirect('auth/');
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

    public function sent_item() {
        $this->lang->load('tank_auth');
        $email = $this->tank_auth->get_user_email();
        $SQLComm = "SELECT role from users WHERE email = '" . $email . "' ";
        $transaction = $this->db->query($SQLComm);
        foreach ($transaction->result() as $trans) {
            $var_role = $trans->role;
        }
        if ($var_role == "teacher") {
            $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';
            $data['user_profile'] = 'dashboard/notification/user_profile_teacher';
            $data['main_content'] = 'dashboard/content/messages_sent';
        } else {
            $data['main_menu'] = 'dashboard/menu/main_ menu_student';
            $data['user_profile'] = 'dashboard/notification/user_profile_student';
            $data['main_content'] = 'dashboard/content/messages_sent';
        }
        $data['content_right'] = '';
        $data['username'] = $this->tank_auth->get_username();
        $data['userid'] = $this->tank_auth->get_user_id();
        $data['user_email'] = $this->tank_auth->get_user_email();
        $this->load->model('notification_model');
        $data['notifications'] = $this->notification_model->get_UnReadNotification($email);
        $this->load->view('dashboardTemplate1', $data);
    }

    public function index() {
        $this->lang->load('tank_auth');
        $email = $this->tank_auth->get_user_email();
        $SQLComm = "SELECT role from users WHERE email = '" . $email . "' ";
        $transaction = $this->db->query($SQLComm);
        foreach ($transaction->result() as $trans) {
            $var_role = $trans->role;
        }
        if ($var_role == "teacher") {
            $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';
            $data['user_profile'] = 'dashboard/notification/user_profile_teacher';
            $data['main_content'] = 'dashboard/content/messages';
        } else {
            $data['main_menu'] = 'dashboard/menu/main_ menu_student';
            $data['user_profile'] = 'dashboard/notification/user_profile_student';
            $data['main_content'] = 'dashboard/content/messages';
        }
        $data['content_right'] = '';
        $data['username'] = $this->tank_auth->get_username();
        $data['userid'] = $this->tank_auth->get_user_id();
        $data['user_email'] = $this->tank_auth->get_user_email();
        $this->load->model('notification_model');
        $data['msg_count'] = $this->mahana_messaging->get_all_threads($email);
        $data['MessageSmall'] = $this->mahana_messaging->get_all_threads($email);
        $this->load->view('dashboardTemplate1', $data);
    }

    public function del($user_id, $msg_id, $msg_inn_status) {
        $user = base64_decode($user_id);
        $this->mahana_messaging->update_message_status($msg_id, $user, '2');
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
            $data['user_profile'] = 'dashboard/notification/user_profile_teacher';
        } elseif ($var_role == "student") {
            $data['main_menu'] = 'dashboard/menu/main_ menu_student';
            $data['user_profile'] = 'dashboard/notification/user_profile_student';
        }
        if ($msg_inn_status == 3)
            $data['main_content'] = 'dashboard/content/messages_sent';
        else
            $data['main_content'] = 'dashboard/content/messages';
        $data['content_right'] = '';
        $this->load->view('dashboardTemplate1', $data);
    }

    public function read_single_message_all_threads($msg_id, $user_id) {
        $user = base64_decode($user_id);
        $this->mahana_messaging->update_message_status($msg_id, $user, '1');
        $MessageCont = $this->mahana_messaging->get_message($msg_id, $user);
        foreach ($MessageCont['retval'] as $MessageContent) {
            $data['id'] = $MessageContent['id'];
            $data['thread_id'] = $MessageContent['thread_id'];
            $data['body'] = $MessageContent['body'];
            $data['priority'] = $MessageContent['priority'];
            $data['sender_id'] = $MessageContent['sender_id'];
            $data['cdate'] = $MessageContent['cdate'];
            $data['status'] = $MessageContent['status'];
            $data['subject'] = $MessageContent['subject'];
            $data['username'] = $MessageContent['username'];
        }
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
            $data['user_profile'] = 'dashboard/notification/user_profile_teacher';
        } elseif ($var_role == "student") {
            $data['main_menu'] = 'dashboard/menu/main_ menu_student';
            $data['user_profile'] = 'dashboard/notification/user_profile_student';
        }
        $data['main_content'] = 'dashboard/content/inbox';
        $data['content_right'] = '';
        $this->load->view('dashboardTemplate1', $data);
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
            $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';
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

    public function send_message() {
        $email = $this->tank_auth->get_user_email();
        $recipient = base64_decode($this->input->post('recipient'));
        $subject = $this->input->post('subject');
        $body = $this->input->post('body');
        if (strpos($recipient, ',') === false) {
            $this->mahana_messaging->send_new_message($email, $recipient, $subject, $body);
        } else {
            $finalString = preg_split("/[*,]/", $recipient);
            foreach ($finalString as $RecEmail) {
                $this->mahana_messaging->send_new_message($email, $RecEmail, $subject, $body);
            }
        }
        $tname = explode(' ', $this->tank_auth->get_username());
        $email_data['users_first_name'] = $tname[0];
        $email_data['link'] = '<a href="' . site_url("messaging") . '" >Click here to access your Studionear inbox</a>';
        $email_data['recipients'] = $this->input->post('recipientname');
        $email_data['subject'] = $subject;
        $email_data['message'] = $body;
        $a = $this->sysmail->initialize($email_data);
        $this->sysmail->send_mail($email, '115', $a);
        /* $this->mahana_messaging->update_message_status($reply_msg_id, $sender_id, '0' ); // to make un-read at Receiptionist
          $this->mahana_messaging->update_message_status($reply_msg_id, $email, '3' ); // to make read at Sender Sent ITEM
          echo $reply_msg_id."<br>";
          echo $sender_id."<br>";
          echo $body."<br>";Sent message to students
          echo $priority."<br>"; */
        $notification_data = array(
            'Email' => $this->tank_auth->get_user_email(),
            'Notification' => 'Sent message to students',
            'Status' => 'Un-Read'
        );
        $this->load->model('notification_model');
        $this->notification_model->insert_entry($notification_data);
        //Flash Data
        $this->session->set_flashdata('msg', 'Your message has been sent!');
        //Flash Data 
        redirect('messaging/send_message_view');
    }

    public function send_message_view() {
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
            $data['user_profile'] = 'dashboard/notification/user_profile_teacher';
        } elseif ($var_role == "student") {
            $data['main_menu'] = 'dashboard/menu/main_ menu_student';
            $data['user_profile'] = 'dashboard/notification/user_profile_student';
        }
        $data['main_content'] = 'dashboard/content/messages';
        $data['content_right'] = '';
        $this->load->view('dashboardTemplate1', $data);
    }

    public function smsr($msg_id, $sender_id, $subject, $body, $username, $priority) {
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
            $data['user_profile'] = 'dashboard/notification/user_profile_teacher';
        } elseif ($var_role == "student") {
            $data['main_menu'] = 'dashboard/menu/main_ menu_student';
            $data['user_profile'] = 'dashboard/notification/user_profile_student';
        }
        $data['content_right'] = '';
        $data['username'] = base64_decode($username);
        $data['msg_id'] = $msg_id;
        $data['priority'] = $priority;
        $data['sender_id'] = $sender_id;
        $data['subject'] = base64_decode($subject);
        $data['body'] = base64_decode($body);
        $data['main_content'] = 'dashboard/content/compose_reply';
        $this->load->view('dashboardTemplate1', $data);
    }

    public function send_reply_to_message() {
        $reply_msg_id = $this->input->post('msg_id');
        $email = $this->tank_auth->get_user_email();
        $sender_id = base64_decode($this->input->post('sender_id'));
        $body = $this->input->post('body');
        $priority = $this->input->post('priority');
        //$this->mahana_messaging->reply_to_message($reply_msg_id, $sender_id, $body, $priority);
        $this->mahana_messaging->reply_to_message($reply_msg_id, $email, $priority, $body);
        $this->mahana_messaging->update_message_status($reply_msg_id, $sender_id, '0'); // to make un-read at Receiptionist
        $this->mahana_messaging->update_message_status($reply_msg_id, $email, '3'); // to make read at Sender Sent ITEM
        /* echo $reply_msg_id."<br>";
          echo $sender_id."<br>";
          echo $body."<br>";
          echo $priority."<br>"; */
        $var_role = '';
        $SQLComm = "SELECT role from users WHERE email = '" . $email . "' ";
        $transaction = $this->db->query($SQLComm);
        foreach ($transaction->result() as $trans) {
            $var_role = $trans->role;
            $data['Role'] = $var_role;
        }
        if ($var_role == "teacher") {
            $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';
            $data['user_profile'] = 'dashboard/notification/user_profile_teacher';
        } elseif ($var_role == "student") {
            $data['main_menu'] = 'dashboard/menu/main_ menu_student';
            $data['user_profile'] = 'dashboard/notification/user_profile_student';
        }
        $data['main_content'] = 'dashboard/content/messages';
        $data['content_right'] = '';
        $this->load->view('dashboardTemplate1', $data);
    }

    public function reply_to_message($reply_msg_id, $sender_id, $body, $priority) {
        $this->mahana_messaging->reply_to_message($reply_msg_id, $sender_id, $body, $priority);
    }

    public function read_all_message($user_id) {
        $this->mahana_messaging->get_all_threads($user_id, $full_thread = FALSE, $order_by = 'DESC');
    }

    public function get_msg_count() {
        $user_id = $this->tank_auth->get_user_email();
        $this->mahana_messaging->get_msg_count($user_id, 'MSG_STATUS_UNREAD');
    }

    public function sm() {
        echo '<pre>';
        print_r($this->mahana_messaging->get_all_threads("tea1@r-cis.com", "", ""));
        echo '</pre>';
    }

    public function sm1() {
        $c = $this->mahana_messaging->get_message('1', "teacher@r-cis.com");
        foreach ($c as $d) {
            $e = $d[0];
        }
        echo '<pre>';
        print_r($e['body']);
        echo '</pre>';
    }

    public function sm2() {
        $i = 0;
        $c = $this->mahana_messaging->get_all_threads("teacher@r-cis.com", "", "");
        foreach ($c['retval'] as $d) {
            echo $d['subject'] . "<br>";
            echo $d['sender_id'] . "<br>";
            echo $d['username'] . "<br>";
        }
    }

    public function sm3() {
        $i = 0;
        $c = $msg_count = $this->mahana_messaging->get_msg_count('teacher@r-cis.com');
        echo '<pre>';
        print_r($c['retval']);
        echo '</pre>';
    }

    public function sm4() {
        $sender_id = "kazi@r-cis.com";
        $recipients = "teacher@r-cis.com";
        $subject = "This is a Test subject to check if it appears properly in the inbox and organize subject accordingly and cut over 100 char";
        $body = "This is a Test subject to check if it appears properly in the inbox and organize subject accordingly and cut over 100 char";
        $this->mahana_messaging->send_new_message($sender_id, $recipients, $subject, $body);
    }

    public function sm5() {
        $sender_id = "kazi@r-cis.com";
        $MessageAllGrouped = $this->mahana_messaging->get_all_threads_grouped('arif@r-cis.com', TRUE, 'DESC');
        //echo '<pre>';
        //print_r($MessageAllGrouped['retval']);
        //echo '</pre>';
        $i = 1;
        foreach ($MessageAllGrouped['retval'] as $MessageAll) {
            foreach ($MessageAll['messages'] as $SingleMessageAllThread) {
                echo "<br>-----------------------<br>";
                echo $SingleMessageAllThread['id'] . "<br>";
                echo $SingleMessageAllThread['thread_id'] . "<br>";
                echo $SingleMessageAllThread['body'] . "<br>";
                echo $SingleMessageAllThread['priority'] . "<br>";
                echo $SingleMessageAllThread['sender_id'] . "<br>";
                echo $SingleMessageAllThread['cdate'] . "<br>";
                echo $SingleMessageAllThread['status'] . "<br>";
                echo $SingleMessageAllThread['subject'] . "<br>";
                echo $SingleMessageAllThread['username'] . "<br>";
                echo "<br>-----------------------<br>";
            }
        }
    }

    public function sm6() {
        $sender_id = "teacher@r-cis.com";
        $MessageAllGrouped = $this->mahana_messaging->get_all_threads_grouped('arif@r-cis.com', TRUE, 'DESC');
        //echo '<pre>';
        //print_r($MessageAllGrouped['retval']);
        //echo '</pre>';
        /* $i = 1;
          foreach ($MessageAllGrouped['retval'] as $MessageAll){
          echo '<pre>';
          print_r($MessageAllGrouped['retval'][8]);
          echo '</pre>';
          } */
        $i = 0;
        foreach ($MessageAllGrouped['retval'][8] as $MessageAll) {
            for ($j = 0; $j < count($MessageAll[0]) - 1; $j++) {
                echo "<br>" . "------------------------------------------------------------------" . "<br>";
                echo $MessageAll[$j]['id'] . "<br>";
                echo "<br>" . "------------------------------------------------------------------" . "<br>";
                echo $MessageAll[$j]['thread_id'] . "<br>";
                echo "<br>" . "##################################################################" . "<br>";
                echo $MessageAll[$j]['body'] . "<br>";
                echo $MessageAll[$j]['priority'] . "<br>";
                echo $MessageAll[$j]['sender_id'] . "<br>";
                echo $MessageAll[$j]['cdate'] . "<br>";
                echo $MessageAll[$j]['status'] . "<br>";
                echo $MessageAll[$j]['subject'] . "<br>";
                echo $MessageAll[$j]['username'] . "<br>";
            }
        }
    }

    function sendMail() {
        
    }

}
