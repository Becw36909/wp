<?php

$maxSeats = 10;
$minSeats = 1;
$uncheckedSeat = '';
// $seatError = '';
// $emailError = '';
// $nameError = '';
// $phoneError = '';
// $selectedSeats = 

/* Call this function in the booking page like so: 
   $fieldErrors = validateBooking();
   If the array is empty, then no errors were generated
*/
function validateBooking()
{

  if (!empty($_POST)) {
    echo "STUFF FOUND IN POST \n";
    echo "<br>";
    $errors = findPostErrors();
    if (count($errors) > 0) {
      echo "you suck \n";
      // $nameError = ' <span style="color:red">' . unsetFB($errors['name']) . '</span>';

      return $errors;
    } else {
      echo "you are free to go \n";;
    }
  } else {
    echo "no STUFFs FOUNDs IN the POST \n";
    // echo "<br>";
  }
  // if (!$errors)
}

function setChecked (&$str, $val) {
  return ( isset($str) && $str == $val ? 'checked' : '' ); 
}

function setSelected (&$str, $val) {
  return ( isset($str) && $str == $val ? 'selected' : '' ); 
}

function findPostErrors()
{
  $errors = []; // new empty array to return error messages
  global $movies;
  global $maxSeats;
  global $minSeats;
  global $uncheckedSeat;
  // print_r($movies);
  echo "<br>";

  $phonePattern = "/(\(04\)|04|\+614)( ?\d){8}/i";
  $namePattern = "/[A-Za-z \-'.Æ]{1,127}/i";
  if ($_POST['user']['name'] == '') {
    $errors['user']['name'] = "Name can't be blank";
    echo $errors['user']['name'] . " \n";
  } elseif (!preg_match($namePattern, $_POST['user']['name'])) {
    $errors['user']['name'] = "Name must be valid";
    echo $errors['user']['name'] . " \n";
  }
  // checkName();
  if ($_POST['user']['email'] == '') {
    $errors['user']['email'] = "Email can't be blank";
    echo $errors['user']['email'] . " \n";
  } elseif (!filter_var($_POST['user']['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['user']['email'] = "Email must be a valid address";
    echo $errors['user']['email'] . " \n";
  }
  // checkEmail();
  if ($_POST['user']['mobile'] == '') {
    $errors['user']['mobile'] = "Mobile can't be blank";
    echo $errors['user']['mobile'] . " \n";
  } elseif (!preg_match($phonePattern, $_POST['user']['mobile'])) {
    $errors['user']['mobile'] = "Phone number must be a valid Australian number";
    echo $errors['user']['mobile'] . " \n";
  }
  // checkPhoneNumber();
  $movie = $_POST['movie'];
  echo $movie;
  $moviefound = array_key_exists($_POST['movie'], $movies) ? "True" : "False";
  echo $moviefound . " movie found";
  echo "<br>";
  if (!array_key_exists($_POST['movie'], $movies)) {
    header('Location: https://titan.csit.rmit.edu.au/~s3903758/wp/a3/index.php');
  }
  if (!array_key_exists($_POST['day'], $movies[$movie]['movie-times'])) {
    header('Location: https://titan.csit.rmit.edu.au/~s3903758/wp/a3/index.php');
  }
  echo "<br>";
  $dayfound = array_key_exists($_POST['day'], $movies[$movie]['movie-times']) ? "True" : "False";
  echo $dayfound . " day found";
  echo "<br>";

  $seatInt = filter_var($_POST['seats'], FILTER_VALIDATE_INT) ? "True" : "False";
  echo $seatInt;
  print_r($_POST['seats']);
  echo "<br>";
  echo "FOREACH STARTS HERE";
  echo "<br>";
  foreach ($_POST['seats'] as $class => $amount) {
    $seatInt = is_numeric($amount) ? "True" : "False";
    echo $seatInt;
    // echo $class . ": " . $amount;
    // echo "<br>";
    echo "<br>";
  }
  echo array_sum($_POST['seats']);
  $seatTotal = array_sum($_POST['seats']) > 0  ? "True" : "False";
  echo $seatTotal;
  echo "<br>";
  if (array_sum($_POST['seats']) < $minSeats) {
    // echo " You must choose at least one seat to book";
    $errors['seats'] = "You must choose at least one seat to book";
    echo $errors['seats'] . " \n";
  }
  foreach ($_POST['seats'] as $class => $amount) {
    if (!filter_var($amount, FILTER_VALIDATE_INT) && !$amount == $uncheckedSeat) {
      echo "YOU ARE VERY NAUGHTY";
      header('Location: https://titan.csit.rmit.edu.au/~s3903758/wp/a3/index.php');
    } elseif ($amount > $maxSeats) {
      echo "no non onononon ";
      header('Location: https://titan.csit.rmit.edu.au/~s3903758/wp/a3/index.php');
    } else {
      echo "you cool dude";
    }
    echo "<br>";
  }


  // if (!filter_var($_POST['seats'], FILTER_VALIDATE_INT)) {
  //   header('Location: https://titan.csit.rmit.edu.au/~s3903758/wp/a3/index.php');
  // }

  return $errors;
}

function checkName()
{
  $namePattern = "/[A-Za-z \-'.Æ]{1,127}/i";
  if ($_POST['user']['name'] == '') {
    $errors['user']['name'] = "Name can't be blank";
    echo $errors['user']['name'] . " \n";
  } elseif (!preg_match($namePattern, $_POST['user']['name'])) {
    $errors['user']['name'] = "Name must be valid";
    echo $errors['user']['name'] . " \n";
  }
  return $errors;
}

function checkEmail()
{
  if ($_POST['user']['email'] == '') {
    $errors['user']['email'] = "Email can't be blank";
    echo $errors['user']['email'] . " \n";
  } elseif (!filter_var($_POST['user']['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['user']['email'] = "Email must be a valid address";
    echo $errors['user']['email'] . " \n";
    return $errors;
  }
}

function checkPhoneNumber()
{
  $phonePattern = "/(\(04\)|04|\+614)( ?\d){8}/i";
  if ($_POST['user']['mobile'] == '') {
    $errors['user']['mobile'] = "Mobile can't be blank";
    echo $errors['user']['mobile'] . " \n";
  } elseif (!preg_match($phonePattern, $_POST['user']['mobile'])) {
    $errors['user']['mobile'] = "Phone number must be a valid Australian number";
    echo $errors['user']['mobile'] . " \n";
  }
  return $errors;
}


// if (!empty($_POST))
// {
//   echo "STUFF FOUND IN POST \n";
//   echo "<br>";
// }
// else {
//   echo "no STUFFs FOUNDs IN the POST \n";
//   echo "<br>";
// }

// function printMovies() {
//   global $movies;
//   foreach ($movies as $movieID => $value) {
//     echo $movieID;
//     echo "<br>";
//     echo $value['title'];
//     echo "<br>";
//     echo $value['classification'];
//     echo "<br>";
//     echo $value['movie-blurb'];
//     echo "<br>";
//     echo "Hello";
//     echo "<br>";
//     echo "<br>";
//     echo print_r($value['movie-times']);
//     echo "<br>";
//     echo "<br>";
//     foreach ($value['movie-times'] as $day => $time) {
//       echo $day;
//       echo $time;
//       echo "<br>";
//       echo "<br>";
//     }
//     echo "<br>";
//     echo print_r($value['movie-times']['Monday']);
//     echo "<br>";
//     echo "Hello";
//     echo "<br>";
// }}
