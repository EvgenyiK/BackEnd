<div class="col-lg-3">
    <?php $category = allCatInfo($conn);
    $cate = '<div class="list-group">';
    foreach($category as $k=>$v){
        $cate .= "<a class='list-group-item list-group-item-action' href='/cat/{$v['id']}'>{$v['category']}</a>";
    }
    echo  $cate;
    echo '</div>'; ?>
</div>

<?php
function allCatInfo($conn){
$sql = $conn->query("SELECT * FROM `category`");
$sql->execute();
$row = $sql->fetchAll();
return $row;
}
?>