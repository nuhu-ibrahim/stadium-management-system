<?php

class Dashboard_Model extends CI_Model
{

    public function get_all_bookings()
    {
        $this->db->select('u.*, e.event_title, e.start_date_time, e.end_date_time, e.event_description, ue.*');
        $this->db->from('user_events ue, events e, users u');
		$this->db->where('ue.user_id = u.id');
        $this->db->where('ue.event_id = e.id');
		

        $query = $this->db->get();
        return $query->result_array();
    }

    // public function get_user_bookings($id)
    // {
    //     $this->db->select('e.event_title, e.start_date_time, e.end_date_time, e.event_description, ue.*');
    //     $this->db->from('user_events ue, events e');
    //     $this->db->where('ue.event_id = e.id');
    //     $this->db->where("ue.user_id = $id");

    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

    public function get_available_events()
    {
        $today = date('Y-m-d');
        $this->db->where('end_date_time >', $today);
        $this->db->where('available_seats > 0');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('events');

        return $query->result_array();
    }

    public function get_ticket_info($id)
    {
        $this->db->select('u.first_name, u.last_name, u.phone_number, ev.event_title, ue.*');
        $this->db->from('users u, events ev, user_events ue');
        $this->db->where("$id = ue.id");
        $this->db->where("u.id = ue.user_id");
        $this->db->where("ev.id = ue.event_id");

        $query = $this->db->get();
        return $query->row();
    }

    // Increase available seats when account is deactivate
    public function increase_seats($id)
    {
        //$this->db->query("UPDATE events SET available_seats = available_seats + 1 WHERE id = $id");
        $this->db->set('available_seats', 'available_seats+1', FALSE);
        $this->db->where('id', $id);
        $this->db->update('events');
    }

    // Decrease available seats when account is activated
    public function decrease_seats($id)
    {
        //$this->db->query("UPDATE events SET available_seats = available_seats - 1 WHERE id = $id");
        $this->db->set('available_seats', 'available_seats-1', FALSE);
        $this->db->where('id', $id);
        $this->db->update('events');
    }

    public function update_ticket($event_id, $data)
    {
        $this->db->where('id', $event_id);
        $this->db->update('user_events', $data);
    }

}