<?php

$db="test";
$table="users";
$fname= $_POST['fname'];
$fpass = $_POST['fpass'];

function parameterCreator()
{
    $generated="(";
    for($i=0; $i<func_num_args(); $i++)
    {
        if($i!=0)
            $generated.=",";

        if(is_string(func_get_arg($i))== true)
            $generated .= "'".func_get_arg($i)."'";
        else if(is_numeric(func_get_arg($i))==true)
            $generated .= func_get_arg($i);
    }
    $generated .= ")";
    return $generated;
}
$con = mysqli_connect('localhost','root','');
$db = mysqli_select_db($con,$db);
if($con)
{
    //echo nl2br("\nConnected!");
    //$query = "INSERT INTO `user_log` (`username`, `password`) VALUES".parameterCreator($fname,$fpass);
    //SELECT * FROM `users` WHERE `username` = 'test' AND `password` = 'test'
    $query = "SELECT * FROM `users` WHERE "."`USERNAME`=".parameterCreator($fname)." AND "."PASSWORD=".parameterCreator($fpass);
    echo $query;
    $result= mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0)
    {
        echo "<script language=\"JavaScript\">\n";
        echo "alert('Login Succesful.');\n";
        echo "window.location='home.html'";
        echo "</script>";

    }
    else
        echo "<br>INVALID USER/PASS! :(";

}else
{
    print("Not connected!");
}

