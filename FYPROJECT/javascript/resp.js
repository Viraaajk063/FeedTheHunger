burger = document.querySelector(".burger");
Close = document.querySelector(".Close");
resp_rightnav = document.querySelector(".resp_rightnav");
show = document.querySelector(".show");
var x = document.getElementById("log_in");
var y = document.getElementById("register");
var z = document.getElementById("bttn");
var w = document.getElementById("bn");
sbtn = document.querySelector(".sbtn");
locatehide = document.querySelector(".locatehide");
locate = document.querySelector(".locate");



burger.addEventListener("click", () => {
  resp_rightnav.classList.toggle("show");
  burger.classList.toggle("show");
  Close.classList.toggle("show");
});

Close.addEventListener("click", () => {
  resp_rightnav.classList.toggle("show");
  burger.classList.toggle("show");
  Close.classList.toggle("show");
});

resp_rightnav.addEventListener("click", () => {
  resp_rightnav.classList.toggle("show");
  burger.classList.toggle("show");
  Close.classList.toggle("show");
});

function register() {
  x.style.left = "-400px";
  y.style.left = "50px";
  z.style.left = "110px";
}
function login() {
  x.style.left = "50px";
  y.style.left = "450px";
  z.style.left = "0";
}
function donator() {
  w.style.left = "0";
}
function organization() {
  w.style.left = "128px";
}
function volunteer() {
  w.style.left = "267px";
}
sbtn.addEventListener("click", () => {
  locate.classList.toggle("locatehide");
});
