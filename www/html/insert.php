<?php
require 'db_connection.php';

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
?>                
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Update data</title>
                    <link rel="stylesheet" href="style\style_app.css">
                </head>
                
                <body>
                     <div class="container">
                      
                       <!-- UPDATE DATA -->
                        <div class="form">
                            <h3>This Email Address is already registered. Please Try another.</h3>
                            <form action="app.php" method="post">
                                <input type="submit" value="Main page">
                            </form>
                        </div>
                        <!-- END OF UPDATE DATA SECTION -->
                    </div>
                </body>
                </html>    
<?php                
            }else{
                
                // INSER USERS DATA INTO THE DATABASE
                $insert_query = $conn->query("INSERT INTO users(username,user_email) VALUES($username,$user_email)");

                //CHECK DATA INSERTED OR NOT
                if($insert_query){
                    echo "<script>
                    window.location.href = 'app.php';
                    </script>";
                    exit;
                }else{
                    echo "<h3>Oops something wrong!</h3>";
                }
                
                
            }
            
            
        }else{
            echo "Invalid email address. Please enter a valid email address";
        }
        
    }else{
        echo "<h4>Please fill all fields</h4>";
    }
    
}else{
    // set header response code
    http_response_code(404);
    echo "<h1>404 Page Not Found!</h1>";
}
?>