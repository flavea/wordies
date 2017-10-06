<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Story_model extends CI_Model
{

	public function browse_stories($where = null, $limit = null, $start = 0, $order_by = null, $keyword = null) {
		if($limit != null) $this->db->limit($limit, $start);
		if($order_by != null) $this->db->order_by($order_by, 'desc');
		if($keyword != null) {
			$this->db->like('title', $keyword);
			$this->db->or_like('desc', $keyword);
		}
		if($where != null) $this->db->where($where);
		$query = $this->db->get('stories_view');
		return $query->result();
	}

	public function get_comments($chapter) {
		$this->db->order_by('created', 'asc');
		$this->db->where('comments.chapter_id', $chapter);
		$this->db->join('users', 'comments.user_id = users.id', 'left');
		$this->db->select('comments.id, comments.comment, comments.user_id, comments.created, users.username');
		$this->db->from('comments');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_parent_comments($id) {
		$this->db->order_by('created', 'asc');
		$this->db->where('comments.id', $id);
		$this->db->join('users', 'comments.user_id = users.id', 'left');
		$this->db->select('comments.id, comments.comment, comments.user_id, comments.created, users.username');
		$this->db->from('comments');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_child_comments($id) {
		$this->db->order_by('created', 'asc');
		$this->db->where('comments.parent_id', $id);
		$this->db->join('users', 'comments.user_id = users.id', 'left');
		$this->db->select('comments.id, comments.comment, comments.user_id, comments.created, users.username');
		$this->db->from('comments');
		$query = $this->db->get();
		return $query->result();
	}


	public function get_relations($id) {
		$this->db->where('character_relations.char1', $id);
		$this->db->join('characters', 'characters.id = character_relations.char2');
		$this->db->select('character_relations.id, character_relations.desc, characters.name');
		$this->db->from('character_relations');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_shared_stories($id) {
		$this->db->where('share_mapping.user_id', $id);
		$this->db->join('stories', 'share_mapping.story_id = stories.id');
		$this->db->select('*');
		$this->db->from('share_mapping');
		$query = $this->db->get();
		return $query->result();
	}
}