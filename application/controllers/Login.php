<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
  public function store()
  {
    $data = array(
      "email" => $this->input->post("email"),
      "password" => $this->input->post("password"),
    );

    $this->load->model('UserModel');
    $user = $this->UserModel->login($data["email"], md5($data["password"]));

    if ($user) {
      $this->session->set_userdata("user", $user);

      redirect('/');
    } else {
      $this->session->set_flashdata("loginError", "Email ou senha inválidos");
      $this->session->set_flashdata('errorDataLogin', $data);

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
