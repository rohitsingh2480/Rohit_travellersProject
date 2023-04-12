<html>
<body>

	<div id="header" align="center"><h1>Travellers Confirmation</h1>
	</div>
	<div id="content">
	
			<?php
				include("../connection.php");
				
				
				$passe=$_REQUEST['passe'];
				$name=$_REQUEST['name'];
				$dplace=$_REQUEST['dplace'];
				$budget=$_REQUEST['budget'];
				$email=$_REQUEST['email'];
				
				
				
				
				$query="INSERT INTO travellers(passe,name,dplace,budget,email) VALUES('$passe','$name','$dplace','$budget','$email')";
				
				$result=$conn->query($query);
					
				
				if($result)
				{
					echo"<form action='../index.php' method='POST' enctype='multipart/form-data'>";
					echo"<b>Name of Traveller:-".$name."</b> <br>";
					echo"<b>Email address:-".$email."</b> <br>";
					echo"<b>Destination :-".$dplace."</b> <br>";
					echo"<b>Total Traveller:-".$passe."</b> <br>";
					echo"<b>Budget Per Traveller:-$".$budget."</b> <br>";
					$total=$passe*1000;
					echo"<b>Amount To pay:- $". $total ."</b> <br>";
					echo"<input type='submit' value='Amount Paid'>";
					
					echo"</form>";
			?>
				
				
				<?php
				}
				else
				{
					echo mysql_error();
					//echo("Record not inserted");
				}
			?>
			</div>
			</div>
</body>
</html>