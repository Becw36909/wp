var userTotal = 0;
var nameCountErrors = 0;
var phoneCountErrors = 0;

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
  var name = getid("name").value;
  if (nameRegex.test(name)) {
    // alert("Valid name!");
    nameCountErrors = 0;
    console.log("name checked ok");
    console.log("nameCountErrors= " + nameCountErrors);
    console.log("userTotal= " + userTotal);
    return nameCountErrors;
    // return true;
  } else {
    alert("You have entered an invalid name!");
    console.log("name checked WRONG");
    nameCountErrors++;
    console.log("nameCountErrors= " + nameCountErrors);
    console.log("userTotal= " + userTotal);
    return nameCountErrors;
    // return false;
  }
}

function phoneNumberCheck() {
  const phRegex = new RegExp(/^(\(04\)|04|\+614)( ?\d){8}$/);
  // document.getElementById("demo3").innerHTML = "Number being checked ";
  var mobile = getid("mobile").value;
  if (phRegex.test(mobile)) {
    // alert("Valid number!");
    phoneCountErrors = 0;
    console.log("number checked ok");
    console.log("phoneCountErrors= " + phoneCountErrors);
    console.log("userTotal= " + userTotal);
    return phoneCountErrors;
    // return true;
  } else {
    alert("You have entered an invalid phone number!");
    console.log("number checked WRONG");
    phoneCountErrors++;
    console.log("phoneCountErrors= " + phoneCountErrors);
    console.log("userTotal= " + userTotal);
    return phoneCountErrors;
    // return false;
  }
}

function getid(sP) {
  return document.getElementById(sP);
}

// function clearErrors() {
//   alert("about to clear errors")
// }

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
  if (userTotal > 0 && nameCountErrors == 0 && phoneCountErrors == 0) {
    // if (userTotal > 0 ) {

    return true;
  } else {
    alert(
      "You need to check you have chosen seat numbers, a day of the week and entered in a valid name and phone number"
    );
    return false;
  }
}

function currentLinks() {
  console.clear();
  console.log("Win Y: " + window.scrollY);
  var navlinks = document
    .getElementsByTagName("nav")[0]
    .getElementsByTagName("a");
  console.log(navlinks);
  var sections = document
    .getElementsByTagName("main")[0]
    .getElementsByTagName("section");
  for (var a = 0; a < sections.length; a++) {
    var secTop = sections[a].offsetTop - 20;
    var secBot = sections[a].offsetTop + sections[a].offsetHeight - 20;
    console.log(secTop + " " + secBot);
    if (window.scrollY >= secTop && window.scrollY < secBot) {
      console.log(sections[a].id + ": current");
      navlinks[a].classList.add("current");
    } else {
      console.log(sections[a].id + ":");
      navlinks[a].classList.remove("current");
    }
  }
}

function logDetails() {
  console.clear();
  console.log("enter logDetails()");

  var total = 0;
  var daySelected = document.querySelector("input[name='day']:checked");
  var priceCode = daySelected.dataset["pricing"];
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
  userTotal = total;
  total > 0
    ? (document.getElementById("price").innerHTML = "$ " + totalformatted)
    : (document.getElementById("price").innerHTML = " ");
  console.log("current total is " + total);
  console.log("current userTotal is " + userTotal);
  return userTotal;
}

function changeRememberMeButtonText() {
  var labeltext = document.getElementById("remember-me-label");
  console.log("remember me is clicked on ");
  var name = getid("name").value;
  var mobile = getid("mobile").value;
  var email = getid("email").value;
  if (labeltext.innerHTML === "Remember Me") {
    localStorage.setItem("name", name);
    localStorage.setItem("mobile", mobile);
    localStorage.setItem("email", email);
    localStorage.setItem("rememberMe", "true");
    labeltext.innerHTML = "Forget Me";
  } else {
    labeltext.innerHTML = "Remember Me";
    localStorage.clear();
  }
}

function isRememberMeOn() {
  var name = document.querySelector("#name");
  var email = document.querySelector("#email");
  var mobile = document.querySelector("#mobile");
  var rememberMeLabel = document.querySelector("#remember-me-label");
  var rememberMe = document.querySelector("#remember-me");
  if (localStorage.rememberMe == "true") {
    // keep the checkbox checked if localStorage.rememberMe is true
    rememberMe.checked = true;
    rememberMeLabel.innerText = "Forget Me";
    // prefill the name, email and mobile number fields from the data in localStorage
    name.value = localStorage.getItem("name");
    email.value = localStorage.getItem("email");
    mobile.value = localStorage.getItem("mobile");
  } else {
    rememberMeLabel.checked = false;
    rememberMeLabel.innerText = "Remember Me";
  }
}
