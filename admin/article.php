<?php
require_once 'template/header.php';
?>

<div class="container">
    <div class="row mt-2">
        <div class="col-lg-9">
            <div class="row">
                <?php

                function selectArticle($conn){
                    $sql = $conn->query("SELECT * FROM `info` WHERE id=".$_GET['id']);
                    $sql->execute();
                    $row = $sql->fetch();
                    return $row;
                }

                $article = selectArticle($conn);

                $out = '';
                $out .= "<h1>{$article['title']}</h1>";
                $out .= "<img src='/img/{$article['image']}'class='img-fluid mt-5 mb-5'>";
                $out .= "<div>{$article['description']}</div>";
                echo $out;
                 ?>
            </div>
        </div>
        <?php require_once 'template/nav.php'?>
    </div>
</div>
</div>

<?php  require_once 'template/footer.php';?>