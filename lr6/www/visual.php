<?php require_once 'connectdb.php'; 
//получение данных из анкеты
$fullname = $_POST['fullname'];
$pass = $_POST['pass'];
$gender = $_POST['gender'];
$aboutmyself = $_POST['comment'];
$proglang = '';
if(isset($_POST['lang1'])) $proglang .= $_POST['lang1'].' '; 
if(isset($_POST['lang2'])) $proglang .= $_POST['lang2'].' ';
if(isset($_POST['lang3'])) $proglang .= $_POST['lang3'].' ';
if(isset($_POST['lang4'])) $proglang .= $_POST['lang4'].' ';
if(isset($_POST['lang5'])) $proglang .= $_POST['lang5'].' ';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Questionnaire</title>
</head>
<link rel="stylesheet" type="text/css" href="Style.css" />
<body>
    <div class="page">
        <form action='/lastprofile.php' method='post'>
            <h1><?php echo "<br/> Questionnaire <br/>"; ?></h1>
            <div class="align">
            <?php
                //вывод полученных данных
                echo '<b>Full name:</b>'.$fullname.'<br>';
                echo '<b>Password:</b> '.$pass.'<br>';
                echo '<b>Gender:</b> '.$gender.'<br>';
                echo '<b>Knowledge of programming languages:</b> '.$proglang.'<br>';
                echo '<b>About myself:</b> '.$aboutmyself.'<br>';

                //сохранение анкеты в бд
               mysqli_query($connect, "INSERT INTO `phplabrab`.`person` (`id_p`, `fullname`, `password`, `gender`, `proglang`, `aboutmyself`)
                                        VALUES (NULL , '$fullname', '$pass', '$gender', '$proglang', '$aboutmyself');")
                
            ?>  
            </div>
            <!--Загрузка резюме на сервер-->
            <br>
            <div>
                <iframe src="sendfile.php"  height="200" frameborder="no"></iframe>     
                </div>

            <!--Переход на страницу с последней сохраненной анкетой-->
            <input class="btn" type="submit" name="last" value="Display last saved profile"> 
        </form>
    </div>
</body>
</html>

<Style>
    .align{
        text-align: left;
    }

    h1{
        padding-bottom: 30px;
    }

</Style>

