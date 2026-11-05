// Loaded with `defer` in <head>, so the DOM is parsed and ready by the
// time this runs — no DOMContentLoaded listener needed.

const yearEl = document.getElementById("currentyear");
if (yearEl) {
  yearEl.textContent = new Date().getFullYear();
}
