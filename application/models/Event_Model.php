<?php

class Event_Model extends CI_Model
{

    public function add_event($data)
    {
        $this->db->insert('events', $data);
    }

    public function get_events()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('events');

        return $query->result_array();
    }

    // Confirm bookings before deleting an event
    public function confirm_bookings($id)
    {
        $query = $this->db->query("SELECT * FROM user_events WHERE event_id = $id");
        return $query->num_rows();
    }

    public function delete_event($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('events');

        $this->db->where('event_id', $id);
        $this->db->delete('user_events');
    }

}