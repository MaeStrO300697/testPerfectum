<?php

/**
 * Created by PhpStorm.
 * User: maestro300697
 * Date: 08.06.2020
 * Time: 00:21
 */

defined('BASEPATH') OR exit('No direct script access allowed');


class Comment extends CI_Controller
{

    public function index()
    {
        $this->load->model('comment_model');
        $data['comments'] = $this->comment_model->getCommentsWithUsers();
        if (!empty($data['comments'])) {
            $this->load->library('pagination');
            $config['base_url'] = base_url();
            $config['total_rows'] = count($data['comments']);

            $config['per_page'] = 5;
            $this->pagination->initialize($config);
            $data['links'] = $this->pagination->create_links();
        }
        $this->load->view('comment', $data);
    }
}