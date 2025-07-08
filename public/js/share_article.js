document.addEventListener("DOMContentLoaded", function() {
    
    // Mengambil URL dan Judul artikel secara dinamis
    const currentUrl = window.location.href;
    const articleTitle = document.title;
    const shareMessage = `${articleTitle} - Baca selengkapnya di: ${currentUrl}`;
    
    // --- Tombol WhatsApp ---
    const whatsappBtn = document.getElementById('share-whatsapp');
    if (whatsappBtn) {
        whatsappBtn.href = `https://api.whatsapp.com/send?text=${encodeURIComponent(shareMessage)}`;
    }

    // --- Tombol Facebook ---
    const facebookBtn = document.getElementById('share-facebook');
    if (facebookBtn) {
        facebookBtn.href = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(currentUrl)}`;
    }

    // --- Tombol Salin Link (Versi Tailwind) ---
    const copyLinkBtn = document.getElementById('copy-link');
    const copyLinkText = document.getElementById('copy-link-text'); // Target elemen span untuk teks
    
    if (copyLinkBtn) {
        copyLinkBtn.addEventListener('click', function() {
            navigator.clipboard.writeText(currentUrl).then(() => {
                // Beri feedback visual dengan mengubah teks dan kelas warna
                copyLinkText.textContent = 'Tersalin!';
                copyLinkBtn.classList.remove('bg-gray-600');
                copyLinkBtn.classList.add('bg-green-600'); // Warna hijau sukses dari palet Tailwind

                // Kembalikan ke keadaan semula setelah 2 detik
                setTimeout(() => {
                    copyLinkText.textContent = 'Salin Link';
                    copyLinkBtn.classList.remove('bg-green-600');
                    copyLinkBtn.classList.add('bg-gray-600');
                }, 2000);

            }).catch(err => {
                console.error('Gagal menyalin link: ', err);
                alert('Maaf, link gagal disalin ke clipboard.');
            });
        });
    }
});