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

/*--------------------
headerの背景調整
--------------------*/
document.addEventListener("DOMContentLoaded", () => {
  const about = document.getElementById("about");
  const header = document.querySelector(".header");

  if (about && header) {
    const observerCallback = (entries) => {
      const [entry] = entries;

      if (entry.boundingClientRect.top <= 0) {
        header.classList.add("scrolled");
      } else {
        header.classList.remove("scrolled");
      }
    };

    const observer = new IntersectionObserver(observerCallback, {
      root: null,
      threshold: 1.0,
    });

    observer.observe(about);
  }
});
