<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class PokeUser extends User{

	public function __construct(){
    	parent::__construct();
	}

	public function poke_the_user($poked_id){
		//insert data for poke_users
	 	$poker_id = $this->session->userdata('id');
		$sql = "SELECT * FROM poke_users WHERE poked = {$poked_id} && poker = {$poker_id}";
		$pokedata = $this->db->query($sql)->row_array();
	 	if($pokedata){
			$sql = "UPDATE poke_users SET poke_count = ? WHERE id = {$pokedata['id']}";
	 		$updated_count = intval($pokedata['poke_count']);
	 		$updated_count++;
	 		$this->db->query($sql, $updated_count);
		}
		else{
	 		$sql = "INSERT INTO poke_users
			(poker, 
			poked, 
			poke_count,
			name) VALUES (?,?,?,?)";
			$this->db->query($sql, array($poker_id, $poked_id, 1, $this->session->userdata('firstname')));
		}
	}

	public function get_all_pokes(){
		$sql = "SELECT * FROM poke_users";
	 	$data = $this->db->query($sql)->result_array();
	 	return $data;
	}
}

?>