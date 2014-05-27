<?php

class Myeventestr extends CI_Controller {

    public function getAllBatch($email) {


        /* $this->db->select('tbl_batch.BatchID, tbl_batch.CourseID, tbl_batch.TeacherID,tbl_batch.StartDate,tbl_batch.EndDate,tbl_course.CourseName');
          $this->db->where('TeacherID', $email);
          $this->db->order_by("tbl_batch.BatchID", "asc");
          $this->db->from('tbl_batch');
          $this->db->join('tbl_course', 'tbl_course.CourseID = tbl_batch.CourseID');
          $query = $this->db->get(); */
        $query = $this->db->query('select tbl_batch.BatchID, tbl_batch.CourseID, tbl_useronbatch.UserID,tbl_course.CourseName from tbl_batch inner join tbl_course on tbl_course.CourseID = tbl_batch.CourseID Inner Join tbl_useronbatch on tbl_useronbatch.BatchID = tbl_batch.BatchID where tbl_useronbatch.UserID = "' . $email . '"');
        return $query->result_array();
    }

    public function GenerateEvent($batch) {
        $this->db->where('BatchID', $batch);
        $query = $this->db->get('tbl_schedule');
        return $query->result_array();
    }

}
