<?phpif (!defined('BASEPATH'))    exit('No direct script access allowed');/** * Login_attempts * * This model serves to watch on all attempts to login on the site * (to protect the site from brute-force attack to user database) * * @package	Tank_auth * @author	Ilya Konyukhov (http://konyukhov.com/soft/) */class Bank_model extends CI_Model {    //private $table_name = 'login_attempts';    function __construct() {        parent::__construct();    }    function save_bank($data) {        $this->db->insert('bank', $data);        return true;    }    function edit_bank($bank_id) {        $this->db->where('bank_id', $bank_id);        $data = $this->db->get('bank');        return $data;    }    function update_bank($bank_id, $data) {        $this->db->where('bank_id', $bank_id);        $this->db->update('bank', $data);        return true;    }    function save_daily_expense($data) {        $this->db->insert('daily_expense', $data);        return true;    }    function save_product_info($data) {        $this->db->insert('product_purchase', $data);        return true;    }    /* function add_supplier($data){      $this->db->insert('supplier', $data);      return true;      }      function delete_supplier($id)      {      $this->db->where('id', $id);      $this->db->delete('supplier');      return true;      }      function add_product_type_name($data){      $this->db->insert('input_product_type', $data);      }      function add_product_name($data){      $this->db->insert('input_product_name', $data);      }      function add_model_name($data){      $this->db->insert('model_name', $data);      }      function edit_stocking_model($id){      $this->db->where('id', $id);      $data = $this->db->get('input_type_setup');      return $data;      }      function update_stockin_model($id, $data){      $this->db->where('id', $id);      $this->db->update('input_type_setup', $data);      return true;      }      function delete_stockin_model($id)      {      $this->db->where('id', $id);      $this->db->delete('input_type_setup');      return true;      }      function edit_product_type($id){      $this->db->where('id', $id);      $data = $this->db->get('input_product_type');      return $data;      }      function update_product_type($id, $data){      $this->db->where('id', $id);      $this->db->update('input_product_type', $data);      return true;      }      function delete_product_type($id)      {      $this->db->where('id', $id);      $this->db->delete('input_product_type');      return true;      }      function edit_product_name($id){      $this->db->where('id', $id);      $data = $this->db->get('input_product_name');      return $data;      }      function update_product_name($id, $data){      $this->db->where('id', $id);      $this->db->update('input_product_name', $data);      return true;      }      function delete_product_name($id)      {      $this->db->where('id', $id);      $this->db->delete('input_product_name');      return true;      }      function edit_model_name($id){      $this->db->where('id', $id);      $data = $this->db->get('model_name');      return $data;      }      function update_model_name($id, $data){      $this->db->where('id', $id);      $this->db->update('model_name', $data);      return true;      }      function delete_model_name($id)      {      $this->db->where('id', $id);      $this->db->delete('model_name');      return true;      }      function GetAutocomplete_model($options = array())      {      $this->db->select('add_model_name');      $this->db->like('add_model_name', $options['keyword'], 'after');      $query = $this->db->get('model_name');      return $query->result();      }      function get_search_suggestions($search,$limit=25)      {      $suggestions = array();      $this->db->from('model_name');      $this->db->like('add_model_name', $search);      //$this->db->where('deleted',0);      $this->db->order_by("add_model_name", "asc");      $add_model_name = $this->db->get();      foreach($add_model_name->result() as $row)      {      $suggestions[]=$row->add_model_name;      }      //only return $limit suggestions      if(count($suggestions > $limit))      {      $suggestions = array_slice($suggestions, 0,$limit);      }      return $suggestions;      } */}