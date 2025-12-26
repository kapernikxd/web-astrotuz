(() => {
  const burger = document.getElementById("burgerBtn");
  const overlay = document.getElementById("menuOverlay");
  const closeBtn = document.getElementById("menuCloseBtn");

  if (!burger || !overlay || !closeBtn) return;

  const openMenu = () => {
    overlay.hidden = false;
    overlay.classList.add("is-open");
    burger.setAttribute("aria-expanded", "true");
    document.body.classList.add("no-scroll");
  };

  const closeMenu = () => {
    overlay.classList.remove("is-open");
    burger.setAttribute("aria-expanded", "false");
    document.body.classList.remove("no-scroll");
    setTimeout(() => (overlay.hidden = true), 200);
  };

  burger.addEventListener("click", openMenu);
  closeBtn.addEventListener("click", closeMenu);

  overlay.addEventListener("click", (e) => {
    if (e.target === overlay) closeMenu();
  });

  window.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && !overlay.hidden) closeMenu();
  });
})();
