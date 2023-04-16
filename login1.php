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
            height:300px;
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
            background:grey;
            color:white;
        }
        a{
            text-decoration:None;
            color:black;
        }
        p{
            text-align:center;
        }
        .error{
            background: red;
        }
    </style>
</head>
<body>
     <form action="login_check.php" method="post">
     	<center><h2>LOG IN</h2></center>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <label>User Name</label>
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"
                      required><br>
     	<label>Password</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Password"
                 required ><br>

     	<button type="submit">Log In</button>
          <a href="signup.php" class="ca">Didn't have an account?</a>
     </form>
</body>
</html>