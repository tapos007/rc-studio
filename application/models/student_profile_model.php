<?phpif (!defined('BASEPATH'))    exit('No direct script access allowed');class Student_profile_model extends CI_Model {    //private $table_name = 'login_attempts';    function __construct() {        parent::__construct();    }    /*      function insert_entry($data)      {      $this->db->insert('tbl_profile', $data);      }     */    function get_ProfileInformation($email) {        $this->db->where('UserID', $email);        $query = $this->db->get('tbl_profile');        return $query;    }    function get_EducationInformation($email) {        $this->db->where('UserID', $email);        $query = $this->db->get('tbl_education');        return $query->result();    }    function get_RatingInformation($email) {        $this->db->where('StudentID', $email);        $query = $this->db->get('tbl_rating');        return $query->result();    }    function get_RatingPointAvg($email) {        $this->db->select_avg('RatingPointStudent');        $this->db->where('StudentID', $email);        $query = $this->db->get('tbl_rating');        return $query->result();    }    function insert_student_profile($data) {        $this->db->insert('tbl_profile', $data);    }    function update_student_profile($data, $email) {        $this->db->where('UserID', $email);        $this->db->update('tbl_profile', $data);        return TRUE;    }}