document.addEventListener("DOMContentLoaded", async () => {
  const header = document.querySelector("header");

  try {
    // Headerの読み込み
    const response = await fetch("./components/header/header.html");

    if (!response.ok) {
      throw new Error("Failed to fetch header.html");
    }

    const headerHTML = await response.text();

    header.innerHTML = headerHTML;

    // header.htmlの読み込みが完了した後にheader.jsを動的に読み込む
    const script = document.createElement("script");
    script.src = "./components/header/header.js";
    script.defer = true;
    document.body.appendChild(script);

    // Footerの読み込み
    const footer = document.querySelector("footer");
    const footerResponse = await fetch("./components/footer/footer.html");

    if (!footerResponse.ok) {
      throw new Error("Failed to fetch footer.html");
    }

    const footerHTML = await footerResponse.text();
    footer.innerHTML = footerHTML;
  } catch (error) {
    console.error("Error loading header:", error);
  }
});
