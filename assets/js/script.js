document.addEventListener("DOMContentLoaded", function () {
  const openBtn = document.getElementById("toogleNavbarMobile");
  const closeBtn = document.getElementById("closeNavbarMobile");
  const mobileMenu = document.getElementById("mobileNavbar");

  if (openBtn && closeBtn && mobileMenu) {
    openBtn.addEventListener("click", () => {
      mobileMenu.classList.remove("hidden");
    });

    closeBtn.addEventListener("click", () => {
      mobileMenu.classList.add("hidden");
    });
  }
});
