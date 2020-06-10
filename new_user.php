<?php
  include("scripts/create_user.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Create User</h2>
        <p>Please fill in the user's information.</p>
        <form action= "" method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" >
            </div>    
            <div class="form-group">
                <label>Surname</label>
                <input type="text" name="surname" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="pass1" class="form-control">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="pass2" class="form-control">
            </div>
            <div class="form-group">
	       <p>
                  <label>User Type</label>
                  <select name = "type_admin" class="form-control">
                    <option value = "0">Employee</option>
                    <option value = "1">Admin</option>
                  </select>
               </p>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Create">
            </div>
 	    <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
        </form>
    </div>    
</body>
</html>
