<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-Frame-Options" content="deny">
    <meta name="author" content="Rebecca Watson">
  <meta name="description" content="Lunardo Cinema Booking Page">
  <link rel="stylesheet" href="style.css" type="text/css">

    <title>Lunardo Booking Page</title>
    
    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
    <script src='../wireframe.js'></script>
  </head>

  <body>

    <header>
      <div><h1>LUNARDO Cinema &#x2606</h1></div>
    </header>

    <nav id="topnav">
      <a href="index.php">BACK TO LUNARDO MAIN PAGE</a>
    </nav>

    <main>
      
    <iframe width="560" height="315" src="https://www.youtube.com/embed/giXco2jaZ_4" title="YouTube video player" frameborder="0" allow="accelerometer; 
      autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><p>this is some text</p>    
      <div class="flex-container">
      <ul>
      <h3>TOP GUN: MAVERICK (RATED M)</h3>
      <p>After more than thirty years of service as one of the Navy's top aviators, Pete “Maverick” Mitchell (Tom Cruise) is where he belongs, 
        pushing the envelope as a courageous test pilot and dodging the advancement in rank that would ground him. When he finds himself training 
        a detachment of Top Gun graduates for a specialized mission the likes of which no living pilot has ever seen, 
        Maverick encounters Lt. Bradley Bradshaw (Miles Teller), call sign: “Rooster,” the son of Maverick's late friend and 
        Radar Intercept Officer Lt. Nick Bradshaw, aka “Goose”. Facing an uncertain future and confronting the ghosts of his past, 
        Maverick is drawn into a confrontation with his own deepest fears, culminating in a mission that demands the ultimate sacrifice from 
        those who will be chosen to fly it.</p> 
        <li>Director: Joseph Kosinski </li>  
        <li>Stars: Tom Cruise, Jennifer Connelly, Miles Teller</li>
        <li>Run Time: 151 mins </li>  
        </ul> </div>
      </div>
  

      <form method='post'>
      <input type ="hidden" name="movie" value="ACT">


      <fieldset>
    <legend><h3>Please choose Session Day and Time:</h3></legend>
    <input type="radio" id="Monday" name="day" value="MON" data-pricing="disc">
      <label for="Monday">Monday 9pm</label>
    <input type="radio" id="Tuesday" name="day" value="TUES" data-pricing="disc">
      <label for="Tuesday">Tuesday 9pm</label>
    <input type="radio" id="Wednesday" name="day" value="WED" data-pricing="disc">
      <label for="Wednesday">Wednesday 9pm</label>
      <input type="radio" id="Friday" name="day" value="FRI" data-pricing="disc">
      <label for="Friday">Friday 9pm</label>
      <input type="radio" id="Saturday" name="day" value="SAT" data-pricing="full">
      <label for="Saturday">Saturday 6pm</label>
      <input type="radio" id="Sunday" name="day" value="SUN" data-pricing="full">
      <label for="Sunday">Sunday 6pm</label>
  </fieldset>

    <h3>Please choose required seats:</h3>

      // I don't have id's on my select dropdowns only a name is this ok<br>

      STYLE DROP DOWNS
      
   ><h3>Standard Adult</h3>
      <select name='seats[STA]' data-full="20.5" data-disc="15">
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
  <select name='seats[STCON]' data-full="13.5" data-disc="18">
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
  <select name='seats[STCH]'data-full="12" data-disc="16.5">
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
  <select name='seats[FIRSTA]' data-full="24" data-disc="30">
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
  <select name='seats[FIRSTCON]' data-full="22.5" data-disc="27">
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
  <select name='seats[FIRSTCH]' data-full="21" data-disc="24">
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


<p> STYLE the BREAKS WITH CSS AND FIX FORM BELOW WITH CSS - how to make more page spacing with CSS instead of using breaks?</p>
  <label for="name">Full Name:</label>
  <input type='text' id="name" name='user[name]' placeholder='First Name' required/>
  <label for="email">Email:</label>
  <input type='text' id="email" name='user[email]' placeholder='Email' required/>
  <label for="mobile">Full Name:</label>
  <input type='text' id="mobile" name='user[mobile]' placeholder='Mobile Number' required/>

  <input type="submit" value="Submit">
</form>





    </main>
    <footer>
      <div>&copy;<script>
        document.write(new Date().getFullYear());
      </script> Put your name(s), student number(s) and group name here. Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
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
