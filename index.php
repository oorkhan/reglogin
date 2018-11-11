<?php  include 'includes/header.php'; ?>

  <?php
    //query for pagination
    $sql = "SELECT u.name,u.surname,u.profile_img,p.title,p.body,p.id as pid FROM users u INNER JOIN posts p ON p.user_id = u.id ORDER BY p.id DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $total_num_of_records = $stmt->rowCount();
    $total_num_of_records;
    if (!isset($_GET["page"])) {
      $page = 1;
    } else {
      $page = $_GET["page"];
    }
    $next_page = $page + 1;
    $prev_page = $page - 1;
    $records_per_page = 3;
    $total_pages = ceil($total_num_of_records/$records_per_page);
    $start_limit = ($page-1)*$records_per_page;
    //query for display data
    $sql = "SELECT u.name,u.surname,u.profile_img,p.title,p.body,p.id as pid FROM users u INNER JOIN posts p ON p.user_id = u.id ORDER BY p.id DESC LIMIT :start_limit, :records_per_page"; 
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':start_limit', $start_limit, PDO::PARAM_INT);
    $stmt->bindParam(':records_per_page', $records_per_page, PDO::PARAM_INT);
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
      <div id="pagination" class="center-align">
        <ul class = "pagination">
          <li class = "<?= $page == 1 ? 'btn disabled': 'btn' ?>"><a class="white-text" href = "index.php?page=1">First page</a></li>
          <li class="<?= $page == 1 ? 'hide': ''?>"><a href="index.php?page=<?= $prev_page ?>">
          <i class = "material-icons">chevron_left</i></a></li>
          <?php for ($i=1; $i <= $total_pages ; $i++) { ?>
            <li class = "<?= $i == $page ? 'active' : 'waves-effect'?>"><a href = "index.php?page=<?= $i ?>"><?= $i ?></a></li>                     
          <?php } ?>
          <li class="<?= $page == $total_pages ? 'hide': ''?>"><a href="index.php?page=<?= $next_page ?>"><i class = "material-icons">chevron_right</i></a></li>
          <li class = "<?= $page == $total_pages ? 'btn disabled': 'btn' ?>"><a class="white-text" href = "index.php?page=<?= $total_pages ?>">Last page</a></li>
        </ul>
      </div>
      
    </div>
  </div>


  <?php  include 'includes/footer.php'; ?>
