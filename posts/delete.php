<?php
header('Location:result.php');
require_once 'header.php';
require_once 'Post.php';
$posts = new Post($db);
$posts->deletePostBySlug($_GET['slug']);
?>
