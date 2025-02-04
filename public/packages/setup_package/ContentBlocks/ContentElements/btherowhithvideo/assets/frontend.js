
const heroOverlay = document.querySelector('.video-overlay');
const heroVideo = document.getElementById('video');

        heroOverlay.addEventListener('click', function() {
            if (heroVideo.paused) {
                heroVideo.play();
            } else {
                heroVideo.pause();
            }
        });