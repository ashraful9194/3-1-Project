<?php
try{
require_once("../config.php");
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
            
            $_SESSION["login_email"]=$row['email'];
            $_SESSION["f_name"]=$row['fname'];
            $_SESSION["l_name"]=$row['lname'];
            $_SESSION["id"]=$row['id'];
            $_SESSION["role"]=$row['role'];
            
            $_SESSION["username"]=$row['username'];
            
            

            if(isset($_POST['rememberme']))
            {
               
                if($_SESSION['role']=="Admin")
                {
                    setcookie('emailcookie',$login,time()+604800); // 7 days cookie
                    header("location: ../admin_panel/adminpanel.php");
                    exit();
                }
                elseif($_SESSION['role']=="Contributor")
                {
                    setcookie('emailcookie',$login,time()+604800); // 7 days cookie
                    header("location: ../contributors_dashboard/contributors_dashboard.php");
                    exit();
                }

                else {setcookie('emailcookie',$login,time()+604800); // 7 days cookie
                header("location: ../../index.php");
                exit();}

                
            }
            else
            {
                if($_SESSION['role']=="Admin")
                {
                    header("location: ../admin_panel/adminpanel.php");
                    exit(); 
                }
                elseif($_SESSION['role']=="Contributor")
                {
                    header("location: ../contributors_dashboard/contributors_dashboard.php");
                    exit();
                }
                else{
                header("location: ../../index.php");
                exit();}
            }

            
        }
        else
        {
            header("location:../login.php?loginerror=".$login);
            exit();
        }
        
    }

    else
    {
        header("location:../login.php?loginerror=".$login);
        exit();
    }
}

}
catch(Exception $e)
{
    echo $e->getMessage() ;
}
mysqli_close($dbc);?>