<?php
require_once('includes/config.php');
session_start();

$user_id = $_SESSION['id'];
$content_id = htmlspecialchars($_POST['post_id']);

$sql = "SELECT * FROM user_content_like WHERE content_id = :content_id AND user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(["content_id"=>$content_id, "user_id"=>$user_id]);
if (count($stmt->fetchAll())>0){
    $sql2 = "DELETE FROM user_content_like WHERE content_id = :content_id AND user_id = :user_id";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->execute(["content_id"=>$content_id, "user_id"=>$user_id]);
    // count likes after dislike and send to ajax
    $sql = "SELECT * FROM user_content_like WHERE content_id = :content_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["content_id"=>$content_id]);
    $like_count = count($stmt->fetchAll());
    echo $like_count;
}

?>