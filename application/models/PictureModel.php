<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PictureModel extends CI_Model
{
  function store($path)
  {
    $sql = "INSERT INTO `pictures`(`path`) VALUES (?);";
    $data = array($path);
    $this->db->query($sql, $data);

    return $this->db->insert_id();
  }
  function show($path)
  {
    $sql = "SELECT id FROM `pictures` WHERE path = ?";
    $data = array($path);
    return $this->db->query($sql, $data)->result()[0];
  }
  function insertTouristId($id, $touristSpotId)
  {
    $sql = "UPDATE `pictures` SET `tourist_spot_id` = ? WHERE `pictures`.`id` = ?";
    $data = array($touristSpotId, $id);
    $this->db->query($sql, $data);
  }
}
