<!Doctype form>
<html>
	<head>
		<title>Travellers</title>
	</head>
		
		<link href="css/traveller_style.css" rel="stylesheet"  type="text/css" />
	
	<body>
	
		<form method="POST" action="action/insert_travellers.php" enctype="multipart/form-data">
		<h1 align="center">Booking of Travellers</h1>
		<div class="table" >
		<table  align="center">
			
			
			<tr>
				<td><div class="font">Name </div></td>
				<td><input type="text" name="name" placeholder="Name" required></td>
			</tr>
			<tr>
				<td><div class="font">Email address</div></td>
				<td><input type="email" name="email" placeholder="Enter your email" required ></td>
			</tr>
			<tr>
				<td><div class="font">Where do you want to go? </div></td>
				<td><select name="dplace"  required>
				  <option value="">Select Destination</option>
			      <option value="India">India</option>
			      <option value="Africa">Africa</option>
			      <option value="Europe">Europe</option>
				
				</select>
				</td>
			</tr>
			
			<tr>
				<td><div class="font">No of travellers</div></td>
				<td><input type="number" name="passe" placeholder="Total number of passenger" required></td>
			</tr>
			<tr>
				<td><div class="font">Budget Per Passenger</div></td>
				<td><input type="number" name="budget" placeholder="Total number of budget" required>

				</td>
			</tr>
		
			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit" value="submit">
				<input type="reset" name="clear" value="clear"></td>
			</tr>
		
		</div>
	</table>
	</form>
	
	</body>
	
</html>