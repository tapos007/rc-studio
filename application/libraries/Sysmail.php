<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sysmail {

    var $l_delim = '[';
    var $r_delim = ']';
    var $object;
    var $defaults = array(
        'link' => "",
        'link1' => "",
        'course_name' => "",
        'category' => "",
        'subcategory' => "",
        'date_time' => "",
        'fees' => "",
        'start_date_time' => "",
        'end_date_time' => "",
        'total_fees' => "",
        'recipients' => "",
        'subject' => "",
        'email' => "",
        'password' => "",
        'student_name' => "",
        'requested_date_time' => "",
        'demo_duration' => "",
        'request' => "",
        'student_full_name' => "",
        'number_of_sessions' => "",
        'error_msg' => "",
        'users_first_name' => "",
        'message' => "",
        'instructor_name' => ""
    );

    public function initialize($config = array()) {



        foreach ($this->defaults as $key => $val) {
            if (isset($config[$key])) {

                $this->defaults[$key] = $config[$key];
            } else {
                $this->defaults[$key] = $val;
            }
        }


        return $this->defaults;
    }

    function send_mail($user_email, $code, $data) {
        //email body
        $string = $this->get_email_body($code);
        $email_body = $this->parse($string, $data);

        $CI = & get_instance();
        //load library for get data from db
        $CI->load->library('email');
        $CI->load->model('email_model');

        $CI->email->from('admin@studionear.com', 'Studionear Team');
        $CI->email->to($user_email);
        //email subject
        //$subject = $CI->email_model->get_subject_by_id($code);
        //$email_sub = $data['subject'];//$this->parse($subject, $data);

        $temp_data['subject'] = $data['subject'];
        $temp_data['username'] = $data['users_first_name'];
        $temp_data['message'] = $email_body;
        $temp_data[''] = date("l, F j, Y", now());
        $temp_data['current_date'] = date("l, F j, Y");

        $CI->email->subject($data['subject']);
        $CI->email->message($CI->load->view('email_template', $temp_data, TRUE));

        $CI->email->send();
        //return $CI->load->view('email_template', $temp_data, TRUE);
    }

    public function get_email_body($code) {
        $CI = & get_instance();
        $CI->load->model('email_model');
        $ebody = $CI->email_model->get_body_by_id($code);
        return $ebody;
    }

    public function parse($string, $data) {
        $CI = & get_instance();
        return $this->_parse($string, $data);
    }

    function parse_string($string, $data) {
        return $this->_parse($string, $data);
    }

    function _parse($string, $data) {
        if ($string == '') {
            return FALSE;
        }

        foreach ($data as $key => $val) {
            if (is_array($val)) {
                $string = $this->_parse_pair($key, $val, $string);
            } else {
                $string = $this->_parse_single($key, (string) $val, $string);
            }
        }


        return $string;
    }

    function set_delimiters($l = '{', $r = '}') {
        $this->l_delim = $l;
        $this->r_delim = $r;
    }

    function _parse_single($key, $val, $string) {
        return str_replace($this->l_delim . $key . $this->r_delim, $val, $string);
    }

    function _parse_pair($variable, $data, $string) {
        if (FALSE === ($match = $this->_match_pair($string, $variable))) {
            return $string;
        }

        $str = '';
        foreach ($data as $row) {
            $temp = $match['1'];
            foreach ($row as $key => $val) {
                if (!is_array($val)) {
                    $temp = $this->_parse_single($key, $val, $temp);
                } else {
                    $temp = $this->_parse_pair($key, $val, $temp);
                }
            }

            $str .= $temp;
        }

        return str_replace($match['0'], $str, $string);
    }

    function _match_pair($string, $variable) {
        if (!preg_match("|" . preg_quote($this->l_delim) . $variable . preg_quote($this->r_delim) . "(.+?)" . preg_quote($this->l_delim) . '/' . $variable . preg_quote($this->r_delim) . "|s", $string, $match)) {
            return FALSE;
        }

        return $match;
    }

}
