<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
  function index()
  {
    $sql = "SELECT id, username, name, email FROM users";
    return $this->db->query($sql)->result();
  }
  function store($email, $name, $userName, $password)
  {
    $sql = "INSERT INTO `users`(`email`, `name`, `username`, `password`) VALUES (?, ?, ?, ?)";
    $data = array($email, $name, $userName, $password);
    $this->db->query($sql, $data);
  }
  function show($id)
  {
    $sql = "SELECT id, username, name, email FROM users WHERE id = ?";
    $data = array($id);
    return $this->db->query($sql, $data)->result();
  }
  function update($id, $email, $userName, $name)
  {
    $sql = "UPDATE users SET email = ?, username = ?, name = ? WHERE `users`.`id` = ?;";
    $data = array($email, $userName, $name, $id);
    $this->db->query($sql, $data);
  }
  function delete($id)
  {
    $sql = "DELETE from users where id = ?";
    $data = array($id);
    $this->db->query($sql, $data);
  }
  function login($email, $password)
  {
    $sql = "SELECT id, name, username FROM users WHERE email = ? AND password = ?";
    $data = array($email, $password);
    return $this->db->query($sql, $data)->result();
  }
}
