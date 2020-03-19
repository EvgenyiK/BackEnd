<?php
require_once 'header.php';
require_once 'Comment.php';
$comments = new Comment($db);
?>

<div class="container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Subject</th>
            <th>Description</th>
            <th>Created</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($comments->getPendingComments() as $comment) { ?>
            <tr>
                <td><?=$comment['name']?></td>
                <td><?=$comment['subject']?></td>
                <td><?=substr($comment['description'],0,50)?></td>
                <td><?=date('Y-m-d',strtotime($comment['created_at']))?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="approveID" value="<?=$comment['id']?>">
                        <button type="submit" class="btn btn-outline-success btn-sm"name="approveComment">Approve</button>
                    </form>
                    <form action="" method="post">
                        <input type="hidden" name="deleteID" value="<?=$comment['id']?>">
                        <button type="submit" class="btn btn-outline-danger btn-sm"name="delete">Delete</button>
                    </form>
                </td>
                <?php if (isset($_POST['approveComment'])){
                    $result = $comments->update($_POST['approveID']);
                    if ($result==true){
                        echo "comment accepted successfully!";
                    }
                }
                if (isset($_POST['delete'])){
                    $result = $comments->delete($_POST['deleteID']);
                    if ($result==true){
                        echo "comment deleted successfully!";
                    }
                }
                ?>

            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
