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

	public function get_user_stories($user_id, $status = 'all') {
		$this->db->order_by('stories.updated', 'desc');
		$this->db->where('stories.author_id', $user_id);
		if($status != 'all') {
			$this->db->where('stories.status', $status);
			//$this->db->join('[story_stats]', '[story_stats].id = stories.id');
			$this->db->join('ratings', 'stories.rating_id = ratings.id');
			$this->db->join('categories', 'stories.type_id = categories.id');
			$this->db->join('genres', 'stories.genre_id = genres.id');
		}
		//$this->db->select('stories.id, stories.name, stories.desc, stories.cover, genres.genre_name, categories.category_name, ratings.rating_name, [story_stats].chapters_count, [story_stats].views_count, [story_stats].comments_count, [story_stats].words_count, [story_stats].subsribers, [story_stats].votes');
		$query = $this->db->get('stories');
		return $query->result();
	}

	public function get_story_comments($story_id, $limit) {
		if($limit != null) $this->db->limit($limit);
		$this->db->where('chapters.story_id', $story_id);
		$this->db->join('chapters', 'chapters.id = comments.chapter_id');
		$query = $this->db->get('comments');
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
}