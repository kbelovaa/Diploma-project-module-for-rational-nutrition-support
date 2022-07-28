<?php
session_start();
include_once 'connect.php';
if(isset($_POST['btn-login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $type = "admin";
    $query = "SELECT * FROM admin where username = '$username' ";
    $result = mysqli_query($conn,$query);

    $row = mysqli_fetch_assoc($result);

    $db_username = $row['username'];
    $db_password = $row['password'];

    if ($username === $db_username && $password === $db_password)
    {
        $_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['username'] = $username;
        $_SESSION['type'] = $type;
        header("location:index.php?adp=0");

    }
    
    else
    {
        echo '<script language="javascript">';
        echo 'alert("Неверное имя пользователя или пароль!")';
        echo '</script>';

    }

}
?>

<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="foodie_ad.jpg" type="image/jpg">

    <title>Панель администратора</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/sb-admin.css" rel="stylesheet">

    <link href="css/plugins/morris.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        <div id="wrapper">

            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Переключение навигации</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php?adp=0">Admin</a>
                </div>
                <?php
                if(isset($_SESSION['valid'])==True && ($_SESSION['type'])=="admin"){            
                    echo "<ul class=\"nav navbar-right top-nav\">
                    <li class=\"dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"fa fa-user\"></i> ".$_SESSION['username']." <b class=\"caret\"></b></a>
                        <ul class=\"dropdown-menu\">
                            <li>
                                <a href=\"profile.php\"><i class=\"fa fa-fw fa-user\"></i>Профиль</a>
                            </li>
                            <li class=\"divider\"></li>
                            <li>
                                <a href=\"logout.php\"><i class=\"fa fa-fw fa-power-off\"></i>Выйти</a>
                            </li>
                        </ul>
                    </li>
                </ul>";

            }
            ?>

            <?php
            if(isset($_SESSION['valid'])==True && ($_SESSION['type'])=="admin"){?>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php?adp=0"><i class="fa fa-fw fa-dashboard"></i> Welcome</a>
                    </li>
                </ul>
            </div>
            <?php
        }
        ?>
    </nav>

<div id="page-wrapper">
    <div class=\"container-fluid\">
            <div class=\"row\">
                <div class=\"col-lg-12\">
                    <?php
                    include_once 'connect.php';
                    $sql = "SELECT * FROM admin WHERE username = '$_SESSION[username]'";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result);
                    ?>
            
                    <div id="page-wrapper">
                        <div class="container">
                                <div class="fb-profile">
                                    <div class="fb-profile-text">
                                        <h1>Профиль администратора</h1>
                                        <br><br>
                                        <table style="border: none; font-family:Arial;font-weight: bold">
                                            <tr>
                                                    <td> ФИО: </td>
                                                    <td style="padding-left: 10px;"> <?php echo "$row[fullname]"; ?></td>
                                            </tr>
                                            <tr>
                                                    <td> Логин: </td>
                                                    <td style="padding-left: 10px;"><?php echo "$row[username]"; ?></td>
                                            </tr>
                                        </table>        
                                    </div>
                                </div>
                            </div> 

                    </div>
                </div>
            </div>
        </div>

</div>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/plugins/morris/morris.min.js"></script>
<script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
