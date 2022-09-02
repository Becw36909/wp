<?php

$maxSeats = 10;
$minSeats = 1;
$uncheckedSeat = '';

/* Call this function in the booking page like so: 
   $fieldErrors = validateBooking();
   If the array is empty, then no errors were generated
*/
function validateBooking()
{
  if (!empty($_POST)) {
    // echo "STUFF FOUND IN POST \n";
    // echo "<br>";
    $errors = findPostErrors();
    if (count($errors) > 0) {
      // echo "you have errors \n";

      return $errors;
    } else {
      $_SESSION = $_POST;
      // echo "you are free to go \n";
      // THE FOLLOWING REDIRECT IS TURNED OFF AS IT WAS NOT WORKING/GETTING STUCK
      // header("Location: https://titan.csit.rmit.edu.au/~s3903758/wp/a3/receipt.php");
      // exit();
      header("Location: receipt.php");
    }
  } else {
    // echo "no STUFFs FOUNDs IN the POST \n";
  }
}

// function setChecked (&$str, $val) {
//   return ( isset($str) && $str == $val ? 'checked' : '' ); 
// }

// function setSelected (&$str, $val) {
//   return ( isset($str) && $str == $val ? 'selected' : '' ); 
// }

function findPostErrors()
{
  $errors = []; // new empty array to return error messages
  global $movies;
  global $maxSeats;
  global $minSeats;
  global $uncheckedSeat;
  // print_r($movies);
  // echo "<br>";

  $phonePattern = "/(\(04\)|04|\+614)( ?\d){8}/i";
  $namePattern = "/[A-Za-z \-'.Æ]{1,127}/i";

  // check Name
  if ($_POST['user']['name'] == '') {
    $errors['user']['name'] = "Name can't be blank";
    // echo $errors['user']['name'] . " \n";
  } elseif (!preg_match($namePattern, $_POST['user']['name'])) {
    $errors['user']['name'] = "Name must be valid";
    // echo $errors['user']['name'] . " \n";
  }
  // check Email
  if ($_POST['user']['email'] == '') {
    $errors['user']['email'] = "Email can't be blank";
    // echo $errors['user']['email'] . " \n";
  } elseif (!filter_var($_POST['user']['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['user']['email'] = "Email must be a valid address";
    // echo $errors['user']['email'] . " \n";
  }
  // check Phone Number
  if ($_POST['user']['mobile'] == '') {
    $errors['user']['mobile'] = "Mobile can't be blank";
    // echo $errors['user']['mobile'] . " \n";
  } elseif (!preg_match($phonePattern, $_POST['user']['mobile'])) {
    $errors['user']['mobile'] = "Phone number must be a valid Australian number";
    // echo $errors['user']['mobile'] . " \n";
  }

  //Check movie exists
  $movie = $_POST['movie'];
  // echo $movie;
  // $moviefound = array_key_exists($_POST['movie'], $movies) ? "True" : "False";
  // echo $moviefound . " movie found";
  // echo "<br>";
  if (!array_key_exists($_POST['movie'], $movies)) {
    // echo "MOVIE NOT FOUND";
    // header("Location: https://titan.csit.rmit.edu.au/~s3903758/wp/a3/index.php");
    // exit();
    header("Location: index.php");
  }

  //Check day exists 
  if (!empty($_POST['day']) && !array_key_exists($_POST['day'], $movies[$movie]['movie-times'])) {
  // if (($_POST['day'] != $movies[$movie]['movie-times'])) {
    // echo "DAY NOT FOUND";
    // header('Location: https://titan.csit.rmit.edu.au/~s3903758/wp/a3/index.php');
    // exit();
    header("Location: index.php");
  } elseif (empty($_POST['day'])) {
    $errors['day'] = "You must choose a day to book";
    // echo $errors['day'];
  }


  // echo "<br>";
  // print_r($_POST['seats']);
  // echo "<br>";
  // echo "FOREACH STARTS HERE";
  // echo "<br>";
  // foreach ($_POST['seats'] as $class => $amount) {
  //   $seatInt = is_numeric($amount) ? "True" : "False";
  //   echo $seatInt;
  //   echo "<br>";
  // }
  // echo "Array sum: ";
  // echo array_sum($_POST['seats']);
  // echo "<br>";
  // $seatTotal = array_sum($_POST['seats']) > 0  ? "True" : "False";
  // echo "Seat Total Greater than 0?? :";
  // echo $seatTotal;
  // echo "<br>";

  //Check there are seats chosen
  if (array_sum($_POST['seats']) < $minSeats) {
    $errors['seats'] = "You must choose at least one seat to book";
    // echo $errors['seats'] . " \n";
  }

  //Check seats are valid numbers
  foreach ($_POST['seats'] as $class => $amount) {
    if (!filter_var($amount, FILTER_VALIDATE_INT) && !$amount == $uncheckedSeat) {
      // echo "THIS IS NOT A VALID NUMBER";
      // header("Location: https://titan.csit.rmit.edu.au/~s3903758/wp/a3/index.php");
      // exit();
      header("Location: index.php");
    } elseif ($amount > $maxSeats) {
      // echo "NO NO NO TOO MANY SEATS ";
      // header("Location: https://titan.csit.rmit.edu.au/~s3903758/wp/a3/index.php");
      // exit();
      header("Location: index.php");
    } else {
      // echo "valid number";
    }
    // echo "<br>";
  }


  return $errors;
}

function validateBookingRequest()
{
  if (!empty($_POST)) {
    // echo "STUFF FOUND IN POST \n";
    // echo "<br>";
    $requestErrors = findRequestErrors();
    if (count($requestErrors) > 0) {
      // echo "you have errors \n";

      return $requestErrors;
    } else {
      // $_SESSION = $_POST;
      // echo "you are free to go \n";
      header("Location: currentbookings.php");
    }
  } else {
    // echo "no STUFFs FOUNDs IN the POST \n";
  }
}

function findRequestErrors(){
  global $currentBookings;
  $requestErrors = [];
  $postName = $_POST['user']['name'];
  $postEmail = $_POST['user']['email'];
    readFromBookingsFile();
    foreach ($currentBookings as $booking) {
      // if (($booking[1] == $_POST['name']) && ($booking[2] == $_POST['email'])) {
      if ((!$booking[1] == $postName) && (!$booking[2] == $postEmail)) {
        $requestErrors['error'] = "Sorry, we found no current bookings matching that name and email address";
      }
    }
    return $requestErrors;
}
