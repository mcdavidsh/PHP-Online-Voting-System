console.clear();
const appEl = document.querySelector("#app");
const notificationEl = appEl.querySelector(".notification");
const toggleEl = notificationEl.querySelector(".notification-header");

// Add click even listener to toggle state
toggleEl.addEventListener("click", () => {
  // Usi FLIP to trigger animations
  flip(() => {
    appEl.dataset.state = appEl.dataset.state === "closed" ? "opened" : "closed";
  }, notificationEl)
  // Add flip to content
  flip(() => {}, appEl.querySelector('.app-content'));
});

// F.L.I.P
const flip = (doSomething, firstEl, getLastEl = () => firstEl) => {
  // First
  const firstElRect = firstEl.getBoundingClientRect();

  requestAnimationFrame(() => {
    doSomething();

    // Last
    let lastEl = getLastEl();
    const lastElRect = lastEl.getBoundingClientRect();

    // Invert
    const dx = lastElRect.x - firstElRect.x;
    const dy = lastElRect.y - firstElRect.y;
    const dw = lastElRect.width / firstElRect.width;
    const dh = lastElRect.height / firstElRect.height;

    console.log({ dx, dy, dh, dw });

    lastEl.dataset.flipping = true;
    lastEl.style.setProperty("--dx", dx);
    lastEl.style.setProperty("--dy", dy);
    lastEl.style.setProperty("--dw", dw);
    lastEl.style.setProperty("--dh", dh);

    // Play
    requestAnimationFrame(() => {
      delete lastEl.dataset.flipping;
    });
  });
};