<?php
include 'backend/Auth.php';
require('backend/db_con.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="main.css" >
	<link rel="stylesheet" href="resources/css/darbinieki.css"/>
</head>
<body>
<table class="table-sortable">
		<thead>
			<tr>
				<th>Rank</th>
				<th>Name</th>
				<th>Age</th>
				<th>Occupation</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>Dom</td>
				<td>35</td>
				<td>Web Developer</td>
			</tr>
			<tr>
				<td>2</td>
				<td>Rebecca</td>
				<td>29</td>
				<td>Teacher</td>
			</tr>
			<tr>
				<td>3</td>
				<td>John</td>
				<td>30</td>
				<td>Civil Engineer</td>
			</tr>
			<tr>
				<td>4</td>
				<td>Andre</td>
				<td>20</td>
				<td>Dentist</td>
			</tr>
		</tbody>
	</table>

<div class="list">
	<div class="tabulaBox">
		<table class="table-sortable" id="customers">
				<thead>
					<tr class="tabula">
						<th class="teksts">ID</th>
						<th class="teksts">Nosaukums</th>
						<th class="teksts">Rediģēt</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$query = "SELECT * FROM kategorijas";
				$result = mysqli_query($con,$query);
				while($row = mysqli_fetch_array($result)) {
					?>
					<tr class="table" class="table">
						<td><?php echo $row["Kategorijas_ID"]; ?></td>
						<td><?php echo $row['Nosaukums']; ?></td>
						<td><a href="backend/delete.php?Kategorijas_ID=<?php echo $row["Kategorijas_ID"];?>"><button id='dzest'>Dzēst</button></a><br><a href="editdata.php>"><button id='labot'>Labot</button></a></td>
						</tr>
					<?php
					}
				?>
				</tbody>
		</table>
	</div>
</div>
</div>
	<script src="html.js"></script>
</body>
</html>

