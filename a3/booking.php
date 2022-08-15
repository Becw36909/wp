<?php require_once('tools.php');
require_once('post-validation.php');
validateMovieCode();
// $fieldErrors = validateBooking();
$errors = validateBooking();
print_r($errors);
// checkingMovieDays();
?>


<!DOCTYPE html>
<html lang='en'>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta http-equiv="X-Frame-Options" content="deny">
  <meta name="author" content="Rebecca Watson">
  <meta name="description" content="Lunardo Cinema Booking Page">
  <link rel="stylesheet" href="style.css" type="text/css">
  <link rel="icon" href='../../media/lunastar.png' type="image/x-icon">
  <!-- <script src="script.js"></script> -->


  <title>Lunardo Booking Page</title>

  <!-- Keep wireframe.css for debugging, add your css to style.css -->
  <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
  <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
  <script src='../wireframe.js'></script>
</head>

<body>

  <?php lunardoHeader(); ?>

  <nav id="topnav">
    <a href="index.php">BACK TO LUNARDO MAIN PAGE</a>
  </nav>

  <div>
    <p><?php getMovie(); ?></p>
  </div>
  <main>
    <section id="Booking">

      <?php getMovieData(); ?>

      <?php formData($errors); ?>
   
    </section>

  </main>
  <?php lunardoFooter(); ?>

<?php debugModule(); ?>
      </pre>
  </aside>
</body>

</html>