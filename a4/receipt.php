<?php require_once('tools.php');
// putRequestedBookingArrayInSession();
validateSessionData(); 
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
  <!-- <script src="script.js"></script> -->

  <title>Lunardo Receipt Page</title>

  <!-- Keep wireframe.css for debugging, add your css to style.css -->
  <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
  <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
  <script src='../wireframe.js'></script>
</head>

<body>

  <?php lunardoHeader(); ?>
  <main>
    <section id="receiptDetails">

      <div class="heading2">
        <h2>Booking Receipt</h2>
      </div>

      <div class="grid-container-2-column">
        <div class="leftItem">
          <h3><?php movieReceiptDetails(); ?></h3>
        </div>
        <div class="rightItem"></div>
      </div>

      <div class="grid-container-2-column">
        <div class="leftItem"><?php companyDetails(); ?></div>
        <div class="rightItem">
          <p>Booking Made:</p>
          <p><?= date("Y-m-d"); ?></p>
        </div>
      </div>

      <div class="grid-container-2-column">
        <div class="leftItem"><?php getCustomerDetails(); ?></div>
      </div>


      <div class="grid-container-3-column">
        <div class="leftItem">Seat Type</div>
        <div class="centerItem">Quantity</div>
        <div class="rightItem">Subtotal</div>
        <?php calculateSeatTotals(); ?>
      </div>

    </section>
    <section id="tickets">
      <!-- <div class="tickets-page"> -->
      <div class="heading2">
        <h2>Tickets</h2>
      </div>



      <!-- <div class="tickets-container"> -->
      <?php printTickets(); ?>
      <?php writeBookingToArray(); ?>
      <!-- <?php writeBookingToFile(); ?> -->


      <!-- </div> -->
      <!-- <div class="ticket-container">
        <div class="grid-container-2-column">
        <div class="leftItem ticketDiv">
        <h3>{$movies[$movieID]['title']} - $movieDay, $movieTime </h3>
        <ul> 
        <li>LUNARDO CINEMA</li>
        <li>{$pricingArr[$seatType]['name']}</li>
        </ul>
        </div>
        <div class="rightItem">
        <p>Admit</p> 
        <p>x1</p>
        <p>{$pricingArr[$seatType]['name']}</p>
        </div>
        </div>
        </div>
        <div>
        </div> -->



      <!-- </div> -->
    </section>
    <div class="flex-container">
      <!-- stuff here -->
    </div>
  </main>

  <?php lunardoFooter(); ?>


  <div><?php debugModule(); ?></div>

</body>

</html>