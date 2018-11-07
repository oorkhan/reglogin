<?php  include 'includes/header.php'; ?>

  <?php

    $sql = "SELECT u.name,u.surname,u.profile_img,p.title,p.body,p.id as pid FROM users u INNER JOIN posts p ON p.user_id = u.id ORDER BY p.id DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $posts = $stmt->fetchAll();
   ?>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <?php foreach($posts as $post): ?>
        <div class="card-panel">
            <img height="50" style="border-radius:50%;border:2px solid grey;" src="images/<?= $post["profile_img"] ?>" alt="">
            <span class="black-text"><?= $post["name"] . " ".$post["surname"] ?></span>
            <h5 class=""><?= $post["title"] ?></h5>
            <p><?= strlen($post["body"]) > 200 ? substr($post["body"],0,200) . "..." : $post["body"] ?></p>
            <a href="post.php?id=<?= $post["pid"] ?>" class="btn green">Read more..</a> 
            <button type="button" name="total_like" id="total_like" class="btn orange">Likes: <?php $count_like =  count_content_like ($pdo, $post["pid"]); echo $count_like ?></button>
        </div>
      <?php endforeach; ?>
    </div>
  </div>


  <?php  include 'includes/footer.php'; ?>
