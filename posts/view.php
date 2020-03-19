<?php
require_once 'header.php';
require_once 'Post.php';
require_once 'Comment.php';
$comments = new Comment($db);
$posts = new Post($db);

?>

<div class="container">
    <div class="row justify-content-center">
        <?php foreach ($posts->getSinglePost($_GET['slug']) as $post) { ?>
        <div class="card">
            <img src="images/<?=$post['image']?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?=$post['title'];?></h5>
                <p class="card-text"><?= $post['description'];?></p>
            </div>
        </div>
        <?php } ?>
    </div>
    <h4>Comments: <?=$comments->countComments($_GET['slug'])?></h4>
    <?php
    if (isset($_POST['btnComment'])) {
        $date = date('Y-m-d');
        $status = 0;
        if (!empty($_POST['name'] and $_POST['name']!='') && !empty($_POST['email']and $_POST['email']!='') && !empty($_POST['description']and $_POST['description']!='')) {
            $result = $comments->comment(trim(strip_tags($_POST['name'])), trim(strip_tags($_POST['email'])), trim(strip_tags($_POST['subject'])),
                trim(strip_tags($_POST['description'])), strip_tags($_GET['slug']),$date,$status);
            if ($result == true){
                echo "comment added succesfully!!";
            }
        }else{
            echo "Name,email and description fiels are compulsory!";
        }
    }
            ?>
    <form action=""method="post">
        <div class="col-md-4">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text"name="name"class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email"name="email"class="form-control">
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text"name="subject"class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-outline-success" name="btnComment">Comment</button>
            </div>
        </div>
    </form>

    <?php foreach ($comments->getCommentsBySlug($_GET['slug']) as $comment) { ?>
        <?php if ($comment['status']!=0) { ?>
    <div class="media">
        <div class="media-left media-top mr-2">
            <img src="/images/avatar.jpg" class="media-object  " style="width: 100px">
        </div>
        <div class="media-body">
            <strong><?=$comment['name']?></strong>
            <p><?=$comment['description']?></p>
        </div>
    </div>
        <?php } ?>
    <?php } ?>
</div>
