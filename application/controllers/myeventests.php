<?php

class Myeventests extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Myeventest');
    }

    public function index() {


        $this->load->library('tank_auth');
        $email = $this->tank_auth->get_user_email();
        $result = $this->MyEvenText->getAllBatch($email);


        foreach ($result as $key => $value) {

            $mm = $this->generateDate($value);

            $result[$key] = array_merge($result[$key], array('generatedSchedule' => $mm));
            $result[$key] = array_merge($result[$key], array('generatedSchedule' => $mm));
        }


        $myError = array();
        foreach ($result as $myvalue) {
            foreach ($myvalue['generatedSchedule'] as $aV) {
                echo '<pre>';
                print_r($aV);
                echo '</pre>';
                $myError[] = array('id' => $aV['id'],
                    'title' => $aV['title'],
                    'start' => $aV['classDate'],
                    'end' => $aV['classDate'],
                    'url' => "http://yahoo.com/");
            }
        }

        //  echo json_encode($myError);
    }

    public function forTestPurpose() {
        $email = $this->tank_auth->get_user_email();
        $result = $this->MyEvenText->getAllBatch($email);


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

        $totalSchedule = $this->MyEvenText->GenerateEvent($value['BatchID']);
        $courseInfo = array();
        $m = strtotime($value['StartDate']);
        $n = strtotime($value['EndDate']);
        $check_date = $m; // '2010-02-27';
        $end_date = $n; // '2010-03-24';
        $nowTimes = $value;

        $coursedayList = array();


        while ($check_date <= $end_date) {

            $nowDays = date('l', $check_date);
            foreach ($totalSchedule as $aSchedule) {
                $atime = $aSchedule['StartTime'];
                if ($nowDays == $aSchedule['Day']) {

                    $ccc = "Course Name:" . $value['CourseName'] . " Start form:" . $atime . " and End At" . $aSchedule['EndTime'];
                    $coursedayList[] = array('id' => $value['CourseID'], 'start' => $atime, 'title' => $ccc, "classDate" => date("Y-m-d", $check_date), "Start_time" => $aSchedule['StartTime'], "EndTime" => $aSchedule['EndTime'], "myday" => $nowDays);
                }
            }
            //    $courseInfo[] = array("classDate"=>date("Y-m-d", $check_date),"Start_time"=>,"EndTime","myday")


            $check_date += 86400;
        }
        return $coursedayList;
    }

}
