

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CloMatchTool</title>
  <link rel="icon" type="image/png" href="images/icon.png" />
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
  <link rel="stylesheet" type="text/css" href="css/new-new-filtre.css">
  <script src="js/lightbox-plus-jquery.min.js"></script>
  <script src="js/new_filtre.js"></script>
</head>
<script src="js/script.js"></script>

<body>

  <!--------------------------------->

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
        <input type="submit" value="submit" id="submit-btn" />
      </form>

    </div>

    <div class="gototop">TOP</div>

    <?php
    echo '<form method="post" id = "container-articole" >';
    foreach ($imgList as &$value) {
      echo '<div class = "img-cell">';
      echo '<a href="' . $value . '" data-lightbox = "mygallery"><img src="' . $value . '"></a> ';
      if (isset($_SESSION['username'])) {
        $temp = str_replace("http://localhost/Clomat1.0/images/", "", $value);
        $temp = str_replace(".jpg", "", $temp);
        echo '<input type="checkbox" class="add-btn" name="' . $temp . '">';
      }
      echo '</div>';
    }
    if (isset($_SESSION['username'])) {
      echo '<input type="submit" value="add" class="add-btn"/>';
    }
    echo '</form>';
    ?>


  </div>







</body>

</html>