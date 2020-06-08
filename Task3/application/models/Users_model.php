<?php
/**
 * Created by PhpStorm.
 * User: artemiy
 * Date: 08.06.2020
 * Time: 00:36
 */

class Users_model extends CI_Model
{
    /**
     * @var int $id
     */
    public $id;
    /**
     * @var string $email
     */
    public $email;
    /**
     * @var string $email
     */
    public $username;

    /**
     * Users constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array Users
     */
    public function getUsers(){
        $query = $this->db->query('SELECT * FROM users');
        return $query->custom_result_object('Users');
    }

    public function getUsersWithComment(){
        $query = $this->db->query('
                    SELECT * FROM users
                    LEFT JOIN comment on comment.user_id = users.id
            ');
        return $query->result();
    }

}