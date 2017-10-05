<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Audit_started extends CI_Controller {
    /*
     * Constructor 
     */

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('ADMIN_ID') == '') {
            redirect(base_url('admin/login'));
        }
        $this->load->model('admin/Audit_started_model');
        $this->load->helper(array('common_helper', 'form', 'download'));
        $this->load->library('form_validation');
    }

    public function index() {
        $data['main'] = 'admin/audit/audit_started';
        $data['title'] = 'Home | Audit Started';
        $data['record'] = $this->Audit_started_model->getData();
        $this->load->view('admin/includes/template', $data);
    }

    public function statewise() {
        $data['main'] = 'admin/audit/statewise';
        $data['title'] = 'Home | Audit State Wise';
        $data['states'] = getStates();
        //$data['record']=$this->Audit_started_model->getData();
        $this->load->view('admin/includes/template', $data);
    }

    public function search() {
        $data['main'] = 'admin/audit/search';
        $data['title'] = 'Home | Audit State Wise';
        $data['states'] = getStates();
        $data['val'] = $this->input->post('state');
        $data['record'] = $this->Audit_started_model->getDataSearch($this->input->post('state'));
        //echo '<pre>'; print_r($data['record']); exit;
        $this->load->view('admin/includes/template', $data);
    }

    /*
     * State Wise Excel Generation
     */

    public function excel($argID) {
        $this->load->dbutil();
        $row = $this->Audit_started_model->getExcelDataByState($argID);
        $name = 'registration2017_by_state.csv';
        force_download($name, $row);
    }

    /*
     * Send Feedback
     */

    public function feedback() {
        $data['main'] = 'admin/audit/feedback';
        $data['title'] = 'Home | Send Feedback';
        $data['school'] = $this->Audit_started_model->getCordinatorsEmail();
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        } else {
            //echo '<pre>';
            //print_r($this->input->post());
            //exit;
             $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => '7417rohitarora@gmail.com',
                'smtp_pass' => '123456',
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'wordwrap' => TRUE
            );
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
			$record = $this->input->post('email');
			
			
            for ($i = 0; $i < count($record); $i++) {
			 
                $rec=explode(',', $record[$i]);
				
			 // Set to, from, message, etc.
				$from = "7417rohitarora@gmail.com";
                $subject = $this->input->post('subject');
				$message=$this->input->post('message');
				$data['messag']=array($rec[0],
									$rec[1],
									$from,
									$subject,
									$message
									);
				//echo "<pre>";					
				//print_r($data['messag']);
              $msg = $this->load->view('admin/audit/template', $data, true);
			// print_r($msg);exit;
               $this->email->to($rec[0]);
			   $this->email->from($from, "GSP Team");
                $this->email->subject($subject);
             $this->email->message($msg);
			  if($this->email->send())
				{echo 'sucess';
				}else{echo 'failed';
				}
             // echo $this->email->print_debugger();
               // die();
          }
		   
        }
        $this->load->view('admin/includes/template', $data);
    }

    /*
     * Success Message
     */

    public function success() {
        //echo 'Hi'; exit;
        $this->load->view('admin/audit/template');
    }

}
