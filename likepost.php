<?php

  require("includes/config.php");
  session_start();

  if(isset($_POST["post_id"])){
    //echo "hello";exit;
    $post_id = htmlspecialchars($_POST["post_id"]);
    $user_id = $_SESSION["id"];

    $sql = "SELECT * FROM user_content_like WHERE content_id = :content_id AND user_id = :user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["content_id"=>$post_id, "user_id"=>$user_id]);
    if(count($stmt->fetchAll())>0){
      echo "no";exit;
    }

    $sql = "INSERT INTO user_content_like(content_id,user_id) VALUES(:content_id,:user_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["content_id"=>$post_id, "user_id"=>$user_id]);
    if($stmt){
      $sql2 = "SELECT COUNT(*) as n FROM user_content_like WHERE content_id = :content_id";
      $stmt2 = $pdo->prepare($sql2);
      $stmt2->execute(["content_id"=>$post_id]);
      $count  = $stmt2->fetchAll();
      echo $count[0]["n"];exit;
    }else{
      echo "...";
    }
  }
 ?>
