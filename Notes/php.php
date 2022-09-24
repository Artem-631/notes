<?php
    $server="localhost";
    $user="root";
    $password="";
    $base="Notes";
    $con=mysqli_connect($server, $user, $password, $base);
                    
    if($_POST["login"]!=null && $_POST["password"]!=null) {
        $login=$_POST['login'];
        $pas=$_POST['password'];
        $sql="INSERT INTO users(id, login, password) VALUES(id,'$login', '$pas')";
        if(mysqli_query($con, $sql)) {
            echo "Форма отправлена";
            echo '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
                </head>
                <body>
                    <script>
                        window.close()
                    </script>
                </body>
                </html>';
        } else {
            echo "Error: ". mysqli_error($con);
        }
        if($_POST["notes-text"]) {
            $text=$_POST["notes-text"];
            $sql="UPDATE users SET note_text='$text' WHERE password='22'";
            if(mysqli_query($con, $sql)) {
                echo "true";
            } else {
                echo "false";
            }
        }
    }
    mysqli_close($con);
?>