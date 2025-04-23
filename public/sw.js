/** First Test 

const CACHE_NAME = 'my-pwa-cache-v1';
const urlsToCache = [
  '/', // Wichtig: Start-URL
  '/styles/main.css',
  '/scripts/main.js',
  '/images/logo.png',
  // Füge hier alle wichtigen statischen Assets hinzu
];

self.addEventListener('install', event => {
  // Warte, bis das Caching abgeschlossen ist
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => {
        console.log('Opened cache');
        //return cache.addAll(urlsToCache); // Fügt alle URLs zum Cache hinzu
      })
  );
});

self.addEventListener('fetch', event => {
  event.respondWith(
    caches.match(event.request) // Prüft, ob die Anfrage im Cache ist
      .then(response => {
        // Wenn im Cache, gib die gecachte Antwort zurück
        if (response) {
          return response;
        }
        // Sonst: Führe die Anfrage normal übers Netzwerk aus
        return fetch(event.request);
      })
  );
});*/