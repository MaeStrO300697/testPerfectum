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

    public function pagination($page = 1){
        $this->load->model('comment_model');
        $amountComments = $this->comment_model->getCommentsWithUsers();
        $data['comments'] = [];
        /////Количество елементов для показа
        $elementsForShow = 5;
        //Получаем данные с метода getCommentsLimits модели
        if ($page == 1 ){
            $data['comments'] = $this->comment_model->getCommentsLimits($page - 1,$elementsForShow);
        }
        if($page >= 2){
            $data['comments'] = $this->comment_model->getCommentsLimits($elementsForShow * ($page - 1),$elementsForShow);
        }

        if (!empty($data['comments'])) {
            $this->load->library('pagination');
            $this->pagination->setBaseUrl(base_url());
            $this->pagination->setTotalElements(count($amountComments));
            $this->pagination->setElementsForShow($elementsForShow);
            $this->pagination->setNumLinks(3);
            $this->pagination->setPath('index.php/comment/pagination/');
            $this->pagination->setCurPage($page);
            $data['links'] = $this->pagination->createLinks();
        }
        $this->load->view('comment', $data);
    }

    public function add(){
        if(empty($_POST)){
            return null;
        }
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|min_length[5]|max_length[32]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');//
        $this->form_validation->set_rules('commentArea', 'Comment', 'required|min_length[5]|max_length[512]');
        if ($this->form_validation->run() === TRUE)
        {
            ////правильные данные формы
            $this->load->model('comment_model');
            if(empty($_POST['username'])){
                $_POST['username'] = explode('@',$_POST['email'])[0];
            }
            if($this->comment_model->addComment($_POST)){
                header("Location: " . base_url());
            }
        }
    }
}