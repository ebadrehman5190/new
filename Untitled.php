<?php

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

				//$select = mysqli_select_db('test');
				mysqli_select_db($conn,"test");
				
				
				$edit = "SELECT Member_name FROM selected_members ";				
				
				$record = mysqli_query($conn,$edit);
				$row = mysqli_fetch_row($record);
				
?>

<!doctype html>
<html>
<head>
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

<form method="POST" onSubmit="return revalidate()">

Date:<input type="date" name="date" id="date">

<br><br>

Members:
            <select multiple="multiple" name="member" id="member">
                <option>Select an members</option>
                <option value="<?php echo $row["Member_name"] ?>"><?php echo $row["Member_name"] ?></option>
                <option value="member1">member1</option>
                <option value="member2">member2</option>
                <option value="member3">member3</option>
                <option value="member4">member4</option>
                <option value="member5">member5</option>
                <option value="member6">member6</option>  
            </select>
    

<br><br>

<div class="input_fields_wrap">
 Items:    
    <div>
        <input type="text" name="mytext[]" id="mytext[]">
        <button class="add_field_button">Add More</button>
    </div>
</div>

<br>

Paid money:
            <select name="paid" id="paid">
                <option>Select an members</option>
                <option value="member1">member1</option>
                <option value="member2">member2</option>
                <option value="member3">member3</option>
                <option value="member4">member4</option>
                <option value="member5">member5</option>
                <option value="member6">member6</option>  
            </select>

<br><br>

Total amount:<input type="text" name="amount" id="amount">
                        
<br><br>

Per head:<input type="text" name="per_head" id="per_head" disabled>
                        
<br><br>
    <input type="submit" value="submit">
    
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

                    
            mysqli_select_db($conn,"test");
				$new = "INSERT INTO system (date, members, items, paid, amount, per_head)
				VALUES ('".$_POST['date']."','".$_POST['member']."', '".$items."', '".$_POST['paid']."', '".$_POST['amount']."', '".$_POST['per_head']."' )";
                
                if ($conn->query($new) === TRUE) {
					echo "New record created in system";
				}
                
                
		$conn->close();

		}
?>

    </form>

    
</body>
</html>                                