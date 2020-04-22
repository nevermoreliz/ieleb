<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library("parser");
		$this->load->library("Form_validation");

		$this->load->database();

		$this->load->helper("form");

		

		
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

	// Tabla IGLESIAS
	public function iglesia_create()
	{
		// con esto preguntamos resivimos datos del formulario
		if ($this->input->server('REQUEST_METHOD')=="POST") {
			$this->form_validation->set_rules('nombre','nombre','required');

			// salvar los datos
			if ($this->form_validation->run()) {
				// nuestro formulario es valido
				$save = array(
					'nombre' => $this->input->post("nombre"),
					'estado' => $this->input->post("estado")
				);
				$id_iglesia = $this->Iglesia_model->insert($save);
			}else {
				 echo validation_errors();
			}
		}

		$view["body"]=$this->load->view("admin/iglesias/save",null,true);
		$view["title"]="Ingrese Una Iglesia";
		$this->parser->parse("admin/template/base",$view);
	}
}
