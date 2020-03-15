<?php
require_once 'template/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <?php
                echo '<h2>Admin panel</h2>';
                echo '<div class="mt-2 mb-2 text-right"><a href="admin-create"><button class="btn btn-success">Add New</button></a></div>';
                $out = '<table class="table table-striped">';
                $out .= '<tr><th>Id</th><th>Title</th><th>Description min</th><th>Description</th><th>Image</th><th>Action</th><tr/>';
                foreach ($stmt->fetchAll() as $k=>$v){
                    $out .= '<tr><td>'.$v['id'].'</td><td>'.$v['title'].'</td><td>'.$v['descr_min'].'</td><td>'.$v['description'].'</td><td><img src="/img/'.$v['image'].'"width = 80 alt=""></td>
                    <td><a class="check-delete" href="/admin_delete.php?id='.$v['id'].'">Del</a></td><tr/>';
                }
                $out .= '</table>';

                echo $out;
            ?>
        </div>
    </div>
</div>
</div>
<?php require_once 'template/footer.php';?>

