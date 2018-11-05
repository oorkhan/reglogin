<?php
//fetch_comments.php
require_once("includes/config.php");
session_start();
    $post_id = $_POST['post_id'];
    $sql = "
    SELECT * FROM comments
    WHERE parent_comment_id = '0' AND post_id = '".$post_id."'
    ORDER BY comment_id DESC
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $output = '';
    $result = $stmt->fetchAll();
    foreach ($result as $row) {
        $output .= '

            <div class="card">
                <div class="card-content">
                    <span class="card-title">'.$row["comment_sender_name"].' <b> on <i>'.$row["date"].'</span>
                    <p>'.$row["comment"].'</p>
                </div>
                <div class="card-action">
                    <button class="btn green reply" id="'.$row["comment_id"].'">Reply</button>
                </div>
            </div>
        ';
         $output .= get_reply_comment($pdo, $row["comment_id"]);
    }
    echo $output;

    function get_reply_comment($pdo, $parent_id = 0, $marginleft = 0)
    {
        $sql = "
        SELECT * FROM comments WHERE parent_comment_id = '".$parent_id."'
        ";
        $output = '';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $count = $stmt->rowCount();
        if ($parent_id == 0) {
            $marginleft = 0;
        }
        else {
            $marginleft = $marginleft +48;
        }
        if ($count > 0) {
            foreach ($result as $row) {
               $output .= '
                <div class="card" style="margin-left:'.$marginleft.'px">
                    <div class="card-content">
                        <span class="card-title">'.$row["comment_sender_name"].' <b> on <i>'.$row["date"].'</span>
                        <p>'.$row["comment"].'</p>
                    </div>
                    <div class="card-action">
                        <button class="btn green reply" id="'.$row["comment_id"].'">Reply</button>
                    </div>
                </div>
               ';
               $output .= get_reply_comment($pdo, $row["comment_id"], $marginleft, $row["post_id"]); 
            }
        }
        return $output;
    }
?>