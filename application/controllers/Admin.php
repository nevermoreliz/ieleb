<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library("parser");
	}

	public function index()
	{
		redirect('admin/inicio');

	}

	public function inicio()
	{

		$view["body"]=$this->load->view("admin/index",null,true);
		$view["title"]="Panel Principal";
		$this->parser->parse("admin/template/base",$view);
	}

	public function post_save()
	{
		$view["body"]=$this->load->view("admin/pastores/save",null,true);
		$view["title"]="HOLA";
		$this->parser->parse("admin/template/base",$view);
	}

}
