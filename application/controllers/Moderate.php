<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Moderate extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata("user") || $this->session->userdata("user")->role === 'common') {
      redirect('/');
    }
  }

  public function index()
  {
    $data['logged'] = !!$this->session->userdata("user");

    $this->load->model('TouristSpotModel');
    $data['touristSpots'] = $this->TouristSpotModel->indexModerate();

    $this->load->view('template/header', $data);
    $this->load->view('moderate/index', $data);
    $this->load->view('template/footer', $data);
  }
  public function approve($id)
  {
    $this->load->model('TouristSpotModel');
    $this->TouristSpotModel->moderate('publish', $id);

    return redirect('/moderate');
  }
  public function fail($id)
  {
    $this->load->model('TouristSpotModel');
    $this->TouristSpotModel->moderate('archived', $id);

    return redirect('/moderate');
  }
}
