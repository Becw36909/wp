<?php
session_start();

/* Put your PHP functions and modules here.
   Many will be provided in the teaching materials,
   keep a look out for them!
*/
$indexPage = "https://titan.csit.rmit.edu.au/~s3903758/wp/a3/index.php";
$receiptPage = "https://titan.csit.rmit.edu.au/~s3903758/wp/a3/receipt.php";


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

// $seats = ['Please Select', '1', '2', '3','4','5', '6', '7', '8', '9', '10'];

function printPanelMovieTimes($movieID)
{
  global $movies;
  foreach ($movies[$movieID]['movie-times'] as $day => $time) {
    echo $day . ": " . $time;
    echo "<br>";
    echo "<br>";
  }
}

//probably need to fix the below to also give the prices to the seats
function seatNumbers()
{
  echo <<<"CDATA"
  <option value=''>Please Select</option>
  <option value='1'>1</option>
  <option value='2'>2</option>
  <option value='3'>3</option>
  <option value='4'>4</option>
  <option value='5'>5</option>
  <option value='6'>6</option>
  <option value='7'>7</option>
  <option value='8'>8</option>
  <option value='9'>9</option>
  <option value='10'>10</option>
  CDATA;
}

function seatPrices()
{
  echo <<<"CDATA"
  <h3>Standard Adult</h3>
<select name='seats[STA]' class='seat-select' data-fullprice="20.5" data-discprice="15">
CDATA;
  seatNumbers();
  echo <<<"CDATA"
</select>
<h3>Standard Concession</h3>
<select name='seats[STCON]' class='seat-select' data-fullprice="18" data-discprice="13.5">
CDATA;
  seatNumbers();
  echo <<<"CDATA"
</select>
<h3>Standard Child</h3>
<select name='seats[STCH]' class='seat-select' data-fullprice="16.5" data-discprice="12">
CDATA;
  seatNumbers();
  echo <<<"CDATA"
</select>
<h3>First Class Adult</h3>
<select name='seats[FIRSTA]' class='seat-select' data-fullprice="30" data-discprice="24">
CDATA;
  seatNumbers();
  echo <<<"CDATA"
</select>
<h3>First Class Concession</h3>
<select name='seats[FIRSTCON]' class='seat-select' data-fullprice="27" data-discprice="22.5">
CDATA;
  seatNumbers();
  echo <<<"CDATA"
</select>
<h3>First Class Child</h3>
<select name='seats[FIRSTCH]' class='seat-select' data-fullprice="24" data-discprice="21">
CDATA;
  seatNumbers();
  echo <<<"CDATA"
</select>
CDATA;
}


// function getMovieTimes($movieID) {
//   global $movies;
//   foreach ($movies[$movieID]['movie-times'] as $day => $time) {
//     return $day;
//     return $time;
//   }
// }

function printMovie()
{
  global $movies;
  foreach ($movies as $movieID => $value) {
    echo "<br>";
    echo $value['title'];
    echo "<br>";
    echo $value['classification'];
    echo "<br>";
    echo $value['movie-blurb'];
    echo "<br>";
    echo "Hello";
    echo "<br>";
    echo "<br>";
    echo print_r($value['movie-times']);
    echo "<br>";
    echo "<br>";
    foreach ($value['movie-times'] as $day => $time) {
      echo $day;
      echo $time;
      echo "<br>";
      echo "<br>";
    }
    echo "<br>";
    echo print_r($value['movie-times']['Monday']);
    echo "<br>";
    echo "Hello";
    echo "<br>";
  }
}

// function printMoviePanels($movieID)
// {
//   global $movies;
//   echo <<<"CDATA"
//     <div class="flip-card">
//           <div class="flip-card-inner">
//             <div class="flip-card-front">
//               <div class="front-panel">
//                 <div class="movie-poster"><img src={$movies[$movieID]['movie-poster']} alt={$movies[$movieID]['alt']} /></div>
//                 <div class="movie-name">
//                   <h3>{$movies[$movieID]['title']}{$movies[$movieID]['classification']}</h3>
//                 </div>
//               </div>
//             </div>
//             <div class="flip-card-back">
//               <div class="back-panel">

//                 <div class="movie-blurb">
//                   <h3>{$movies[$movieID]['title']}{$movies[$movieID]['classification']}</h3>
//                   <p>{$movies[$movieID]['movie-blurb']}</p>
//                 </div>
//                 <div class="movie-times">
//                   <h3>Session Times:</h3>

//                   <form action="booking.php" method='get'>
//                     <input type="hidden" name="movie" value={$movies[$movieID]}>
//                     <input type="submit" value="Book Now">
//                   </form>
//                 </div>
//               </div>
//             </div>
//           </div>
//         </div>
//   CDATA;
// }

function printMoviePanel($movieID)
{
  global $movies;
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

function getMovie()
{
  // echo $_GET['movie'];
  return $_GET['movie'];
}

function createRadioButtons()
{

  $movieID = getMovie();
  global $movies;
  $price = '';

  foreach ($movies[$movieID]['movie-times'] as $day => $time) {
    if ($day == 'Monday' || $time == '12pm') {
      $price = "discprice";
    } else {
      $price = "fullprice";
    }
    echo <<<"CDATA"
  <input type="radio" id={$day} name="day" value={$day} data-pricing={$price}>
  <label for="{$day}">{$day} {$time}</label>
  CDATA;
  }
}


// function validateMovieCode()
// {
//   $selectedMovie = getMovie();
//   global $movies;
//   $movieIsValid = false;
//   foreach ($movies as $movieID => $value) {

//       if ($selectedMovie == $value['code']) {
//       $movieIsValid = true;
//       echo "MOVIE HAS BEEN FOUND \n";
//       break;

//     } else {
//       // header('Location: https://titan.csit.rmit.edu.au/~s3903758/wp/a3/index.php');
//       // exit();
//       echo "MOVIE IS NOT FOUND \n";

//     }
//   }
// }
// <?php validateMovieCode(); 

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

function debugModule()
{
  echo "<pre id='debug'>";
  echo "POST Contains: \n";
  print_r($_POST);
  echo "GET Contains: \n";
  print_r($_GET);
  echo "SESSION Contains: \n";
  print_r($_SESSION);
  echo "</pre>";
  printMyCode();
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
