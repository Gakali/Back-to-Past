export default class Carroussel {

run(){
const nextEl = document.getElementById("next");
const previousEl = document.getElementById("previous");
const sliderEl = document.getElementById("slider");
nextEl.addEventListener("click", onNextClick);
previousEl.addEventListener("click", onPreviousClick);

function onNextClick() {
  const imgWidth = sliderEl.offsetWidth;
  sliderEl.scrollLeft += imgWidth;
}
function onPreviousClick() {
  const imgWidth = sliderEl.offsetWidth;
  sliderEl.scrollLeft -= imgWidth;
}
}
}
