const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

hamburger.addEventListener("click", () => {
  hamburger.classList.toggle("active");
  navMenu.classList.toggle("active");
});

document.getElementById('downloadBtn').addEventListener('click', function() {
  // Set the URL of the PDF file
  var pdfUrl = 'files/file.pdf';
  // Open a new tab with the PDF file
  window.open(pdfUrl, '_blank');
});

// Wait for the DOM to be ready
$(document).ready(function() {
  // Get the "Berikutnya" button element
  var btnNext = $('#btn-next');

  // Add a click event listener to the button
  btnNext.click(function() {
      // Check if the "SETUJU" checkbox is checked
      if ($('#setuju').is(':checked')) {
          // Show an alert if the checkbox is checked
          window.location.href='./form.html';
      }
      else {
          alert('Mohon setuju pada Persyaratan Persetujuan yang ada!');
      }
  });
});

function move(page) {
  window.location.href = page + '.html';
}

function pindah(page) {
  window.location.href = page + '.php';
}