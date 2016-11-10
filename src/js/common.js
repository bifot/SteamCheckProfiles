function newMyWindow(e) {
  var h = 500;
  var w = 500;
  
  window.open(e, '',
    'scrollbars=1,height=' + Math.min(h, screen.availHeight) + ', width=' + Math.min(w, screen.availWidth) + 
    ',left=' + Math.max(0, (screen.availWidth - w)/2) + ',top=' + Math.max(0, (screen.availHeight - h) / 2));
}

var closeButton = document.querySelector('.close');

closeButton.onclick = function () {
  fixedModal.style.display='none';
}

if(!localStorage["firstLoad"]) {
  fixedModal.style.display = 'none';
}