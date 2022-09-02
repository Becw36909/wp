<?php
require_once('tools.php');
require_once('post-validation.php');
$requestErrors = validateBookingRequest();
?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="author" content="Rebecca Watson">
  <meta name="description" content="Lunardo Cinema">
  <!-- <link rel="stylesheet" href="style.css" type="text/css"> -->
  <link rel="icon" href='../../media/lunastar.png' type="image/x-icon">
  <script src="script.js"></script>



  <title>Lunardo Cinema</title>

  <!-- Keep wireframe.css for debugging, add your css to style.css -->
  <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
  <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
  <script src='../wireframe.js'></script>
</head>

<body onscroll="currentLinks()">
  <!-- 
  <header>
    <div>
      <h1>LUNARDO Cinema &#x2606</h1>
    </div>
  </header> -->
  <?php lunardoHeader(); ?>


  <nav id="topnav">

    <a href="#AboutUs">About Us</a>
    <a href="#SeatingAndPrices">Seating and Prices</a>
    <a href="#NowShowing">Now Showing</a>
  </nav>

  <main>
    <section id="AboutUs">

      <div class="heading">
        <h2>About Us</h2>
      </div>
      <div><img src='../../media/dolbycinema.png' alt='An audience in a movie cinema with Dolby picture and sound' /> </div>
      <div class="flex-container">
        <ul>
          <p>Lunardo Cinema welcomes our customers back to our newly renovated and refurbished cinema, after extensive improvements made to our cinema experience including the following:</p>
          <li>Brand new seats for our standard sessions and reclinable first class seats are now available for your viewing comfort.</li>
          <li>New projection and sound systems have been installed and upgraded with 3D Dolby Vision projection and Dolby Atmos sound.</li>
          <li>Dolby Vision unlocks the emotional impact of every film, allowing you to see the subtle details and ultravivid colors.</li>
          <li>Hear the immersive sound of Dolby Atmos.</li>
          <li>This unmatched Dolby combination is so lifelike — you'll forget you're at the movies.</li>
        </ul>
      </div>

    </section>

    <section id="SeatingAndPrices">
      <div class="heading">
        <h2>Seating and Prices</h2>
      </div>

      <div class="heading2">
        <h1>Standard Seating</h1>
      </div>
      <div class="flex-container">
        <div><img src='../../media/Profern-Standard-Twin.png' alt='A Standard Cinema Seat' /></div>
        <div>
          <table>
            <tr>
              <th>Seat Type</th>
              <th>All Day Mondays & Weekday Afternoon Matinee (from 12pm)</th>
              <th>Weekday Mornings, Saturday & Sunday Sessions</th>
            </tr>
            <tr>
              <td>Standard Adult</td>
              <td>$15.00</td>
              <td>$20.50</td>
            </tr>
            <tr>
              <td>Standard Concession</td>
              <td>$13.50</td>
              <td>$18.00</td>
            </tr>
            <tr>
              <td>Standard Child</td>
              <td>$12.00</td>
              <td>$16.50</td>
            </tr>
          </table>
        </div>
      </div>

      <div class="heading2">
        <h1>First Class Seating</h1>
      </div>
      <div class="flex-container">
        <div><img src='../../media/Profern-Verona-Twin.png' alt='A First Class Cinema Seat' /></div>
        <div>
          <table>
            <tr>
              <th>Seat Type</th>
              <th>All Day Mondays & Weekday Afternoon Matinee (from 12pm)</th>
              <th>Weekday Mornings, Saturday & Sunday Sessions</th>
            </tr>
            <tr>
              <td>First Class Adult</td>
              <td>$24.00</td>
              <td>$30.00</td>
            </tr>
            <tr>
              <td>First Class Concession</td>
              <td>$22.50</td>
              <td>$27.00</td>
            </tr>
            <tr>
              <td>First Class Child</td>
              <td>$21.00</td>
              <td>$24.00</td>
            </tr>
          </table>
        </div>
      </div>
    </section>

    <section id="NowShowing">
      <div class="heading">
        <h2>Now Showing</h2>
      </div>



      <div id="movie-card-container">
        <?php printMoviePanels(); ?>

      </div>

    </section>

  </main>

  <!-- <footer>
    <div?>&copy;Lunardo Cinema, EMAIL: lunardo@cinema.com, PH: 1800 555 333, ADDRESS: 180 Main St, Small Country Town, QLD, 4000 AUSTRALIA</div>
      <div>&copy;<script>
          document.write(new Date().getFullYear());
        </script> &copy; Rebecca Watson - s3903758. <a href="https://github.com/Becw36909/wp" target="_blank">Link to GitHub repo.</a></a> Last modified <?= date("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
  </footer> -->
  <?php lunardoFooterWithBookingRequest($requestErrors); ?>

  <div><?php debugModule(); ?></div>

</body>

</html>