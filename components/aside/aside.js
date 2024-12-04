document.addEventListener("DOMContentLoaded", () => {
  const aside = document.querySelector(".aside");
  const footer = document.querySelector(".footer");

  const mediaQuery = window.matchMedia("(max-width: 1024px)");

  const handleScroll = () => {
    const scrollY = window.scrollY;
    const footerPosition = footer.getBoundingClientRect().top + window.scrollY;
    const windowHeight = window.innerHeight;

    if (scrollY + windowHeight >= footerPosition) {
      aside.style.display = "none";
    } else {
      aside.style.display = "block";
    }
  };

  const handleMediaChange = (e) => {
    if (e.matches) {
      document.addEventListener("scroll", handleScroll);
    } else {
      document.removeEventListener("scroll", handleScroll);
      aside.style.display = "block";
    }
  };

  handleMediaChange(mediaQuery);

  mediaQuery.addEventListener("change", handleMediaChange);
});
