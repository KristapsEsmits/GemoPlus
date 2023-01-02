<?php
include 'backend/Auth.php';
require('backend/db_con.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="resources/css/table.css"/>
</head>
<body>
<div class="list">
	<div class="tabulaBox">
		<table class="table-sortable" id="trow">
				<thead>
					<th>ID</th>
					<th>Nosaukums</th>
					<th>Rediģēt</th>
				</thead>
				<tbody>
				<?php
				$query = "SELECT * FROM kategorijas";
				$result = mysqli_query($con,$query);
				while($row = mysqli_fetch_array($result)) {
					?>
					<tr class="table">
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
	<script src="resources/js/table.js"></script>
</body>
</html>

