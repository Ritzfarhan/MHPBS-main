<?php
$con = mysqli_connect("localhost","root","","MHPBS");
$name = $_GET["name"];
$sql = "select price from rooms WHERE name = '$name' AND status = 0";
if($name!=""){
    $result = mysqli_query($con, $sql);
    echo "<div class='col-md-12' id='time'>";
    echo "<label class='labels' style = 'font-size: 12px'>Total Price</label>";
    echo "<select name='price' class='form-control' required>";
    while($row=mysqli_fetch_array($result)){
        echo "<option value='{$row['price']}'>".$row['price']."</option>";
    }
    echo "</select>";
}else{
    echo "<div class='col-md-12' id='time'>";
    echo "<label class='labels' style = 'font-size: 12px'>Choose Time</label>";
    echo "<select name='time' class='form-control' required>";
    echo "<option>Time</option>";
    echo "</select>";
}

?>