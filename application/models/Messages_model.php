<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Model
*
* Author:  Ben Edmunds
* 		   ben.edmunds@gmail.com
*	  	   @benedmunds
*
* Added Awesomeness: Phil Sturgeon
*
* Location: http://github.com/benedmunds/CodeIgniter-Ion-Auth
*
* Created:  10.01.2009
*
* Description:  Modified auth system based on redux_auth with extensive customization.  This is basically what Redux Auth 2 should be.
* Original Author name has been kept but that does not mean that the method has not been modified.
*
* Requirements: PHP5 or above
*
*/

class Messages_model extends CI_Model
{

	public function get_user_messages($id) {
		$this->db->select('message_id')
		$this->db->from('id', '')

		$this->db->where_in('id', '')
		$this->db->join('users', 'users.id = messages_header.sender');
		$query = $this->db->get('messages_header');
		return $query->result();
		
	}
}