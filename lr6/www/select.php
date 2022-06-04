<?php require_once 'connectdb.php'; ?> 
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>All saved profiles</title>
</head>
<link rel="stylesheet" type="text/css" href="Style.css" />
<body>
    <Style> th,td{ padding: 10px;} th{ background:#3CB371;} td{ background: #90EE90;} </Style>
        <div class="page">
            <form method='post'>
                <div>  <!--Ввод имени таблицы-->
                    <input class="input" type="text" name="nametable" placeholder="table name" required>
                    </div>
                <div> <!--Кнопка вывода таблицы-->
                    <input class="btn" type="submit" name="pick" value="Show selected table"/>
                    </div>
                
                <?php
                if(isset($_POST['pick'])){ 
                ?>
                    <table>           
                        <?php
                        $nametable = $_POST['nametable'];
                        $result = mysqli_query($connect, "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS 
                                                          WHERE TABLE_SCHEMA = 'phplabrab' AND TABLE_NAME = '$nametable'"); 
                        $colloumn = mysqli_fetch_all($result); //данные шапки

                        echo "<tr>";
                        foreach ($colloumn as $c){
                            ?> <th><?=$c[0]?></th> <?php
                        }
                        echo "</tr>";

                        $people = mysqli_query($connect, "SELECT * FROM `$nametable`"); // данные таблицы
                        $field_cnt = $people->field_count; //количество столбцов
                        $people = mysqli_fetch_all($people);

                        foreach ($people as $peop){
                            ?> <tr>
                                <?php for ($i = 0; $i < $field_cnt; $i++) { ?>
                                    <td><?=$peop[$i] ?></td>
                                <?php  } 
                            ?> </tr>
                            <?php
                        }
                        ?>
                    </table>
                <?php 
                }
                ?>
            </form>
        </div>
</body>
</html>

<Style>
    .btn{
        margin-bottom: 30px;
    }
</Style>


