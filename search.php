<h4 style="margin-left: -40px;">Укажите Ваш район, чтобы мы могли Вам предложить самую быструю доставку</h4>
<form method="post" class="form-inline" role="form" class="pagination-centered" action="result.php" style="margin-left: -40px;">
    <div class="form-group" >
        
        <select class="select-list" name="area" style="width: 300px;">
            <option selected disabled>Выберите район</option>
            <?php
            $sql = "select * from restaurant group by location";

            $result = mysqli_query($conn,$sql);

            while($row = mysqli_fetch_array($result))
            {
                echo "<option>".$row[2]."</option>";
            }

            ?>
        </select>
        <input type="submit" class="btn btn-xl btn-success" name="search" value="Найти рестораны" style="box-shadow: 4px 4px #ccc;">
    </div>
</form>
<br><br><br>