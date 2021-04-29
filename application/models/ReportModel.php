<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportModel extends CI_Model
{
  function index()
  {
    $sql = "SELECT * FROM `reports` JOIN `tourist_spots` ON `reports`.`tourist_spot_id` = `tourist_spots`.`id` JOIN `pictures` ON `pictures`.`tourist_spot_id` = `tourist_spots`.`id` WHERE `reports`.`status` = 'open'";
    return $this->db->query($sql)->result();
  }
  function store($touristSpotId, $userId, $reason)
  {
    $sql = "INSERT INTO `reports`(`tourist_spot_id`, `user_id`, `reason`) VALUES (?, ?, ?);";
    $data = array($touristSpotId, $userId, $reason);
    $this->db->query($sql, $data);
  }
  function update($touristSpotId)
  {
    $sql = "UPDATE reports SET status = 'resolved' WHERE `tourist_spot_id` = ?";
    $data = array($touristSpotId);
    $this->db->query($sql, $data);
  }
}
