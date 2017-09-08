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


	public function simple_select($table, $where = null, $select = '*', $limit = null, $start = 0) {
		if($limit != null) $this->db->limit($limit, $start);
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


	public function count_all($table, $where)
	{
		$this->db->where($where);
		$this->db->from($table);
		$count = $this->db->count_all_results();
		return $count;
	}

	public function get_counts($user_id) {
		$notifications = $this->count_all('notifications', $data = array('target' => $user_id, 'flag' => 0));

		$this->db->where('message_replies.sender', $user_id);
		$this->db->where("STR_TO_DATE(message_replies.date,'%m/%d/%Y') >", "STR_TO_DATE(message_log.time,'%m/%d/%Y')");
		$this->db->join('message_logs', 'message_replies.message_id = message_logs.message_id', 'left');
		$this->db->join('message_mapping', 'message_replies.sender = message_mapping.user_id');
		$this->db->from('message_replies');
		$messages = $this->db->count_all_results();

		$this->db->where("comments.flag", 0);
		$this->db->where('stories.author_id', $user_id);
		$this->db->join('chapters', 'comments.chapter_id = chapters.id');
		$this->db->join('stories', 'chapters.story_id = stories.id');
		$this->db->from('comments');
		$comments = $this->db->count_all_results();


		$count = array(
			'message' => 1,
			'notifications' => $notifications, 
			'comments' => $comments, 
			'messages' => $messages, 
			);
		return $count;
	}

}