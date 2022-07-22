/* Insert your javascript here */


function linkThis() {
     
document.write("You are learning how to call JavaScript function in html");
}

function innerChange() {
    document.getElementById("inner").innerHTML = "I have changed!";
}
function alertBox() {
    alert("Hello! I am an alert box!");
}


function nameCheck() {
  const nameRegex = new RegExp(/^[A-Za-z \-'.Æ]{1,127}$/);
  document.getElementById("demo2").innerHTML = "Name being checked ";
  var name=getid("name").value;
  if (nameRegex.test(name))
  {
    alert("Valid name!");
    console.log("name checked ok");
    return true;
  }
  else
  {
    alert("You have entered an invalid name!");
    console.log("name checked WRONG");
    return false;
  }
}

function phoneNumberCheck() {
  const phRegex = new RegExp(/^(\(04\)|04|\+614)( ?\d){8}$/);
  document.getElementById("demo3").innerHTML = "Number being checked ";
  var name=getid("mobile").value;
  
  if (phRegex.test(mobile))
  {
    alert("Valid number!");
    console.log("number checked ok");
    return true;
  }
  else
  {
    alert("You have entered an invalid number!");
    console.log("number checked WRONG");
    return false;
  }
  
}

  function getid(sP)
  {
    return document.getElementById(sP);
  }



// This is where it all happens!
  // function formValidate() {
  // // clear all errors, even if it's the first run
  //   clearErrors();
  //   var countErrors=0;
  // // Is their first name 'Steve'
  //   if (!nameCheck()) countErrors++;
  // // Are they a scientist?
  //   if (!scientistCheck()) countErrors++;
  // // Is the filename in format xxxxx.pdf?
  //   if (!fileNameCheck()) countErrors++;
  // // Block or allow submission depending on number of errors
  //   console.log(countErrors);
  //   return (countErrors==0);
  // }
  
  // This is where it all happens!
  function formValidate() {

      // alertBox();
    }

    // window.onscroll = function () 
    function currentLinks() {
      console.clear();
      console.log("Win Y: "+window.scrollY);
      var navlinks = document.getElementsByTagName("nav")[0].getElementsByTagName('a');
      console.log(navlinks);
      var sections = document.getElementsByTagName("main")[0].getElementsByTagName("section");
      console.log(sections);
      console.log(sections[0].offsetTop+' '+(sections[0].offsetTop+sections[0].offsetHeight));
      console.log(sections[1].offsetTop+' '+(sections[1].offsetTop+sections[1].offsetHeight));
      console.log(sections[2].offsetTop+' '+(sections[2].offsetTop+sections[2].offsetHeight));

      for (var a=0; a<sections.length; a++) {
        var secTop = sections[a].offsetTop-20;
        var secBot = sections[a].offsetTop + sections[a].offsetHeight-20;
        console.log(secTop+' '+secBot);
        if (window.scrollY >= secTop && window.scrollY < secBot) {
          console.log(sections[a].id+': current');
          navlinks[a].classList.add("current");
        } else {
          console.log(sections[a].id+":");
          navlinks[a].classList.remove("current");
        }

        }
      } 
    
