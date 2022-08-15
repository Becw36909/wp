<?php
session_start();

/* Put your PHP functions and modules here.
   Many will be provided in the teaching materials,
   keep a look out for them!
*/
$indexPage = "https://titan.csit.rmit.edu.au/~s3903758/wp/a3/index.php";
$receiptPage = "https://titan.csit.rmit.edu.au/~s3903758/wp/a3/receipt.php";
$dayError = '';
$seatError = '';
$emailError = '';
$nameError = '';
$phoneError = '';
$price;


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



function checkingMovieDays()
{
  $movieID = getMovie();
  global $movies;
  foreach ($movies[$movieID]['movie-times'] as $day => $time) {
    echo $day;
    echo "<br>";
    echo "<br>";
  }
}

function printPanelMovieTimes($movieID)
{
  global $movies;
  foreach ($movies[$movieID]['movie-times'] as $day => $time) {
    echo $day . ": " . $time;
    echo "<br>";
    echo "<br>";
  }
}

function setSelected(&$str, $val)
{
  return (isset($str) && $str == $val ? 'selected' : '');
}


$seats = [
  '' => 'Please Select', 1 => '1', 2 => '2', 3 => '3',
  4 => '4', 5 => '5', 6 => '6', 7 => '7',
  8 => '8', 9 => '9', 10 => '10'
];


function seatNumbers()
{
  global $seats;
  foreach ($seats as $value => $name) {
    echo <<<"CDATA"
  <option value={$value}>{$name}</option>
  CDATA;
  }
  // echo <<<"CDATA"
  // <option value=''>Please Select</option>
  // <option value='1'>1</option>
  // <option value='2'>2</option>
  // <option value='3'>3</option>
  // <option value='4'>4</option>
  // <option value='5'>5</option>
  // <option value='6'>6</option>
  // <option value='7'>7</option>
  // <option value='8'>8</option>
  // <option value='9'>9</option>
  // <option value='10'>10</option>
  // CDATA;
}

$pricingArr = [
  'STA' => [
    'discprice' => '15.00',
    'fullprice' => '20.50',
    'name' => "Standard Adult",
    'id' => "standard-adult"
  ],
  'STP' => [
    'discprice' => '13.50',
    'fullprice' => '18.00',
    'name' => "Standard Concession",
    'id' => "standard-conc"
  ],
  'STC' => [
    'discprice' => '12.00',
    'fullprice' => '16.50',
    'name' => "Standard Child",
    'id' => "standard-child"
  ],
  'FCA' => [
    'discprice' => '24.00',
    'fullprice' => '30.00',
    'name' => "First Class Adult",
    'id' => "first-class-adult"
  ],
  'FCP' => [
    'discprice' => '22.50',
    'fullprice' => '27.00',
    'name' => "First Class Concession",
    'id' => "first-class-conc"
  ],
  'FCC' => [
    'discprice' => '21.00',
    'fullprice' => '24.00',
    'name' => "First Class Child",
    'id' => "first-class-child"
  ],
];


function seatsSetup()
{
  global $pricingArr;
  global $price;
  foreach ($pricingArr as $seatType => $value) {

    echo <<<"CDATA"
    <h3>{$pricingArr[$seatType]['name']}</h3>
    <select name='seats[{$seatType}]' class='seat-select' data-fullprice={$pricingArr[$seatType]['fullprice']} data-discprice={$pricingArr[$seatType]['discprice']}>
 CDATA;
    seatNumbers();
    echo <<<"CDATA"
</select>
CDATA;
  }
}

// function seatPrices()
// {
//   echo <<<"CDATA"
//   <h3>Standard Adult</h3>
// <select name='seats[STA]' class='seat-select' data-fullprice="20.5" data-discprice="15">
// CDATA;
//   seatNumbers();
//   echo <<<"CDATA"
// </select>
// <h3>Standard Concession</h3>
// <select name='seats[STP]' class='seat-select' data-fullprice="18" data-discprice="13.5">
// CDATA;
//   seatNumbers();
//   echo <<<"CDATA"
// </select>
// <h3>Standard Child</h3>
// <select name='seats[STC]' class='seat-select' data-fullprice="16.5" data-discprice="12">
// CDATA;
//   seatNumbers();
//   echo <<<"CDATA"
// </select>
// <h3>First Class Adult</h3>
// <select name='seats[FCA]' class='seat-select' data-fullprice="30" data-discprice="24">
// CDATA;
//   seatNumbers();
//   echo <<<"CDATA"
// </select>
// <h3>First Class Concession</h3>
// <select name='seats[FCP]' class='seat-select' data-fullprice="27" data-discprice="22.5">
// CDATA;
//   seatNumbers();
//   echo <<<"CDATA"
// </select>
// <h3>First Class Child</h3>
// <select name='seats[FCC]' class='seat-select' data-fullprice="24" data-discprice="21">
// CDATA;
//   seatNumbers();
//   echo <<<"CDATA"
// </select>
// CDATA;
// }


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

//get rid of the echo when tidying up
function getMovie()
{
  echo $_GET['movie'];
  return $_GET['movie'];
}

function setChecked(&$str, $val)
{
  return (isset($str) && $str == $val ? 'checked' : '');
}

function createRadioButtons()
{
  $movieID = getMovie();
  global $movies;
  $price = '';
  foreach ($movies[$movieID]['movie-times'] as $day => $time) {
    // if ($day == 'Monday' || $time == '12pm') {
    // $checkedDay = setChecked($_POST['day'], $day);
    global $price;
    $checkedDay = '';
    if ($day == 'Monday' || $time == '12pm' && ($day != 'Saturday' && $day != 'Sunday')) {
      $price = "discprice";
      // } elseif (($time == '12pm') && ($day != 'Saturday' && $day != 'Sunday')) {
      //   $price = "discpriceprice";
    } else {
      $price = "fullprice";
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
    <input type="radio" id={$day} name="day" value={$day} data-pricing={$price} >
    <label for="{$day}">{$day} {$time}</label>
    CDATA;
  }
}

function validateMovieCode()
{
  $selectedMovie = getMovie();
  global $movies;
  // if (in_array($selectedMovie, $movies)) {
  if (array_key_exists($selectedMovie, $movies)) {

    echo "MOVIE FOUND \n";
  } else {
    header('Location: https://titan.csit.rmit.edu.au/~s3903758/wp/a3/index.php');
    exit();
    // echo "MOVIE NOT FOUND \n";

  }
}

function validateSessionData()
{
  if (!empty($_SESSION)) {
    echo "STUFF FOUND IN SESSION \n";
    echo "<br>";
 //stuff

  } else {
    echo "no STUFFs FOUNDs IN the SESSION \n";
    // header('Location: https://titan.csit.rmit.edu.au/~s3903758/wp/a3/index.php');
  }
}

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


function printMyCode()
{
  $allLinesOfCode = file($_SERVER['SCRIPT_FILENAME']);
  echo "<pre id='myCode'><ol>";
  foreach ($allLinesOfCode as $oneLineOfCode) {
    echo "<li>" . rtrim(htmlentities($oneLineOfCode)) . "</li>";
  }
  echo "</ol></pre>";
}

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

function companyDetails(){
  echo "<p>Lunardo Cinema</p> 
  <ul>
  <li>EMAIL: lunardo@cinema.com </li> 
  <li>PH: 1800 555 333</li> 
  <li>ADDRESS: 180 Main St, Small Country Town</li>
  <li>QLD, 4000 AUSTRALIA</li>
  </ul>";
}

function lunardoFooter()
{
  $date = date("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME']));
  echo <<<"CDATA"
  <footer id='footer'>
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

//GO AND GET THE CORRECT LINES FROM BOOKING.PHP TO PUT BACK IN THE JS AND
//HTML CODE CHECKS I TOOK OUT OF HERE WHEN I WAS PUTTING IN THE PHP CHECKS
function formData($errors)
{
  $dayError = ' <span class="span2" >' . unsetFB($errors['day']) . '<span >';
  $nameError = ' <span class="span2" >' . unsetFB($errors['user']['name']) . '</span>';
  $seatError = ' <span class="span2" >' . unsetFB($errors['seats']) . '<span >';
  $emailError = ' <span class="span2">' . unsetFB($errors['user']['email']) . '<span >';
  $phoneError = ' <span class="span2">' . unsetFB($errors['user']['mobile']) . '<span >';
  $email = unsetFB($_POST['user']['email']);
  $name = unsetFB($_POST['user']['name']);
  $phone = unsetFB($_POST['user']['mobile']);

  $movieID = getMovie();
  echo <<< CDATA
  <div id="form">
  <form name="bookingForm" method="post" oninput="return logDetails()" onsubmit="return formValidate();">
    <input type="hidden" name="movie" value={$movieID}>
    <h2 class="heading2">Session Day and Time</h2>
    <p>{$dayError}</p>
    <fieldset>
      <legend>
        <h3>Please choose:</h3>
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
    <input type="text" id="name" name="user[name]" placeholder="Full Name" value={$name}/>
    <p id="demo2"></p> 
    <p><label for="email">Email:</label>{$emailError}</p>
    <input type="email" id="email" name="user[email]" placeholder="Email" value={$email} />
    
    <p><label for="mobile">Mobile Number:</label>{$phoneError}</p>
    <input type="text" id="mobile" name="user[mobile]" placeholder="Mobile Number" value={$phone}  />
    
    <p id="demo3"></p>
    <p><input type="submit" value="Submit"></p>
  </form>
</div>
CDATA;
}
