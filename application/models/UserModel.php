<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
	function store($email, $name, $userName, $password)
	{
		$sql = "INSERT INTO `users`(`email`, `name`, `username`, `password`) VALUES (?, ?, ?, ?)";
		$data = array($email, $name, $userName, $password);
		$this->db->query($sql, $data);
	}
	function findBy($column, $value)
	{
		$sql = "SELECT * from users where $column = ?";
		$data = array($value);

		$result = $this->db->query($sql, $data)->result();

		if ($result) return $result[0];

		return null;
	}
	function login($email, $password)
	{
		$sql = "SELECT id, name, username FROM users WHERE email = ? AND password = ?";
		$data = array($email, $password);
		return $this->db->query($sql, $data)->result()[0];
	}
}
