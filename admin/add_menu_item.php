<?php
    if(isset($_SESSION['valid'])==True){?>

        <div class="container-fluid">


            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Добавить позицию в меню
                    </h1>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-6">

                    <form role="form" action="add_menu_item.php" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Ресторан</label>
                            <select name="restaurant" class="form-control">
                                <option selected disabled>Выберите ресторан</option>
                                
                                <?php
                                $sql = "select * from restaurant";

                                $result = mysqli_query($conn,$sql);

                                $response = array();
                                $count = 0;

                                while($row = mysqli_fetch_array($result))
                                {
                                    echo "
                                    <option>".$row[1]."</option>";
                                $count++;
                            }

                            ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Блюдо</label>
                            <input name="item" class="form-control" placeholder="Введите название блюда" required>
                        </div>

                        <div class="form-group">
                            <label>Детали</label>
                            <input name="details" class="form-control" placeholder="Введите детали" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Калорийность</label>
                            <input name="calories" class="form-control" placeholder="Введите калорийность" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Белки</label>
                            <input name="proteins" class="form-control" placeholder="Введите белки" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Жиры</label>
                            <input name="fats" class="form-control" placeholder="Введите жиры" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Углеводы</label>
                            <input name="carbohydrates" class="form-control" placeholder="Введите углеводы" required>
                        </div>

                        <div class="form-group">
                            <label>Цена</label>
                            <input name="price" type="number" class="form-control" placeholder="Введите цену" required>
                        </div>

                        <div class="form-group">
                            <label>Фотография</label>
                            <div class="input__wrapper">
                                <input id="uploadBtn" type="file" name="image" accept="image/*" class="input input__file" required/>
                                <label for="uploadBtn" class="input__file-button">
                                    <span class="input__file-icon-wrapper"><img class="input__file-icon" src="../images/add.svg" alt="Выбрать файл" width="20"></span>
                                    <span class="input__file-button-text">Выберите файл</span>
                                </label>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-default" name="btn-itmadd" value="Подтвердить" style="margin-bottom:40px; margin-top:20px;">

                    </form>

                </div>
                
            </div>

    <?php
}
?>
</div>

<?php
include_once 'connect.php';

if(isset($_POST['btn-itmadd']) != 0 ){
    
    $restaurant = $_POST['restaurant'];
    $item = $_POST['item'];
    $details = $_POST['details'];
    $price = $_POST['price'];
    $image=addslashes(file_get_contents($_FILES['image']['tmp_name'])) ;
    $image_name=addslashes($_FILES['image']['name']) ;

    if ((strlen($item) == 0) || (strlen($restaurant) == 0) || (strlen($details) == 0) || (strlen($calories) == 0) || (strlen($proteins) == 0) || (strlen($fats) == 0) || (strlen($carbohydrates) == 0) || (strlen($price) == 0)) {
        echo '<script language="javascript">';
        echo 'alert("Please fill all the fields")';
        echo '</script>';
    }
    else {
        $query = "SELECT item FROM menu WHERE item='$item'";
        $result = mysqli_query($conn,$query);
        
        $count = mysqli_num_rows($result);
        
        if ($count==0) {

            $query = 'INSERT INTO menu(restaurant, item, details, calories, proteins, fats, carbohydrates, price, image, imagename) VALUES ("'.$restaurant.'","'.$item.'","'.$details.'","'.$calories.'","'.$proteins.'","'.$fats.'","'.$carbohydrates.'","'.$price.'","'.$image.'","'.$image_name.'")';

            mysqli_query($conn,$query);
            header("location:success.php?ref=4");
        }
        else {
            echo '<script language="javascript">';
            echo 'alert("Извините, такая позиция в меню уже существует.")';
            echo '</script>';
        }
    }
}
?>