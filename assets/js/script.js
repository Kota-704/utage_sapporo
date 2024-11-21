/*--------------------
スムーススクロール
--------------------*/

document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll("a[href^='#']").forEach((link) => {
    link.addEventListener("click", function (e) {
      const href = this.getAttribute("href");
      const targetId = href.startsWith("#") ? href.slice(1) : null;
      const targetElement = targetId ? document.getElementById(targetId) : null;

      if (targetElement) {
        e.preventDefault();
        const headerHeight =
          document.querySelector(".header_nav")?.offsetHeight || 0;
        const targetPosition = targetElement.offsetTop - headerHeight;

        window.scrollTo({
          top: targetPosition,
          behavior: "smooth",
        });
      }
    });
  });

  const hash = window.location.hash;
  if (hash) {
    const targetElement = document.querySelector(hash);
    if (targetElement) {
      const headerHeight =
        document.querySelector(".header_nav")?.offsetHeight || 0;
      const targetPosition = targetElement.offsetTop - headerHeight;

      setTimeout(() => {
        window.scrollTo({
          top: targetPosition,
          behavior: "smooth",
        });
      }, 100);
    }
  }
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
