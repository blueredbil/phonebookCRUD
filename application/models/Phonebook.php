<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Phonebook extends CI_Model{
    /*
     * Get phonebooks
     */
    function getRows($id = ""){
        if(!empty($id)){
            $query = $this->db->get_where('phonebooks', array('id' => $id));
            return $query->row_array();
        }else{
            $query = $this->db->get('phonebooks');
            return $query->result_array();
        }
    }
    
    /*
     * Insert phonebook
     */
    public function insert($data = array()) {
        $insert = $this->db->insert('phonebooks', $data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    
    /*
     * Update phonebook
     */
    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('phonebooks', $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }
    
    /*
     * Delete phonebook
     */
    public function delete($id){
        $delete = $this->db->delete('phonebooks',array('id'=>$id));
        return $delete?true:false;
    }
}