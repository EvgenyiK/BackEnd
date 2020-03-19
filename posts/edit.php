<?php
require_once 'header.php';
require_once 'Post.php';
require_once 'functions/functions.php';
$posts = new Post($db);

if (isset($_POST['btnUpdate'])){
    $result = $posts->updatePost($_POST['title'],$_POST['description'],$_GET['slug']);
    if ($result == true){
        echo '<div class="text-center alert alert-success">Post updated Successfully!</div>';
    }
}

?>



<div class="container">
    <div class="row justify-content-center">
        <?php foreach($posts->getSinglePost($_GET['slug']) as $post){?>
        <div class="col-md-8">
            <form action="#"method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">Edit Post</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" value="<?=$post['title']?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="editor" cols="10" class="form-control"><?=$post['description']?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image">
                            <img style="width: 180px" src="images/<?=$post['image']?>" alt="">
                        </div>

                        </div>
                        <div class="form-group">
                            <button type="submit" name="btnUpdate" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <?php }?>
    </div>
</div>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>




