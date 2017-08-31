<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Basic_model extends CI_Model
{

	public function sp($sp_name, $array) {

	}

	public function get_types() {
		$query = $this->db->get('categories');
		return $query->result();

	}
	public function get_genres() {
		$query = $this->db->get('genres');
		return $query->result();
		
	}
	public function get_ratings() {
		$query = $this->db->get('ratings');
		return $query->result();
	}

	public function get_counts($user_id) {
		$this->db->where('target', $user_id);
		$this->db->where('flag', 0);
		$this->db->from('notifications');
		$notifications = $this->db->count_all_results();

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


		$count = $arrayName = array(
			'message' => 1,
			'notifications' => $notifications, 
			'comments' => $comments, 
			'messages' => $messages, 
			);
		return $count;
	}
}