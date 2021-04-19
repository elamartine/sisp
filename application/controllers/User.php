<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function store()
  {
    $data = array(
      "email" => $this->input->post("email"),
      "name" => $this->input->post("name"),
      "userName" => $this->input->post("userName"),
      "password" => $this->input->post("password"),
    );

    $this->load->model('UserModel');
    $hasWithUserName = $this->UserModel->findBy('username', $data['userName']);
    $hasWithEmail = $this->UserModel->findBy('email', $data['email']);

    if ($hasWithUserName && $hasWithEmail) {
      $this->session->set_flashdata('hasWithEmail', "Email já em uso");
      $this->session->set_flashdata('hasWithUserName', "Nome de usuário já em uso");
      $this->session->set_flashdata('errorDataRegister', $data);

      return redirect('/');
    } elseif ($hasWithUserName) {
      $this->session->set_flashdata('hasWithUserName', "Nome de usuário já em uso");
      $this->session->set_flashdata('errorDataRegister', $data);

      return redirect('/');
    } elseif ($hasWithEmail) {
      $this->session->set_flashdata('hasWithEmail', "Email já em uso");
      $this->session->set_flashdata('errorDataRegister', $data);

      return redirect('/');
    }

    $data['password'] = md5($data['password']);

    $this->UserModel->store($data['email'], $data['name'], $data['userName'], $data['password']);

    redirect('/');
  }
}
