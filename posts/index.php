<?php
require_once 'header.php';
require_once 'Post.php';
require_once 'Tag.php';
?>

<?php
$posts = new Post($db);
$tags = new Tag($db);
?>
<div class="container">
    <div class="row">
        <div class="col-md-8" >
            <?php foreach ($posts->getPost() as $post){ ?>
            <div class="media">
                <div class="media-left media-top">
                    <img src="/images/<?php echo $post['image']; ?>" alt="" class="media-object mr-3 " style="width: 200px">
                    <p>
                        Author:Admin<br>
                        Created:<?='  '. date('Y-m-d',strtotime($post['created_at'])) ; ?>
                    </p>
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><a href="view.php?slug=<?= $post['slug'] ?>"><?php echo $post['title']; ?></a></h4>
                    <?php echo htmlspecialchars_decode($post['description']); ?>
                </div>
            </div>
            <?php } ?>
            <?php
            $sql = "SELECT count(id)from posts";
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_row($result);
            $totalRecords = $row[0];
            $totalPages = ceil($totalRecords/2);
            $pageLink = '<ul class="pagination">';

            $page = $_GET['page'];
            if ($page>1){
                $pageLink.='<a class="page-link" href="index.php?page=1">First<a/>';
                $pageLink.='<a class="page-link" href="index.php?page='.($page-1).'"><<<<<a/>';
            }
            for ($i=1;$i<=$totalPages;$i++){
                $pageLink.='<a class="page-link" href="index.php?page='.$i.'">'.$i.'<a/>';
            }
            if ($page<=$totalPages){
                $pageLink.='<a class="page-link" href="index.php?page='.($page+1).'">>>>><a/>';
                $pageLink.='<a class="page-link" href="index.php?page='.$totalPages.'">Last<a/>';
            }

            echo $pageLink.'</ul>';
            ?>
        </div>
        <div class="col-md-4">
            <h4>Browse by Tags</h4>
            <p>
            <?php foreach ($tags->getAllTags() as $tag){?>
                <a href="index.php?tag=<?= $tag['tag'];?>"><button class="btn
                    btn-outline-warning btn-sm"><?=$tag['tag']?></button></a>
           <?php } ?></p>
            <p>
            <h4>Search Post</h4>
            <form action="#"method="get">
                <input type="text" name="keyword"class="form-control"placeholder="search..">
            </form>
            </p>
                <h4>Popular Post</h4>
            <?php foreach ($posts->getPopularPost() as $p){ ?>
            <p>
            <a href="view.php?slug=<?=$p['slug']?>" style="color: black;border-bottom: 1px dashed green"><?=$p['title']?></a>
            </p>
            <?php } ?>
        </div>
    </div>
</div>

