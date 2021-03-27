<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Update Form</title>

<link rel="stylesheet" type="text/css" href="upstyle.css" ></link>
<link rel="shortcut icon" type="image/x-icon" href="favicon.jpg" ></link>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script>
$(document).ready(function($){
    $('#cnic').mask("99999-9999999-9",{placeholder:"XXXXX-XXXXXXX-X"});
	$('#phno').mask("0399-9999999",{placeholder:"03XX-XXXXXXX"});
});
</script>
</head>
<body>
<form action="" method="post"><center>
<div class="fnt">
<?php

$serverName="localhost";
$userName="root";
$password="";
$dbName="mydata";

$conn = new mysqli($serverName,$userName,$password,$dbName);

if($conn->error){
    die("Error: ".$conn->error);
}else{
    echo "Database connected Successfully";
	echo '<br>';
}

$Id = $_GET['id'];
$qqry = "SELECT * FROM user WHERE id=$Id";
$result = $conn->query($qqry);
$ftch = $result->fetch_assoc();

if (isset($_POST['submit'])){
$name =$_POST['name'];
$passw =$_POST['password'];
$email =$_POST['email'];
$cnic =$_POST['cnic'];
$faname =$_POST['faname'];
$rgno =$_POST['rgno'];
$gndr =$_POST['gender'];
$campus =$_POST['campus'];
$department =$_POST['department'];
$phno =$_POST['phno'];
$decipline =$_POST['decipline'];
$shift =$_POST['shift'];
$semister =$_POST['semister'];
$section =$_POST['section'];
$nationality =$_POST['nationality'];
$praddr =$_POST['praddr'];
$psaddr =$_POST['psaddr'];
$dob =date('Y-m-d',(strtotime($_POST['dob'])));

$qry ="UPDATE `user` SET `Name`='".$name."',`Password`='".$passw."',`Email`='".$email."',`Cnic`='".$cnic."',`FatherName`='".$faname."',`RegistrationNo`='".$rgno."',`Gender`='".$gndr."',`Campus`='".$campus."',`Department`='".$department."',`PhoneNo`='".$phno."',`Decipline`='".$decipline."',`Shift`='".$shift."',`Semister`='".$semister."',`Section`='".$section."',`Nationality`='".$nationality."',`PermanentAddr`='".$praddr."',`PostalAddr`='".$psaddr."',`DateOfBirth`='".$dob."' WHERE id='$Id'";
$resultt = $conn->query($qry);

if($conn->query($qry)==true){
    echo "Record Updated Successfully";
	echo '<br>';
	echo '<a href="./index.php?" style="color:powderblue;">Back to Records</a>';

}else {
    echo "Error: ".$qry."<br> Database Error:".$conn->error;
}
}
?>

<table>

<tr><td><td style="color:yellow;font-family:montserrat;font-weight:bold;padding-left:200px;font-size:20px">UPDATE HERE</td></td></tr>
<tr>
<th style="color:red">Fill all required fields</th>
</tr>
<tr>
	<td >
	Full Name:
	</td>
	<td>
	<input type="text" id="user_name" name="name" value="<?php echo $ftch['Name']; ?>" required placeholder="Enter Your Full Name" onkeypress="return /[a-z ]/i.test(event.key)" maxlength="30" style="width:235px;">
	</td>
	<td>
	Email:
	</td>
	<td>
	<input type="email" id="user_email" value="<?php echo $ftch['Email']; ?>" name="email" required placeholder="Enter Your Valid Email" style="width:235px;" pattern="[a-z0-9.]+@[a-z]+.[com]{2,}$">
	</td>
</tr>
<tr>
	<td>
	Password :
	</td>
	<td>
	<input type="text" id="user_password" value="<?php echo $ftch['Password']; ?>" name="password" required placeholder="Create new password" style="width:235px;">
	</td>
	<td>
	CNIC :
	</td>
	<td>
	<input type="text" name="cnic" id="cnic" value="<?php echo $ftch['Cnic']; ?>" placeholder="Enter Your CNIC" required style="width:235px;">
	</td>
</tr>
<tr>
	<td>
	Father Name :
	</td>
	<td>
	<input type="text" required value="<?php echo $ftch['FatherName']; ?>" name="faname" placeholder="Enter Your Father Name" maxlength="30" onkeypress="return /[a-z ]/i.test(event.key)" style="width:235px;">
	</td>
	<td>
	Registration No.:
	</td>
	<td>
	<input type="text" name="rgno" value="<?php echo $ftch['RegistrationNo']; ?>" required placeholder="MLISB-F123****"  style="width:235px;">
	</td>
</tr>
<tr>
	<td>
	Date of Birth :
	</td>
	<td>
	<input type="date" name="dob" value="<?php echo $ftch['DateOfBirth']; ?>"  style="width:238px;">
	</td>
	<td>
	Phone Number :
	</td>
	<td>
	<input type="text" name="phno" required value="<?php echo $ftch['PhoneNo']; ?>" id="phno" placeholder="e.g 0300*******"  style="width:235px;" >
	</td>
</tr>
<tr>
	<td>
	Gender :
	</td>
	<td required value="<?php echo $ftch['Gender']; ?>">
	<input type="radio" name="gender" value="MALE" style="width:25px;"/>Male
<input type="radio" name="gender" value="FEMALE" style="width:25px;"/>Female
<input type="radio" name="gender" value="OTHER" style="width:25px;"/>Other
	</td>
	<td>
	Campus :
	</td>
	<td>
	<Select name="campus" value="<?php echo $ftch['Campus']; ?>" style="width:243px;">
<option >Main(Islamabad)</option>
<option >Lahore</option>
<option >Peshawar</option>
<option>Rawalpindi</option>
<option>Multan</option>
<option>Hyderabad</option>
<option>Quetta</option>
<option>Karachi</option>
<option>Faisalabad</option>
<option>Other</option>
</Select>
	</td>
</tr>
<tr>
	<td>
	Department :
	</td>
	<td>
	<Select  required="" name="department" value="<?php echo $ftch['Department'] ?>" id="user_department" style="width:243px;">
<option value="">Department</option>
<option>Computer Science</option>
<option>Management Science</option>
<option>Economics</option>
<option>Electrical Engineering</option>
<option>Software Engineering</option>
<option>Mass Communication</option>
<option>Islamic Studies</option>
<option>Chinese</option>
<option>Other</option>
</select>
	</td>
	<td>
	Decipline :
	</td>
	<td>
	<input type="text" value="<?php echo $ftch['Decipline']; ?>" required name="decipline" placeholder="i.e BSCS" maxlength="20" onkeypress="return /[a-z ]/i.test(event.key)" style="width:235px;"  >
	</td>
</tr>
<tr>
	<td>
	Shift :
	</td>
	<td>
	<select name="shift" required="" value="<?php echo $ftch['Shift']; ?>" style="width:243px;">
		<option value="">Shift</option>
		<option>Morning</option>
		<option>Evening</option>
	</select>
	</td>
	<td>
	Semister:
	</td>
	<td>
	<Select name="semister" required="" value="<?php echo $ftch['Semister']; ?>" style="width:243px;"> 
<option value="">Semister </option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
</Select>
	</td>
</tr>
<tr>
	<td>
	Section :
	</td>
	<td>
	<Select name="section" value="<?php echo $ftch['Section']; ?>" style="width:243px;">
<option >No Section</option>
<option >A</option>
<option >B</option>
<option >C</option>
<option >D</option>
<option >E</option>
<option >F</option>
<option >G</option>
</Select> </td>
	<td>
	Nationality :
	</td>
	<td>
	<input type="text" required name="nationality" value="<?php echo $ftch['Nationality']; ?>" placeholder="i.e Pakistanis" maxlength="20" onkeypress="return /[a-z ]/i.test(event.key)" style="width:235px;"  >
	</td>
</tr>
<tr>
	<td>
	Permanent Address :
	</td>
	<td> 
	<textarea  type="text" name="praddr" value="<?php echo $ftch['PermanentAddr']; ?>" required placeholder="Enter your permanent address"  rows="3" cols="10"  style="width:237px;"></textarea>
	</td>
	<td>
	Postal Address :
	</td>
	<td>
	<textarea name="psaddr" value="<?php echo $ftch['PostalAddr']; ?>" required  placeholder="Enter your postal address"  rows="3" cols="10"  style="width:237px;"></textarea> 
	</td>
</tr>
<tr><td><div class="btnpt">
<input class="btn btn1"  type="submit" name="submit" value="UPDATE"></div></td>
</tr>
</table></div>

<form></center>
</body>
</html>