<?php

class idu_model extends CI_Model {

    //put your code here
    function insertData($table, $data) { //insert data dynamically query
        $this->db->insert($table, $data);
        return $this->db->insert_id(); //last id return
    }

    function viewstdinf() {     //view student table data query
        $this->db->select('*');
        $this->db->from('talstudent');
        $query = $this->db->get();
        return $query->result();
    }

    function view_data($id) {     //view specific student data query
        $this->db->select('*');
        $this->db->from('talstudent');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $this->db->limit(1);
        return $query->row();
    }

    
        function delete_data($id) {        //specific id data delete  query
        $this->db->where('id', $id);
        $this->db->delete('talstudent');
    }
    function deleteDataMultiTable($table,$id) {        //specific id data delete mutiple table query
        $this->db->where('id', $id);
        $this->db->delete($table);
    }

    function editstdinfo($id) {      //specific  id data edit 
        $this->db->select('*');
        $this->db->from('talstudent');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $this->db->limit(1);
        return $query->row();
    }

    function updateQuery($id, $user) {      //  update query for spe
        $this->db->where('id', $id);
        $this->db->update('talstudent', $user);
    }

    function getDataUniversity() {
        $this->db->select('*');
        $this->db->from('university');
        $query = $this->db->get();
        return $query->result();
    }

    function getDatagender() {
        $this->db->select('*');
        $this->db->from('gender');
        $query = $this->db->get();
        return $query->result();
    }

    function getDatastatus() {
        $this->db->select('*');
        $this->db->from('married_status');
        $query = $this->db->get();
        return $query->result();
    }

    function getDatadepartment() {
        $this->db->select('*');
        $this->db->from('department');
        $query = $this->db->get();
        return $query->result();
    }

    function getData_difTable() {   //join query for multiple table data view
        //$this->db->select('*');
        $this->db->select('*,user_id.id eid'); // for multiple data edit id set
        $this->db->from('user_id');
        $this->db->join('user_profile', 'user_id.id = user_profile.id'); //join with user_id and user_profile table
        $this->db->join('contact', 'user_id.id = contact.id'); //join with user_id and contact table
        $this->db->join('department', 'department.id = user_profile.dept_id'); //join with department and user_profile dept_id table
        $this->db->join('university', 'university.id = user_profile.unv_id'); //join with university and user_profile's unv_id table
        $this->db->join('gender', 'gender.id = user_profile.gender_id'); //join with gender and user_profile's gender_id table
        $this->db->join('married_status', 'married_status.id = user_profile.status_id'); //join with married_status and user_profile's status_id table
        $query = $this->db->get();
        return $query->result();
    }

    function MultiData_difTable($id) {   //join query for multiple table data view
        $this->db->select('*');
        $this->db->where('user_profile.id', $id);
        $this->db->from('user_id');
        $this->db->join('user_profile', 'user_id.id = user_profile.id'); //join with user_id and user_profile table
        $this->db->join('contact', 'user_id.id = contact.id'); //join with user_id and contact table
        $this->db->join('department', 'department.id = user_profile.dept_id'); //join with department and user_profile dept_id table
        $this->db->join('university', 'university.id = user_profile.unv_id'); //join with university and user_profile's unv_id table
        $this->db->join('gender', 'gender.id = user_profile.gender_id'); //join with gender and user_profile's gender_id table
        $this->db->join('married_status', 'married_status.id = user_profile.status_id'); //join with married_status and user_profile's status_id table
        $query = $this->db->get();
        echo $this->db->last_query(); 
        return $query->row();
    }

    function updateQueryMultiData( $table,$id, $data) {      //  update query for multiTable data       
        $this->db->where('id', $id);
        $this->db->update($table, $data);
        //return $this->db->insert_id();
    }

}
