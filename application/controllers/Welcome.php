<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {



	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function test()
	{
		$this->load->view('admin/template/base');
	}

	public function post_save()
	{
		$view["body"]=$this->load->view("admin/pastores/save",null,true);
		$this->parser->parse("admin/template/base",$view);
	}

}
