const CACHE_NAME = 'kc-portfolio-v1';

// Liste des ressources à mettre en cache
const urlsToCache = [
    '/',
    '/index.php',
    '/a_propos.php',
    '/projets.php',
    '/contact.php',
    '/assets/css/burger.css',
    '/assets/css/index.css',
    '/assets/css/a_propos.css',
    '/assets/css/projets.css',
    '/assets/css/contact.css',
    '/assets/js/app.js',
    '/assets/images/Logo_blanc.webp',
    '/assets/images/Logo_noir.webp',
    '/assets/images/Photo.webp',
    '/assets/images/Soleil.webp',
    '/assets/images/Lune.webp',
    '/assets/images/France.webp',
    '/assets/images/Ang.webp',
    '/assets/icons/favicon-96x96.png',
    '/assets/icons/favicon.svg',
    '/manifest.json'
];

// Installation du service worker
self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(cache => {
                console.log('Cache ouvert');
                return cache.addAll(urlsToCache);
            })
    );
});

// Activation du service worker
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames.map(cacheName => {
                    if (cacheName !== CACHE_NAME) {
                        return caches.delete(cacheName);
                    }
                })
            );
        })
    );
});

// Stratégie de cache : Network First avec fallback sur le cache
self.addEventListener('fetch', event => {
    event.respondWith(
        fetch(event.request)
            .catch(() => {
                return caches.match(event.request);
            })
    );
});