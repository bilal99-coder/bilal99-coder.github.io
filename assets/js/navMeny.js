// Fetch navMeny elements and as array
const navMenyLinksEl = document.querySelector("navMeny .links");
const linksEl = document.querySelectorAll("navMeny .links .link");

// Fetch Hamburger element
const hamburgerEl = document.querySelector(".hamburger");

// event listener on click
hamburgerEl.addEventListener("click", () => {
  // show correct navMeny element
  navMenyLinksEl.classList.toggle("open");

  // show fade on array loop
  linksEl.forEach((linkEl) => {
    linkEl.classList.toggle("fade");
  });

  // Get the currect URL
  const currentUrl = window.location.href;
});
