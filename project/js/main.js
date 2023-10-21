document.addEventListener('DOMContentLoaded', function() {
  const headerContainer = document.getElementById('header-container');
  const headerURL = 'header.html';
  const footerContainer = document.getElementById('footer-container');
  const footerURL = 'footer.php';

  fetch(headerURL)
    .then(response => response.text())
    .then(data => {
      headerContainer.innerHTML = data;
    })
    .catch(error => {
      console.error('Error fetching header:', error);
    });

  
  
    fetch(footerURL)
      .then(response => response.text())
      .then(data => {
        footerContainer.innerHTML = data;
      })
      .catch(error => {
        console.error('Error fetching footer:', error);
      });
});
function openNav() {
  document.getElementById("mobileNav").style.width = "100%";
}
function closeNav() {
  document.getElementById("mobileNav").style.width = "0%";
}
