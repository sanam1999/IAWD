   document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.querySelector('.oc');
        const body = document.querySelector('main');
        const toggleButton = document.querySelector('.toggleButton');
        toggleButton.addEventListener('click', function () {
            if (sidebar.style.left === '-250px') {
                sidebar.style.left = '0';
                body.style.marginLeft = '250px';
            } else {
                sidebar.style.left = '-250px';
                body.style.marginLeft = '0';
            }
        });
    });