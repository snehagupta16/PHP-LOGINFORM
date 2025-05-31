<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form</title>
    <style>
        .con{
            border: 8px inset rgb(186, 166, 84);
            border-radius: 20px;
            width: 500px;
            height: 450px;
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
            line-height: 40px;
            font-weight: bold;
            font-size: 28px;
            color: rgb(55, 28, 28);
            text-shadow: 2px 2px 2px white;
            background-color: rgba(191, 94, 41, 0.501);
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
        }
        body{
            background: url(pic5.png);
            background-repeat: no-repeat;
            background-size: cover;
        }
        #h1{
            color: rgb(43, 14, 59);
            text-shadow: 2px 2px 3px rgb(244, 239, 239);
            font-size: 35px;
            text-decoration: underline;
        }
        #signup{
            color: rgb(225, 221, 228);
            background-color: rgb(14, 2, 2);
            width: 90px;
            height: 35px;
            font-size: 18px;
            font-weight: bold;
            border: 5px outset white;
            margin-top: 50px;
            margin-left: 20px;
            cursor: pointer;
            border-radius: 50px;
        }
        #signup:hover{
            color: rgb(229, 237, 229);
            background-color: green;
        }
        #signin{
            color: rgb(225, 221, 228);
            background-color: rgb(4, 3, 3);
            width: 90px;
            height: 35px;
            font-size: 18px;
            font-weight: bold;
            border: 5px outset white;
            margin-top: 50px;
            margin-left: 40px;
            cursor: pointer;
            border-radius: 50px;
        }
        #signin:hover{
            color: rgb(229, 237, 229);
            background-color: green;
        }
        .box{
            width: 300px;
            height: 23px;
        }
        .box1{
             width: 300px;
            height: 23px;
        }
        .box2{
             width: 300px;
             height: 23px;
        }
    </style>
</head>
<body>
    <div class="con">
        <h1 id="h1"> User SignUp/SignIn</h1>
     <form action="" method="post">
        <label for="Name">Name</label><br>
        <input type="text" name="Name" id=" Name" class="box"><br>
        <label for="Email">Email</label><br>
        <input type="email" name="Email" id="Email" class="box1"><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" class="box2"><br>
        <input type="submit" value="SignUp" name="signup" id="signup">
        <input type="submit" value="SignIn" name="signin" id="signin">
    </form>
    </div> 
    <?php
    if(isset($_POST['signup']))
    {   // to get value from inputboxes and store in different variables as soon as signup button click
        $name=$_POST['Name'];
        $email=$_POST['Email'];
        $password=$_POST['password'];
        //connect with mysql server and its database
        $mycon=mysqli_connect('localhost','root',"",'form');
        //write a query to insert record in the users table but currently just store the query in q variable
        $q="insert into login values ('$name','$email','$password')";
        //execute the query written above to finally insert the record in the table 'users'
        $res=mysqli_query($mycon,$q);
        echo $res."SignUP Completed!";


    }
    if(isset($_POST['signin']))
    {
        $name=$_POST['Name'];
        $email=$_POST['Email'];
        $password=$_POST['password'];
    //connection with mysql server and the database
        $mycon=mysqli_connect("localhost","root","","form");
        $q="select * from login where email='$email' and password='$password'";
        $rec=mysqli_query($mycon,$q);
        //mysqli_fetch_assoc()
        if(mysqli_num_rows($rec)>0)
        {
            echo "Login!";
        }
        else{
            echo "Login Failed because invalid email or password!";
        }
    }
    ?>
</body>