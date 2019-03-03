<?php

class Report_Model extends CI_Model
{

    public function get_report($start_date_time, $end_date_time)
    {
        $this->db->select('e.start_date_time, e.end_date_time, SUM(e.amount) AS total_amount, COUNT(ue.id) AS total_count');
        $this->db->from('events e, user_events ue');
        $this->db->where("e.start_date_time >=", $start_date_time);
        $this->db->where("e.end_date_time <=", $end_date_time);
        $this->db->where('e.id = ue.event_id');
        
        $query = $this->db->get();
        return $query->row();
    }

}