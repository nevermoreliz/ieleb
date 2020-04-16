<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2019, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2019, British Columbia Institute of Technology (https://bcit.ca/)
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/libraries/config.html
 */
class CI_Model {

	/**
	 * Class constructor
	 *
	 * @link	https://github.com/bcit-ci/CodeIgniter/issues/5332
	 * @return	void
	 */
	public function __construct() {}

	/**
	 * __get magic
	 *
	 * Allows models to access CI's loaded classes using the same
	 * syntax as controllers.
	 *
	 * @param	string	$key
	 */
	public function __get($key)
	{
		// Debugging note:
		//	If you're here because you're getting an error message
		//	saying 'Undefined Property: system/core/Model.php', it's
		//	most likely a typo in your model code.
		return get_instance()->$key;
	}


	// Crud Tables db_ieleb

	public function findAll()
	{
		$this->db->select();
		$this->db->from($this->table);
		$query = $this->db->get();
		// result es para capturar en un json varios datos
		return $query->result();
	}

	public function find($id)
	{
		$this->db->select();
		$this->db->from($this->table);
		$this->db->where($this->table_id,$id);
		$query=$this->db->get();
		// row es para capturar los datos pero de un solo registro
		return $query->row();
	}

	public function update($id,$data)
	{
		$this->db->where($this->table_id,$id);
		// $data aqui esta los datos del formulario
		$this->db->update($this->table,$data);
	}

	public function delete($id)
	{
		$this->db->where($this->table_id,$id);
		$this->db->delete($this->table);
	}

	public function insert($data)
	{
		$this->db->insert($this->table,$data);
		// este return retorna un id cuando esta en autoincrement
		return $this->db->insert_id();
	}

	public function count()
	{
		$count= $this->db->query("SELECT $this->table_id FROM $this->table");
		return $count->num_rows();
	}

}
