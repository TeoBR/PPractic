function openModal(modalId) {
  document.getElementById(modalId).style.display = 'block';
  document.querySelector('.overlay').style.display = 'block';
}

function closeModal(modalId) {
  document.getElementById(modalId).style.display = 'none';
  document.querySelector('.overlay').style.display = 'none';
}

function closeAllModals() {
  var modals = document.querySelectorAll('.modal');
  modals.forEach(function(modal) {
    modal.style.display = 'none';
  });
  document.querySelector('.overlay').style.display = 'none';
}

