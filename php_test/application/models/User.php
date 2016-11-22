<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class User extends CI_Model{

	public function create($data) {
		$sql = "INSERT INTO users
		(first_name, 
		last_name, 
		email, 
		password,
		confirm_password,
		total_pokes,
		created_at, 
		updated_at) VALUES (?,?,?,?,?,0,NOW(),NOW())";
		$this->db->query($sql, array(
			$data['first_name'], 
			$data['last_name'], 
			$data['email'], 
			$data['password'], 
			$data['confirm_password']
			// date('F jS, Y g:i a'),
			// date('F jS, Y g:i a')
			));
	 }

	 public function get_by_email($email){
	 	$sql = "SELECT * FROM users where email = ?";
	 	return $this->db->query($sql, $email)->row_array();
	 }

	 public function get_by_id($id){
	 	$sql = "SELECT * FROM users where id = ?";
	 	return $this->db->query($sql, $id)->row_array();
	 }


	 public function get_all_users() {
	 	$sql = "SELECT * FROM users";
	 	$data = $this->db->query($sql)->result_array();
	 	return $data;
	 }

	 public function poke_user($id){
	 	
	 	//increment user's total_pokes count
	 	$user = $this->get_by_id($id);
	 	$sql = "UPDATE users SET total_pokes = ? WHERE id = {$id}";
	 	$updated_count = intval($user['total_pokes']);
	 	$updated_count++;
	 	$this->db->query($sql, $updated_count);

	 }

}
?>