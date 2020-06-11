<?php
// Initialize the session
  include('scripts/session.php'); 
  if (!isset($_SESSION['admin'])){  
  	header("Location:welcome.php");
	die();
  }
  include('scripts/fetch_users.php')
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Portal</title>
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
        <a href="new_user.php" class="btn btn-warning">Add a new user</a>
        <a href="scripts/logout.php" class="btn btn-danger">Logout</a>
    </p>
	<table align="center" border="1px" style="width:60%">
        	<tr>
            		<th style="text-align:center" colspan="9"><h2>Submitted Applications</h2></th>
        	</tr>
        	<t>
            		<th style="text-align:center">  ID  </th>
            		<th style="text-align:center">  Name  </th>
            		<th style="text-align:center">  Surname  </th>
			<th style="text-align:center">  Email  </th>
			<th style="text-align:center">  Type  </th>
        	</t>
    		<?php
        		while($rows=mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				// For every user in db create a query and make it link on their email, 
				// will give info for prefilling update info
				$query ="&e_id=".$rows['id']."&email=".$rows['email']."&name=".$rows['name'].
					"&surname=".$rows['surname']."&type=".$rows['type_admin'];
    		?>
            	<tr>
                	<td>  <?php echo $rows['id']; ?>  </td>
                	<td>  <?php echo $rows['name']; ?></td>
                	<td>  <?php echo $rows['surname']; ?></td>
                	<td> <a href="edit_user.php?<?php echo $query ?>" >  <?php echo $rows['email']; ?> </a> </td>
			<td>  <?php echo intval($rows['type_admin']) == 0  ? "Employee" :  "Admin"; ?></td>
            	</tr>
    		<?php
        		}
    		?>
    </table>
</body>
</html>
