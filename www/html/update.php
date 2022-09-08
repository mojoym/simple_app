<?php
require 'db_connection.php';

if(isset($_GET['id']) && is_numeric($_GET['id'])){
    
    $userid = $_GET['id'];
    $get_user = $conn->prepare("SELECT * FROM `users` WHERE id='$userid'");
    
    if($get_user->execute()){
        
        $row = $get_user->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update data</title>
    <link rel="stylesheet" href="style/style_app.css">
</head>

<body>
     <div class="container">
      
       <!-- UPDATE DATA -->
        <div class="form">
            <h2>Update Data</h2>
            <form action="" method="post">
                <strong>Username</strong><br>
                <input type="text" autocomplete="off" name="username" placeholder="Enter your full name" value="<?php echo $row['username'];?>" required><br>
                <strong>Email</strong><br>
                <input type="email" autocomplete="off" name="email" placeholder="Enter your email" value="<?php echo $row['user_email'];?>" required><br>
                <input type="submit" value="Update">
            </form>
<?php

    }else{
        // set header response code
        http_response_code(404);
        echo "<h1>404 Page Not Found!</h1>";
    }
    
}else{
    // set header response code
    http_response_code(404);
    echo "<h1>404 Page Not Found!</h1>";
}


/* ---------------------------------------------------------------------------
------------------------------------------------------------------------------ */


// UPDATING DATA

if(isset($_POST['username']) && isset($_POST['email'])){
    
    // check username and email empty or not
    if(!empty($_POST['username']) && !empty($_POST['email'])){
        
        // Escape special characters.
        $username = $conn->quote($_POST['username']);
        $user_email = $conn->quote($_POST['email']);
        
        //CHECK EMAIL IS VALID OR NOT
        if ($user_email) {
            
            // CHECK IF EMAIL IS ALREADY INSERTED OR NOT
            $check_email = $conn->query("SELECT * FROM users WHERE user_email = $user_email");

            if($check_email->rowCount() > 0){    
                
                echo 
                    '<div class="form">
                        <h3>This Email Address is already registered. Please Try another.</h3>
                    </div>';
                
            }else{
                
                // UPDATE USER DATA               
                $update_query = $conn->query("UPDATE users SET username=$username, user_email=$user_email WHERE id=$userid");

                //CHECK DATA UPDATED OR NOT
                if($update_query){
                    echo "<script>
                    window.location.href = 'app.php';
                    </script>";
                    exit;
                }else{
                    echo "<h3>Oops something wrong!</h3>";
                }
            }
            
            
        }else{
            echo "<h3>Invalid email address. Please enter a valid email address</h3>";
        }
        
    }else{
        echo "<h4>Please fill all fields</h4>";
    }
    
}

// END OF UPDATING DATA

?>
        </div>
    </div>
</body>
</html>

