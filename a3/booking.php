<!DOCTYPE html>
<html lang='en'>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta http-equiv="X-Frame-Options" content="deny">
  <meta name="author" content="Rebecca Watson">
  <meta name="description" content="Lunardo Cinema Booking Page">
  <link rel="stylesheet" href="style.css" type="text/css">
  <!-- <link rel="icon" href='../media/lunastar.png' type="image/x-icon"> -->
  <script src="script.js"></script>


  <title>Lunardo Booking Page</title>

  <!-- Keep wireframe.css for debugging, add your css to style.css -->
  <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
  <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
  <script src='../wireframe.js'></script>
</head>

<body>

  <header>
    <div>
      <h1>LUNARDO Cinema &#x2606</h1>
    </div>
  </header>

  <nav id="topnav">
    <a href="index.php">BACK TO LUNARDO MAIN PAGE</a>
  </nav>

  <main>
    <section id="Booking">

      <div>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/giXco2jaZ_4" title="YouTube video player" frameborder="0" allow="accelerometer; 
      autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>


      <div>
        <div class="heading2">
          <h2>TOP GUN: MAVERICK (RATED M)</h2>
        </div>
        <div class="flex-container">
          <p>After more than thirty years of service as one of the Navy's top aviators, Pete “Maverick” Mitchell (Tom Cruise) is where he belongs,
            pushing the envelope as a courageous test pilot and dodging the advancement in rank that would ground him. When he finds himself training
            a detachment of Top Gun graduates for a specialized mission the likes of which no living pilot has ever seen,
            Maverick encounters Lt. Bradley Bradshaw (Miles Teller), call sign: “Rooster,” the son of Maverick's late friend and
            Radar Intercept Officer Lt. Nick Bradshaw, aka “Goose”. Facing an uncertain future and confronting the ghosts of his past,
            Maverick is drawn into a confrontation with his own deepest fears, culminating in a mission that demands the ultimate sacrifice from
            those who will be chosen to fly it.</p>
          <ul>
            <li>Director: Joseph Kosinski </li>
            <li>Stars: Tom Cruise, Jennifer Connelly, Miles Teller</li>
            <li>Run Time: 151 mins </li>
          </ul>
        </div>
      </div>

      <div>
      <h4>Hey, click on the button below to invoke the function</h4>
      <input type= "button" onclick = "linkThis()" value = "Click Me">
    
      <p id="inner" onclick="innerChange()">Click me to change my HTML content (innerHTML).</p>

    </div>
      <button onclick="alertBox()">Try it</button>





      <div>
        <form name="bookingForm" method="post" oninput="return logDetails()" onsubmit="return formValidate();">

          <input type="hidden" name="movie" value="ACT">

          <h2>Session Day and Time</h2>
          <fieldset>
            <legend>
              <h3>Please choose:</h3>
            </legend>
            <input type="radio" id="Monday" name="day" value="MON" data-pricing="discprice">
            <label for="Monday">Monday 9pm</label>
            <input type="radio" id="Tuesday" name="day" value="TUES" data-pricing="discprice">
            <label for="Tuesday">Tuesday 9pm</label>
            <input type="radio" id="Wednesday" name="day" value="WED" data-pricing="discprice">
            <label for="Wednesday">Wednesday 9pm</label>
            <input type="radio" id="Friday" name="day" value="FRI" data-pricing="discprice">
            <label for="Friday">Friday 9pm</label>
            <input type="radio" id="Saturday" name="day" value="SAT" data-pricing="fullprice">
            <label for="Saturday">Saturday 6pm</label>
            <input type="radio" id="Sunday" name="day" value="SUN" data-pricing="fullprice">
            <label for="Sunday">Sunday 6pm</label>
          </fieldset>

          <h2>Required Seats:</h2>

          <h3>Standard Adult</h3>
          <select name='seats[STA]' class='seat-select' data-fullprice="20.5" data-discprice="15">
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
          </select>


          <h3>Standard Concession</h3>
          <select name='seats[STCON]' class='seat-select' data-fullprice="18" data-discprice="13.5">
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
          </select>


          <h3>Standard Child</h3>
          <select name='seats[STCH]' class='seat-select' data-fullprice="16.5" data-discprice="12">
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
          </select>


          <h3>First Class Adult</h3>
          <select name='seats[FIRSTA]' class='seat-select' data-fullprice="30" data-discprice="24">
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
          </select>


          <h3>First Class Concession</h3>
          <select name='seats[FIRSTCON]' class='seat-select' data-fullprice="27" data-discprice="22.5">
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
          </select>


          <h3>First Class Child</h3>
          <select name='seats[FIRSTCH]' class='seat-select' data-fullprice="24" data-discprice="21">
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
          </select>

          <h3>Total: <span id=price></price>
          </span></h3>

          <p>
          <h2>Customer Details</h2>
          </p>
          <p><label for="name">Full Name:</label></p>
          <input type="text" id="name" name="user[name]" placeholder="Full Name" required onchange="nameCheck()"/><p id="demo2"></p>
          <p><label for="email">Email:</label></p>
          <input type="email" id="email" name="user[email]" placeholder="Email" required /> 
          <p><label for="mobile">Mobile Number:</label></p>
          <!-- <input type="text" id="mobile" name="user[mobile]" placeholder="Mobile Number" required onchange="phoneNumberCheck()"/><p id="demo3"></p> -->
          <input type="text" id="mobile" name="user[mobile]" placeholder="Mobile Number" required pattern= "(\(04\)|04|\+614)( ?\d){8}"/>
          <p><input type="submit" value="Submit"></p>

        </form>

      </div>

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


</body>

</html>

