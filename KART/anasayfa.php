<?php

include 'elemanlar/baglanti.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   setcookie('user_id', create_unique_id(), time() + 60*60*24*30);
}

if(isset($_POST['add'])){

   $id = create_unique_id();
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $ext = pathinfo($image, PATHINFO_EXTENSION);
   $rename = create_unique_id().'.'.$ext;
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_size = $_FILES['image']['size'];
   $image_folder = 'uploaded_files/'.$rename;

   if($image_size > 2000000){
      $warning_msg[] = 'Image size is too large!';
   }else{
      $add_product = $conn->prepare("INSERT INTO `products`(id, name, price, image) VALUES(?,?,?,?)");
      $add_product->execute([$id, $name, $price, $rename]);
      move_uploaded_file($image_tmp_name, $image_folder);
      $success_msg[] = 'Product added!';
   }

}

?>

<!doctype html>
<html>
<head>
	 <meta charset="UTF-8">
  <meta name="description" content="Free Web tutorials">
  <meta name="keywords" content="HTML, CSS, JavaScript">
  <meta name="author" content="John Doe">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
	
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<?php include 'elemanlar/baslik.php'; ?>

<section class="home">
    <div class="content">
        <h1>
            HAVE YOU EVER TRIED OUR DESSERTS?
        </h1>
        <P>
            There is nothing better than a friend, unless it is a friend with desserts.
        </P>
        <a href="menu.php" class="btn"> Sipariş Ver </a>
       
           
       
    </div>
    
</section>

<?php include 'elemanlar/alert.php'; ?>


<style>

    body{


        background-image: url("img/son2.jpeg") ;
    }


.home .content {
    max-width: 100%;
     

}

.home .content h1{
    font-size: 50px;
    text-align: right;
    font-weight: bold;
    font-family: 'Courier New', Courier, monospace;
    text-decoration:line;
    color: rgb(175, 108, 108);     
    height: min-content;
    margin-right: 50px;
    

}

.home .content p{
    font-size: large;
    font-weight: bold;
    text-align: right;
    font-family: 'Courier New', Courier, monospace;
    font-weight: bold;
    text-decoration:overline;
    color: #4c6c7c;
    margin-right: 50px;
    line-height: 3;
    
    
}

.btn{
    margin-top: 1rem;
    display: inline-block;
    padding: 1.5rem 3.5rem;
    font-size: 13px;
    text-align: center;
    height: 50px;
    width: 150px;
    color: #fff;
    background-color: #4c6c7c;
    border-radius:25px;
    cursor: pointer;
}

</style>


</body>

</html>