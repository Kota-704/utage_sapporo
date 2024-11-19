/*--------------------
スムーススクロール
--------------------*/

document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".header_link, .hamburger_link").forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();

      const href = this.getAttribute("href");
      const targetId = href.includes("#") ? href.split("#")[1] : null;
      const targetElement = targetId ? document.getElementById(targetId) : null;

      if (targetElement) {
        const headerHeight = document.querySelector(".header_nav").offsetHeight;
        const targetPosition = targetElement.offsetTop - headerHeight;

        window.scrollTo({
          top: targetPosition,
          behavior: "smooth",
        });
      }
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
