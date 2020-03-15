<?php
require_once 'template/header.php';
?>
<div class="container">
    <div class="row mt-2">
        <div class="col-lg-9">
            <div class="row">
                <?php
                function getPostCategory($conn){
                    $sql = $conn->query("SELECT * FROM `info` WHERE category=".$_GET['id']);
                    $sql->execute();
                    $row = $sql->fetchAll();
                    return $row;
                }

                $category = getPostCategory($conn);

                function getPostCategoryInfo($conn){
                    $sql = $conn->query("SELECT * FROM `category` WHERE id=".$_GET['id']);
                    $sql->execute();
                    $row = $sql->fetch();
                    return $row;
                }

                $data = getPostCategoryInfo($conn);

                echo "<h1>{$data['category']}</h1>";
                echo $data['description'];

                $out = '';
                foreach ($category as $k=>$v){
                    $out .= '<div class="col-lg-4 col-md-6 p-3">';
                    $out .= '<div class="card ">';
                    $out .= "<h2 class='card-title'>".$v['title']."</h2>";
                    $out .= "<img src='/img/{$v['image']}'width='200'class='card-img'>";
                    $out .= "<p class='card-text'>".$v['descr_min']."</p>";
                    $out .= "<p><a href='/article/{$v['id']}'class='btn btn-primary'>Read more...</a></p>";
                    $out .= '</div>';
                    $out .= '</div>';
                }

                echo $out;
                ?>
            </div>
        </div>
        <?php require_once 'template/nav.php'?>
    </div>
</div>
</div>
<?php require_once 'template/footer.php' ?>
