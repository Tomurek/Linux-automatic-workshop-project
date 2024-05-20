<?php
require_once "config.php";
 


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$name = "";
$surname = "";

    if(empty(trim($_POST["name"]))){
        $username_err = "Wprowadz swoje imie.";
    } else{
        $sql = "SELECT id FROM logins WHERE name = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_name);
            
            $param_name = trim($_POST["name"]);
            
        }

        mysqli_stmt_close($stmt);
    }
    if(empty(trim($_POST["surname"]))){
        $username_err = "Wprowadz swoja nazwisko.";
    } else{
        $sql = "SELECT id FROM logins WHERE surname = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_surname);
            
            $param_surname = trim($_POST["surname"]);
            
        }

        mysqli_stmt_close($stmt);
    }
    
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Wprowadz swoja nazwe uzytkownika.";
    } else{
        $sql = "SELECT id FROM logins WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = trim($_POST["username"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Ta nazwa uzytkownika jest juz zajeta.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Cos poszlo nie tak. Sprobuj ponownie..";
            }
        }

        mysqli_stmt_close($stmt);
    }

    if(empty(trim($_POST["password"]))){
        $password_err = "Wprowadz swoje haslo.";
    } elseif(strlen(trim($_POST["password"])) < 5){
        $password_err = "Haslo musi miec przynajmniej 5 znakow";
    } else{
        $password = trim($_POST["password"]);
    }

    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Potwierdz swoje haslo.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Hasla sie nie zgadzaja.";
        }
    }
    
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        $sql = "INSERT INTO logins (name,surname,username, passwd) VALUES (?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ssss",$param_name, $param_surname, $param_username, $param_password);

            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);

            if(mysqli_stmt_execute($stmt)){
                header("location: users.php");
            } else{
                echo "Cos poszlo nie tak. Sprobuj ponownie..";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}
?>
