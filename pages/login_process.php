<?php
try{
require_once("config.php");
if(isset($_POST['sublogin']))
{
    $login=$_POST['login_var'];
    $password=$_POST['password'];
    $query="select * from users where (username='$login' OR email='$login')";
    $res=mysqli_query($dbc,$query);
    $numRows=mysqli_num_rows($res);
    if($numRows==1)
    {
        $row = mysqli_fetch_assoc($res);
        if(password_verify($password,$row['password']))
        {
            // die(json_encode(['row' => $row]));
            
            $_SESSION["login_sess"]="1";
            $_SESSION["login_email"]=$row['email'];
            $_SESSION["f_name"]=$row['fname'];
            $_SESSION["id"]=$row['id'];
            header("location:edit_profile.php");
            exit();
        }
        else
        {
            header("location:login.php?loginerror=".$login);
            exit();
        }
        
    }

    else
    {
        header("location:login.php?loginerror=".$login);
        exit();
    }
}

}
catch(Exception $e)
{
    echo $e->getMessage() ;
}

?>