<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="admaincss.css">
</head>
<body>



<div class="sidebar">
    <header id="head" onclick="main()"> Coffee Cup  </header>
    <ul>
        <ul>
            <li><a href="orders.php"onclick="col1()"  id="li1" >Orders</a></li>
            <li><a href="#" onclick="col2()"  id="li2">add prodect</a></li>
            <li><a href="#" onclick="col3()"  id="li3">delet prodect</a></li>
            <li><a href="#" onclick="col4()"  id="li4">contact</a></li>
        </ul>
        <div class="sidebar-space"></div>



</div>
<div id="leaves">
    <i></i>
    <i></i>
    <i></i>
    <i></i>
    <i></i>
    <i></i>
    <i></i>
    <i></i>
    <i></i>
    <i></i>
    <i></i>
    <i></i>
    <i></i>
    <i></i>
    <i></i>
</div>






<div id="orders">


    <?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="coffee";
    $conn=new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error){
        die("Connection Failed".$conn->connect_error);
    }

    $sql = "SELECT shop.username, product.itemname, product.price,product.itemid
FROM shop
JOIN product ON shop.product = product.itemid;";

    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0) {
        echo"
<header class='loge' style='color: palevioletred' > orders</header>
            <table style='width:70%' >
                <tr>
                  <th>useremail</th>
                  <th >order name</th>
                  <th>order price</th>
                  <th>count</th>
                </tr>";
        while($row=mysqli_fetch_assoc($result)) {
            echo "  <tr>
            <td>{$row["username"]}</td>
            <td>{$row["itemname"]}</td>
            <td>{$row["price"]}</td>
          

        </tr>
                    </table>";

        }
    }?>

</div >
<form action="add-product.php" method="post">
    <div id="addp">
        <h1  class='loge'>add product </h1>
        <div>prodect name <input type="text"  id="form1" name="name"></div>
        <div>prodect price <input type="text"  id="form2" name="price"></div>

        <div>add photo &nbsp;&nbsp;&nbsp;&nbsp;<input type="file" id="form0" name="image"></div>
        <br>
        <br>

        <br>
        <table align="right">

            <input type="submit" value=" love Event" name="love" id="bt">
            <input type="submit" value=" Graduation Event" name="grad" id="bt">
            <input type="submit" value=" motherDay" name="motherD" id="bt">
            <input type="submit" value="Visit A patient" name="visit" id="bt">

        </table>
</form>

</div>
<form action="delete product.php" method="post">
    <div id="delp">
        <h1  class='loge'>delete product </h1>

        <div>prodect name <input type="text"  id="form1" name="name"></div>


        <br>
        <table align="right">

            <input type="submit" value=" love Event" name="love" id="bt">
            <input type="submit" value=" Graduation Event" name="grad" id="bt">
            <input type="submit" value=" motherDay" name="motherD" id="bt">
            <input type="submit" value="Visit A patient" name="visit" id="bt">

            <tr>
                <input type="submit" value="Apology Flowers" name="Apology" id="bt">
                <input type="submit" value="Wedding Event" name="Wedding" id="bt">
                <input type="submit" value="New Home Congrat" name="NewHome" id="bt">
                <input type="submit" value="Flower For Garden" name="Garden" id="bt">
                <input type="submit" value="Place Decor" name="PlaceDecor" id="bt">
            </tr>
        </table>
</form>
</div>
<div id="cont">
    <?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="coffee";
    $conn=new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error){
        die("Connection Failed".$conn->connect_error);
    }


    $sql="SELECT * FROM contact";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0) {
        echo"
<header class='loge' style='color: palevioletred'  > contact us messages</header>
    <table style='width:70%'>
        <tr>
            <th>username</th>
            <th>email</th>
            <th>phone</th>
            <th>message</th>
        </tr>";
        while($row=mysqli_fetch_assoc($result)) {
            echo"  <tr>
            <td>{$row["username"]}</td>
            <td>{$row["email"]}</td>
            <td>{$row["phone"]}</td>
            <td>{$row["message"]} </td>

        </tr>";

        }
    }

    ?>
</div>







</body>
</html>
