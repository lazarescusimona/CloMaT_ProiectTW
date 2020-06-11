<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CloMatchTool</title>
  <link rel="icon" type="image/png" href="http://localhost/CloMaT_ProiectTW/images/icon.png" />
  <link rel="stylesheet" type="text/css" href="http://localhost/CloMaT_ProiectTW/css/index-style.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/CloMaT_ProiectTW/css/lightbox.min.css">
  <script src="http://localhost/CloMaT_ProiectTW/js/lightbox-plus-jquery.min.js"></script>
</head>

<body>
  <div class="banner-fixed">
    <nav>

      <div class="logo">
        <h4>OOTD</h4>
      </div>

      <ul class="nav-links">
        <li>
        <a href="http://localhost/CloMaT_ProiectTW/index.php">
            Acasa
          </a>
        </li>
        <li>
          <a href="http://localhost/CloMaT_ProiectTW/filtre-back.php">
            Inspiratie
          </a>
        </li>
        <li>
          <a href="http://localhost/CloMaT_ProiectTW/Not_here/login-switch.php">
            <?php
            if (isset($_SESSION['username'])) {
              echo 'Profil';
            } else {
              echo 'Login';
            }
            ?>
          </a>
        </li>
      </ul>

      <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
    </nav>
  </div>
  <br>
  <script src="http://localhost/CloMaT_ProiectTW/js/script.js"></script>
  <?php
  echo '<form method="post" id = "inside" >';
  //$connection = oci_connect('student', 'student', 'localhost:1521/xe'); //Asta e pentru , Simona
  $connection = oci_connect('student', 'STUDENT', 'localhost:1521/xe'); //Asta e pentru , Roxana
  echo '<div class="text-despre-articole">
  <p> Sugestii de garderobe complete : imbracaminte (partea de sus si spartea de jos), incaltaminte si accesorii. </p>
  <p> Aici aveti cateva sugestii de garderobe pe baza asortarii cromatice si a materialelor. </p></div>';
  // PRIMA GARDEROBA - culoare
  //mai intai determinam culorile
  $culoareText="";
  $culoare_matchText="";
  foreach ($primaGarderoda as &$value){
    $culoare_matchText=$culoareText;
    $query = "select CULOARE from ARTICOLE where ARTICOL_PATH='$value'";
    $qr = oci_parse($connection, $query);
    oci_execute($qr);
    while ($row = oci_fetch_array($qr)) {
      $culoareText=$row['CULOARE'];
    }
  }
  //afisam garderoba
  echo '<div class="text-despre-articole"> Prima garderoba sugerata se bazeaza pe asortarea cromatica dintre culoarile '. $culoareText .' si '. $culoare_matchText . '.</div>';
  foreach ($primaGarderoda as &$value) {
    echo '<div class = "img-cell">';
    echo '<a href="' . $value . '" data-lightbox = "mygallery"><img src="' . $value . '"></a> ';
    if (isset($_SESSION['username'])) {
      $temp = str_replace("http://localhost/CloMaT_ProiectTW/images/", "", $value);
      $temp = str_replace(".jpg", "", $temp);
      echo '<input type="checkbox" class="add-btn" name="' . $temp . '">';
    }
    echo '</div>';
  }
  if (isset($_SESSION['username'])) {
    echo '<input type="submit" value=" Salveaza articolele selectate " class="add-btn"/>';
  }


//A DOUA GARDEROBA  - culoare
  //mai intai determinam culorile
  $culoareText="";
  $culoare_matchText="";
  foreach ($garderobaDoi as &$value){
    $culoare_matchText=$culoareText;
    $query = "select CULOARE from ARTICOLE where ARTICOL_PATH='$value'";
    $qr = oci_parse($connection, $query);
    oci_execute($qr);
    while ($row = oci_fetch_array($qr)) {
      $culoareText=$row['CULOARE'];
    }
  }
  //afisam garderoba
  echo '<div class="text-despre-articole"> A doua garderoba sugerate se bazeaza pe asortarea cromatica dintre culorile '. $culoareText .' si '. $culoare_matchText . '.</div>';
  foreach ($garderobaDoi as &$value) {
    echo '<div class = "img-cell">';
    echo '<a href="' . $value . '" data-lightbox = "mygallery"><img src="' . $value . '"></a> ';
    if (isset($_SESSION['username'])) {
      $temp = str_replace("http://localhost/CloMaT_ProiectTW/images/", "", $value);
      $temp = str_replace(".jpg", "", $temp);
      echo '<input type="checkbox" class="add-btn" name="' . $temp . '">';
    }
    echo '</div>';
  }
  if (isset($_SESSION['username'])) {
    echo '<input type="submit" value=" Salveaza articolele selectate " class="add-btn"/>';
  }

  //a Treia garderoba - material
  $materialText="";
  $material_matchText="";
  $a=0;
  foreach ($garderobaTrei as &$value){
    $material_matchText=$materialText;
    $query = "select MATERIAL from ARTICOLE where ARTICOL_PATH='$value' and TIP_PIESA!='Accesorii'";
    $qr = oci_parse($connection, $query);
    oci_execute($qr);
    while ($row = oci_fetch_array($qr)) {
      $materialText=$row['MATERIAL'];
    }
    $a=$a+1;
    if($a==2){
    break;
    }
  }
  //afisam garderoba
  echo '<div class="text-despre-articole"> A treia garderoba sugerata se bazeaza pe asortarea dintre materialele '. $materialText .' si '. $material_matchText . '.</div>';
  foreach ($garderobaTrei as &$value) {
    echo '<div class = "img-cell">';
    echo '<a href="' . $value . '" data-lightbox = "mygallery"><img src="' . $value . '"></a> ';
    if (isset($_SESSION['username'])) {
      $temp = str_replace("http://localhost/CloMaT_ProiectTW/images/", "", $value);
      $temp = str_replace(".jpg", "", $temp);
      echo '<input type="checkbox" class="add-btn" name="' . $temp . '">';
    }
    echo '</div>';
  }
  if (isset($_SESSION['username'])) {
    echo '<input type="submit" value=" Salveaza articolele selectate " class="add-btn"/>';
  }


  //a 4-a garedroba - material

  $materialText="";
  $material_matchText="";
  $a=0;
  foreach ($garderobaPatru as &$value){
    $material_matchText=$materialText;
    $query = "select MATERIAL from ARTICOLE where ARTICOL_PATH='$value' and TIP_PIESA!='Accesorii'";
    $qr = oci_parse($connection, $query);
    oci_execute($qr);
    while ($row = oci_fetch_array($qr)) {
      $materialText=$row['MATERIAL'];
    }
    $a=$a+1;
    if($a==2){
    break;
    }
  }
  //afisam garderoba
  echo '<div class="text-despre-articole"> A patra garderoba sugerata se bazeaza pe asortarea dintre materialele '. $materialText .' si '. $material_matchText . '.</div>';
  foreach ($garderobaPatru as &$value) {
    echo '<div class = "img-cell">';
    echo '<a href="' . $value . '" data-lightbox = "mygallery"><img src="' . $value . '"></a> ';
    if (isset($_SESSION['username'])) {
      $temp = str_replace("http://localhost/CloMaT_ProiectTW/images/", "", $value);
      $temp = str_replace(".jpg", "", $temp);
      echo '<input type="checkbox" class="add-btn" name="' . $temp . '">';
    }
    echo '</div>';
  }
  if (isset($_SESSION['username'])) {
    echo '<input type="submit" value=" Salveaza articolele selectate " class="add-btn"/>';
  }






  echo '</form>';

  ?>
  </div>
  <br>
</body>

</html>