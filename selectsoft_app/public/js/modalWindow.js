
// document.addEventListener('DOMContentLoaded', function () {
//     var modal = document.querySelector('.modalWindow');
//     var modalOverlay = document.querySelector('.modalOverlay');
//     var openModalButton = document.querySelector('.openModalButton');
//     var closeModalButton = document.getElementById('close');

//     openModalButton.addEventListener('click', function (event) {
//         event.preventDefault();
//         modal.style.display = 'block';
//         modalOverlay.style.display = 'block';
//     });

//     closeModalButton.addEventListener('click', function () {
//         modal.style.display = 'none';
//         modalOverlay.style.display = 'none';
//     });

//     window.addEventListener('click', function (event) {
//         if (event.target === modalOverlay) {
//             modal.style.display = 'none';
//             modalOverlay.style.display = 'none';
//         }
//     });
// });

document.addEventListener('DOMContentLoaded', function () {
    var modalOverlay = document.querySelector('.modalOverlay');

    document.body.addEventListener('click', function (event) {
        var openModalButton = event.target.closest('.openModalButton');
        var closeModalButton = event.target.closest('.close');
        var modal = event.target.closest('.modalWindow');

        if (openModalButton) {
            event.preventDefault();
            var targetModalId = openModalButton.getAttribute('data-modal-id');
            var targetModal = document.getElementById(targetModalId);

            if (targetModal) {
                targetModal.style.display = 'block';
                modalOverlay.style.display = 'block';
            }
        } else if (closeModalButton || (modal && !modal.contains(event.target))) {
            if (modal) {
                modal.style.display = 'none';
                modalOverlay.style.display = 'none';
            }
        }
    });
});






