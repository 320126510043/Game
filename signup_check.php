<?php 
session_start(); 
include "db_conn.php";
if (isset($_POST['uname']) && isset($_POST['password'])
		&& isset($_POST['name']) && isset($_POST['re_password'])&& isset($_POST['phno'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	function valid_phone($phone)
	{
    	if(preg_match('/^[0-9]{10}+$/', $phone))
		{
			return $phone;
		}
		else{
			header("Location: signup.php?error=Enter a Valid Phone Number&$user_data");
	    	exit();
		}
	}
    function valid_pass($pass)
	{
    	if(preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[^a-zA-Z0-9]).{8,16}$/', $pass))
		{
			return $pass;
		}
		else{
			header("Location: signup.php?error=Enter a 8 to 16 digits password consists of uppercase,lowercase,specialcharacters");
	    	exit();
		}
	}

	$uname = validate($_POST['uname']);
	$pass = valid_pass($_POST['password']);
	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);
	$phno=valid_phone($_POST['phno']);
	$_SESSION["name"]=$_SESSION["uname"]=$_SESSION["pass"]=$_SESSION["re_pass"]=$_SESSION["phno"]="";

	if (empty($name)){
		$_SESSION["name"]=$name;
        header("Location: signup.php?error=Name is required");
	    exit();
	}
	else if (empty($uname)) {
		$_SESSION["uname"]=$uname;
		header("Location: signup.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
		$_SESSION["pass"]=$pass;
        header("Location: signup.php?error=Password is required");
	    exit();
	}
	else if(empty($re_pass)){
		$_SESSION["re_pass"]=$re_pass;
        header("Location: signup.php?error=Re Password is required");
	    exit();
	}
	else if(empty($phno)){
		$_SESSION["phno"]=$phno;
        header("Location: signup.php?error=Phone Number is required");
	    exit();
	}
	else if($pass !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match");
	    exit();
	}

	else{
        
        $sql = "SELECT * FROM user WHERE user_name='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The username is taken try another");
	        exit();
		}
        else {
           $sql2 = "INSERT INTO user(user_name, phone_number, password, name) VALUES('$uname', '$phno','$pass', '$name')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: signup.php?success=Your account has been created successfully");
	         exit();
           }
           else {
	           	header("Location: signup.php?error=unknown error occurred");
		        exit();
           }
        }
    }
}
else{
	header("Location: signup.php");
	exit();
}