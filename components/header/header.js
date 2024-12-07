/*--------------------
ハンバーガーメニューの開閉
--------------------*/
document.addEventListener("DOMContentLoaded", () => {
  const hamburger = document.querySelector(".hamburger");
  const hamburgerContent = document.querySelector(".hamburger_content");
  const header = document.querySelector(".header");
  const hamburgerLinks = document.querySelectorAll(".hamburger_link");

  if (hamburger && hamburgerContent && header) {
    hamburger.addEventListener("click", () => {
      hamburger.classList.toggle("active");
      hamburgerContent.classList.toggle("active");
      header.classList.toggle("active");
    });

    hamburgerLinks.forEach((link) => {
      link.addEventListener("click", () => {
        hamburger.classList.remove("active");
        hamburgerContent.classList.remove("active");
        header.classList.remove("active");
      });
    });
  }
});
