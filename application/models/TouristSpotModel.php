<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TouristSpotModel extends CI_Model
{
  function index()
  {
    $sql = "SELECT * FROM `tourist_spots` JOIN `pictures` ON tourist_spots.thumbnail_id = pictures.id WHERE `status` = 'publish'";
    return $this->db->query($sql)->result();
  }
  function show($id)
  {
    $sql = "SELECT id, name, description FROM tourist_spots WHERE id = ?";
    $data = array($id);
    return $this->db->query($sql, $data)->result();
  }
  function indexModerate()
  {
    $sql = "SELECT * FROM `tourist_spots` JOIN `pictures` ON tourist_spots.thumbnail_id = pictures.id WHERE `status` = 'request'";
    return $this->db->query($sql)->result();
  }
  function store($name, $description, $lat, $lng, $location, $status, $pictureId, $userId)
  {
    $sql = "INSERT INTO `tourist_spots`(`name`, `description`, `lat`, `lng`, `location`, `status`, `thumbnail_id`, `created_by_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
    $data = array($name, $description, $lat, $lng, $location, $status, $pictureId, $userId);
    $this->db->query($sql, $data);

    return $this->db->insert_id();
  }
  function moderate($status, $id)
  {
    $sql = "UPDATE `tourist_spots` SET `status` = ? WHERE `tourist_spots`.`id` = ?";
    $data = array($status, $id);
    $this->db->query($sql, $data);
  }
  function update($id, $name, $description, $status)
  {
    $sql = "UPDATE tourist_spots SET name = ?, description = ?, status = ? WHERE `tourist_spots`.`id` = ?";
    $data = array($name, $description, $status, $id);
    $this->db->query($sql, $data);
  }
  function delete($id)
  {
    $sql = "DELETE from tourist_spots where id = ?";
    $data = array($id);
    $this->db->query($sql, $data);
  }
}
