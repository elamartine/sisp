<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TouristSpot extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata("user")) {
      redirect('/');
    }
  }

  public function store()
  {
    if (!$this->session->userdata("user")) {
      redirect('login/create');
    }
    $data = array(
      "name" => $this->input->post("name"),
      "description" => $this->input->post("description"),
      "lat" => $this->input->post("lat"),
      "lng" => $this->input->post("lng"),
      "userId" => $this->session->userdata("user")->id,
    );

    $picture = $_FILES['thumb'];
    $ext = explode('.', $picture['name']);
    $ext = $ext[sizeof($ext) - 1];
    $filename = uniqid('pic.', true);
    $filename = "$filename.$ext";

    $cfg_upload = array(
      "upload_path" => "./uploads/pictures/",
      "allowed_types" => "jpg|png",
      "file_name" => $filename,
      "max_size" => "100",
    );

    $this->load->library('upload');
    $this->upload->initialize($cfg_upload);

    if (!$this->upload->do_upload('thumb')) {
      $this->session->set_flashdata('errorUpload', 'Ocorreu um erro ao fazer upload da imagem, tente novamente mais tarde');
      $this->session->set_flashdata('errorUploadData', $data);
      return redirect('/');
    }

    $this->load->model('TouristSpotModel');
    $this->load->model('PictureModel');
    $this->PictureModel->store($filename);
    $pictureId = $this->PictureModel->show($filename)->id;

    $this->TouristSpotModel->store($data['name'], $data['description'], $data['lat'], $data['lng'], $pictureId, $data['userId']);

    $this->session->set_flashdata('successStore', "Ponto turistíco criado com sucesso!");

    return redirect('/');
  }
}
