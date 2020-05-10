<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" >
  <title>CloMatchTool</title>
  <link rel="icon" type="image/png" href="images/icon.png" /> 
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/filtre.css">
  <link rel="stylesheet" type="text/css" href="css/new_filtre.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
  <script src="js/lightbox-plus-jquery.min.js"></script>
  <script src="js/new_filtre.js"></script>
</head>

<body>
<div class="banner-fixed">
  <nav>

    <div class="logo">
      <h4>OOTD</h4>
    </div>

    <ul class="nav-links">
      <li>
        <a href="index.php">
          Acasa
        </a>
      </li>
      <li>
        <a href="filtre.php">
          Inspiratie
        </a>
      </li>
      <li>
        <a href="login.php">
          Login
        </a>
      </li>
    </ul>

     <div class="burger">
      <div class="line1"></div>
      <div class="line2"></div>
      <div class="line3"></div>
    </div>  
  </nav>

  <div class="continut-pagina-top">
    <div class="text-menu">
Cauta outfit..
    </div>
    <br>
  <div class="menu-filtre">
    <ul id="menu">
      <li><a href="#">Outfit pentru</a>
        <ul>
          <li><a href="#">Femei</a></li>
          <li><a href="#">Barbati</a></li>
        </ul>
      </li>
      <li><a href="#">Tip eveniment</a>
        <ul>
          <li><a href="#">Iesire casual</a></li>
          <li><a href="#">Inmormantare</a></li>
          <li><a href="#">Botez</a></li>
          <li><a href="#">Plimbare pe plaja</a></li>
          <li><a href="#">Petrecere de Revelion</a></li>
        </ul>
      </li>
      <li><a href="#">Tip stil</a>
        <ul>
          <li><a href="#">Casual</a></li>
          <li><a href="#">Elegant</a></li>
          <li><a href="#">Sportiv</a></li>
        </ul>
      </li>
      <li><a href="#">Culoare</a> 
        <ul>
          <li><a href="#">Alb</a></li>
          <li><a href="#">Albastru</a></li>
          <li><a href="#">Bordo</a></li>
          <li><a href="#">Galben</a></li>
          <li><a href="#">Lavanda</a></li>
          <li><a href="#">Magenta</a></li>
          <li><a href="#">Maro</a></li>
          <li><a href="#">Negru</a></li>
          <li><a href="#">Portocaliu</a></li>
          <li><a href="#">Rosu</a></li>
          <li><a href="#">Verde</a></li>
          <li><a href="#">Visiniu</a></li>
        </ul>
      </li>
      <li><a href="#">Tip piese vestimentare</a>
        <ul>
          <li><a href="#">Imbracaminte</a></li>
          <li><a href="#">Incaltaminte</a></li>
          <li><a href="#">Accesorii</a></li>
        </ul>
      </li>
      <li><a href="#">Anotimp</a>
        <ul>
          <li><a href="#">Primavara</a></li>
          <li><a href="#">Vara</a></li>
          <li><a href="#">Toamna</a></li>
          <li><a href="#">Iarna</a></li>
        </ul>
      </li>
      <li><a href="#">APASA AICI PENTRU CAUTARE</a>
    </ul>
    </div>

  </div>
</div>
<br>
  <div class="continut-pagina-bottom">
    <div class="afisare-articole">
  <div class="gallery">
  
    <h3>Recomandari</h3>
    <div class="gototop">TOP</div>
    <a href="images/photo1.jpg" data-lightbox = "mygallery"><img src="images/photo1.jpg"></a>
    <a href="images/photo2.jpg" data-lightbox = "mygallery"><img src="images/photo2.jpg"></a>
    <a href="images/photo3.jpg" data-lightbox = "mygallery"><img src="images/photo3.jpg"></a>
    <a href="images/photo4.jpg" data-lightbox = "mygallery"><img src="images/photo4.jpg"></a>
    <a href="images/photo5.jpg" data-lightbox = "mygallery"><img src="images/photo5.jpg"></a>
    <a href="images/photo6.jpg" data-lightbox = "mygallery"><img src="images/photo6.jpg"></a>
    <a href="images/photo7.jpg" data-lightbox = "mygallery"><img src="images/photo7.jpg"></a>
    <a href="images/photo8.jpg" data-lightbox = "mygallery"><img src="images/photo8.jpg"></a>
    <a href="images/photo9.jpg" data-lightbox = "mygallery"><img src="images/photo9.jpg"></a>
    <a href="images/photo10.jpg" data-lightbox = "mygallery"><img src="images/photo10.jpg"></a>
    <a href="images/photo11.jpg" data-lightbox = "mygallery"><img src="images/photo11.jpg"></a>
    <a href="images/photo1.jpg" data-lightbox = "mygallery"><img src="images/photo2.jpg"></a>
    <a href="images/photo1.jpg" data-lightbox = "mygallery"><img src="images/photo2.jpg"></a>
    <a href="images/photo1.jpg" data-lightbox = "mygallery"><img src="images/photo2.jpg"></a>
    <a href="images/photo1.jpg" data-lightbox = "mygallery"><img src="images/photo2.jpg"></a>
    <a href="images/photo1.jpg" data-lightbox = "mygallery"><img src="images/photo2.jpg"></a>
    <div class="button-load-more-images">Incarca mai multe articole</div>
    <br>
  </div>
</div>
</div>
  </div>



  <!-- 
  <div class="content">
  <div class="buttons">
    <div class="denumire">Sex</div>
    <div class="butoane">
    <input type="checkbox" id="femeie" name="femeie" value="Femeie">
    <label for="femeie">Femeie</label>
    <input type="checkbox" id="barbat" name="barbat" value="Barbat">
    <label for="barbat">Barbat</label>
  </div>
 </div>
 <div class="buttons">
    <div class="denumire">Anotimp</div>
    <div class="butoane">
     <input type="checkbox" id="primavara" name="primavara" value="primavara">
     <label for="primavara">Primavara</label>
     <input type="checkbox" id="vara" name="vara" value="vara">
     <label for="vara">Vara</label>
     <input type="checkbox" id="toamna" name="toamna" value="toamna">
     <label for="toamna">Toamna</label>
     <input type="checkbox" id="iarna" name="iarna" value="iarna">
     <label for="iarna">Iarna</label>
     </div>
</div>


<div class="buttons">
  <div class="denumire">Piese vestimentare </div>
  <div class="butoane">
   <input type="checkbox" id="accesorii" name="accesorii" value="accesorii">
   <label for="accesorii">Accesorii</label>
   <input type="checkbox" id="papuci" name="papuci" value="papuci">
   <label for="papuci">Papuci</label>
   <input type="checkbox" id="imbracaminte" name="imbracaminte" value="imbracaminte">
   <label for="imbracaminte">Imbracaminte</label>
   </div>
</div>


<div class="buttons">
    <div class="denumire">Culori</div>
    <div class="butoane">
    <input type="checkbox" id="Negru" name="Negru" value="Negru">
    <label for="Negru">Negru</label>
    <input type="checkbox" id="Roz" name="Roz" value="Roz">
    <label for="Roz">Roz</label>
    <input type="checkbox" id="Albastru" name="Albastru" value="Albastru">
    <label for="Albastru">Albastru</label>
    <input type="checkbox" id="Galben" name="Galben" value="Galben">
    <label for="Galben">Galben</label>
    <input type="checkbox" id="Bej" name="Bej" value="Bej">
    <label for="Bej">Bej</label>
    <input type="checkbox" id="Maro" name="Maro" value="Maro">
    <label for="Maro">Maro</label>
    <input type="checkbox" id="Alb" name="Alb" value="Alb">
    <label for="Alb">Alb</label>
    <input type="checkbox" id="Verde" name="Verde" value="Verde">
    <label for="Verde">Verde</label>
    <input type="checkbox" id="Negru" name="Negru" value="Negru">
    <label for="Negru">Negru</label>
    <input type="checkbox" id="Roz" name="Roz" value="Roz">
    <label for="Roz">Roz</label>
    <input type="checkbox" id="Albastru" name="Albastru" value="Albastru">
    <label for="Albastru">Albastru</label>
    <input type="checkbox" id="Galben" name="Galben" value="Galben">
    <label for="Galben">Galben</label>
    <input type="checkbox" id="Bej" name="Bej" value="Bej">
    <label for="Bej">Bej</label>
    <input type="checkbox" id="Maro" name="Maro" value="Maro">
    <label for="Maro">Maro</label>
    <input type="checkbox" id="Alb" name="Alb" value="Alb">
    <label for="Alb">Alb</label>
    <input type="checkbox" id="Verde" name="Verde" value="Verde">
    <label for="Verde">Verde</label>
</div>
</div>
</div>

 -->

<script src="js/script.js"></script> 

</body>

</html>