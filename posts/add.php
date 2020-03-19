<?php
require_once 'session.php';
require_once 'header.php';
require_once 'Post.php';
require_once 'functions/functions.php';
require_once 'Tag.php';
$post = new Post($db);
$tags = new Tag($db);

if (isset($_POST['btnSubmit'])){

    $data = date('Y-m-d');
    if (!empty($_POST['title']&&!empty($_POST['description']))) {
        $title = trim(strip_tags($_POST['title']));
        $description = trim(strip_tags($_POST['description']));
        $slug = createSlug($title);
        $checkSlug = mysqli_query($db,"SELECT * FROM posts WHERE slug='$slug'");
        $result = mysqli_num_rows($checkSlug);
        if ($result>0){
            foreach($checkSlug as $cslug){
                $newSlug = $slug.uniqid();
            }
            $record = $post->addPost($title, $description, uploadImage(),$data,$newSlug);
        }else {
            $record = $post->addPost($title, $description, uploadImage(), $data, $slug);
        }
        if ($record == true) {
            echo '<div class="text-center alert alert-success">Post added Successfully!</div>';
        }
    }else{
        echo "<div class='text-center alert alert-danger'>Every field is required</div>";
    }
}
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="#"method="post" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header">Add Post</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="editor" cols="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="form-group form-check-inline">
                        <label for="tags"><b>Choose tags:</b></label>
                        <?php foreach ($tags->getAllTags() as $tag) {?>
                        <input type="checkbox" class="form-check-input ml-2 " name="tags[]" value="<?=$tag['id']?>"><?=$tag['tag'] ?>
                        <?php }?>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>