document.addEventListener('DOMContentLoaded', function() {
    var modal = document.querySelector('.modalWindowTwo');
    var modalOverlay = document.querySelector('.modalOverlay');
    var openModalButton = document.querySelector('.openModalButtonTwo');
    var closeModalButton = document.getElementById('close');

    openModalButton.addEventListener('click', function(event) {
        event.preventDefault();
        modal.style.display = 'block';
        modalOverlay.style.display = 'block';
    });

    closeModalButton.addEventListener('click', function() {
        modal.style.display = 'none';
        modalOverlay.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target === modalOverlay) {
            modal.style.display = 'none';
            modalOverlay.style.display = 'none';
        }
    });
});
