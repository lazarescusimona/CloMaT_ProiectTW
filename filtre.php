<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CloMatchTool</title>
  <link rel="icon" type="image/png" href="images/icon.png" />
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bellota:ital,wght@1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
  <link rel="stylesheet" type="text/css" href="css/new-new-filtre.css">
  <script src="js/lightbox-plus-jquery.min.js"></script>
  <script src="js/new_filtre.js"></script>
</head>
<script src="js/script.js"></script>

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
          <a href="filtre-back.php">
            Inspiratie
          </a>
        </li>
        <li>
          <a href="login-switch.php">
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
  <!--------------------------------->
  <br>
  <!--------------------------------->
  <div id="text-articole">Aici puteti cauta articole, piese vestimentare, garderobe.
    Cautati mai usor folosind meniul de filtrare.
  </div>
  <br>
  <div id="main-articole">

    <div id="filter-bar">
      <form name="form-filter" method="post">

        <?php
        foreach ($data as &$value) {
          echo '
          <div class="filter-cell"> ' . str_replace("_", " ", $value->nume_filtru);
          foreach ($value->subcategorii  as &$cat) {
            echo '
            <div class="radio-input">
            <input type="radio" id="' . $cat . '" name="' . str_replace("_", " ", $value->nume_filtru) . '" value="' . $cat . '" method="post">
            <label for="' . $cat . '">' . $cat . '</label><br>
            </div>
            ';
          }
          echo '</div>';
        }

        ?>

        <input type="submit" value=" Cauta articole " id="submit-btn" />
      </form>

    </div>

    <div class="gototop">TOP</div>

    <?php
    echo '<form method="post" id = "container-articole" >';
    if (isset($_SESSION['username']) && isset($_SESSION['areRuda']) &&!empty($imgListRelatives)) {
      echo '<div class="text-despre-articole">Rude</div>';
      foreach ($imgListRelatives as &$value) {
        echo '<div class = "img-cell">';
        echo '<a href="' . $value . '" data-lightbox = "mygallery"><img src="' . $value . '"></a> ';
        if (isset($_SESSION['username'])) {
          $temp = str_replace("http://localhost/CloMaT_ProiectTW/images/", "", $value);
          $temp = str_replace(".jpg", "", $temp);
          echo '<input type="checkbox" class="add-btn" name="' . $temp . '">';
        }
        echo '</div>';
      }
    }
    echo '<div class="text-despre-articole">Restul</div>';
    foreach ($imgListOther as &$value1) {
      echo '<div class = "img-cell">';
      echo '<a href="' . $value1 . '" data-lightbox = "mygallery"><img src="' . $value1 . '"></a> ';
      if (isset($_SESSION['username'])) {
        $temp = str_replace("http://localhost/CloMaT_ProiectTW/images/", "", $value1);
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