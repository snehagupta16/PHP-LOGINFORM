<?php
    // echo "<pre>";
    //      print_r($_REQUEST);

    // echo "</pre>";
    //signup operation 
    //SUPER GLOBAL VARIABLE [$_GET,$_POST,$_REQUEST]
    //get value from form and store in different varaibles
    if(isset($_POST['signup']))
    {
        $name=$_POST['Name'];
        $email=$_POST['Email'];
        $password=$_POST['password'];
        echo $password;
    //connection with mysql server and the database
        $mycon=mysqli_connect("localhost","root","","form");
    //run sql query
        $q="insert into login values ('$name','$email','$password')";
        $rec=mysqli_query($mycon,$q);
        echo "Record saved!";
    //close the connection
        mysqli_close($mycon);

    }