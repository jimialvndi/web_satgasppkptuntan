document.addEventListener('DOMContentLoaded', function () {
        const dropdownButton = document.getElementById('dropdown-button');
        const dropdownMenu = document.getElementById('dropdown-menu');

        if (dropdownButton && dropdownMenu) {
            // Toggle dropdown saat tombol di-klik
            dropdownButton.addEventListener('click', function (event) {
                event.stopPropagation();
                dropdownMenu.classList.toggle('hidden');
            });

            // Sembunyikan dropdown saat klik di luar area menu
            window.addEventListener('click', function (event) {
                if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        }
    });

