document.addEventListener("DOMContentLoaded", function() {
  // Function to handle smooth scrolling to page1
  function scrollToPage2() {
      const page1 = document.getElementById("page2");
      page1.scrollIntoView({ behavior: "smooth" });
  }

  // Get the "About" button element by its ID
  const aboutButton = document.getElementById("about-link");

  // Add a click event listener to the "About" button
  aboutButton.addEventListener("click", function(event) {
      event.preventDefault(); // Prevent the default behavior of the anchor tag
      scrollToPage2();
  });
});
