<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
  public function index()
  {
    $data['logged'] = !!$this->session->userdata("user");

    $this->load->model('TouristSpotModel');
    $data['touristSpots'] = $this->TouristSpotModel->index();

    $this->load->view('template/header', $data);
    $this->load->view('index', $data);
    $this->load->view('template/footer', $data);
  }
}
