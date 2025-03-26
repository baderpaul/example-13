document.addEventListener("DOMContentLoaded", function () {
  const cardElements = document.querySelectorAll(".news-list-view .card-news");
  const lessButton = document.querySelector(".less");
  const moreButton = document.querySelector(".more");
  const itemsPerPage = 4;
  let shownItems = itemsPerPage;

  // Initial display:
  for (let i = 0; i < cardElements.length; i++) {
    cardElements[i].style.display = i < shownItems ? "inline-block" : "none"; // Show initial items, hide the rest
  }

  lessButton.style.display = "none"; // Hide "Less" button initially

  moreButton.addEventListener("click", function () {
    lessButton.style.display = "inline-block";

    shownItems += itemsPerPage; // Increment shown items by itemsPerPage

    for (let i = 0; i < cardElements.length; i++) {
      if (i < shownItems) {
        cardElements[i].style.display = "inline-block";
        animateFadeIn(cardElements[i], 300);
      }
    }

    if (shownItems >= cardElements.length) {
      moreButton.style.display = "none"; // Hide "More" button if all items are shown
    }
  });

  lessButton.addEventListener("click", function () {
    shownItems -= itemsPerPage; // Decrement shown items by itemsPerPage

    if (shownItems < itemsPerPage) {
      shownItems = itemsPerPage; // Minimum shown items should be itemsPerPage
      lessButton.style.display = "none"; // Hide less button if we're at the beginning
    }

    for (let i = 0; i < cardElements.length; i++) {
      if (i < shownItems) {
        cardElements[i].style.display = "inline-block";
      } else {
        animateFadeOut(cardElements[i], 300, () => {
          cardElements[i].style.display = "none";
        });
      }
    }
    moreButton.style.display = cardElements.length > shownItems ? "inline-block" : "none"; // Show moreButton if needed
  });

  // Hilfsfunktion für Fade-In-Animation
  function animateFadeIn(element, duration) {
    element.style.opacity = 0;
    element.style.transition = `opacity ${duration}ms`;
    setTimeout(() => {
      element.style.opacity = 1;
    }, 10); // Kleiner Timeout, um den Transition-Effekt zu starten
  }

  // Hilfsfunktion für Fade-Out-Animation
  function animateFadeOut(element, duration, callback) {
    element.style.opacity = 1;
    element.style.transition = `opacity ${duration}ms`;
    element.style.opacity = 0;

    setTimeout(() => {
      callback(); //führt die "element.style.display = 'none';" Anweisung nach dem Fadeout aus
    }, duration);
  }
});
// A tutorial for this is available here - the JS is still jQuery - rewrite it to ECMAScript using AI and adjust the CSS.
// https://codepen.io/chihsiu/pen/ZEGLjKR
