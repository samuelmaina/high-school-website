var index = 0;
show();
console.log('reached the show function')
function show() {
  var allSlides = document.getElementsByClassName('slides');
  for (let i = 0; i < allSlides.length; i++) {
    allSlides[i].style.display = "none";
  }
  index++;
  if (index > allSlides.length) {
    index = 1;
  }
  allSlides[index - 1].style.display = "block";
  setTimeout(show, 2000);
}
