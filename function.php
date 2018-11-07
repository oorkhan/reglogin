<?php
    function count_content_like ($pdo, $content_id){
    $sql = 'SELECT * FROM user_content_like WHERE content_id = :content_id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['content_id' => $content_id]);
    $total_rows = $stmt->rowCount();
    return $total_rows;
    }


?>