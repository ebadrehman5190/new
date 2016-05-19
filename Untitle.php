<!doctype html>
<html>
<head>

<title>jQuery Multi Select Dropdown with Checkboxes</title>


<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap-multiselect.js"></script>

</head>

<body>
    
    <form id="form1">

<div style="padding:20px">

<select id="chkveg" multiple="multiple">

<option value="cheese">Cheese</option>

<option value="tomatoes">Tomatoes</option>

<option value="mozarella">Mozzarella</option>

<option value="mushrooms">Mushrooms</option>

<option value="pepperoni">Pepperoni</option>

<option value="onions">Onions</option>

</select><br /><br />

<input type="button" id="btnget" value="Get Selected Values" />

</div>

</form>

<script type="text/javascript">


$(function() {

$('#chkveg').multiselect({

includeSelectAllOption: true

});

$('#btnget').click(function() {

alert($('#chkveg').val());

})

});

<script>

</body>

</html>