<?php

require_once("includes/config.php");
session_start();
include "function.php";

$record_per_page = 5;
$page = '';
$output = '';
 if (isset($_POST["page"])) {
    $page = $_POST["page"];
}else {
    $page = 1;
} 

$start_from = ($page - 1) * $record_per_page;

$sql = "SELECT u.name,u.surname,u.profile_img,p.title,p.body,p.id as pid FROM users u INNER JOIN posts p ON p.user_id = u.id ORDER BY p.id DESC LIMIT $start_from, $record_per_page";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll();
foreach ($posts as $post) {
    $output .= '    
    <div class="card-panel">
        <img height="50" style="border-radius:50%;border:2px solid grey;" src="images/'.$post["profile_img"].' alt="">
        <span class="black-text">'. $post["name"] . ' '.$post["surname"].' </span>
        <h5 class="">'. $post["title"].'</h5>
        <p>'. strlen($post["body"]) > 200 ? substr($post["body"],0,200) . "..." : $post["body"].' </p>
        <a href="post.php?id='. $post["pid"].'" class="btn green">Read more..</a> 
        <button type="button" name="total_like" id="total_like" class="btn orange">Likes:'. $count_like =  count_content_like ($pdo, $post["pid"]); $count_like.'</button>
    </div>    
    ';
}

$page_query = "SELECT * FROM posts ORDER BY id DESC";
$stmt_page = $pdo->prepare($page_query);
$stmt_page->execute();
$total_records = $stmt_page->rowCount();
$total_pages = ceil($total_records/$record_per_page);
for ($i=1; $i < $total_pages; $i++) { 
    $output .='<li class="waves-effect"><a href="#!">'.$i.'</a></li>';
}
echo $output;
?>