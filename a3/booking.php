<?php require_once('tools.php');
validateMovieCode();
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
  <script src="script.js"></script>


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

  <!-- <div><p><?php getMovie(); ?></p> </div>  -->
  <main>
    <section id="Booking">

      <?php getMovieData(); ?>

      <div id="form">

        <form name="bookingForm" method="post" oninput="return logDetails()" onsubmit="return formValidate();">

          <input type="hidden" name="movie" value="ACT">

          <h2 class="heading2">Session Day and Time</h2>
          <fieldset>
            <legend>
              <h3>Please choose:</h3>
            </legend>
            <?php createRadioButtons(); ?>
          </fieldset>

          <p></p>

          <h2 class="heading2">Required Seats:</h2>

          <!-- <h3>Standard Adult</h3>
          <select name='seats[STA]' class='seat-select' data-fullprice="20.5" data-discprice="15">
            <?php seatNumbers(); ?>
          </select>


          <h3>Standard Concession</h3>
          <select name='seats[STCON]' class='seat-select' data-fullprice="18" data-discprice="13.5">
            <?php seatNumbers(); ?>
          </select>


          <h3>Standard Child</h3>
          <select name='seats[STCH]' class='seat-select' data-fullprice="16.5" data-discprice="12">
            <?php seatNumbers(); ?>
          </select>


          <h3>First Class Adult</h3>
          <select name='seats[FIRSTA]' class='seat-select' data-fullprice="30" data-discprice="24">
            <?php seatNumbers(); ?>
          </select>


          <h3>First Class Concession</h3>
          <select name='seats[FIRSTCON]' class='seat-select' data-fullprice="27" data-discprice="22.5">
            <?php seatNumbers(); ?>
          </select>


          <h3>First Class Child</h3>
          <select name='seats[FIRSTCH]' class='seat-select' data-fullprice="24" data-discprice="21">
            <?php seatNumbers(); ?>
          </select> -->

          <?php seatPrices(); ?>

          <h3>Total: <span id=price></price>
            </span></h3>

          <p>
          <h2 class="heading2">Customer Details</h2>
          </p>
          <p><label for="name">Full Name:</label></p>
          <input type="text" id="name" name="user[name]" placeholder="Full Name" required onchange="nameCheck()" />
          <p id="demo2"></p>
          <p><label for="email">Email:</label></p>
          <input type="email" id="email" name="user[email]" placeholder="Email" required />
          <p><label for="mobile">Mobile Number:</label></p>
          <input type="text" id="mobile" name="user[mobile]" placeholder="Mobile Number" required onchange="phoneNumberCheck()" />
          <p id="demo3"></p>
          <p><input type="submit" value="Submit"></p>

        </form>

      </div>
    </section>

  </main>
  <footer>
    <div>&copy;<script>
        document.write(new Date().getFullYear());
      </script> Put your name(s), student number(s) and group name here. Last modified <?= date("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
    <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
    <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
  </footer>
  <aside id="debug">
    <hr>
    <h3>Debug Area</h3>
    <pre>
GET Contains:
<?php print_r($_GET) ?>
POST Contains:
<?php print_r($_POST) ?>
SESSION Contains:
<?php print_r($_SESSION) ?>
      </pre>
  </aside>
  <div><?php printMyCode(); ?></div>

</body>

</html>