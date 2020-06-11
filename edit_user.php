<?php
  include("scripts/post_edit_user.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Edit User</h2>
        <p>Please modify the user's information.</p>
        <form action= "" method="post">
            <div class="form-group">
		<input type="hidden" name="id" value=<?php echo $_GET['e_id'];?> />
                <label>Name</label>
		<input type="text" name="name" class="form-control" value = <?php echo $_GET['name'];?> >
            </div>    
            <div class="form-group">
                <label>Surname</label>
                <input type="text" name="surname" class="form-control" value = <?php echo $_GET['surname'];?>>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value = <?php echo $_GET['email'];?>>
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
                    <option value = "0" <?php if (intval($_GET['type']) == 0)echo "selected='selected'";?> > Employee </option>
                    <option value = "1" <?php if (intval($_GET['type']) == 1)echo "selected='selected'";?> > Admin</option>
                  </select>
               </p>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update">
            </div>
 	    <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
        </form>
    </div>    
</body>
</html>
