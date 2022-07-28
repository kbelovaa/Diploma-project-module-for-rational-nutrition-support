<div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Доставка
                    </h1>

                </div>
            </div>

            <?php
            if(isset($_SESSION['valid'])==True){?>
            <div class="row">

                <div class="col-lg-6" style="width: 100%">
                    <h2>Заказы, ожидающие доставки</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Блюдо</th>
                                    <th>Ресторан</th>
                                    <th>Количество</th>
                                    <th>Стоимость</th>
                                    <th>Клиент</th>
                                    <th>Адрес</th>
                                    <th>Способ оплаты</th>
                                    <th>Дата заказа</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $sql = 'SELECT * FROM cart WHERE delivery = 1';

                                $result = mysqli_query($conn,$sql);

                                $response = array();
                                $count = 1;

                                while($row = mysqli_fetch_array($result))
                                {
                                    echo "<tr>
                                    <td>".$count."</td>
                                    <td>".$row[3]."</td>
                                    <td>".$row[2]."</td>
                                    <td>".$row[9]."</td>
                                    <td>".$row[4] * $row[9]." руб</td>
                                    <td>".$row[1]."</td>
                                    <td>".$row[12]."</td>
                                    <td>".$row[13]."</td>
                                    <td>".$row[14]."</td>
                                    <td><form method=\"post\" action=\"deliver.php\"><a href=\"deliver.php?id=".$row['0']."&restaurant=".$row[2]."&sell=".$row[4] * $row[9]."\" class=\"delete\"><input type=\"button\" class=\"btn btn-default\" value=\"Доставлено\"></a></form></td>
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