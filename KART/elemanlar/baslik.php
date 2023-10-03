<header class="header">
   <link rel="stylesheet" href="css/style.css">

   

   <section class="flex">
      <a href="#" class="logo">
         <img src="img/sef.jpg" widht="100" height="100" alt="logo">
      </a>

      <nav class="navbar">
         <a href="anasayfa.php"  >Home</a>
         <a href="hakkimizda.php" >Hakkımızda</a>
         <a href="menu.php" >Menü</a>
         <a href="ekle.php">ürün ekle</a>
         <a href="siparis.php">siparişlerim</a>
         <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_items = $count_cart_items->rowCount();
         ?>
         <a href="sepet.php" class="cart-btn"> sepet <i class="fa-solid fa-cart-shopping"></i><span><?= $total_cart_items; ?></span></a>
      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>
   </section>

</header>


<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400&display=swap%27');

:root{
   --main-color:#2980b9;
   --red:#e74c3c;
   --orange:#f39c12;
   --light-color:#666;
   --light-bg:#eee;
   --white:#fff;
   --black:#2c3e50;
   --border:.1rem solid rgba(0,0,0,.3);
   --box-shodow:0 .5rem 1rem rgba(0,0,0,.1);
}




   .header{
   position: sticky;
   top: 0; left: 0; right: 0;
   z-index: 1000;
   box-shadow: var(--box-shodow);
   background-color: rgb(126,74,61);
}

.header .flex{
   display: flex;
   align-items: center;
   justify-content: space-between;
   gap: 1.5rem;
}

.header .flex .logo img{
   font-size: 2.5rem;
   color: var(--white);
   border-radius: 45px;
}

.header .flex .navbar a{
   color: #ffffff;
   margin-left: 2rem;
   font-size: 1.8rem;
   text-transform: capitalize;
}

.header .flex .navbar a:hover{
   text-decoration: underline;
}

.header .flex .navbar a span{
   margin-left: 1rem;
   padding:.3rem .7rem;
   background-color: var(--white);
   color: rgb(126,74,61);
   border-radius: .5rem;
}

@media (max-width:768px){

#menu-btn{
   display: inline-block;
}

.header .flex .navbar{
   position: absolute;
   top: 99%; left: 0; right: 0;
   background-color: var(--white);
   padding: 1rem 2rem;
   border-top: .1rem solid var(--white);
   clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
   transition: .2s linear;
}

.header .flex .navbar.active{
   clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%);
}

.header .flex .navbar a{
   display: block;
   width: 100%;
   margin: 1rem 0;
   padding: 1rem 0;
}

}

</style>