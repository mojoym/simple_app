<?php
require 'db_connection.php';

if(isset($_GET['id']) && is_numeric($_GET['id'])){
    
    $userid = $_GET['id'];
    $delete_user = $conn->query("DELETE FROM `users` WHERE id='$userid'");
    
    if($delete_user){
        echo "<script>
        window.location.href = 'app.php';
        </script>";
        exit;
    }else{
       echo "Oops something wrong!"; 
    }
}else{
    // set header response code
    http_response_code(404);
    echo "<h1>404 Page Not Found!</h1>";
}
?>