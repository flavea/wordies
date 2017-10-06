<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Basic_model extends CI_Model
{

	public function sp($sp_name, $data) {
		$q = '';
		foreach($array as $key => $val)
		{
			$q .= '?';
		}
		
		$procedure = 'CALL '.$sp_name.'('.$q.')';
	
		$query = $this->db->query($procedure, $data);
		mysqli_next_result($this->db->conn_id);
		return $query->result();
	}


	public function simple_select($table, $where = null, $select = '*', $limit = null, $start = 0, $order_by = null) {
		if($limit != null) $this->db->limit($limit, $start);
		if($order_by != null) $this->db->order_by($order_by, 'desc');
		if($where != null) $this->db->where($where);
		$this->db->select($select);
		$this->db->from($table);
		$query = $this->db->get();
		return $query->result();
	}

	public function insert($table, $data) {
		$last_id = 0;
	    $this->db->insert($table, $data);
	    $last_id = $this->db->insert_id();
		return $last_id;
	}

	public function delete($table, $where) {
		$this->db->where($where);
	    return $this->db->delete($table); 
	}

	public function update($table, $data, $where)
	{
		$this->db->where($where);
		return $this->db->update($table, $data);
	}


	public function count($table, $where = null, $keyword = null)
	{
		if($keyword != null) {
			$this->db->like('title', $keyword);
			$this->db->or_like('desc', $keyword);
		}
		if($where != null) $this->db->where($where);
		$this->db->from($table);
		$count = $this->db->count_all_results();
		return $count;
	}

	public function sum($table, $what, $where = null, $keyword = null)
	{
		if($keyword != null) {
			$this->db->like('title', $keyword);
			$this->db->or_like('desc', $keyword);
		}
		if($where != null) $this->db->where($where);
		$this->db->select_sum($what);
		$query = $this->db->get($table);
		return $query->result();
	}

	public function get_counts($user_id) {
		$notifications = $this->count('notifications', $data = array('target' => $user_id, 'flag' => 0, 'type' => 1));

		$messages = $this->count('notifications', $data = array('target' => $user_id, 'flag' => 0, 'type' => 3));

		$comments = $this->count('notifications', $data = array('target' => $user_id, 'flag' => 0, 'type' => 2));


		$count = array(
			'notifications' => $notifications, 
			'comments' => $comments, 
			'messages' => $messages,
			'total' => $notifications + $comments + $messages
			);
		return $count;
	}

}