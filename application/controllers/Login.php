<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
  public function index()
  {
    redirect('/login/create');
  }
  public function create()
  {
    $this->load->view('template/header');
    $this->load->view('login/create');
    $this->load->view('template/footer');
  }
  public function store()
  {
    $email = $this->input->post("email");
    $password = $this->input->post("password");

    $this->load->model('UserModel');
    $user = $this->UserModel->login($email, md5($password))[0];

    if ($user) {
      $this->session->set_userdata("user", $user);
      redirect('/');
    } else {
      $this->session->set_flashdata("msg", "Login ou senha inválidos");
      redirect("/login/create");
    }
  }
  public function delete()
  {
    $this->session->unset_userdata("user");
    redirect("/login/create");
  }
}
