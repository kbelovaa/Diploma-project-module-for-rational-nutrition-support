<div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Пользователи
                    </h1>

                </div>
            </div>

            <?php
            if(isset($_SESSION['valid'])==True){?>
            <div class="row">

                <div class="col-lg-6" style="width: 100%">
                    <h2>Информация о пользователях</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Логин</th>
                                    <th>Имя и фамилия</th>
                                    <th>Адрес</th>
                                    <th>E-mail</th>
                                    <th>Телефон</th>
                                    <th>Действие</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $sql = "select * from user";

                                $result = mysqli_query($conn,$sql);

                                $response = array();
                                $count = 0;

                                while($row = mysqli_fetch_array($result))
                                {
                                    echo "<tr>
                                    <td>".$row[6]."</td>
                                    <td>".$row[1]." ".$row[2]."</td>
                                    <td>".$row[3]."</td>
                                    <td>".$row[4]."</td>
                                    <td>".$row[5]."</td>
                                    <td><form method=\"post\" action=\"delete.php\"><a href=\"delete.php?id=".$row['0']."\" class=\"delete\"><input type=\"button\" class=\"btn btn-default\" value=\"Удалить\"></a></form></td>
                                </tr>";
                                $count++;
                            }

                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php
    }
    ?>
</div>