<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('security');
        $this->load->library('tank_auth');
        $this->lang->load('tank_auth');
        $this->load->model('Myeventestr');
    }

    public function index1() {
        $email = $this->tank_auth->get_user_email();
        $TimeZone = $this->db->query('SELECT TimeZone, DayLightSaving FROM tbl_profile where UserID ="' . $email . '"');
        foreach ($TimeZone->result() as $TimeZ) {
            $TimeZone = $TimeZ->TimeZone;
            $DayLightSaving = $TimeZ->DayLightSaving;
        }


        $result = $this->Myeventestr->getAllBatch($email);
        foreach ($result as $key => $value) {
            $mm = $this->generateDate($value);
            $result[$key] = array_merge($result[$key], array('generatedSchedule' => $mm));
            $result[$key] = array_merge($result[$key], array('generatedSchedule' => $mm));
        }
        $myError = array();


        foreach ($result as $myvalue) {
            foreach ($myvalue['generatedSchedule'] as $aV) {
                //echo $aV['end']."<br />".date('Y-m-d H:i:s', gmt_to_local(strtotime($aV['end']), $TimeZone, $DayLightSaving)); exit();
                $myError[] = array('id' => $aV['id'],
                    'title' => $aV['title'],
                    //'start' => $aV['start'],
                    //'end' => $aV['end'],
                    'start' => date('Y-m-d h:i:s', gmt_to_local(strtotime($aV['start']), $TimeZone, $DayLightSaving)),
                    'end' => date('Y-m-d h:i:s', gmt_to_local(strtotime($aV['end']), $TimeZone, $DayLightSaving)),
                    'allDay' => false,
                    'editable' => false,
                    'url' => "view_course/" . $aV['id'] . "/" . $aV['id']);
            }
        }
        echo json_encode($myError);
    }

    public function view_course($CourseID, $BatchID) {

        redirect('teacher/view_course/' . $CourseID . '/' . $BatchID);
    }

    public function forTestPurpose() {
        $email = $this->tank_auth->get_user_email();
        $result = $this->Myeventestr->getAllBatch($email);


        foreach ($result as $key => $value) {

            $mm = $this->generateDate($value);

            $result[$key] = array_merge($result[$key], array('generatedSchedule' => $mm));
            $result[$key] = array_merge($result[$key], array('generatedSchedule' => $mm));
        }


        $myError = array();
        foreach ($result as $myvalue) {
            foreach ($myvalue['generatedSchedule'] as $aV) {
                $myError[] = $aV;
            }
        }
        echo json_encode($myError);
    }

    private function generateDate($value) {
        $totalSchedule = $this->Myeventestr->GenerateEvent($value['BatchID']);
        $courseInfo = array();
        $coursedayList = array();
        foreach ($totalSchedule as $aSchedule) {
            //$ccc = "Course Name:" . $value['CourseName'] . " Start form:" . $atime . " and End At" . $aSchedule['EndTime'];
            $ccc = $value['CourseName'];
            $coursedayList[] = array('id' => $value['CourseID'], 'title' => $ccc, "classDate" => $aSchedule['schedule_date'], "start" => $aSchedule['schedule_date'] . " " . $aSchedule['StartTime'], "end" => $aSchedule['schedule_date'] . " " . $aSchedule['EndTime']);
        }
        //    $courseInfo[] = array("classDate"=>date("Y-m-d", $check_date),"Start_time"=>,"EndTime","myday")




        return $coursedayList;
    }

    public function teachers_dashboard() {
        if ($this->tank_auth->is_logged_in()) {


            $data['user_profile'] = 'dashboard/notification/user_profile_teacher';
            $data['main_content'] = 'dashboard/content/calender';
            $data['content_right'] = '';
            $this->lang->load('tank_auth');
            $email = $this->tank_auth->get_user_email();
            $SQLComm = "SELECT role from users WHERE email = '" . $email . "' ";
            $transaction = $this->db->query($SQLComm);
            foreach ($transaction->result() as $trans) {
                $var_role = $trans->role;
            }
            if ($var_role == "teacher"): $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';
            else: $data['main_menu'] = 'dashboard/menu/main_ menu_student';
            endif;
            $this->load->view('dashboardTemplate1', $data);
        }
    }

    public function students_dashboard() {
        if ($this->tank_auth->is_logged_in()) {
            $data['user_profile'] = 'dashboard/notification/user_profile_student';
            $data['main_content'] = 'dashboard/content/calender';
            $data['content_right'] = '';
            $this->lang->load('tank_auth');
            $email = $this->tank_auth->get_user_email();
            $SQLComm = "SELECT role from users WHERE email = '" . $email . "' ";
            $transaction = $this->db->query($SQLComm);
            foreach ($transaction->result() as $trans) {
                $var_role = $trans->role;
            }
            if ($var_role == "teacher"): $data['main_menu'] = 'dashboard/menu/main_ menu_teacher1';
            else: $data['main_menu'] = 'dashboard/menu/main_ menu_student';
            endif;
            $this->load->view('dashboardTemplate1', $data);
        }
    }

}
