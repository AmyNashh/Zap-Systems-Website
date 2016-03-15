<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<head>
<link rel="stylesheet" type="text/css" href="Zap_Stylesheet.css">
<title> Zap Systems </title>
<style>
table {
    width: 100%;
    border: 1px solid #091562;
    border-collapse: collapse;
}

th {
    height: 50px;
    color:white;
    background-color: #5DBCD2;
    text-align: left;
    padding: 10px;
    
}
td { 
    padding: 10px;
    height: 50px;
}

tr:hover {background-color:#c4e7f2}
tr{background-color: #fff;}
</style>

<script type="text/javascript">
function checkForm(form)
{
if(form.Name.value == "") {
alert("Error:Name is empty!");
form.Name.focus();
return false;
}

var re = /^[\w ]+$/;

if(!re.test(form.Name.value)) {
alert("Error: Input contains invalid characters!");
form.Name.focus();
return false;
}

return true;
}
</script>
</head>

<body>
<div id="header">
<a href="1_Home_Screen.html">
<img src="Zap.gif" alt="Zap Icon"</a> </div>
<div id="nav">
<ul>
  <li><a href="1_Home_Screen.html">Home</a></li>
  <li><a href="2_Sales.php">Sales</a></li>
  <li><a href="3_Customer_Support.php">Customer Support</a></li>
  <li><a href="4_Specialist.php">Specialist</a></li>
  <li><a href="5_Sales_Training.php">Sales & Training</a></li>
</ul>
</div>

<form action="2_Sales.php" method="post">
</form>
<div id="feature"> 
<h3>Register a new customer</h3>
<form action="SALES2.php" method="post" onsubmit="return checkForm(this);">
<!----this is what comes up on the page*/ 			/*this is the link to the database----->
  <label>Customer Registration Id</label><input type="text" name="Customer_Id"><br>
  <label>Customer Name</label><input type="text" name="Name"><br>
  <label>Customer Email</label> <input type="email" name="Email"><br>
  <label>Customer Phone number</label> <input type="tel" name="Tel_Number"><br>
  <label>Female</label> <input type="radio" value="female" checked name="Gender"><br>
  <label>Male</label> <input type="radio" value= "male" name="Gender"><br>
  <label>Customer Date of Birth</label> <input type="Date" name="D_O_B"><br>
  <label>Customer Address</label><input type="text" name="Address"><br>
  <label>Date Registered</label><input type="Date" name="Date_Registered"><br>
  <label>Free Support Days</label><input type="number" name="Free_Support_Days"><br>
  <label>Not Paid Support</label><input type="radio" value="not paid" name="Paid_Support" ><br>
  <label>Paid Support</label><input type="radio" value="paid" name="Paid_Support" ><br>
  <label>Product</label><input type="text" name="Product"><br>
  <label>Product id</label><input type="text" name="Product_id"><br><br>
  <input type="submit" value="Submit" style="height:100px; width:100px"><br>
</form>
<br>
<br>
<br>
<div style="overflow-x:auto;">

<?php
error_reporting(E_ALL^E_DEPRECATED);
$con = mysql_connect("localhost","root"); //connecting to the database
if (!$con)
  {
  die('Could not connect: ' . mysql_error()); //if connection is unsuccessful it give a message 'could not connect'
  }

mysql_select_db("Zap_Systems", $con); //tells which database that you want to work with

$result = mysql_query("SELECT * FROM Customer"); //getting information from customer table

echo "<table border='1'>  
<tr> 
<th>Customer_Id</th>
<th>Name</th>
<th>Email</th>
<th>Tel_Number </th>
<th>Gender</th>
<th>D_O_B</th>
<th>Address</th>
<th>Date_Registered</th>
<th>Free_Support_Days</th>
<th>Paid_Support</th>
<th>Product</th>
<th>Product_id</th>
</tr>";

while($row = mysql_fetch_array($result)) //this creates a loop 
  {
  echo "<tr>";
  echo "<td>" . $row['Customer_Id'] . "</td>";
  echo "<td>" . $row['Name'] . "</td>";
  echo "<td>" . $row['Email'] . "</td>";
   echo "<td>" . $row['Tel_Number'] . "</td>";
   echo "<td>" . $row['Gender'] . "</td>";
  echo "<td>" . $row['D_O_B'] . "</td>";
  echo "<td>" . $row['Address'] . "</td>";
   echo "<td>" . $row['Date_Registered'] . "</td>";
     echo "<td>" . $row['Free_Support_Days'] . "</td>";
  echo "<td>" . $row['Paid_Support'] . "</td>";
  echo "<td>" . $row['Product'] . "</td>";
   echo "<td>" . $row['Product_id'] . "</td>";
   
  echo "</tr>";
  }
echo "</table>";

mysql_close($con); //closing connection
?> 
</div>
</div>
<div id="footer"> </div>
</body>
</html>