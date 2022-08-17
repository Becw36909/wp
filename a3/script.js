
var formTotal; 
var countErrors=0;

// function linkThis() {
// document.write("You are learning how to call JavaScript function in html");
// }

// function innerChange() {
//     document.getElementById("inner").innerHTML = "I have changed!";
// }
// function alertBox() {
//     alert("Hello! I am an alert box!");
// }


function nameCheck() {
  const nameRegex = new RegExp(/^[A-Za-z \-'.Æ]{1,127}$/);
  // document.getElementById("demo2").innerHTML = "Name being checked ";
  var name=getid("name").value;
  if (nameRegex.test(name))
  {
    // alert("Valid name!");
    console.log("name checked ok");
    return true;
  }
  else
  {
    alert("You have entered an invalid name!");
    console.log("name checked WRONG");
    countErrors++;
    console.log(countErrors);
    return false;

  }
}

function phoneNumberCheck() {
  const phRegex = new RegExp(/^(\(04\)|04|\+614)( ?\d){8}$/); 
  // document.getElementById("demo3").innerHTML = "Number being checked ";
  var mobile=getid("mobile").value;
  if (phRegex.test(mobile))
  {
    // alert("Valid number!");
    console.log("number checked ok");
    return true;
  }
  else
  {
    alert("You have entered an invalid number!");
    console.log("number checked WRONG");
    countErrors++;
    console.log("countErrors= "+countErrors);
    return false;
  }
  
}

  function getid(sP)
  {
    return document.getElementById(sP);
  }

  // function clearErrors() {
  //   alert("about to clear errors")

  // }

//   // This is where it all happens!
//   function formValidate() {
//     //clearErrors();
//     alert("You pressed submit");
//   // var countErrors=0;
//   // if (total > 0){
//   //   return true;
//   // }
//   // else {
//   //   alert("You need to choose seat/s");
//   //   console.log("no seats checked");
//   //   return false;
// if (formTotal > 0 && countErrors==0){
//   alert("YOU PASSED THE TEST");
//   return (countErrors==0);
// }
//   else {
//     alert("You need to choose seat numbers and day of the week");

//   }
// }


//I SHOULD REALLY CLEAN THE BELOW UP AND MAKE IT !formTotal and
//TRY TO TAKE SOME TIME TO ADD THE !countErrors ==0 and try to
//add that functionality to it as well

  // This is where it all happens!
  function formValidate() {
    //clearErrors();
    // alert("You pressed submit");
  // var countErrors=0;
  // if (total > 0){
  //   return true;
  // }
  // else {
  //   alert("You need to choose seat/s");
  //   console.log("no seats checked");
  //   return false;
if (formTotal > 0){
  return true;
}
  else {
    alert("You need to choose seat numbers and day of the week");
    return false;
    

  }
}

    
    function currentLinks() {
      console.clear();
      console.log("Win Y: "+window.scrollY);
      var navlinks = document.getElementsByTagName("nav")[0].getElementsByTagName('a');
      console.log(navlinks);
      var sections = document.getElementsByTagName("main")[0].getElementsByTagName("section");
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

      function logDetails() {
        console.clear();
        console.log("enter logDetails()");
        
        var total = 0;  
        var daySelected = document.querySelector("input[name='day']:checked");
        var priceCode = daySelected.dataset['pricing'];
        console.log(daySelected); 
        console.log(priceCode); 
        var seatsqtys = document.querySelectorAll(".seat-select");
        console.log(seatsqtys); 

        for (seat of seatsqtys) {
          // console.log(seat.dataset[priceCode])
          var subtotal = seat.value * seat.dataset[priceCode];
          total += subtotal; 
          var totalformatted = total.toFixed(2);
        }
        formTotal = total;
        total > 0 ? document.getElementById('price').innerHTML = "$ " +totalformatted : document.getElementById('price').innerHTML = " ";
        console.log(total);
        return (total > 0);
        
      }

    
