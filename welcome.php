<?php
// Initialize the session
  include('scripts/session.php'); 

  include('scripts/fetch_apps.php')
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }

	table, th, td {
  	  border: 1px solid black;
  	  border-collapse: collapse;
	}
	th, td {
  	  padding: 5px;
	}
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo $_SESSION["login_name"]; ?></b>. Welcome to our site.</h1>
    </div>
    <p>
        <a href="new_application.php" class="btn btn-warning">Submit Request</a>
        <a href="new_user.php" class="btn btn-danger">Add a new user</a>
    </p>
	<table align="center" border="1px" style="width:60%">
        	<tr>
            		<th style="text-align:center" colspan="9"><h2>Submitted Applications</h2></th>
        	</tr>
        	<t>
            		<th style="text-align:center">  ID  </th>
            		<th style="text-align:center">  Name  </th>
            		<th style="text-align:center">  Email  </th>
			<th style="text-align:center">  date_submitted  </th>
			<th style="text-align:center">  date_from  </th>
			<th style="text-align:center">  date_to  </th>
			<th style="text-align:center">  days  </th>
			<th style="text-align:center">  text  </th>
			<th style="text-align:center">  status  </th>
        	</t>
    		<?php
        		while($rows=mysqli_fetch_array($result, MYSQLI_ASSOC))
        		{
    		?>
            	<tr>
                	<td>  <?php echo $rows['id']; ?>  </td>
                	<td>  <?php echo $rows['name']." ".$rows['surname']; ?></td>
                	<td>  <?php echo $rows['email']; ?></td>
                	<td>  <?php echo $rows['date_submitted']; ?></td>
                	<td>  <?php echo $rows['date_from']; ?></td>
                	<td>  <?php echo $rows['date_to']; ?></td>
                	<td>  <?php echo $rows['days']; ?></td>
                	<td>  <?php echo $rows['text']; ?></td>
			<td>  <?php echo ( intval($rows['status']) == 0  ? "Pending" : ((intval($rows['status']) == 1) ? "Accepted" : "Rejected")); ?></td>
            	</tr>
    		<?php
        		}
    		?>
    </table>
</body>
</html>
