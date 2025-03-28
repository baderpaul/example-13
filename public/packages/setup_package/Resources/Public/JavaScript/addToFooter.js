document.addEventListener("DOMContentLoaded", function(){
     /*
     * activate menu
     */
  new MetisMenu("#menu", {
    triggerElement: 'span'
    });

    /*
     * activate lightbox
     */

  const lightbox = GLightbox({
    touchNavigation: true,
    loop: true,
    autoplayVideos: true
  });

    /*
     * email spam protection
     */

  let links = document.querySelectorAll('a');
  links.forEach(function(item){
    if (item.getAttribute('data-mailto-token') != null) {
      item.innerHTML = item.innerHTML.replace('@~@', '@');
    }
  });

    /*
     * hide/show navigation on landingpage
    
    new MetisMenu("#menu", {
      triggerElement: 'span'
      });

    el_autohide = document.querySelector('.autohide');

    if(el_autohide){
      var last_scroll_top = 0;
      window.addEventListener('scroll', function() {
            let scroll_top = window.scrollY;
           if(scroll_top < last_scroll_top) {
                el_autohide.classList.remove('scrolled-down');
                el_autohide.classList.add('scrolled-up');
            }
            else {
                el_autohide.classList.remove('scrolled-up');
                el_autohide.classList.add('scrolled-down');
            }
            last_scroll_top = scroll_top;
      }); 
    }
       */
}); 

// Accordion Summary - Details

class Accordion {
  constructor(i) {
    (this.el = i),
      (this.summary = i.querySelector("summary")),
      (this.content = i.querySelector(".accordion-body")),
      (this.animation = null),
      (this.isClosing = !1),
      (this.isExpanding = !1),
      this.summary.addEventListener("click", (i) => this.onClick(i));
  }
  onClick(i) {
    i.preventDefault(),
      (this.el.style.overflow = "hidden"),
      this.isClosing || !this.el.open
        ? this.open()
        : (this.isExpanding || this.el.open) && this.shrink();
  }
  shrink() {
    this.isClosing = !0;
    let i = `${this.el.offsetHeight}px`,
      t = `${this.summary.offsetHeight}px`;
    this.animation && this.animation.cancel(),
      (this.animation = this.el.animate(
        { height: [i, t] },
        { duration: 200, easing: "ease-in-out" }
      )),
      (this.animation.onfinish = () => this.onAnimationFinish(!1)),
      (this.animation.oncancel = () => (this.isClosing = !1));
  }
  open() {
    (this.el.style.height = `${this.el.offsetHeight}px`),
      (this.el.open = !0),
      window.requestAnimationFrame(() => this.expand());
  }
  expand() {
    this.isExpanding = !0;
    let i = `${this.el.offsetHeight}px`,
      t = `${this.summary.offsetHeight + this.content.offsetHeight}px`;
    this.animation && this.animation.cancel(),
      (this.animation = this.el.animate(
        { height: [i, t] },
        { duration: 400, easing: "ease-out" }
      )),
      (this.animation.onfinish = () => this.onAnimationFinish(!0)),
      (this.animation.oncancel = () => (this.isExpanding = !1));
  }
  onAnimationFinish(i) {
    (this.el.open = i),
      (this.animation = null),
      (this.isClosing = !1),
      (this.isExpanding = !1),
      (this.el.style.height = this.el.style.overflow = "");
  }
}
document.querySelectorAll("details").forEach((i) => {
  new Accordion(i);
});

// News Overlay tx_news cards view

//document.querySelector(".card-news").ontouchstart = function (e) {
//    document.querySelector(".card-news .news-overlay").classList.toggle("news-overlay-touch");
//}