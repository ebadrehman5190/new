<?php
include('session1.php');
?>

<!doctype html>
<html>
<head>
    
    <title>Entry</title>

    
    <style>
     .align{
            margin-left:10px;
           }
        
        	 
	body {
	background-image: url("images/images.jpg");
    background-size: 1280px 710px;
    background-repeat: no-repeat;    
	}
    </style>    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

<script>
    $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>

<script type="text/javascript">
    function myFunction(value) { 
        var options = document.getElementById('mSelect').options, count = 0;
        for (var i = 0; i < options.length; i++) {
            if (options[i].selected)
                count++;
        }
        var resultText = value/count ;
        console.log("resultText :"+resultText);
        document.getElementById("resultHere").value=resultText;
        
    }
</script>

</head>        
<body>
    
<?php

$date=$member=$items=$paid=$amount=$per_head="";

        if (empty($_POST["date"])){
			$date="";
		} else {
			$date = test_input($_POST["date"]);
		}
        
        if (empty($_POST["member"])){
			$member="";
		} else {
			$member = test_input($_POST["member"]);
		}
        
        if (empty($_POST["mytext"])){
			$items="";
		} else {
			$items = test_input($_POST["mytext"]);
		}
        
        if (empty($_POST["paid"])){
			$paid="";
		} else {
			$paid = test_input($_POST["paid"]);
		}
        
        if (empty($_POST["amount"])){
			$amount="";
		} else {
			$amount = test_input($_POST["amount"]);
		}
        
        if (empty($_POST["per_head"])){
			$per_head="";
		} else {
			$per_head = test_input($_POST["per_head"]);
		}
        
function test_input($data) {
	
}        
        
?>        

<form method="POST" onSubmit="return revalidate()" >

Date:
<div class="align">
<input type="date" name="date" id="date">
</div>

<br><br>

Members:
<div class="align">
            <select multiple="multiple" name="member[]" id="mSelect" size="3">
                <option>select members</option>
                <?php
		
                $conn = mysqli_connect('localhost','root','','test');
                mysqli_select_db($conn,"test");

				$edit = "SELECT User FROM selected_members ";				
					
	        	$result = mysqli_query($conn,$edit);
                                                
                 while($row = mysqli_fetch_array($result)) {
                     ?>
                     <option>
                     <?php echo $row["User"] ; } ?>
                    </option>
            </select>
    </div>

<br><br>

       Items:  
         <div class="align">
<div class="input_fields_wrap">   
    <div>
         <div>
            <input type="text" name="mytext[]" id="mytext[]">
            <button class="add_field_button">Add More</button>
         </div>  
         </div> 
    </div>
</div>

<br><br>

Paid money:
<div class="align">
            <select name="paid" id="paid">
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
</div>
<br><br>

Total amount:<div class="align">
<input type="number" name="amount" id="amount" class="countOne" onkeyup="myFunction(this.value)">
</div>
                        
<br><br>

Perhead: 
<div class="align">
<input type="text" name="per_head" id="resultHere">
</div>
                        
<br><br>
    <input type="submit" value="submit">
    
<br><br>
        <a href="data.php">Data</a>
    
<br><br>
	<input name="logout" type="button" id="logout" value="logout" onclick="window.location='logout1.php'" >
    
    
<?php
            if($_POST){
                
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "test";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    } 
                    


            $items=implode(',',$_POST['mytext']);
            $select=implode(',',$_POST['member']);

                    
            mysqli_select_db($conn,"test");
				$new = "INSERT INTO system (date, members, items, paid, amount, per_head)
				VALUES ('".$_POST['date']."', '".$select."', '".$items."', '".$_POST['paid']."', '".$_POST['amount']."', '".$_POST['per_head']."' )";
                
                if ($conn->query($new) === TRUE) {
					echo "New record created in system";
				}
                                
		$conn->close();

		}
?>

    </form>

</body>
</html>                               