<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata("user")) {
			redirect('login/create');
		}
	}
	public function index()
	{
		$this->load->model('UserModel');

		$data['users'] = $this->UserModel->index();

		$this->load->view('template/header');
		$this->load->view('user/index', $data);
		$this->load->view('template/footer');
	}
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

		redirect('user');
	}
	public function create()
	{
		$this->load->view('template/header');
		$this->load->view('user/create');
		$this->load->view('template/footer');
	}
	public function edit($id)
	{
		$this->load->model('UserModel');
		$data['user'] = $this->UserModel->show($id)[0];
		$this->load->view('template/header');
		$this->load->view('user/edit', $data);
		$this->load->view('template/footer');
	}
	public function update($id)
	{
		$email = $this->input->post("email");
		$name = $this->input->post("name");
		$userName = $this->input->post("userName");

		$this->load->model('UserModel');
		$this->UserModel->update($id, $email, $userName, $name);

		$this->session->set_flashdata('msg', "Usuário editado com sucesso!");

		redirect('user');
	}
	public function delete($id)
	{
		$this->load->model('UserModel');
		$this->UserModel->delete($id);

		$this->session->set_flashdata('msg', "Usuário excluído com sucesso!");

		redirect('user');
	}
}
