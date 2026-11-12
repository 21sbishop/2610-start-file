// Loaded with `defer` in <head>. Toggles the mobile nav open/closed when
// the hamburger button is clicked, and closes it again once a link is
// chosen so the menu doesn't stay open after navigating.

const toggle = document.querySelector(".hamburger-button");
const nav = document.querySelector(".primary-nav");

if (toggle && nav) {
  toggle.addEventListener("click", () => {
    const isOpen = nav.classList.toggle("is-open");
    toggle.setAttribute("aria-expanded", String(isOpen));
  });

  nav.querySelectorAll(".site-nav a").forEach((link) => {
    link.addEventListener("click", (event) => {
      // A parent link (href="#") only opens its sub-menu, so keep the
      // menu open and don't jump to the top of the page.
      if (link.parentElement.classList.contains("menu-item-has-children")) {
        event.preventDefault();
        return;
      }
      nav.classList.remove("is-open");
      toggle.setAttribute("aria-expanded", "false");
    });
  });
}
