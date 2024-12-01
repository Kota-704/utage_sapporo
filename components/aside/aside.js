document.addEventListener("DOMContentLoaded", () => {
  const aside = document.querySelector(".aside");
  const footer = document.querySelector(".footer");

  document.addEventListener("scroll", () => {
    const scrollY = window.scrollY;
    const footerPosition = footer.getBoundingClientRect().top + window.scrollY;
    const windowHeight = window.innerHeight;

    if (scrollY + windowHeight >= footerPosition) {
      aside.style.display = "none";
    } else {
      aside.style.display = "block";
    }
  });
});
