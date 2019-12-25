<?php
spl_autoload_register('myAutoloader');
function myAutoloader($className){
    include 'classes/' . $className . '.php';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/blog.css">
  <link rel="stylesheet" href="styles/styles.css">
  <title>Zavrsni rad</title>
</head>

<body>

  <?php
    require 'elements/header.php';
    //var_dump($_GET);
    
  ?>

  <div class='container'>
    <h2>Single post</h2>
    <?php
      $connect = new Db;
      $connect->connectToDb();
      $singlePost = $connect->getSinglePost($_GET['id']);
    ?>
  </div>


  <?php
    require 'elements/footer.php';
  ?>

</body>

</html>