<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: maestro300697
 * Date: 08.06.2020
 * Time: 00:23
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Comment</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-2">

        </div>
        <div class="col-8">

            <form method="post" action="<?=base_url();?>index.php/comment/add">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" id="username" name="username" placeholder="ФИО/Username">
                    </div>
                    <div class="col">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>

                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="form-group">
                            <textarea class="form-control" name="commentArea" id="commentArea" rows="3" placeholder="Текст комментария" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10"></div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-2">

        </div>
    </div>
    <hr style="width: 100%; color: #f7f7f7; height: 3px; background-color:#f7f7f7;">
    <?php
    foreach ($comments as $comment) {
        ?>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-2"><?= $comment->username ?></div>
                    <div class="col-8"></div>
                    <div class="col-2 float-right"><?= date("d.m.Y H:i", strtotime($comment->create_at)); ?></div>
                </div>
            </div>
            <div class="card-body">
                <p><?= $comment->content ?></p>
            </div>
        </div>
        <hr>
        <?php

    }
    ?>
    <?=$links?>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>


