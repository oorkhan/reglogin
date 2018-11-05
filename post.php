<?php require_once("includes/header.php");?>

<?php

  if(isset($_GET["id"])){
    $post_id = htmlspecialchars($_GET["id"]);
    $sql = "SELECT posts.id,posts.title,posts.body, GROUP_CONCAT(images.url SEPARATOR ', ')  AS 'images'  from posts left JOIN images on posts.id=images.post_id WHERE posts.id = :post_id GROUP BY posts.id ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["post_id"=>$post_id]);
    $post = $stmt->fetch();
    //var_dump($post);
  }
  if(!$post) echo "<h1>Post tapilmadi...</h1>";
  else {
    $images = explode(', ',$post['images']);
  ?>
<div class="container">
  <div class="section no-pad-bot" id="index-banner">
        <div class="card-panel" id="<?= $post_id ?>">
          <div style="width:500px;" class="carousel carousel-slider center">
            <?php foreach($images as $image): ?>
            <div class="carousel-item" href="#one!">
              <img height="500" src="<?= $image ?>">
            </div>
            <?php endforeach; ?>
          </div>
            <h5 class=""><?= $post["title"] ?></h5>
            <p><?= $post["body"] ?></p>
        </div>

    <div class="card-panel">
      <h3>Comments</h3>
      <form method="post" id="comment_form">
        <input type="text" name="comment_name" id="comment_name" placeholder="Enter Name">
        <textarea name="comment_content" id="comment_content" placeholder="Your comment here" cols="30" rows="10"></textarea>
        <input type="hidden" name="comment_id" id="comment_id" value="0">
        <input type="hidden" name="post_id" id="post_id" value="<?= $post_id ?>">
        <input type="submit" class="btn blue" name="submit" id="submit" value="Add Comment">

      </form>
      <span id="comment_message"></span>
      <br>
      <div id="display_comment"></div>    
    </div>
  </div>
</div>
  <?php } ?>
<?php require_once("includes/footer.php") ?>

