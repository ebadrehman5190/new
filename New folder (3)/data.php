<?php
include('session1.php');
?>

<!doctype html>
<html>
<head>

<style>

	.field_set{
	 background-color:white;
	 border:solid;
	 text-align:center;
	 margin-left:10px; 
	 margin-top:0px;
     width:80%;
	 }
	 
</style>	 

</head>

<body>
<form action='#' method="post">
	

<?php
		
		$conn = mysqli_connect('localhost','root','','test');
		mysqli_select_db($conn,"test");

		$query = "SELECT date,members,items,paid,amount,per_head FROM system ";
		$amount = "SELECT SUM(amount),SUM(per_head) FROM system ";
			
		$result = mysqli_query($conn,$query);
		$sum = mysqli_query($conn,$amount);
        
        $total = mysqli_fetch_array($sum);     
		
echo '<table border="2">';
	echo '<tr>';
		echo '<th>Date</th>';
		echo '<th>Members</th>';
		echo '<th>Items</th>';
        echo '<th>Paid</th>';
		echo '<th>Amount</th>';
		echo '<th>Per_head</th>';
	echo '</tr>';
		while($row = mysqli_fetch_array($result)){
	echo '<tr>';
		echo '<td>' . $row['date'] . '</td>';
		echo '<td>' . $row['members'] . '</td>';
		echo '<td>' . $row['items'] . '</td>';
        echo '<td>' . $row['paid'] . '</td>';
		echo '<td>' . $row['amount'] . '</td>';
		echo '<td>' . $row['per_head'] . '</td>';
	echo '</tr>';
        }
    echo '<tr>';
        echo '<td><b>Total</b></td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td><b>' . $total['SUM(amount)'] .'</b></td>';
//        echo '<td>' . $total['SUM(per_head)'] .'</td>';
    echo '</tr>';
echo '</table>';
		?>
        
		</form>

<br><br>
        <a href="Entry.php">Entry</a>	    
<br><br>
	<input name="logout" type="button" id="logout" value="logout" onclick="window.location='logout1.php'" >
 	
		
</body>
</html>        