document.addEventListener("DOMContentLoaded", () => {
  const tabButtons = document.querySelectorAll(".tab-button");
  const tabContents = document.querySelectorAll(".tab-content");

  tabButtons.forEach((button) => {
    button.addEventListener("click", () => {
      // Remove 'active' class from all buttons
      tabButtons.forEach((btn) => btn.classList.remove("active"));
      // Add 'active' class to the clicked button
      button.classList.add("active");

      // Hide all tab contents
      tabContents.forEach((content) => content.classList.remove("active"));
      // Show the selected tab content
      const tabId = button.getAttribute("data-tab");
      document.getElementById(tabId).classList.add("active");
    });
  });
});
