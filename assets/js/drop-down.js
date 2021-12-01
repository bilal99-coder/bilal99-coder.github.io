// Get all the accordion elements from the DOM as an array
const accordionsEl = document.querySelectorAll(".accordion");
// Get all the panel elements from the DOM as an array
const panelEl = document.querySelectorAll(".panel");

// Loop through all the panel and accourdion elements and put them in the closed state
const closeAllPanels = () => {
  panelEl.forEach((el) => {
    el.classList.remove("panel-open");
  });

  accordionsEl.forEach((el) => {
    el.classList.remove("active");
  });
};

// Loop through all accordion elements and add an event listener function
accordionsEl.forEach((el) => {
  el.addEventListener("click", function () {
    // Get the panel element that belongs to the accordion element
    const currentPanel = this.nextElementSibling;

    // If the panel is open, then close it
    if (currentPanel.className.includes("panel-open")) {
      currentPanel.classList.remove("panel-open");
      this.classList.remove("active");
    }
    // If the panel is closed then open the one that's presses and close the other ones
    else {
      closeAllPanels();
      this.classList.add("active");
      currentPanel.classList.add("panel-open");
    }
  });
});

// Get all the literature accordion element from the DOM
const literatureAcordionEl = document.querySelector(".literature-acordion");
// Get all the literature panel element from the DOM
const literaturePanelEl = document.querySelector(".literature-panel");

// Get the currect URL
const currentUrl = window.location.href;

// Auto expand a drop down depending on the url
if (currentUrl.includes("#literature")) {
  literatureAcordionEl.classList.add("active");
  literaturePanelEl.classList.add("panel-open");
}
