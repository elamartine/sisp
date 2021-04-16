<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function store()
	{
		$email = $this->input->post("email");
		$name = $this->input->post("name");
		$userName = $this->input->post("userName");
		$password = $this->input->post("password");
		$password = md5($password);

		$this->load->model('UserModel');
		$data['users'] = $this->UserModel->store($email, $name, $userName, $password);

		$this->session->set_flashdata('msg', "Usuário criado com sucesso!");

		redirect('/');
	}
}
