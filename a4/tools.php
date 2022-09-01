<?php
session_start();

// declaring some variables to use throughout the document
// $indexPage = "https://titan.csit.rmit.edu.au/~s3903758/wp/a3/index.php";
// $receiptPage = "https://titan.csit.rmit.edu.au/~s3903758/wp/a3/receipt.php";
$dayError = '';
$seatError = '';
$emailError = '';
$nameError = '';
$phoneError = '';
$priceType;
$finalGST;
$finalTotal;

// getting the current priceType (disc or full) for seats set by user choice of movie day/time
function getPriceType($priceType)
{
  echo $priceType;
}

// prints out seat prices according to the pricingArr 
function getSeatPrices()
{
  global $pricingArr;
  global $priceType;
  echo $priceType;
}

// setting up each movie object
$movies = [
  'ACT' =>  [
    'code' => "ACT",
    'title' => "Top Gun: Maverick",
    'classification' => " (M)",
    'movie-poster' => "../../media/topgun.png",
    'alt' => "A Top Gun movie poster featuring the Actor Tom Cruise in front of a plane",
    'movie-blurb' => "After more than thirty years of service as one of the Navy's top aviators, Pete Mitchell is where he belongs.",
    'long-blurb' => "After more than thirty years of service as one of the Navy's top aviators, Pete “Maverick” Mitchell (Tom Cruise) is where he belongs,
    pushing the envelope as a courageous test pilot and dodging the advancement in rank that would ground him. When he finds himself training
    a detachment of Top Gun graduates for a specialized mission the likes of which no living pilot has ever seen,
    Maverick encounters Lt. Bradley Bradshaw (Miles Teller), call sign: “Rooster,” the son of Maverick's late friend and
    Radar Intercept Officer Lt. Nick Bradshaw, aka “Goose”. Facing an uncertain future and confronting the ghosts of his past,
    Maverick is drawn into a confrontation with his own deepest fears, culminating in a mission that demands the ultimate sacrifice from
    those who will be chosen to fly it.",
    'iframe-link' => "https://www.youtube.com/embed/giXco2jaZ_4",
    'director' => 'Joseph Kosinski',
    'stars' => 'Tom Cruise, Jennifer Connelly, Miles Teller',
    'run-time' => '151 mins',
    'movie-times' => [
      'Monday' => '9pm',
      'Tuesday' => '9pm',
      'Wednesday' => '9pm',
      'Thursday' => '9pm',
      'Friday' =>  '9pm',
      'Saturday' => '6pm',
      'Sunday' => '6pm'
    ]
  ],
  'RMC' => [
    'code' => "RMC",
    'title' => "Mrs Harris Goes to Paris",
    'classification' => " (PG)",
    'movie-poster' => "../../media/mrsharris.png",
    'alt' => "A movie poster depicting Mrs Harris in front of a pink background",
    'movie-blurb' => "A widowed cleaning lady in 1950s London falls madly in love with a couture Dior dress, 
    and decides that she must have one of her own.",
    'long-blurb' => "In partnership with the House of Dior, 'Mrs. Harris Goes To Paris' tells the story of a widowed 
    cleaning lady in 1950s London who falls madly in love with a couture Dior dress and decides that she must have one of 
    her own. After she works, starves, and gambles to raise the funds to pursue her dream, she embarks on an adventure to 
    Paris which will change not only her own outlook, but the very future of the House of Dior.",
    'iframe-link' => "https://www.youtube.com/embed/iO9JcPbbmAA",
    'director' => 'Anthony Fabian',
    'stars' => 'Jason Isaacs, Lesley Manville, Alba Baptista',
    'run-time' => '115 mins',
    'movie-times' => [
      'Wednesday' => '12pm',
      'Thursday' => '12pm',
      'Friday' =>  '12pm',
      'Saturday' => '3pm',
      'Sunday' => '3pm'
    ]
  ],
  'FAM' => [
    'code' => "FAM",
    'title' => "Lightyear",
    'classification' => " (PG)",
    'movie-poster' => "../../media/lightyear.png",
    'alt' => "A movie poster of the toy Buzz Lightyear blasting off into space",
    'movie-blurb' => "While spending years attempting to return home, marooned Space Ranger Buzz Lightyear encounters
    an army of ruthless robots commanded by Zurg.",
    'long-blurb' => "While spending years attempting to return home, marooned Space Ranger Buzz Lightyear encounters 
    an army of ruthless robots commanded by Zurg who are attempting to steal his fuel source.",
    'iframe-link' => "https://www.youtube.com/embed/BwZs3H_UN3k",
    'director' => 'Angus MacLane',
    'stars' => 'Chris Evans (voice), Keke Palmer (voice), Peter Sohn (voice)',
    'run-time' => '140 mins',
    'movie-times' => [
      'Monday' => '12pm',
      'Tuesday' => '12pm',
      'Wednesday' => '6pm',
      'Thursday' => '6pm',
      'Friday' =>  '6pm',
      'Saturday' => '12pm',
      'Sunday' => '12pm'
    ]
  ],
  'AHF' => [
    'code' => "AHF",
    'title' => "Prithviraj",
    'classification' => " (PG)",
    'movie-poster' => "../../media/Prithviraj.png",
    'alt' => "A movie poster of the main character Prithviraj",
    'movie-blurb' => "A fearless warrior. An epic love story. Witness the grand saga of Samrat Prithviraj Chauhan.",
    'long-blurb' => "A biopic on legendary Hindu warrior king 'Prithviraj Chauhan' including his early military 
    successes, love story with Sanyukta & clashes with Muhammad of Ghor, a ruler of the Muslim Ghurid dynasty who 
    led the Islamic Conquest of Hindustan.",
    'iframe-link' => "https://www.youtube.com/embed/33-CQdPHyjw",
    'director' => 'Chandra Prakash Dwivedi',
    'stars' => 'Akshay Kumar, Sanjay Dutt, Manushi Chhillar',
    'run-time' => '135 mins',
    'movie-times' => [
      'Monday' => '6pm',
      'Tuesday' => '6pm',
      'Saturday' => '9pm',
      'Sunday' => '9pm'
    ]
  ]
];


// checking movie day and time according to a user chosen movie with movieId/code
function checkingMovieDays()
{
  $movieID = getMovie();
  global $movies;
  foreach ($movies[$movieID]['movie-times'] as $day => $time) {
    echo $day . 'and ' . $time;
    echo "<br>";
    echo "<br>";
  }
}

// prints only movie day and times for the flip panels according to the movie objects
function printPanelMovieTimes($movieID)
{
  global $movies;
  foreach ($movies[$movieID]['movie-times'] as $day => $time) {
    echo $day . ": " . $time;
    echo "<br>";
    echo "<br>";
  }
}

// seats object for seat quantities only with value => name
$seats = [
  '' => 'Please Select', 1 => '1', 2 => '2', 3 => '3',
  4 => '4', 5 => '5', 6 => '6', 7 => '7',
  8 => '8', 9 => '9', 10 => '10'
];

// sets up seat select boxes with seat object
// decided to run this code at the same time below in seatsSetup()
function seatNumbers()
{
  global $seats;
  foreach ($seats as $value => $name) {
    // $selectedSeat = setSelected($_POST['seats'][$seatType], $value);
    echo <<<"CDATA"
  <option value={$value}>{$name}</option>
  CDATA;
  }
}

// sets up a pricing array for seats according to code with 
// disc and full prices and names of seats
$pricingArr = [
  'STA' => [
    'discprice' => '15.00',
    'fullprice' => '20.50',
    'name' => "Standard Adult"
  ],
  'STP' => [
    'discprice' => '13.50',
    'fullprice' => '18.00',
    'name' => "Standard Concession"
  ],
  'STC' => [
    'discprice' => '12.00',
    'fullprice' => '16.50',
    'name' => "Standard Child"
  ],
  'FCA' => [
    'discprice' => '24.00',
    'fullprice' => '30.00',
    'name' => "First Class Adult"
  ],
  'FCP' => [
    'discprice' => '22.50',
    'fullprice' => '27.00',
    'name' => "First Class Concession"
  ],
  'FCC' => [
    'discprice' => '21.00',
    'fullprice' => '24.00',
    'name' => "First Class Child"
  ],
];


// used it for preselecting seats in form
function setSelected(&$str, $val)
{
  return (isset($str) && $str == $val ? 'selected' : '');
}

// sets up and prints out each seat in pricing array with details and seat select options
function seatsSetup()
{
  global $pricingArr;
  // global $priceType;
  foreach ($pricingArr as $seatType => $details) {
    echo <<<"CDATA"
    <h3>{$pricingArr[$seatType]['name']}</h3>
    <select name='seats[{$seatType}]' class='seat-select' data-fullprice={$pricingArr[$seatType]['fullprice']} 
    data-discprice={$pricingArr[$seatType]['discprice']}>
 CDATA;
    // seatNumbers();
    global $seats;
    foreach ($seats as $value => $name) {
      $selectedSeat = setSelected($_POST['seats'][$seatType], $value);
      // <option value={$value} {$selectedSeat} >{$name} </option>
      echo <<<"CDATA"
    <option $selectedSeat value={$value} >{$name} </option>
    CDATA;
    }
    echo <<<"CDATA"
</select>
CDATA;
  }
}

// prints each movie flip panel according to the movie objects in the movie array
function printMoviePanels()
{
  global $movies;
  foreach ($movies as $movieID => $value) {
    echo <<<"CDATA"
    <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <div class="front-panel">
                <div class="movie-poster"><img src={$movies[$movieID]['movie-poster']} alt={$movies[$movieID]['alt']} /></div>
                <div class="movie-name">
                  <h3>{$movies[$movieID]['title']}{$movies[$movieID]['classification']}</h3>
                </div>
              </div>
            </div>
            <div class="flip-card-back">
              <div class="back-panel">
                <div class="movie-blurb">
                  <h3>{$movies[$movieID]['title']}{$movies[$movieID]['classification']}</h3>
                  <p>{$movies[$movieID]['movie-blurb']}</p>
                </div>
                <div class="movie-times">
                  <h3>Session Times:</h3>
   CDATA;
    printPanelMovieTimes($movieID);
    echo <<<"CDATA"
                  <form action="booking.php" method='get'>
                    <input type="hidden" name="movie" value={$movies[$movieID]['code']}>
                    <input type="submit" value="Book Now">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
  CDATA;
  }
}

// puts movie info in the booking page according to the user chosen movie (by movieID/code)
function getMovieData()
{
  $movieID = getMovie();
  global $movies;
  echo <<<"CDATA"
        <div>
        <iframe width="560" height="315" src={$movies[$movieID]['iframe-link']} title="YouTube video player" 
          frameborder="0" allow="accelerometer; 
      autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>

      <div>
        <div class="heading2">
          <h2>{$movies[$movieID]['title']}{$movies[$movieID]['classification']}</h2>
        </div>
        <div class="flex-container">
          <p>{$movies[$movieID]['long-blurb']}</p>
          <ul>
            <li>Director: {$movies[$movieID]['director']}</li>
            <li>Stars: {$movies[$movieID]['stars']}</li>
            <li>Run Time: {$movies[$movieID]['run-time']} </li>
          </ul>
        </div>
      </div>

 CDATA;
}

// get's the movieID to match info to in booking page from GET array when 
// user moves from index to booking page, also put in the POST array with the
// hidden movie field
// get rid of the echo when tidying up
function getMovie()
{
  // echo $_GET['movie'];
  $movie = "";
  if (!empty($_GET['movie'])) $movie = $_GET['movie'];
  return $movie;
  // return $_GET['movie'];
}

// used for giving a radio button for a day 'checked' if form data has errors
function setChecked(&$str, $val)
{
  return (isset($str) && $str == $val ? 'checked' : '');
}

// creates radio buttons for booking page with movie day/time according to user chosen movieID
function createRadioButtons()
{
  $movieID = getMovie();
  global $movies;
  global $priceType;
  foreach ($movies[$movieID]['movie-times'] as $day => $time) {
    $checkedDay = setChecked($_POST['day'], $day);
    // if ($day == 'Monday' || $time == '12pm') {
    // $checkedDay = setChecked($_POST['day'], $day);
    // global $priceType;
    // $checkedDay = '';
    if ($day == 'Monday' || $time == '12pm' && ($day != 'Saturday' && $day != 'Sunday')) {
      $priceType = "discprice";
      // } elseif (($time == '12pm') && ($day != 'Saturday' && $day != 'Sunday')) {
      //   $price = "discpriceprice";
    } else {
      $priceType = "fullprice";
    }
    //   if ($_POST['day'] == $day) {
    //     $checkedDay = 'checked';
    //   } else {
    //     $checkedDay = '';
    //   }
    //   //the below keeps only checking the last day in the loop
    //   // <input type="radio" id={$day} name="day" value={$day} data-pricing={$price} checked={$checkedDay}>

    // echo $price;
    echo <<<"CDATA"
    <input type="radio" id={$day} name="day" value={$day} {$checkedDay} data-pricing={$priceType} >
    <label for="{$day}">{$day} {$time}</label>
    CDATA;
    // getPriceType($priceType);
  }
}

// called on the booking page and checks the movie code in the header when user is
// moving from index page to booking page. 
// if valid according to movie array objects, otherwise redirects to index page 
function validateMovieCode()
{
  $selectedMovie = getMovie();
  global $movies;
  // if (in_array($selectedMovie, $movies)) {
  if (array_key_exists($selectedMovie, $movies)) {
    // echo "MOVIE FOUND \n";
  } else {
    // header("Location: https://titan.csit.rmit.edu.au/~s3903758/wp/a3/index.php");
    // exit();
    header("Location: index.php");
    // echo "MOVIE NOT FOUND \n";
  }
}

// validates SESSION has data inside for acces to the receipt page
// if no SESSION data, user is redirected to index page
function validateSessionData()
{
  if (!empty($_SESSION)) {
    // echo "STUFF FOUND IN SESSION \n";
    // echo "<br>";
  } else {
    // echo "no STUFFs FOUNDs IN the SESSION \n";
    header("Location: index.php");
    // header("Location: https://titan.csit.rmit.edu.au/~s3903758/wp/a3/index.php");
    // exit();
  }
}

// shows what is in each GET, POST and SESSION array according to user inputs
function debugModule()
{
  echo "<pre id='debug'>";
  echo "GET Contains: \n";
  print_r($_GET);
  echo "POST Contains: \n";
  print_r($_POST);
  echo "SESSION Contains: \n";
  print_r($_SESSION);
  printMyCode();
  echo "</pre>";
}

// prints each line of current code according to the page currently on
function printMyCode()
{
  $allLinesOfCode = file($_SERVER['SCRIPT_FILENAME']);
  echo "<pre id='myCode'><ol>";
  foreach ($allLinesOfCode as $oneLineOfCode) {
    echo "<li>" . rtrim(htmlentities($oneLineOfCode)) . "</li>";
  }
  echo "</ol></pre>";
}

// company header for each page where needed
function lunardoHeader()
{
  echo <<<"CDATA"
  <header>
    <div>
      <h1>LUNARDO Cinema &#x2606</h1>
    </div>
  </header>
  CDATA;
}

// prints out company details
function companyDetails()
{
  echo "<p>Lunardo Cinema</p> 
  <ul>
  <li>EMAIL: lunardo@cinema.com </li> 
  <li>PH: 1800 555 333</li> 
  <li>ADDRESS: 180 Main St, Small Country Town</li>
  <li>QLD, 4000 AUSTRALIA</li>
  </ul>";
}

// footer for each page where needed
function lunardoFooter()
{

  $date = date("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME']));
  echo <<<"CDATA"
  <footer id='footer'>
  <div id="retrieve-booking">
  CDATA;
  retrieveBookingForm();
  echo <<<"CDATA"
  </div>
    <div?>&copy;Lunardo Cinema, EMAIL: lunardo@cinema.com, PH: 1800 555 333, ADDRESS: 180 Main St, Small Country Town, QLD, 4000 AUSTRALIA</div>
      <div>&copy;<script>
          document.write(new Date().getFullYear());
        </script> &copy; Rebecca Watson - s3903758. <a href="https://github.com/Becw36909/wp" target="_blank">Link to GitHub repo.</a></a> Last modified {$date}.</div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
  </footer>
  CDATA;
}



// Returns a blank or alternative string if candidate string is unset / undefined
function unsetFB(&$str, $fallback = '')
{
  return (isset($str) ? $str : $fallback);
}

// GO AND GET THE CORRECT LINES FROM BOOKING.PHP TO PUT BACK IN THE JS AND
// HTML CODE CHECKS I TOOK OUT OF HERE WHEN I WAS PUTTING IN THE PHP CHECKS
// sets up the booking page form with necessary radio buttons, seat selects and
// text fields for user inputs. Also sets up and displays user feedback for any form errors. 
function formData($errors)
{
  // spans for displaying user form errors if any
  $dayError = ' <span class="span2" >' . unsetFB($errors['day']) . '<span >';
  $nameError = ' <span class="span2" >' . unsetFB($errors['user']['name']) . '</span>';
  $seatError = ' <span class="span2" >' . unsetFB($errors['seats']) . '<span >';
  $emailError = ' <span class="span2">' . unsetFB($errors['user']['email']) . '<span >';
  $phoneError = ' <span class="span2">' . unsetFB($errors['user']['mobile']) . '<span >';
  $email = unsetFB($_POST['user']['email']);
  $name = unsetFB($_POST['user']['name']);
  $phone = unsetFB($_POST['user']['mobile']);

  $movieID = getMovie();
  // <form action="booking.php" method='get'>
  echo <<< CDATA
  <div id="form">
  <form name="bookingForm" method="post" oninput="return logDetails()" onsubmit="return formValidate();">
    <input type="hidden" name="movie" value={$movieID}>
    <h2 class="heading2">Session Day and Time</h2>
    <p>{$dayError}</p>
    <fieldset>
      <legend>
      Please choose:
      </legend>
  CDATA;
  createRadioButtons();
  echo <<< CDATA
    </fieldset>
    <h2 class="heading2">Required Seats:</h2>
    <p>{$seatError}</p>
  CDATA;
  // seatPrices();
  seatsSetup();
  echo <<< CDATA
    <h3>Total: <span id=price></price>
      </span></h3>
    <p>
    <h2 class="heading2">Customer Details </h2>
    </p>
    <p><label for="name">Full Name:</label>{$nameError}</p>
    <input type="text" id="name" name="user[name]" placeholder="Full Name" value="{$name}" required onchange="nameCheck()"/>
    <p id="demo2"></p> 
    <p><label for="email">Email:</label>{$emailError}</p>
    <input type="email" id="email" name="user[email]" placeholder="Email" value="{$email}" required />
    <p><label for="mobile">Mobile Number:</label>{$phoneError}</p>
    <input type="text" id="mobile" name="user[mobile]" placeholder="Mobile Number" value="$phone"  required onchange="phoneNumberCheck()" />
    <p id="demo3"></p>
    <p><input type="submit" value="Submit"></p>
  </form>
  </div>
CDATA;
}

// form for user to request booking with their name and email
function retrieveBookingForm()
{
  echo <<< CDATA
  <div id="form">
  <form name="retrieveBookingForm" action="currentbookings.php" method="post">
    <h2 class="footer-heading">Already Booked with Lunardo? Get Booking Details Here:</h2>
    </p>
    <p><label for="name">Full Name:</label></p>
    <input type="text" id="name" name="user[name]" placeholder="Full Name"  required />
    <p id="demo2"></p> 
    <p><label for="email">Email:</label></p>
    <input type="email" id="email" name="user[email]" placeholder="Email" required />
    <p><input type="submit" value="Submit"></p>
  </form>
  </div>
CDATA;
}

$currentBookings = [];

// reads the contents of the bookings.txt 
function readFromBookingsFile()
{
  global $currentBookings;
  echo "bookings ahead being read out";
  echo "<br>";

  if (($fp = fopen('bookings.txt', 'r')) && flock($fp, LOCK_SH)) {
    if (($headings = fgetcsv($fp, 0, ",")) !== false) {
      while ($cells = fgetcsv($fp, 0, ",")) {
        for ($x = 1; $x < count($cells); $x++)
          $currentBookings[$cells[0]][$headings[$x]] = $cells[$x];
      }
    }
    flock($fp, LOCK_UN);
    fclose($fp);

    echo "bookings below";
    echo "<br>";
    print_r($currentBookings);
    echo "<br>";
    echo "bookings search below";
    echo "<br>";
    echo array_search("bec", $currentBookings);
    echo "<br>";

    //   if (array_search("bec", $currentBookings)) {
    //     echo "Match found<br>";
    //   } else {
    //     echo "Match not found<br>";
    //   }
    // }
    echo "bookings finished reading";
  }
}



// gets customer details from SESSION and prints them out for receipt
function getCustomerDetails()
{
  if (!empty($_SESSION)) {
    echo "<p>Customer Details</p> 
    <ul>
    <li>Name: {$_SESSION['user']['name']}</li>
    <li>EMAIL: {$_SESSION['user']['email']} </li> 
    <li>PH: {$_SESSION['user']['mobile']}</li> 
    </ul>";
  }
}

// gets movie details according to movieID and prints out
function movieReceiptDetails()
{
  global $movies;
  $movieDay = $_SESSION['day'];
  $movieID = $_SESSION['movie'];
  if (!empty($_SESSION)) {
    $movieTime = $movies[$movieID]['movie-times'][$movieDay];
    echo "<h3>{$movies[$movieID]['title']} - $movieDay, $movieTime </h3>";
  }
}

// setting up some arrays to use for booking details and seat prices/quantities
$now = date('d/m h:i');
$bookedSeats = [];
$bookedSeatPrices = [];
$totalBookingPrices = [];
$bookingDetails = [];
$tickets = [];

// below used to just echo out the state/what is inside of the arrays when function is called
function echoSeats()
{
  global $bookedSeats;
  global $bookedSeatPrices;
  global $totalBookingPrices;
  global $bookingDetails;
  // print_r($bookedSeats);
  // print_r($bookedSeatPrices);
  // print_r($totalBookingPrices);
  print_r($bookingDetails);
}

// finds the correct seat prices according to movieID day/time (disc or full)
// and calculates per quantity, printing out to receipt page inc GST cost
function calculateSeatTotals()
{
  global $movies;
  global $pricingArr;
  global $bookedSeats;
  global $bookedSeatPrices;
  global $totalBookingPrices;

  if (!empty($_SESSION)) {
    $movieID = $_SESSION['movie'];
    $movieDay = $_SESSION['day'];
    $movieTime = $movies[$movieID]['movie-times'][$movieDay];
    if ($movieDay == 'Monday' || ($movieDay != 'Saturday' && $movieDay != 'Sunday') && $movieTime == '12pm') {
      $priceType = "discprice";
    } else {
      $priceType = "fullprice";
    }
    $totalPrice = 0;
    foreach ($_SESSION['seats'] as $seatType => $quantity) {
      if ($quantity > 0) {
        $subTotal = $quantity * $pricingArr[$seatType][$priceType];
        $totalPrice += $subTotal;
        $subTotalFloat = "$" . number_format($subTotal, 2);
        echo <<< CDATA
        <div class="leftItem">{$pricingArr[$seatType]['name']} Type</div>
        <div class="centerItem">{$quantity}</div>
        <div class="rightItem">{$subTotalFloat}</div>
    CDATA;
      } else $subTotalFloat = '';
      $bookedSeats += [$seatType => $quantity];
      $bookedSeatPrices += [$seatType => $subTotalFloat];
    }

    $calculateGST = $totalPrice / 11;
    $finalGST = "$" . number_format($calculateGST, 2);
    $finalTotal = "$" . number_format($totalPrice, 2);
    echo <<< CDATA
    <div class="leftItem"> </div>
    <div class="rightItem"><p>GST Included</p>
    <p>{$finalGST}</p></div>
    <div class="rightItem"><p>Total Price</p>
    <p><h3>{$finalTotal}</h3></p></div>
    </div>
CDATA;
    $totalBookingPrices += [$finalTotal, $finalGST];
  }
}

// prints movie tickets with according to movieID and seats chosen
function printTickets()
{
  global $movies;
  global $pricingArr;
  global $bookedSeats;
  global $bookedSeatPrices;
  $movieID = $_SESSION['movie'];
  $movieDay = $_SESSION['day'];
  $movieTime = $movies[$movieID]['movie-times'][$movieDay];

  // maybe a 2 column grid??
  foreach ($_SESSION['seats'] as $seatType => $quantity) {
    if ($quantity > 0) {
      for ($q = 1; $q <= $quantity; $q++) {
        echo <<< CDATA
        <div class="ticket-container">
        <div class="grid-container-2-column">
        <div class="leftItem ticket-div">
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
        </div>
    CDATA;
      }
    }
  }
}

// checks current state of variables
// function checkTotals()
// {
//   global $finalGST;
//   global $finalTotal;
//   echo "price totals here ";
//   echo $finalGST;
//   echo $finalTotal;
// }

// writes all booking details to an array ready to write to a file
function writeBookingToArray()
{
  global $now;
  global $totalBookingPrices;
  global $bookedSeats;
  global $bookedSeatPrices;
  global $movies;
  global $bookingDetails;
  $movieID = $_SESSION['movie'];
  $movieDay = $_SESSION['day'];
  $movieTime = $movies[$movieID]['movie-times'][$movieDay];

  $bookingDetails = [
    'orderDate' => $now,
    'username' => $_SESSION['user']['name'],
    'email' => $_SESSION['user']['email'],
    'mobile' => $_SESSION['user']['mobile'],
    'movieCode' => $_SESSION['movie'],
    'day' => $_SESSION['day'],
    'time' => $movieTime,
    'STAquantity' => $bookedSeats['STA'],
    'STAprice' => $bookedSeatPrices['STA'],
    'STPquantity' => $bookedSeats['STP'],
    'STPprice' => $bookedSeatPrices['STP'],
    'STCquantity' => $bookedSeats['STC'],
    'STCprice' => $bookedSeatPrices['STC'],
    'FCAquantity' => $bookedSeats['FCA'],
    'FCAprice' => $bookedSeatPrices['FCA'],
    'FCPquantity' => $bookedSeats['FCP'],
    'FCPprice' => $bookedSeatPrices['FCP'],
    'FCCquantity' => $bookedSeats['FCC'],
    'FCCprice' => $bookedSeatPrices['FCC'],
    'total' => $totalBookingPrices[0],
    'GST' => $totalBookingPrices[1]
  ];
  // echo 'booking details here';
  // print_r($bookingDetails) ;
  return $bookingDetails;
}

// writes all booking details to a string ready to write to a file
// function writeBookingToString()
// {
//   global $bookingDetails;
//   global $totalBookingPrices;
//   global $bookedSeats;
//   global $bookedSeatPrices;
//   global $movies;
//   $movieID = $_SESSION['movie'];
//   $movieDay = $_SESSION['day'];
//   $movieTime = $movies[$movieID]['movie-times'][$movieDay];
//   $bookingString = "$bookingDetails[0], 
//   {$_SESSION['user']['name']},
//   {$_SESSION['user']['email']},
//   {$_SESSION['user']['mobile']},
//   {$_SESSION['movie']},
//   {$_SESSION['day']},
//   $movieTime,
//   {$bookedSeats['STA']},
//   {$bookedSeatPrices['STA']},
//   {$bookedSeats['STP']},
//   {$bookedSeatPrices['STP']},
//   {$bookedSeats['STC']},
//   {$bookedSeatPrices['STC']},
//   {$bookedSeats['FCA']},
//   {$bookedSeatPrices['FCA']},
//   {$bookedSeats['FCP']},
//   {$bookedSeatPrices['FCP']},
//   {$bookedSeats['FCC']},
//   {$bookedSeatPrices['FCC']},
//   {$totalBookingPrices[0]},
//   {$totalBookingPrices[1]} ";
//   return $bookingString;
//   // echo $bookingString;
// }

// writes booking details array to a file
function writeBookingToFile()
{
  global $bookingDetails;
  // $bookingString = writeBookingToString();
  // print_r (explode(",",$bookingString ));
  // $bookingStringArr = (explode(",", $bookingString));
  // echo $bookingString;
  // $filename = 'bookings.txt';
  // if (($fp = fopen($filename, "a")) && flock($fp, LOCK_EX) !== false) {
  //   // Note: Appending assumes headings are already present!
  //   foreach ($bookingDetails as $record => $details) {
  //     fputcsv($fp, $details);
  //   }
  //   // file_put_contents($filename, $bookingString, LOCK_EX | FILE_APPEND);

  //   flock($fp, LOCK_UN);
  //   fclose($fp);
  // };

  // make array of just the values from booking details to send to text file
  $detailsForCSV = array_values($bookingDetails);
  // Open the file for appending
  $bookingsFile = fopen('bookings.txt', 'a');
  //  Add the Array to the file using fputcsv()
  fputcsv($bookingsFile, $detailsForCSV);
  // Close the file
  fclose($bookingsFile);
}

// bookings.txt headings for reference:
// Order Date-Name-Email-Mobile-Movie Code-Day of Movie-Time of Movie-
// # STA-$ STA-# STP-$ STP-# STC-$ STC-# FCA- $ FCA-# FCP-$ FCP-# FCC-$ FCC-Total-GST 