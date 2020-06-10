<?php
  include("scripts/submit_application.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Application</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Create Application</h2>
        <p>Please fill in the application details.</p>
        <form action= "" method="post">
            <div class="form-group">
                <label>Date from((vacation start)</label>
                <input type="date" name="Date_start" class="form-control" >
            </div>    
            <div class="form-group">
                <label>Date to (vacation end)</label>
                <input type="date" name="Date_end" class="form-control">
            </div>
            <div class="form-group">
                <label>Reason</label>
                <textarea name="reason" class="form-control"  rows="3" cols="20"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
 	    <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
        </form>
    </div>    
</body>
</html>
