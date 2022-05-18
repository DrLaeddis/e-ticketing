var ListNav = document.getElementsByClassName("custome-header");
var SectionCount = document.getElementsByClassName("main-section");

let idxMenu = 0;
let idxSection = 0;

for (idxMenu = 0; idxMenu < ListNav.length; idxMenu++) {
    (function(myIndexMenu) {
        ListNav[myIndexMenu].addEventListener("click", ()=>{
            for (idxSection = 0; idxSection < SectionCount.length; idxSection++) {
                SectionCount[idxSection].classList.remove("active");
            }
            SectionCount[myIndexMenu].classList.toggle("active");
        });
    }(idxMenu));
}

var number = document.getElementById('number');

// Listen for input event on numInput.
number.onkeydown = function(e) {
    if(!((e.keyCode > 95 && e.keyCode < 106)
      || (e.keyCode > 47 && e.keyCode < 58) 
      || e.keyCode == 8)) {
        return false;
    }
}