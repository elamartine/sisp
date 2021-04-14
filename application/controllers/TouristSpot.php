<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TouristSpot extends CI_Controller
{
  public function index()
  {
    $data['logged'] = !!$this->session->userdata("user");
    $this->load->model('TouristSpotModel');

    $data['touristSpots'] = $this->TouristSpotModel->index();

    $this->load->view('template/header');
    $this->load->view('touristSpot/index', $data);
    $this->load->view('template/footer');
  }
  public function store()
  {
    if (!$this->session->userdata("user")) {
      redirect('login/create');
    }

    $name = $this->input->post("name");
    $description = $this->input->post("description");
    $userId = $this->session->userdata("user")->id;

    $this->load->model('TouristSpotModel');
    $data['users'] = $this->TouristSpotModel->store($name, $description, $userId);

    $this->session->set_flashdata('msg', "Ponto turistíco criado com sucesso!");

    redirect('touristSpot');
  }
  public function create()
  {
    if (!$this->session->userdata("user")) {
      redirect('login/create');
    }

    $this->load->view('template/header');
    $this->load->view('touristSpot/create');
    $this->load->view('template/footer');
  }
  public function edit($id)
  {
    if (!$this->session->userdata("user")) {
      redirect('login/create');
    }

    $this->load->model('TouristSpotModel');
    $data['touristSpot'] = $this->TouristSpotModel->show($id)[0];

    $this->load->view('template/header');
    $this->load->view('touristSpot/edit', $data);
    $this->load->view('template/footer');
  }
  public function update($id)
  {
    if (!$this->session->userdata("user")) {
      redirect('login/create');
    }

    $name = $this->input->post("name");
    $description = $this->input->post("description");

    $this->load->model('TouristSpotModel');
    $this->TouristSpotModel->update($id, $name, $description);

    $this->session->set_flashdata('msg', "Ponto turistíco atualizado com sucesso!");

    redirect('touristSpot');
  }
  public function delete($id)
  {
    if (!$this->session->userdata("user")) {
      redirect('login/create');
    }

    $this->load->model('TouristSpotModel');
    $this->TouristSpotModel->delete($id);

    $this->session->set_flashdata('msg', "Ponto turistíco excluído com sucesso!");

    redirect('touristSpot');
  }
}
