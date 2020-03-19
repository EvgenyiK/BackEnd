<?php
require_once 'session.php';
require_once 'header.php';
require_once 'Post.php';
$posts = new Post($db);
?>


<div class="container">
    <h2>All Posts</h2>
    <a href="comments.php" style="float: right">Comments</a>
    <?php
    if (!empty($_SESSION['username'])){
        echo "Hello , {$_SESSION['username']}";
    }else{
        echo "You not logged in!";
    }
    ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($posts->getPost() as $post) { ?>
            <tr>
                <td><?=$post['title']?></td>
                <td><?=substr($post['description'],0,50)?></td>
                <td><?=date('Y-m-d',strtotime($post['created_at']))?></td>
                <td><a href="view.php?slug=<?=$post['slug']?>"><button type="submit" class="btn btn-outline-success btn-sm">View</button></a></td>
                <td><a href="edit.php?slug=<?=$post['slug']?>"><button type="submit" class="btn btn-outline-primary btn-sm">Edit</button></a></td>
                <td><a href="delete.php?slug=<?=$post['slug']?>"><button type="submit" class="btn btn-outline-danger btn-sm">Delete</button></a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
