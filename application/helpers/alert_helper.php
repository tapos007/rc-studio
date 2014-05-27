<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('get_alert_by_id')) {

    function get_alert_by_id($id) {
        $message_array = array(
        '101' => 'Welcome to Studionear!',
        '103' => 'Your Profile is incomplete. Please complete the following sections: Overview, Education  Qualification, etc..',
        '104' => 'FIRST session message!',
        '105A' => 'Dear ',
        '105B' => 'You have received USD  ',
        '105C' => ' $ ',
        );
        return $message_array[$id];
    }

}
?>
