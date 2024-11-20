/*--------------------
スムーススクロール
--------------------*/

document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".header_link, .hamburger_link").forEach((link) => {
    link.addEventListener("click", function (e) {
      const href = this.getAttribute("href");

      if (href && href.includes("#")) {
        e.preventDefault();

        const targetId = href.split("#")[1];
        const targetElement = document.getElementById(targetId);

        if (targetElement) {
          const headerHeight =
            document.querySelector(".header_nav").offsetHeight;
          const targetPosition = targetElement.offsetTop - headerHeight;

          window.scrollTo({
            top: targetPosition,
            behavior: "smooth",
          });
        }
      }
      // ハッシュリンク以外の場合は通常のページ遷移を許可
    });
  });
});

/*--------------------
fade-in animation
--------------------*/

document.addEventListener("DOMContentLoaded", () => {
  const fadeInElements = document.querySelectorAll(".fade-in");

  const observer = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.3 }
  );

  fadeInElements.forEach((element) => observer.observe(element));
});
