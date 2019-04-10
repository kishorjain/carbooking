<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maincontroller extends CI_Controller {
	public function __construct() {
    //load database in autoload libraries 
      parent::__construct(); 
      $this->load->model('mainmodel');         
   }

	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function cars()
	{
		$cars=new mainmodel();
		$data['data']=$cars->getAvailablecars();
		$this->load->view('header');
		$this->load->view('showcars',$data);

	}
	public function carbooking($carId)
	{
		$cars=new mainmodel();
		$data['data']=$cars->getcardetail($carId);
		$this->load->view('header');
		$this->load->view('carbooking',$data);
	}
	public function book(){
		$id=$this->input->post('carId');
		$userId=$this->input->post('userId');
		$scheduletime=$this->input->post('scheduletime');
		$droptime=$this->input->post('droptime');
		$data=array('carId'=>$id,'userId'=>$userId,'scheduledate'=>$scheduletime,'dropat'=>$droptime,'create_ts'=>date('Y-m-d h:m:s'));
		$cars=new mainmodel();
		$data['result']=$cars->booking($data);
		
		$this->load->view('messages',$data);
	}

}