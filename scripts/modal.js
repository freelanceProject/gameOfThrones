function closeModal() {
  var modal = document.getElementById('wrapper1');
  modal.style.display = "none";
}
function openModal() {
  var modal = document.getElementById('wrapper1');
  modal.style.display = "block";
}
function closeModal1() {
  var modal = document.getElementById('wrapper2');
  modal.style.display = "none";
}
function openModal1() {
  var modal = document.getElementById('wrapper2');
  modal.style.display = "block";
}
function closeOpen() {
  var login = document.getElementById('wrapper1');
  var reg = document.getElementById('wrapper2');
  reg.style.display = "block";
  login.style.display = "none";
}
function closeOpen1() {
  reg.style.display = "none";
  login.style.display = "block";
}
window.onclick = function (event) {
  var modal = document.getElementsByClassName("wrapper")[0];
  var modal1 = document.getElementsByClassName("wrapper")[1];
  if (event.target == modal){
    modal.style.display = 'none';
  }
  if (event.target == modal1){
        modal1.style.display = 'none';
  }
}