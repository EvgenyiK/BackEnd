<?php require_once 'template/header.php'  ?>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Животные</h1>
        <p class="lead">Живо́тные (лат. Animalia) — традиционно (со времён Аристотеля) выделяемая категория организмов, в настоящее время рассматривается в качестве биологического царства. Животные являются основным объектом изучения зоологии. </p>
    </div>
</div>
<div class="container">
    <nav class="row mt-2">
        <div class="col-lg-9">
            <div class="row">
                <?php
                $out = '';
                foreach ($stmt->fetchAll() as $k=>$v){
                    $out .= '<div class="col-lg-4 col-md-6">';
                    $out .= '<div class="card">';
                    $out .= "<img src='/img/{$v['image']}' class='card-img-top'>";
                    $out .= '<div class="card-body">';
                    $out .= "<h5 class='card-title'>".$v['title']."</h5>";
                    $out .= "<p class='card-text'>".$v['descr_min']."</p>";
                    $out .= "<p><a href='/article/{$v['id']}'class='btn btn-primary'>Read more</a></p>";
                    $out .= '</div>';
                    $out .= '</div>';
                    $out .= '</div>';
                } echo $out; ?>
            </div>
        </div>
        <?php require_once 'template/nav.php';?>


<?php

function paginationCount($conn){
    $sql = $conn->query("SELECT count(id) AS count FROM `info`");
    $sql->execute();
    $row = $sql->fetch();
    return ceil($row['count']/3);
}
$countPage = paginationCount($conn);

echo "<hr>";

?>
        <nav class="mt-3" aria-label="Page navigation example">
            <ul class="pagination">
                <?php
                    for ($i=0; $i < $countPage; $i++){
                    $j=$i+1;
                    echo "<li class='page-item'><a class='page-link' href='/index.php?page={$i}' style='padding: 5px'>{$j}</a></li>";
                    }
                ?>
           </ul>
        </nav>
</div>
</div>


<?php require_once 'template/footer.php' ?>






