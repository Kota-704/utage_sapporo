/*--------------------
ハンバーガーメニューの開閉
--------------------*/
document.addEventListener("DOMContentLoaded", () => {
  const hamburger = document.querySelector(".hamburger");
  const hamburgerContent = document.querySelector(".hamburger_content");
  const headerNav = document.querySelector(".header_nav");
  const hamburgerLinks = document.querySelectorAll(".hamburger_link");

  if (hamburger && hamburgerContent && headerNav) {
    hamburger.addEventListener("click", () => {
      hamburger.classList.toggle("active");
      hamburgerContent.classList.toggle("active");
      headerNav.classList.toggle("active");
    });

    hamburgerLinks.forEach((link) => {
      link.addEventListener("click", () => {
        hamburger.classList.remove("active");
        hamburgerContent.classList.remove("active");
        headerNav.classList.remove("active");
      });
    });
  }
});
