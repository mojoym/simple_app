<?php
require 'db_connection.php';
require 'create_table.php';

// function to check if database have a tables, if no - create table;

is_table($conn);

// function for getting data from database
function get_all_data($conn){
    $get_data = $conn->prepare('SELECT * FROM users');
    $get_data->execute();
    if($get_data->rowCount() > 0){
        echo '<table>
              <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th> 
              </tr>';
        while($res = $get_data->fetch(PDO::FETCH_BOTH)){
            echo '<tr>
            <td>'.$res['username'].'</td>
            <td>'.$res['user_email'].'</td>
            <td>
            <a href="update.php?id='.$res['id'].'">Edit</a>&nbsp;|
            <a href="delete.php?id='.$res['id'].'">Delete</a>
            </td>
            </tr>';
        }
        echo '</table>';   
    }else{
        echo "<p>No records found. Please insert some records</p>";
    } 
}
?>
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP App</title>
    <link rel="stylesheet" href="style/style_app.css">
</head>

<body>

    <?php
        echo "Server Name>>>", $_SERVER['SERVER_NAME'], "<br />";
        echo "Server Private IP>>>", $_SERVER['SERVER_ADDR'], "<br />";
    ?>
    
    <h1 align="center">Welcome</h1>
    
    <div class="container">
    
       <!-- INSERT DATA -->
        <div class="form">
            <h2>Insert Data</h2>
            <form action="insert.php" method="post">
                <strong>Username</strong><br>
                <input type="text" name="username" placeholder="Enter your full name" required><br>
                <strong>Email</strong><br>
                <input type="email" name="email" placeholder="Enter your email" required><br>
                <input type="submit" value="Insert">
            </form>
        </div>
        <!-- END OF INSERT DATA SECTION -->
        <hr>
        <!-- DISPLAY DATA -->
        <h2>Display Data</h2>
        <?php 
        // calling get_all_data function
        get_all_data($conn); 
        ?>
        <!-- END OF SHOW DATA SECTION -->
    </div>

    <hr>

</body>

</html>

