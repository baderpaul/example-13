/*if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {
    navigator.serviceWorker.register('/sw.js') // Pfad zu deiner Service Worker Datei
      .then(registration => {
        console.log('ServiceWorker registration successful with scope: ', registration.scope);
      })
      .catch(error => {
        console.log('ServiceWorker registration failed: ', error);
      });
  });
}*/

document.addEventListener("DOMContentLoaded", () => {
     /*
     * activate menu
     
  new MetisMenu("#menu", {
    triggerElement: 'span'
    });*/

    /*
     * activate lightbox
     */

  const lightbox = GLightbox({
    touchNavigation: true,
    loop: true,
    autoplayVideos: true
  });

  /**
   * Scroll to Top
   */
  
   const scrollToTopBtn = document.getElementById("backtotop");
   const scrollThreshold = 150;
   const checkScrollPosition = () => {
       const scrollY = window.scrollY || document.documentElement.scrollTop;
       if (scrollY > scrollThreshold) {
           scrollToTopBtn.classList.add("show");
       } else {
           scrollToTopBtn.classList.remove("show");
       }
   };
   const scrollToTop = (event) => {
       if (event) event.preventDefault();
       window.scrollTo({
           top: 10,             
           behavior: "smooth"
       });
   };
   window.addEventListener("scroll", checkScrollPosition);
   scrollToTopBtn.addEventListener("click", scrollToTop);
   checkScrollPosition();

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
/**
 * Search Overlay */
  // Elemente anhand ihrer IDs auswählen
  const closeBtn = document.getElementById('close-btn');
  const searchOverlay = document.getElementById('search-overlay');
  const searchBtn = document.getElementById('search-btn');

  // Prüfen, ob alle Elemente gefunden wurden, um Fehler zu vermeiden
  if (closeBtn && searchOverlay && searchBtn) {

    // --- Event Listener für den Schließen-Button ---
    closeBtn.addEventListener('click', function() {
      // Einfache Ausblendung (keine Animation wie fadeOut)
      // searchOverlay.style.display = 'none';

      // Alternative mit CSS-Klasse für Fade-Out (benötigt entsprechendes CSS)
      searchOverlay.classList.remove('visible'); // Angenommen, 'visible' steuert Sichtbarkeit/Opacity

      // Such-Button wieder anzeigen
      searchBtn.style.display = ''; // Setzt auf den Standard-Display-Wert zurück (z.B. 'block', 'inline')
      // Oder mit CSS-Klasse
      // searchBtn.classList.remove('hidden');
    });

    // --- Event Listener für den Suchen-Button ---
    searchBtn.addEventListener('click', function() {
      // Den Suchen-Button selbst ausblenden
      searchBtn.style.display = 'none';
      // Oder mit CSS-Klasse
      // searchBtn.classList.add('hidden');

      // Einfache Einblendung (keine Animation wie fadeIn)
      // searchOverlay.style.display = 'block'; // Oder 'flex', 'grid', etc., je nach Layout

      // Alternative mit CSS-Klasse für Fade-In (benötigt entsprechendes CSS)
      searchOverlay.classList.add('visible'); // Angenommen, 'visible' steuert Sichtbarkeit/Opacity

      // Optional: Fokus auf das Such-Input-Feld im Overlay setzen
      const searchInput = searchOverlay.querySelector('input[type="search"], input[type="text"]');
      if (searchInput) {
        // Kurze Verzögerung kann nötig sein, damit das Feld sichtbar ist bevor der Fokus gesetzt wird
        setTimeout(() => searchInput.focus(), 50);
      }
    });

  } else {
    // Warnung ausgeben, wenn ein Element nicht gefunden wurde
    console.warn('Ein oder mehrere Elemente für die Suchfunktion wurden nicht gefunden (IDs: close-btn, search-overlay, search-btn)');
  }

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