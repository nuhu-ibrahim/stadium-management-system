<?php

class User_Event_Model extends CI_Model
{

    public function get_user_events($id)
    {
        $this->db->select('ue.*, e.*');
        $this->db->from('user_events ue, events e');
        $this->db->where('ue.event_id = e.id');
        $this->db->where("$id = ue.user_id");
        
        $query = $this->db->get();
        return $query->result_array();
    }

    // Get events for drop down select
    public function get_events()
    {        
        $today = date('Y-m-d');
        $this->db->where('end_date_time >', $today);
        $this->db->where('available_seats > 0');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('events');

        return $query->result_array();
    }

    public function add_event($data)
    {
        $this->db->insert('user_events', $data);
    }

    public function receipt($event_id, $user_id)
    {
        $this->db->select('e.*, u.*');
        $this->db->from('events e, users u');
        $this->db->where('e.id', $event_id);
        $this->db->where('u.id', $user_id);

        $query = $this->db->get();
        return $query->row();
    }

    public function get_event_details($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('events');

        return $query->result();
    }

}