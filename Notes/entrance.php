<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <div class="wrapper">
        <div class="form">
            <form id="form" method="POST">
                <input type="text" name="login" placeholder="Логин" id="login"><br>
                <input type="password" name="password" placeholder="Пароль" id="password"><br>
                <input type="submit" value="Вход" id="submit"><br>
                <?php
                    $server="localhost";
                    $user="root";
                    $password="";
                    $base="Notes";
                    $con=mysqli_connect($server, $user, $password, $base);
                    if(mysqli_query($con, "SELECT * FROM users")) {
                        echo "<pre>";
                        print_r($arr);
                        echo "</pre>";
                    }
                    if($_POST["login"]!=null && $_POST["password"]!=null) {
                        $login=$_POST['login'];
                        $pas=$_POST['password'];
                        $sql="SELECT * FROM users WHERE login='$login' AND password='$pas'";
                        if(mysqli_query($con, $sql)) {
                            $arr=mysqli_fetch_all(mysqli_query($con, $sql), MYSQLI_ASSOC);
                            if(!$arr) {
                                echo "Повторите попытку. Вы ввели неправильный логин или пароль";
                            } else {
                                file_put_contents("info.json", json_encode($arr));
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
                                echo "Вход выполнен";
                            }
                        } else {
                            echo "Вход не выполнен";
                            echo "Error: ". mysqli_error($con);
                        }
                        // if($_POST["notes-text"]) {
                        //     $text=$_POST["notes-text"];
                        //     $sql="UPDATE users SET note_text='$text' WHERE password='22'";
                        //     if(mysqli_query($con, $sql)) {
                        //         echo "true";
                        //     } else {
                        //         echo "false";
                        //     }
                        // }
                    }
                    mysqli_close($con);
                ?>
            </form>
        </div>
    </div>
</body>
</html>