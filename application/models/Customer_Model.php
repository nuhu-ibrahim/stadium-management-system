<?php

class Customer_Model extends CI_Model
{

    public function get_customers()
    {
        $this->db->select('u.id, u.first_name, u.last_name, u.phone_number, u.email, COUNT(ue.id) AS total_events');
        $this->db->from('users u, user_events ue');
        $this->db->where('is_admin', 0);
        $this->db->where('u.id = ue.user_id');
        $this->db->group_by('u.id');

        $query = $this->db->get();
        return $query->result_array();
    }

}