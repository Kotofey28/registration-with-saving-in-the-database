<?php require_once 'connectdb.php'; ?> 
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Last saved profile</title>
</head>
<link rel="stylesheet" type="text/css" href="Style.css" />a
<body>
    <Style> th,td{ padding: 10px;} th{ background:#3CB371;} td{ background: #90EE90;} </Style>
        <div class="page">
            <form action='/select.php' method='post'>  
                    <h1>Last saved profile</h1>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Full name</th>
                            <th>Password</th>
                            <th>Gender</th>
                            <th>Knowledge</th>
                            <th>About myself</th>
                        </tr>
                        
                        <?php
                        $nametable = $_POST['person'];
                        $people = mysqli_query($connect, "SELECT * FROM `person` WHERE id_p = (select MAX(id_p) from `person`);");
                        $people = mysqli_fetch_all($people);
                        foreach ($people as $peop){
                        ?>
                            <tr>
                                <td><?=$peop[0] ?></td>
                                <td><?=$peop[1] ?></td>
                                <td><?=$peop[2] ?></td>
                                <td><?=$peop[3] ?></td>
                                <td><?=$peop[4] ?></td>
                                <td><?=$peop[5] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>

                    <input class="btn" type="submit" name="last" value="Display all profiles">
            </form>
        </div>
</body>
</html>

<Style>
    h1{
        margin-top: 5px;
        padding-bottom: 15px;
    }

    .btn{
        margin-top: 30px;
    }
</Style>