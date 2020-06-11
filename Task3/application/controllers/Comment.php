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
        //echo "<pre>";
        if (!empty($data['comments'])) {
            $this->load->library('pagination');
            $this->pagination->setBaseUrl(base_url());
            $this->pagination->setTotalElements(171);
            $this->pagination->setElementsForShow(10);
            $this->pagination->setNumLinks(3);
            $this->pagination->setPath('index.php/comment/pagination/');
            $this->pagination->setCurPage(12);
            $data['links'] = $this->pagination->createLinks();
        }
        $this->load->view('comment', $data);
    }

    public function pagination($page){
        echo $page;
    }
}