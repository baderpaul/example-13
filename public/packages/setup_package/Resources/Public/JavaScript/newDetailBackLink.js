document.addEventListener('DOMContentLoaded', function() {
    const backLinkWrap = document.querySelector(".news-backlink-wrap a");
  
    if (backLinkWrap) {
        console.log("Backlink-Element gefunden!");
      if (document.referrer.indexOf(window.location.hostname) !== -1) {
        backLinkWrap.addEventListener('click', function(event) {
          event.preventDefault(); // Verhindert das Standardverhalten des Links
  
          // Manchmal kann history.back() den Benutzer nicht zurückführen,
          // insbesondere wenn es keine vorherige Seite in der Historie gibt.
          // Wir fangen dies mit einer Fallback-Lösung ab.
          if (history.length > 1) {
            history.back();
          } else {
            // Fallback-Lösung:  Zur Startseite oder einer anderen definierten Seite leiten.
            // Ersetzen Sie "/deine-fallback-seite" durch die tatsächliche URL.
            window.location.href = "/"; // oder "/deine-fallback-seite"
          }
        });
      }
    }
  });