<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
  public function store()
  {
    $this->load->model('UserModel');

    if ($this->input->post("loginType") && ($this->input->post("loginType") == "google")) {
      $hasWithEmail = $this->UserModel->findBy('email', $this->input->post("email"));

      if (!$hasWithEmail) {
        $this->UserModel->store($this->input->post('email'), $this->input->post('name'), $this->input->post('userName'), $this->input->post('password'));
      }

      $user = $this->UserModel->loginGoogle($this->input->post('email'));

      $this->session->set_userdata("user", $user);
  
      redirect('/');
    } else {
      $data = array(
        "email" => $this->input->post("email"),
        "password" => $this->input->post("password"),
      );
      
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
