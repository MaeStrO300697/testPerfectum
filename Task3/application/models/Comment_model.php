<?php
/**
 * Created by PhpStorm.
 * User: artemiy
 * Date: 08.06.2020
 * Time: 01:47
 */

class Comment_model extends CI_Model
{
    public $id;
    public $content;
    public $user_id;

    public function __construct()
    {
        parent::__construct();
    }

    public function getComments(){
        $query = $this->db->query('SELECT * FROM comment');
        return $query->custom_result_object('Comment');
    }

    public function getCommentsWithUsers(){
        $query = $this->db->query('
                    SELECT * FROM comment
                    LEFT JOIN users on comment.user_id = users.id
                    ORDER BY comment.create_at DESC 
            ');
        if(!empty($query->result())){
            return $query->result();
        }
        return null;
    }
}