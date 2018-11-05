<?php
    require_once 'includes/config.php';
    session_start(); 
    

    $error = '';
    $comment_name = '';
    $comment_content = '';
    $post_id = 1;

    if (empty($_POST["comment_name"])) {
        $error .= '<p class="red-text">Name is required</p>';
        
    }
    else {
        $comment_name = $_POST["comment_name"];        
    }

    if (empty($_POST["comment_content"])) {
        $error .= '<p class="red-text">Comment is required</p>';
    }
    else {
        $comment_content = $_POST["comment_content"];
    }

    if (empty($_POST["post_id"])) {
        $error .= '<p class="red-text">post id is not given.</p>';
    }
    else {
        $post_id = $_POST["post_id"];
    }

    if($error == '')
        {
            $query = "
            INSERT INTO comments 
            (parent_comment_id, comment, comment_sender_name, post_id) 
            VALUES (:parent_comment_id, :comment, :comment_sender_name, :post_id)
            ";
            $statement = $pdo->prepare($query);
            $statement->execute(
            array(
            ':parent_comment_id' => $_POST["comment_id"],
            ':comment'    => $comment_content,
            ':comment_sender_name' => $comment_name,
            ':post_id' => $post_id
            )
            );
            $error = '<p class="green-text">Comment Added</p>';
        }

    $data = array(
        'error' => $error
    ); 


    echo json_encode($data);

?>