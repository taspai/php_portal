<?php
include("scripts/login_post.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action= "" method="post">
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="username" class="form-control" value="<?php echo $email; ?>">
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
 	    <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
        </form>
    </div>    
</body>
</html>
