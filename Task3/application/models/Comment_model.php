<?php
/**
 * Created by PhpStorm.
 * User: artemiy
 * Date: 08.06.2020
 * Time: 01:47
 */

class Comment_model extends CI_Model
{
    /**
     * @var $id int
     */
    public $id;
    /**
     * @var $content string
     */
    public $content;
    /**
     * @var $user_id int
     */
    public $user_id;

    /**
     * Comment_model constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function getComments(){
        $query = $this->db->query('SELECT * FROM comment');
        return $query->custom_result_object('Comment');
    }

    /**
     * @return null | array
     */
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

    /**
     * @param $start
     * @param $countElement
     * @return null | array
     */
    public function  getCommentsLimits($start, $countElement){
        $query = $this->db->query("
                    SELECT comment.*, users.email, users.username FROM comment
                    LEFT JOIN users on comment.user_id = users.id
                    ORDER BY comment.create_at DESC 
                    LIMIT $start, $countElement;
            ");
        if(!empty($query->result())){
            return $query->result();
        }
        return null;
    }

    public function addComment($comment){
        $sql = "INSERT INTO users (email, username) VALUES(?, ?)";
        try {
            $createUser = $this->db->query($sql, [$comment['email'], $comment['username']]);
            if ($createUser === true) {
                $createComment = $this->db->query("INSERT INTO comment(content, user_id) VALUES (?, LAST_INSERT_ID())", [$comment['commentArea']]);
                if($createComment === true){
                    return true;
                }
            }
        }catch (Exception $e){
            return null;
        }
        return null;
    }
}