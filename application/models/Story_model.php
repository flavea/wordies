<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Story_model extends CI_Model
{

	public function get_all_stories($limit = 0, $order_by = 1, $type = 0, $genre = 0, $rating = 0, $keyword = '') {

		if($limit == 0) $this->db->limit(10);
		if($order_by == 1) $this->db->order_by('stories.updated', 'desc');
		if($keyword != '') $this->db->or_like('stories.desc', $keyword);
		if($keyword != '') $this->db->like('stories.title', $keyword);
		if($rating != '') $this->db->where('stories.rating_id', $rating);
		if($type != '') $this->db->where('stories.type_id', $type);
		if($genre != '') $this->db->where('stories.genre_id', $genre);
		//$this->db->join('[story_stats]', '[story_stats].id = stories.id');
		$this->db->join('ratings', 'stories.rating_id = ratings.rating_id');
		$this->db->join('categories', 'stories.type_id = categories.category_id');
		$this->db->join('genres', 'stories.genre_id = genres.genre_id');
		//$this->db->select('stories.id, stories.name, stories.desc, stories.cover, genres.genre_name, categories.category_name, ratings.rating_name, [story_stats].chapters_count, [story_stats].views_count, [story_stats].comments_count, [story_stats].words_count, [story_stats].subsribers, [story_stats].votes');
		$query = $this->db->get('stories');
		return $query->result();

	}

	public function get_user_stories($user_id) {
		$this->db->where('stories.author_id', $user_id);
		$this->db->join('[story_stats]', '[story_stats].id = stories.id');
		$this->db->join('ratings', 'stories.rating_id = ratings.id');
		$this->db->join('categories', 'stories.type_id = categories.id');
		$this->db->join('genres', 'stories.genre_id = genres.id');
		$this->db->select('stories.id, stories.name, stories.desc, stories.cover, genres.genre_name, categories.category_name, ratings.rating_name, [story_stats].chapters_count, [story_stats].views_count, [story_stats].comments_count, [story_stats].words_count, [story_stats].subsribers, [story_stats].votes');
		$query = $this->db->get('stories');
		return $query->result();
	}

	public function insert_stories($array) {
		$this->db->where('stories.author_id', $user_id);
		$this->db->join('[story_stats]', '[story_stats].id = stories.id');
		$this->db->join('ratings', 'stories.rating_id = ratings.id');
		$this->db->join('categories', 'stories.type_id = categories.id');
		$this->db->join('genres', 'stories.genre_id = genres.id');
		$this->db->select('stories.id, stories.name, stories.desc, stories.cover, genres.genre_name, categories.category_name, ratings.rating_name, [story_stats].chapters_count, [story_stats].views_count, [story_stats].comments_count, [story_stats].words_count, [story_stats].subsribers, [story_stats].votes');
		$query = $this->db->get('stories');
		return $query->result();
	}
}