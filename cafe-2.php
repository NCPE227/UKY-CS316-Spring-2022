<!DOCTYPE html>

<?php
	include('cafe-login.php');
	// Create connection
	$conn = new mysqli($servername, $username, $password, $database); 
?>

<html lang='en'>
	<head>
	<meta charset='UTF-8'>
	<style>
		title {font-family: Free Serif, Serif, Arial;}
		body {font-family: Free Serif, Serif, Arial;}
		.select {border:2px solid black; background-color:beige; text-align:center;}
		.printed {width: 320px; border:2px solid black; background-color:beige; text-align:left;}
		.access {color: red;}
		input {border-radius:5px;}
		h3 {margin: 0;}
		ol {margin: 0; margin-left: -20px;}
		ul {margin: 0; margin-left:20px; list-style-type: circle;}
		.multi {color:green;}
		.lingual {color:red;}
		.inedible {border:3px solid green;}
		.poisonous {border-left:3px solid blue; border-right:3px solid blue; border-top:3px solid red; border-bottom:3px solid red;}
	</style>
	<title>Munshn Lunshn&trade;</title>
	</head>

<body>
	<h1>Welcome to the High Times Munshn Lunshn&trade;!</h1>
	<p>All our clients are served right! <br>
	<mark>This web site is under construction, as is our cafe.</mark></p>
	<h2>See the menu</h2>

	
	<h3>Click on a word for details<h3>
	<table class = 'select'>
	<tbody>
	<form method='POST'>
	<tr>
	<td> <input type='submit' name='snacks' value='snacks'> </td> <td>&#x1F34E;</td> 
	<td> <input type='submit' name='drinks' value='drinks'> </td> <td>&#x1F378;</td> 
	<td> <input type='submit' name='mains' value='mains'> </td> <td>&#x1F357;</td>
	</tr>

	<tr>
	<td> <input type='submit' name='desserts' value='desserts'> </td> <td>&#x1F382;</td> 
	<td> <input type='submit' name='kids' value='for kids'> </td> <td>&#x1F37C;</td> 
	<td> <input type='submit'name = 'pets' value='for pets'> </td> <td>&#x1F415;</td>
	</tr>
	
	<tr>
	<td> <input type='submit' name='takeout' value='takeout'> </td> <td>&#x1F355;</td> 
	<td class='inedible'> <input type='submit' name='inedible' value='inedible'> </td> <td>&#x1F388;</td> 
	<td class='poisonous'><input type='submit' name='poisonous' value='poisonous'> </td> <td>&#x2620;</td> 
	</tr>
	</form>

	</tbody>
	</table>

	<?php
		if(array_key_exists('snacks', $_POST)) {
			echo "<h2>Details about snacks</h2>";
			$sql = "UPDATE accesses SET number = number + 1 WHERE category = 'snacks'";

			if($conn->query($sql) == true) {
				$sql = "SELECT * FROM accesses WHERE category = 'snacks'";
				$accessquery = mysqli_query($conn, $sql);
				$accessrow = $accessquery->fetch_assoc();
				echo "<span class = 'access'>You have requested this information ".$accessrow['number']." times</span>";
			}
			else {
				echo "Error updating view count... ".$conn->error;
			}

			//Print the Menu Items
			$sql = "SELECT * FROM menu WHERE category = 'snacks'";
			$queryresult = mysqli_query($conn, $sql);
			$checkresult = $queryresult->num_rows;
			echo "<table class='printed'>";
			echo "<tr> <td><b>Item</b></td> <td><b>Description</b></td> <td><b>Price</b></td> </tr>";
			if($checkresult>0) {
				while($row = $queryresult->fetch_assoc()) {
					echo "<tr><td>".$row['item']."</td><td>".$row['description']."</td><td> $".$row['price']."</td></tr>";
				}
			}
			else {
				echo "<tr> <td> no items </td> <td> n/a </td> <td> n/a </td> </tr>";
			}
			echo "</table>";
		}//snacks
		else if(array_key_exists('desserts', $_POST)) {
			echo "<h2>Details about desserts</h2>";
			$sql = "UPDATE accesses SET number = number + 1 WHERE category = 'desserts'";

			if($conn->query($sql) == true) {
				$sql = "SELECT * FROM accesses WHERE category LIKE 'desserts'";
				$accessquery = mysqli_query($conn, $sql);
				$accessrow = $accessquery->fetch_assoc();
				echo "<span class = 'access'>You have requested this information ".$accessrow['number']." times</span>";
			}
			else {
				echo "Error updating view count... ".$conn->error;
			}

			//Print the Menu Items
			$sql = "SELECT * FROM menu WHERE category LIKE 'desserts'";
			$queryresult = mysqli_query($conn, $sql);
			$checkresult = $queryresult->num_rows;
			echo "<table class='printed'>";
			echo "<tr> <td><b>Item</b></td> <td><b>Description</b></td> <td><b>Price</b></td> </tr>";
			if($checkresult>0) {
				while($row = $queryresult->fetch_assoc()) {
					echo "<tr><td>".$row['item']."</td><td>".$row['description']."</td><td> $".$row['price']."</td></tr>";
				}
			}
			else {
				echo "<tr> <td> no items </td> <td> n/a </td> <td> n/a </td> </tr>";
			}
			echo "</table>";
		}//desserts
		else if(array_key_exists('takeout', $_POST)) {
			echo "<h2>Details about takeout</h2>";
			$sql = "UPDATE accesses SET number = number + 1 WHERE category = 'takeout'";

			if($conn->query($sql) == true) {
				$sql = "SELECT * FROM accesses WHERE category LIKE 'takeout'";
				$accessquery = mysqli_query($conn, $sql);
				$accessrow = $accessquery->fetch_assoc();
				echo "<span class = 'access'>You have requested this information ".$accessrow['number']." times</span>";
			}
			else {
				echo "Error updating view count... ".$conn->error;
			}

			//Print the Menu Items
			$sql = "SELECT * FROM menu WHERE category LIKE 'takeout'";
			$queryresult = mysqli_query($conn, $sql);
			$checkresult = $queryresult->num_rows;
			echo "<table class='printed'>";
			echo "<tr> <td><b>Item</b></td> <td><b>Description</b></td> <td><b>Price</b></td> </tr>";
			if($checkresult>0) {
				while($row = $queryresult->fetch_assoc()) {
					echo "<tr><td>".$row['item']."</td><td>".$row['description']."</td><td> $".$row['price']."</td></tr>";
				}
			}
			else {
				echo "<tr> <td> no items </td> <td> n/a </td> <td> n/a </td> </tr>";
			}
			echo "</table>";
		}//takeout
		else if(array_key_exists('drinks', $_POST)) {
			echo "<h2>Details about drinks</h2>";
			$sql = "UPDATE accesses SET number = number + 1 WHERE category = 'drinks'";

			if($conn->query($sql) == true) {
				$sql = "SELECT * FROM accesses WHERE category LIKE 'drinks'";
				$accessquery = mysqli_query($conn, $sql);
				$accessrow = $accessquery->fetch_assoc();
				echo "<span class = 'access'>You have requested this information ".$accessrow['number']." times</span>";
			}
			else {
				echo "Error updating view count... ".$conn->error;
			}

			//Print the Menu Items
			$sql = "SELECT * FROM menu WHERE category LIKE 'drinks'";
			$queryresult = mysqli_query($conn, $sql);
			$checkresult = $queryresult->num_rows;
			echo "<table class='printed'>";
			echo "<tr> <td><b>Item</b></td> <td><b>Description</b></td> <td><b>Price</b></td> </tr>";
			if($checkresult>0) {
				while($row = $queryresult->fetch_assoc()) {
					echo "<tr><td>".$row['item']."</td><td>".$row['description']."</td><td> $".$row['price']."</td></tr>";
				}
			}
			else {
				echo "<tr> <td> no items </td> <td> n/a </td> <td> n/a </td> </tr>";
			}
			echo "</table>";
		}//drinks
		else if(array_key_exists('kids', $_POST)) {
			echo "<h2>Details about for kids</h2>";
			$sql = "UPDATE accesses SET number = number + 1 WHERE category = 'for kids'";

			if($conn->query($sql) == true) {
				$sql = "SELECT * FROM accesses WHERE category LIKE 'for kids'";
				$accessquery = mysqli_query($conn, $sql);
				$accessrow = $accessquery->fetch_assoc();
				echo "<span class = 'access'>You have requested this information ".$accessrow['number']." times</span>";
			}
			else {
				echo "Error updating view count... ".$conn->error;
			}

			//Print the Menu Items
			$sql = "SELECT * FROM menu WHERE category LIKE 'for kids'";
			$queryresult = mysqli_query($conn, $sql);
			$checkresult = $queryresult->num_rows;
			echo "<table class='printed'>";
			echo "<tr> <td><b>Item</b></td> <td><b>Description</b></td> <td><b>Price</b></td> </tr>";
			if($checkresult>0) {
				while($row = $queryresult->fetch_assoc()) {
					echo "<tr><td>".$row['item']."</td><td>".$row['description']."</td><td> $".$row['price']."</td></tr>";
				}
			}
			else {
				echo "<tr> <td> no items </td> <td> n/a </td> <td> n/a </td> </tr>";
			}
			echo "</table>";
		}//for kids
		else if(array_key_exists('inedible', $_POST)) {
			echo "<h2>Details about inedible</h2>";
			$sql = "UPDATE accesses SET number = number + 1 WHERE category = 'inedible'";

			if($conn->query($sql) == true) {
				$sql = "SELECT * FROM accesses WHERE category LIKE 'inedible'";
				$accessquery = mysqli_query($conn, $sql);
				$accessrow = $accessquery->fetch_assoc();
				echo "<span class = 'access'>You have requested this information ".$accessrow['number']." times</span>";
			}
			else {
				echo "Error updating view count... ".$conn->error;
			}

			//Print the Menu Items
			$sql = "SELECT * FROM menu WHERE category LIKE 'inedible'";
			$queryresult = mysqli_query($conn, $sql);
			$checkresult = $queryresult->num_rows;
			echo "<table class='printed'>";
			echo "<tr> <td><b>Item</b></td> <td><b>Description</b></td> <td><b>Price</b></td> </tr>";
			if($checkresult>0) {
				while($row = $queryresult->fetch_assoc()) {
					echo "<tr><td>".$row['item']."</td><td>".$row['description']."</td><td> $".$row['price']."</td></tr>";
				}
			}
			echo "</table>";
		}//inedible
		else if(array_key_exists('mains', $_POST)) {
			echo "<h2>Details about mains</h2>";
			$sql = "UPDATE accesses SET number = number + 1 WHERE category = 'mains'";

			if($conn->query($sql) == true) {
				$sql = "SELECT * FROM accesses WHERE category LIKE 'mains'";
				$accessquery = mysqli_query($conn, $sql);
				$accessrow = $accessquery->fetch_assoc();
				echo "<span class = 'access'>You have requested this information ".$accessrow['number']." times</span>";
			}
			else {
				echo "Error updating view count... ".$conn->error;
			}

			//Print the Menu Items
			$sql = "SELECT * FROM menu WHERE category LIKE 'mains'";
			$queryresult = mysqli_query($conn, $sql);
			$checkresult = $queryresult->num_rows;
			echo "<table class='printed'>";
			echo "<tr> <td><b>Item</b></td> <td><b>Description</b></td> <td><b>Price</b></td> </tr>";
			if($checkresult>0) {
				while($row = $queryresult->fetch_assoc()) {
					echo "<tr><td>".$row['item']."</td><td>".$row['description']."</td><td> $".$row['price']."</td></tr>";
				}
			}
			else {
				echo "<tr> <td> no items </td> <td> n/a </td> <td> n/a </td> </tr>";
			}
			echo "</table>";
		}//mains
		else if(array_key_exists('pets', $_POST)) {
			echo "<h2>Details about for pets</h2>";
			$sql = "UPDATE accesses SET number = number + 1 WHERE category = 'for pets'";

			if($conn->query($sql) == true) {
				$sql = "SELECT * FROM accesses WHERE category LIKE 'for pets'";
				$accessquery = mysqli_query($conn, $sql);
				$accessrow = $accessquery->fetch_assoc();
				echo "<span class = 'access'>You have requested this information ".$accessrow['number']." times</span>";
			}
			else {
				echo "Error updating view count... ".$conn->error;
			}

			//Print the Menu Items
			$sql = "SELECT * FROM menu WHERE category LIKE 'for pets'";
			$queryresult = mysqli_query($conn, $sql);
			$checkresult = $queryresult->num_rows;
			echo "<table class='printed'>";
			echo "<tr> <td><b>Item</b></td> <td><b>Description</b></td> <td><b>Price</b></td> </tr>";
			if($checkresult>0) {
				while($row = $queryresult->fetch_assoc()) {
					echo "<tr><td>".$row['item']."</td><td>".$row['description']."</td><td> $".$row['price']."</td></tr>";
				}
			}
			else {
				echo "<tr> <td> no items </td> <td> n/a </td> <td> n/a </td> </tr>";
			}
			echo "</table>";
		}//for pets
		else if(array_key_exists('poisonous', $_POST)) {
			echo "<h2>Details about poisonous</h2>";
			$sql = "UPDATE accesses SET number = number + 1 WHERE category = 'poisonous'";

			if($conn->query($sql) == true) {
				$sql = "SELECT * FROM accesses WHERE category LIKE 'poisonous'";
				$accessquery = mysqli_query($conn, $sql);
				$accessrow = $accessquery->fetch_assoc();
				echo "<span class = 'access'>You have requested this information ".$accessrow['number']." times</span>";
			}
			else {
				echo "Error updating view count... ".$conn->error;
			}

			//Print the Menu Items
			$sql = "SELECT * FROM menu WHERE category LIKE 'poisonous'";
			$queryresult = mysqli_query($conn, $sql);
			$checkresult = $queryresult->num_rows;
			echo "<table class='printed'>";
			echo "<tr> <td><b>Item</b></td> <td><b>Description</b></td> <td><b>Price</b></td> </tr>";
			if($checkresult>0) {
				while($row = $queryresult->fetch_assoc()) {
					echo "<tr><td>".$row['item']."</td><td>".$row['description']."</td><td> $".$row['price']."</td></tr>";
				}
			}
			else {
				echo "<tr> <td> no items </td> <td> n/a </td> <td> n/a </td> </tr>";
			}
			echo "</table>";
		}//poisonous
	?>

	<h2>We are hiring!</h2>
	<p>We are looking for employees who are</p>
	<ol>
	1. Reliable<br>
	2. Prompt<br>
	3. Friendly<br>
	</ol>
	
	<ul>
	<li>Able to deal with <em>obnoxious customers</em></li>
	<li>Able to deal with <em>critcal managers</em></li>
	<li>Able to cater to <em>the chef&#x27;s whims</em></li>
	</ul>

	<ol>
	4. <span class='multi'>Multi</span><span class='lingual'>lingual</span><br>
	5. <b>Healthy</b>
	</ol>
	
</body>
</html>
