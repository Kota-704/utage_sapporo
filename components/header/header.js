/*--------------------
ハンバーガーメニューの開閉
--------------------*/
document.addEventListener("DOMContentLoaded", () => {
  const hamburger = document.querySelector(".hamburger");
  const hamburgerContent = document.querySelector(".hamburger_content");
  const headerNav = document.querySelector(".header_nav");

  if (hamburger && hamburgerContent && headerNav) {
    hamburger.addEventListener("click", () => {
      hamburger.classList.toggle("active");
      hamburgerContent.classList.toggle("active");
      headerNav.classList.toggle("active");
    });
  }
});
