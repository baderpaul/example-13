let items = document.querySelectorAll(".logoslider.carousel .carousel-item");
let minPerSlide;

function updateMinPerSlide() {
  const windowWidth = window.innerWidth;
  if (windowWidth <= 767) {
    minPerSlide = 2;
  } else if (windowWidth > 767 && windowWidth <= 991) {
    minPerSlide = 3;
  } else {
    minPerSlide = 4;
  }
}

function clearClones(){
    items.forEach(el => {
        while(el.children.length > 1){
            el.removeChild(el.lastChild)
        }
    })
}


function createClones() {
  items.forEach((el) => {
    let next = el.nextElementSibling;
    for (var i = 1; i < minPerSlide; i++) {
      if (!next) {
        next = items[0];
      }
      let cloneChild = next.cloneNode(true);
      el.appendChild(cloneChild.children[0]);
      next = next.nextElementSibling;
    }
  });
}
updateMinPerSlide()
createClones()

window.addEventListener('resize', () => {
    updateMinPerSlide();
  clearClones();
    createClones();
});