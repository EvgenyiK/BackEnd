<?php
require_once 'template/header.php';
?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Create post</h2>
                <form class="" action="admin_create.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="descr-min">Min description</label>
                        <input type="text" class="form-control" id="descr-min"name="descr-min">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea  class="form-control" id="description"name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Photo</label>
                        <input type="file"  class="form-control-file" id="image"name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once 'template/footer.php'?>
<?php
if (isset($_POST['title']) AND $_POST['title'] != '') {
    $title = $_POST['title'];
    $descrMin = $_POST['descr-min'];
    $description = $_POST['description'];
    $img = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], 'img/'.$_FILES['image']['name']);



    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO info (title, descr_min, description,image)
        VALUES ('$title', '$descrMin', '$description', '$img')";
        // use exec() because no results are returned
        $conn->exec($sql);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}
?>
