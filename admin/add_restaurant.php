<?php
    if(isset($_SESSION['valid'])==True){?>

        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Добавить новый ресторан
                    </h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">

                    <form role="form" action="add_restaurant.php" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Название ресторана</label>
                            <input name="restaurant_name" class="form-control" placeholder="Введите название ресторана" required>
                        </div>

                        <div class="form-group">
                            <label>Местоположение</label>
                            <input name="location" class="form-control" placeholder="Введите район" required>
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

                        <input type="submit" class="btn btn-default" name="btn-resadd" value="Подтвердить">

                    </form>
                    <script>
                        let inputs = document.querySelectorAll('.input__file');
                        Array.prototype.forEach.call(inputs, function (input) {
                            let label = input.nextElementSibling,
                            labelVal = label.querySelector('.input__file-button-text').innerText;
                        
                            input.addEventListener('change', function (e) {
                            let countFiles = '';
                            if (this.files && this.files.length >= 1)
                                countFiles = this.files.length;
                        
                            if (countFiles)
                                label.querySelector('.input__file-button-text').innerText = 'Выбран 1 файл';
                            else
                                label.querySelector('.input__file-button-text').innerText = labelVal;
                            });
                        });
                    </script>

                </div>
                
            </div>

    <?php
}
?>
</div>

<?php
include_once 'connect.php';

if(isset($_POST['btn-resadd']) != 0 ){

    $name = $_POST['restaurant_name'];
    $location = $_POST['location'];
    $image=addslashes(file_get_contents($_FILES['image']['tmp_name'])) ;
    $image_name=addslashes($_FILES['image']['name']) ;

        $query = "SELECT name FROM restaurant WHERE name='$name'";
        $result = mysqli_query($conn,$query);
        
        $count = mysqli_num_rows($result);
        
        if ($count==0) {

            $query = 'INSERT INTO restaurant(name, location, image, imagename) VALUES ("'.$name.'","'.$location.'","'.$image.'","'.$image_name.'")';

            mysqli_query($conn,$query);
            
            header("location:success.php?ref=3");
        }
        else {
            echo '<script language="javascript">';
            echo 'alert("Извините, такой ресторан уже существует в базе данных.")';
            echo '</script>';
        }
}
?>