<?php require_once('tools.php');
readFromBookingsFile();
//    printCurrentBookings(); 
retrieveRequestedBooking();

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

    <title>Lunardo Current Bookings Page</title>

    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
    <script src='../wireframe.js'></script>
</head>

<body>


    <?php lunardoHeader(); ?>
    <main>
        <section id="bookingDetails">

            <div class="leftItem"><?php printAllCurrentBookings(); ?></div>
            </div>


        </section>

        </section>
        <div class="flex-container">
            <!-- stuff here -->
        </div>
    </main>

    <?php lunardoFooter(); ?>


    <div><?php debugModule(); ?></div>

</body>

</html>