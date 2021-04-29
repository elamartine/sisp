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
    $this->load->model('ReportModel');
    $touristSpots = $this->TouristSpotModel->indexModerate();
    $reportSpots = $this->ReportModel->index();
    $data['touristSpots'] = array_merge($touristSpots, $reportSpots);

    $this->load->view('template/header', $data);
    $this->load->view('moderate/index', $data);
    $this->load->view('template/footer', $data);
  }
  public function approve($id)
  {
    $this->load->model('TouristSpotModel');
    $this->load->model('ReportModel');
    $this->TouristSpotModel->moderate('publish', $id);
    $this->ReportModel->update($id);

    return redirect('/moderate');
  }
  public function fail($id)
  {
    $this->load->model('TouristSpotModel');
    $this->TouristSpotModel->moderate('archived', $id);

    return redirect('/moderate');
  }
  public function publish($id)
  {
    $name = $this->input->post('name');
    $description = $this->input->post('description');
    $status = $this->input->post('status');

    $this->load->model('TouristSpotModel');
    $this->TouristSpotModel->update($id, $name, $description, 'publish');

    if ($status === 'moderate') {
      $this->load->model('ReportModel');
      $this->ReportModel->update($id);
    }

    return redirect('/');
  }
}
