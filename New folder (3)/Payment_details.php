<?php
include('session1.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
</head>
<body>
    <a href="Entry.php">Home</a>    
    
<form method="POST" action="">  
    <fieldset style="width:30%;">
         <legend><h3>payment screen</h3></legend> 
    
    
Date:<input type="date" name="date" id="date"><br><br>

Member:
    <select name="member" id="member">
                <option>select member</option>
    <?php
                $conn = mysqli_connect('localhost','root','','test');
                mysqli_select_db($conn,"test");

				$edit = "SELECT User FROM selected_members ";				
					
	        	$result = mysqli_query($conn,$edit);
                 while($row = mysqli_fetch_array($result)) {
    ?>
                <option><?php echo $row["User"] ; } ?></option>  
    </select>
<br><br>
<input type="submit" value="search">
</fieldset>
</form>    

<?php
    $conn = mysqli_connect('localhost','root','','test');
    mysqli_select_db($conn,"test");
				
    $fetch="SELECT date, members, items, paid, amount, per_head FROM lunch_system WHERE date ='". $_POST['date'] ."' AND members LIKE '%". $_POST['member'] ."%' ";
                
    $amount = mysqli_query($conn, $fetch);
    $data = mysqli_fetch_array($amount);
?>

<br>
Date: 
<span style="margin-left:50px;"><b><?php echo $data['date']; ?></b></span>
<br>
Members: 
<span style="margin-left:20px;"><b><?php echo $data['members']; ?></b></span>
<br>
Items: 
<span style="margin-left:45px;"><b><?php echo $data['items']; ?></b></span>
<br>
Paid: 
<span style="margin-left:50px;"><b><?php echo $data['paid']; ?></b></span>
<br>
Amount: 
<span style="margin-left:25px;"><b><?php echo $data['amount']; ?></b></span>
<br>
Per_head: 
<span style="margin-left:18px;"><b><?php echo $data['per_head']; ?></b></span>
    
</body>
</html>