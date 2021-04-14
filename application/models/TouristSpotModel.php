<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TouristSpotModel extends CI_Model
{
  function index()
  {
    $sql = "SELECT id, name, description from tourist_spots";
    return $this->db->query($sql)->result();
  }
  function store($name, $description, $userId)
  {
    $sql = "INSERT INTO `tourist_spots`(`name`, `description`, `created_by_id`) VALUES (?, ?, ?)";
    $data = array($name, $description, $userId);
    $this->db->query($sql, $data);
  }
  function show($id)
  {
    $sql = "SELECT id, name, description FROM tourist_spots WHERE id = ?";
    $data = array($id);
    return $this->db->query($sql, $data)->result();
  }
  function update($id, $name, $description)
  {
    $sql = "UPDATE tourist_spots SET name = ?, description = ? WHERE `tourist_spots`.`id` = ?;";
    $data = array($name, $description, $id);
    $this->db->query($sql, $data);
  }
  function delete($id)
  {
    $sql = "DELETE from tourist_spots where id = ?";
    $data = array($id);
    $this->db->query($sql, $data);
  }
}
