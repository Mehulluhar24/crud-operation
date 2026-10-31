<?php

 $insert=false;
 $update=false;
 $delete=false;

// if ($_SERVER['REQUEST_METHOD']==$_POST)           in this i mistake in the $_post.............................................
//{
//     $_server="localhost";
//     $user="root";
//     $password="";
//     $database="reg";

//     $con=mysqli_connect($_server,$user,$password,$database);

//     if (!$con) {
    
//             die("databaase does not connect" .mysqli_connect_error());
//     }

//     echo "connection success";


    
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    $server="localhost";
    $username="root";
    $password="";
    $database="reg";

    $con = mysqli_connect($server,$username,$password,$database);
    if (!$con) {
        die ("connection failed Due to" .mysqli_connect_error());
    }
    //echo "success connection...";

    $no=$_POST['no'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];


    // if ($_POST=['action']=="insert") {
   
    //     $sql="INSERT INTO iud (`no`, `name`, `phone`, `gender`) VALUES ('$no','$name','$phone','$gender');";

    //      if ($con->query($sql)===true) {...............................
    //         echo "inserted success...";
    //         $insert=true;
    //     }

    //     else {
    //         echo "Error:<$sql> <br> $con->error";
    //     }
    // }

    if ($_POST['action'] == "insert") {

        $sql = "INSERT INTO iud (no, name, phone, gender)
                VALUES ('$no', '$name', '$phone', '$gender')";

        if ($con->query($sql)) {
            echo "Inserted successfully!";
            $insert=true;
        } else {
            echo "Insert Error: " . $con->error;
        }
    }


    elseif ($_POST['action']=="update") {
       $sql="UPDATE `iud` SET `name`='$name',`phone`='$phone',`gender`='$gender' WHERE `no`='$no' ";

        if ($con->query($sql)==true) {
            echo "Updated success...";
            $update=true;
        }
        else{
            echo " update Error ($sql) <br> .$con->error";
        }

    }
    elseif($_POST['action']=="delete"){
        $sql="DELETE FROM `iud` WHERE `no`='$no' ";

        if ($con->query($sql)==true) {
            echo "Delete success...";
            $delete=true;
        }
        else{
            echo "Delete Error ($sql) <br> .$con->error";
        }

    }
    
    $con->close();



}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        form {
            
            text-align: left;
            border: 2px solid black;
            height: 300px;
            width: 300px;
            background-color: aquamarine;
            font-weight: bold;
            margin-top: 200px;
            margin-left: 200px;
            padding-bottom: 20px;
        }

        .Insert {
            background-color: red;
            padding: 10px;
            
        }

        .Update{
            background-color: green;
            padding: 10px;
        }

        .Delete{
            background-color: blue;
            color: aliceblue;
            padding: 10px;
        }

    </style>
</head>

<body>
    <form action="crud.php" method="post">
        Number:<input type="number" min="1" name="no" max="50" placeholder="enter No" width="20px"><br>
        Name: <input type="text" name="name" class="txt" placeholder="enter the Name"><br>
        phone: <input type="text" name="phone" class="txt1" placeholder="enter the phone No"> <br>
         Gender: <input type="text" name="gender"><br>
        <!-- <input type="radio" name="male">Male <input type="radio" name="female">Female <br> -->
        <br>
        <button type="submit" name="action" value="insert" class="Insert">Insert</button>
        <button type="submit" name="action" value="update" class="Update">Update</button>
        <button type="submit" name="action" value="delete" class="Delete">Delete</button>

    </form>


</body>

</html>

