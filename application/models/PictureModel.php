<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PictureModel extends CI_Model
{
  function store($path)
  {
    $sql = "INSERT INTO `pictures`(`path`) VALUES (?);";
    $data = array($path);
    return $this->db->query($sql, $data);
  }
  function show($path)
  {
    $sql = "SELECT id FROM `pictures` WHERE path = ?";
    $data = array($path);
    return $this->db->query($sql, $data)->result()[0];
  }
}
