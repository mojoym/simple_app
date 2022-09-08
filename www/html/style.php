<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP App</title>
    <link rel="stylesheet" href="style/style_app.css">
</head>

<body>

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
    </div>

    <hr>

</body>

</html>