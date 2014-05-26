<?phpif (!defined('BASEPATH')) exit ('No direct script access allowed'); $l_delim = '['; $r_delim = ']';if (!function_exists('test_method')) {    function send_message($email, $code, $option = '') {        $CI = get_instance();        $CI->load->library('email');        $CI->email->from('system@studionear.com', 'Your Name');        $CI->email->to($email);        $CI->email->cc('another@another-example.com');        $CI->email->bcc('them@their-example.com');        $CI->email->subject('Email Test');        $CI->email->message('Testing the email class.');        $CI->email->send();    }}function parse($string, $data) {    if ($string == '') {        return FALSE;    }    foreach ($data as $key => $val) {        if (is_array($val)) {            $string = $this->_parse_pair($key, $val, $string);        } else {            $string = $this->_parse_single($key, (string) $val, $string);        }    }    return $string;}function _parse_single($key, $val, $string) {    return str_replace($this->l_delim . $key . $this->r_delim, $val, $string);}function _parse_pair($variable, $data, $string) {    if (FALSE === ($match = $this->_match_pair($string, $variable))) {        return $string;    }    $str = '';    foreach ($data as $row) {        $temp = $match['1'];        foreach ($row as $key => $val) {            if (!is_array($val)) {                $temp = $this->_parse_single($key, $val, $temp);            } else {                $temp = $this->_parse_pair($key, $val, $temp);            }        }        $str .= $temp;    }    return str_replace($match['0'], $str, $string);}function _match_pair($string, $variable) {    if (!preg_match("|" . preg_quote($this->l_delim) . $variable . preg_quote($this->r_delim) . "(.+?)" . preg_quote($this->l_delim) . '/' . $variable . preg_quote($this->r_delim) . "|s", $string, $match)) {        return FALSE;    }    return $match;}