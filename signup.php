<?php

$db="test";
$table="users";
$fname= $_POST['fname'];
$fpass = $_POST['fpass'];
$femail = $_POST['email'];

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

    $query = "INSERT INTO `users` (`username`, `password`, `email_id`) VALUES".parameterCreator($fname,$fpass,$femail);
    //echo $query;
    $result= mysqli_query($con,$query);
    if($result == false)
        echo mysqli_error($con);
    else
    {
        echo "<script language=\"JavaScript\">\n";
        echo "alert('Record Added.');\n";
        echo "window.location='home.html'";
        echo "</script>";
    }

}
else
    print("Error connecting! Contact developer.");