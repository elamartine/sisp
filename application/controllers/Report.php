<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata("user")) {
      redirect('/');
    }
  }
  public function store($id)
  {
    $reason = $this->input->post('reason');

    $this->load->model('ReportModel');
    $this->load->model('TouristSpotModel');
    $this->ReportModel->store($id, $this->session->userdata('user')->id, $reason);
    $this->TouristSpotModel->moderate('moderate', $id);

    return redirect('/');
  }
}
