<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
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
      redirect("/");
    }
  }
  public function delete()
  {
    if (!$this->session->userdata("user")) {
      redirect('/');
    }

    $this->session->unset_userdata("user");
    redirect("/");
  }
}
