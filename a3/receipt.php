<?php require_once('tools.php');
validateSessionData();
?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="author" content="Rebecca Watson">
  <meta name="description" content="Lunardo Cinema">
  <link rel="stylesheet" href="style.css" type="text/css">
  <link rel="icon" href='../../media/lunastar.png' type="image/x-icon">
  <!-- <script src="script.js"></script> -->



  <title>Lunardo Cinema Receipt Page</title>

  <!-- Keep wireframe.css for debugging, add your css to style.css -->
  <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
  <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
  <script src='../wireframe.js'></script>
</head>

<body>

  <?php lunardoHeader(); ?>
  <main>
    <section id="companyInfo">
      <div>
        <div class="heading2">
          <h2>Booking Receipt</h2>
        </div>
        <div class="grid-container-2-column">
          <div class="leftItem"><?php companyDetails(); ?></div>
          <div class="rightItem"><p>Booking Made:</p> <p><?= date("Y-m-d"); ?></p></div>
          <!-- <div class="centerItem">3</div> -->
        </div>
      </div>
      <section id="bookingInfo">
      <div>
        <div class="heading2">
          <h2>Booking Receipt</h2>
        </div>
        <div class="grid-container-2-column">
          <div class="leftItem"><?php companyDetails(); ?></div>
          <div class="rightItem"><p>Booking Made:</p> <p><?= date("Y-m-d"); ?></p></div>
          <!-- <div class="centerItem">3</div> -->
        </div>
      </div>


      <div class="flex-container">
        stuff here
      </div>

    </section>


  </main>

  <?php lunardoFooter(); ?>

  <div><?php debugModule(); ?></div>

</body>

</html>