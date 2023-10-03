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

<section  class="tarih">
   
    <h1 class="baslık">  Hakkında </h1>
    
    <div class="rsm">
         <img src="img/tarih.gif" style="width:445px;height:250px;" alt="tarih" class="yan" >
         <h1>
            CHEESECAKE...
          </h1>  <p>
          Cheesecake’in 4 bin sene önce bile yendiğine inanılır, hatta ilk cheesecake tarifi 236 yılında yapılmıştır. Yunanlar cheesecake’i bir enerji kaynağı olarak görür, hatta olimpiyatlarda atletlere, yani sporculara cheesecake yedirilirdi. 776 yılında sporculara cheesecake yedirildiğine dair kanıtlar var. Bununla beraber cheesecake, Yunan gelinlerin düğün pastası da olarak kullanılırdı. Kekin tarifi günümüzdeki gibi karışık değildi. 
         </p> 
         <p>
         Roma İmparatorluğu’nun Avrupa’yı fethetmesiyle Avrupa da cheesecake’le tanışmış oldu. Tabi reçeteler de ülkeden ülkeye yayıldı böylece. Bununla birlikte her ülkenin yeme içme kültürü farklı olduğundan cheesecake tariflerinde hep değişiklikler oldu.
         </p>
         
        </div>
       
   

</section>

<section  class="tarih">
   
  
    
    <div class="rsm">
         <img src="img/sufle1.gif" style="width:445px;height:250px;" alt="tarih" class="yan" >
         <h1>
            SOUFFLE...
          </h1> 
           <p>
           The soufflé earns its name from the French word soufflér — to puff. It was perfected in the mid-1800s by Marie-Antoine Carême who, in cooking for the newly rich in Paris, was aided by updated ovens that were heated by air drafts rather than coal. This change was key to the rise of the soufflé.
         </p> 
         <p>
            
            The popularity of soufflés grew with fine dining from the early 1900s through the mid-20th century. According to the archive at the New York Public Library Menu Project, soufflés appeared frequently on menus for special-occasion dinners with guests of honor at places like NYC's the Biltmore, the Waldorf-Astoria, and the Hotel Astor.
         </p>
        </div>
       
   

</section>



<section class="tarih3">
    <div class="rsm3">
        <img src="img/makr.gif" alt="tarih" class="yan3">
        <h1>
            MACARON
        </h1>
        <p>
            
            According to popular beliefs, macarons are considered to be of Italian origin, dating back to the 8th Century. According to legends, the delicacy was introduced to France in 1533 when Queen Catherine de’ Medici of Italy married King Henry II of France, and her pastry chefs brought the macaron recipe with them. Back then, these cookies were made from almonds, egg white, and sugar, and called “priest’s bellybuttons.”. It is believed that macarons were served in 1581 during the marriage of the Duke of Joyeuse in Ardeche. In 1682, when King Louis XIV decided to stay at Versailles in 1682, macarons were served to the guests as a welcome gesture. Until then, macarons were considered an exclusive item for the royals. The tradition kept going until the empire fell in 1789.     
        </p>

    </div>
     
</section>

<?php include 'elemanlar/alert.php'; ?>

<style>

.tarih h1{
    color: #a0594c;
    margin: 15px;
    font-size:40px;
    text-align: center;
}

.tarih{
    background-color:#313844;
    height: 90vh;

}

.tarih  img {
    border-radius: 30px;
    height:auto;
    width: 300px;
    align-items: center;
}

.yan {
    float: right;
    padding: 0 10px 10px 0;
}

.tarih .rsm h1 {
    font-size: 19px;
    color: rgb(192, 193, 197);
    text-align: left;

}

.tarih  .rsm p{
    color:#90a4ae;
    font-size: 22px;

}





.tarih3{
    background-color: #2e4450;
    height: 90vh;

}

.tarih3 img {
    border-radius: 30px;
    height: 300px;
    width: 400px;
    
}
.yan3{
    float: right;
    padding:0 10px 10px 0;
}

.tarih3 .rsm3 h1{
    font-size: 19px;
    color: rgb(192, 193, 197);
    text-align: left;

}

.tarih3 .rsm3 p{
    color:#a7a7a7;
    font-size: 22px;


}


</style>

</body>

</html>