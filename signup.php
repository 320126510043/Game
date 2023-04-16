<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <style>
        * {
            font-family: sans-serif;
            box-sizing: border-box;
        }
        form{
            display:block;
            height:600px;
            width:400px;
            border:1px solid black;
            padding:20px;
            border-radius:10px;
            background: whitesmoke;
        }
        body {
            background: #91d7e4;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        input{
            padding:5px;
            margin:10px;
            width:95%;
            border-radius:10px;
            display: block;
        } 
        button{
            float:right;
            background:blue;
            color:white;
        }
        a{
            text-decoration:None;
            color:black;
        }
        p{
            text-align:center;
        }
        .success{
            background: lightgreen;
        }
        .error{
            background: red;
        }
    </style>
</head>
<body>
     <form action="signup_check.php" method="post">
     	<center><h2>SIGN UP</h2></center>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Name</label>
               <input type="text" 
                      name="name" 
                      placeholder="Name"
                      required><br>
          <label>User Name</label>
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"
                      required><br>
        <label>Phone Number</label>
     	<input type="tel" 
                 name="phno" 
                 placeholder="Phone Number"
                required><br>

     	<label>Password</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Password"
                 required ><br>

          <label>Re Password</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Re_Password"
                required><br>

     	<button type="submit">Sign Up</button>
          <a href="login.php" class="ca">Already have an account?</a>
     </form>
</body>
</html>