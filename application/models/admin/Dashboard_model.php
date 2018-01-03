<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
    /*
     * Constructor 
     */

    public function __construct() {
        parent::__construct();
    }

     /*
     * School Count
     */

    public function schoolCount() {
        $this->db->where('YEAR(date_added)', 2017);
        return $this->db->count_all_results('gsp_school');
    }

    public function getData() {
        return $this->db->select('a.*, b.name AS state_name,c.name As district_name')
                        ->from('gsp_school AS a')
                        ->join('states AS b', 'a.state=b.id', 'left')
						->join('cities AS c', 'a.district=c.id', 'left')
                        ->where('YEAR(a.date_added)', 2017)
                        ->order_by('a.id', 'desc')
                        ->get()->result();
    }
	
	public function totalschool()
	{
		return $this->db->select('a.*, b.name AS state_name,c.name As district_name')
					->from('gsp_school AS a')
					->join('states AS b', 'a.state=b.id', 'left')
					->join('cities AS c', 'a.district=c.id', 'left')
					->order_by('a.id', 'desc')
					->get()->result();
	}
	
	public function school_started_audit()
	{
		return $this->db->select('a.*, b.name AS state_name,c.name As district_name')
                        ->from('gsp_school AS a')
                        ->join('states AS b', 'a.state=b.id', 'left')
						->join('cities AS c', 'a.district=c.id', 'left')
						->where( 'progress >5')
						->order_by('a.id', 'desc')
						->get()->result();
	}
	
	public function getschool_started_audit() {
		$this->db->where('progress >', 5);
		return $this->db->count_all_results('gsp_school');
        
	}
	
	public function school_that_complete_audit()
	{
		return $this->db->select('a.*, b.name AS state_name,c.name As district_name')
					->from('gsp_school AS a')
					->join('states AS b', 'a.state=b.id', 'left')
					->join('cities AS c', 'a.district=c.id', 'left')
					->where('progress=100')
					->order_by('a.id', 'desc')
					->get()->result();
	}
	
	public function getschool_that_complete_audit() {
		$this->db->where('progress = 100');
		return $this->db->count_all_results('gsp_school');
        
	}
	
	public function getschool_that_submit_audit() {
		$this->db->where("status='1'");
		return $this->db->count_all_results('gsp_aduit_submitted');
	}
	
	public function getschool_that_submit_audit_data() {
		return $this->db->select('a.*,b.name AS state_name,c.name As district_name')
		            ->from('gsp_school AS a')
					->join('gsp_aduit_submitted AS e','e.userid=a.userid', 'left')
					->join('states AS b', 'a.state=b.id', 'left')
					->join('cities AS c', 'a.district=c.id', 'left')
					->where('e.status="1"')
					->get()->result();
	}
	
	
	public function school_start_but_not_complete()
	{
		return $this->db->select('a.*, b.name AS state_name,c.name As district_name')
					->from('gsp_school AS a')
					->join('states AS b', 'a.state=b.id', 'left')
					->join('cities AS c', 'a.district=c.id', 'left')
					->where('progress >', 5)
					->where('progress <', 100)
					->order_by('a.id', 'desc')
					->get()->result();
	}
	
	public function getschool_start_but_not_complete() {
		$this->db->where('progress >', 5);
		$this->db->where('progress <', 100);
		return $this->db->count_all_results('gsp_school');
        
	}
	
	public function schools_not_start_the_audit()
	{
		return $this->db->select('a.*, b.name AS state_name,c.name As district_name')
						->from('gsp_school AS a')
						->join('states AS b', 'a.state=b.id', 'left')
						->join('cities AS c', 'a.district=c.id', 'left')
						->where('progress=5')
						->order_by('a.id', 'desc')
						->get()->result();
	}
	
	public function getschools_not_start_the_audit() {
		$this->db->where('progress = 5');
		return $this->db->count_all_results('gsp_school');

    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/*******************************************************************/
	/**GSP Audit Pahse -2**/
	/*******************************************************************/
	public function schoolCount_phase_2() {
	    $this->db->where('YEAR(date_added)', 2017);
	    $this->db->where('date_added >', '2017-11-20 00:00:00');
        return $this->db->count_all_results('gsp_school') ;
	
    }

    public function getData_phase_2() {
        return $this->db->select('a.*, b.name AS state_name,c.name As district_name')
                        ->from('gsp_school AS a')
                        ->join('states AS b', 'a.state=b.id', 'left')
						->join('cities AS c', 'a.district=c.id', 'left')
                        ->where('YEAR(a.date_added)', 2017)
						->where('a.date_added >', '2017-11-20 00:00:00')
                        ->order_by('a.id', 'desc')
                        ->get()->result();
    }
	
	public function totalschool_phase_2()
	{
		return $this->db->select('a.*, b.name AS state_name,c.name As district_name')
					->from('gsp_school AS a')
					->join('states AS b', 'a.state=b.id', 'left')
					->join('cities AS c', 'a.district=c.id', 'left')
					->order_by('a.id', 'desc')
					->get()->result();
	}
	
	public function school_started_audit_phase_2()
	{
		return $this->db->select('a.*, b.name AS state_name,c.name As district_name')
                        ->from('gsp_school AS a')
                        ->join('states AS b', 'a.state=b.id', 'left')
						->join('cities AS c', 'a.district=c.id', 'left')
						->where('progress !=', 100)
						->where('a.date_added >', '2017-11-20 00:00:00')
						->order_by('a.id', 'desc')
						->get()->result();
	}
	
	public function getschool_started_audit_phase_2() {
		$this->db->where('progress<', 100);
		return $this->db->count_all_results('gsp_school')
		;
        
	}
	
	public function school_that_complete_audit_phase_2()
	{
		return $this->db->select('a.*, b.name AS state_name,c.name As district_name')
					->from('gsp_school AS a')
					->join('states AS b', 'a.state=b.id', 'left')
					->join('cities AS c', 'a.district=c.id', 'left')
					->where('progress=100')
					->where('date_added >', '2017-11-20 00:00:00')
					->order_by('a.id', 'desc')
					->get()->result();
	}
	
	public function getschool_that_complete_audit_phase_2() {
		$this->db->where('progress = 100');
		$this->db->where('date_added >', '2017-11-20 00:00:00');
		return $this->db->count_all_results('gsp_school');
        
	}
	
	public function getschool_that_submit_audit_phase_2() {
		$this->db->where("status='1'");
		$this->db->where('date_on >', '2017-11-20 00:00:00');
		return $this->db->count_all_results('gsp_aduit_submitted');
	}
	
	public function getschool_that_submit_audit_data_phase_2() {
		return $this->db->select('a.*,b.name AS state_name,c.name As district_name')
		            ->from('gsp_school AS a')
					->join('gsp_aduit_submitted AS e','e.userid=a.userid', 'left')
					->join('states AS b', 'a.state=b.id', 'left')
					->join('cities AS c', 'a.district=c.id', 'left')
					->where('e.status="1"')
					->where('date_added >', '2017-11-20 00:00:00')
					->get()->result();
	}
	
	
	public function school_start_but_not_complete_phase_2()
	{
		return $this->db->select('a.*, b.name AS state_name,c.name As district_name')
					->from('gsp_school AS a')
					->join('states AS b', 'a.state=b.id', 'left')
					->join('cities AS c', 'a.district=c.id', 'left')
					->where('progress >', 5)
					->where('progress <', 100)
					->order_by('a.id', 'desc')
					->get()->result();
	}
	
	public function getschool_start_but_not_complete_phase_2() {
		$this->db->where('progress >', 5);
		$this->db->where('progress <', 100);
		return $this->db->count_all_results('gsp_school');
        
	}
	
	public function schools_not_start_the_audit_phase_2()
	{
		return $this->db->select('a.*, b.name AS state_name,c.name As district_name')
						->from('gsp_school AS a')
						->join('states AS b', 'a.state=b.id', 'left')
						->join('cities AS c', 'a.district=c.id', 'left')
						->where('progress=5')
						->order_by('a.id', 'desc')
						->get()->result();
	}
	
	public function getschools_not_start_the_audit_phase_2() {
		$this->db->where('progress = 5');
		return $this->db->count_all_results('gsp_school');
    }
}



