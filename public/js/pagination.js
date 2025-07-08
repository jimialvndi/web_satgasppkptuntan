// File: pagination.js

function setupPagination(containerId, cardClassName, paginationId) {

  document.addEventListener('DOMContentLoaded', function () {
    // --- PENGATURAN ---
    const cardsPerPage = 6;
    const maxVisibleButtons = 5;
    // ------------------

    // GUNAKAN PARAMETER, BUKAN ID TETAP
    const cardContainer = document.getElementById(containerId);
    const paginationContainer = document.getElementById(paginationId);

    // Pastikan elemen ditemukan sebelum melanjutkan
    if (!cardContainer || !paginationContainer) {
      // console.error("Pagination elements not found. Make sure your IDs are correct.");
      return; // Hentikan eksekusi jika elemen tidak ada
    }

    // GUNAKAN PARAMETER, BUKAN KELAS TETAP
    const cards = Array.from(cardContainer.getElementsByClassName(cardClassName));
    const totalPages = Math.ceil(cards.length / cardsPerPage);
    let currentPage = 1;

    function showPage(page) {
      // ... (Fungsi showPage tetap sama persis)
      currentPage = page;
      const startIndex = (page - 1) * cardsPerPage;
      const endIndex = startIndex + cardsPerPage;

      cards.forEach(card => card.style.display = 'none');
      cards.slice(startIndex, endIndex).forEach(card => card.style.display = 'flex');

      createPaginationButtons();
    }
    
    function createButton(text, pageNum, isDisabled = false, isActive = false) {
      // ... (Fungsi createButton tetap sama persis)
      const button = document.createElement('button');
      button.innerText = text;
      button.disabled = isDisabled;
      
      button.className = 'px-4 py-2 border rounded-md transition-colors duration-300';

      if (isDisabled) {
          button.classList.add('bg-gray-200', 'text-gray-400', 'cursor-not-allowed');
      } else if (isActive) {
          button.classList.add('bg-cp-dark-blue', 'text-white', 'border-cp-dark-blue');
      } else if (text === '...') {
          button.classList.add('bg-white', 'text-gray-500', 'cursor-default');
          button.disabled = true;
      } else {
          button.classList.add('bg-white', 'text-cp-dark-blue', 'border-gray-300', 'hover:bg-gray-100');
      }

      if (pageNum) {
          button.addEventListener('click', () => {
              if(pageNum !== currentPage) {
                  showPage(pageNum);
              }
          });
      }
      return button;
    }

    function createPaginationButtons() {
      // ... (Fungsi createPaginationButtons tetap sama persis)
      paginationContainer.innerHTML = '';

      paginationContainer.appendChild(createButton('Previous', currentPage - 1, currentPage === 1));

      if (totalPages <= maxVisibleButtons) {
        for (let i = 1; i <= totalPages; i++) {
          paginationContainer.appendChild(createButton(i, i, false, i === currentPage));
        }
      } 
      else {
        paginationContainer.appendChild(createButton(1, 1, false, currentPage === 1));
        
        let startPage, endPage;

        if (currentPage <= 4) {
          startPage = 2;
          endPage = 5;
          for (let i = startPage; i < endPage; i++) {
            if (i < totalPages) {
              paginationContainer.appendChild(createButton(i, i, false, i === currentPage));
            }
          }
          paginationContainer.appendChild(createButton('...'));
        } 
        else if (currentPage > totalPages - 4) {
          paginationContainer.appendChild(createButton('...'));
          startPage = totalPages - 4;
          endPage = totalPages;
          for (let i = startPage; i < endPage; i++) {
            paginationContainer.appendChild(createButton(i, i, false, i === currentPage));
          }
        } 
        else {
          paginationContainer.appendChild(createButton('...'));
          startPage = currentPage - 1;
          endPage = currentPage + 2;
          for (let i = startPage; i < endPage; i++) {
            paginationContainer.appendChild(createButton(i, i, false, i === currentPage));
          }
          paginationContainer.appendChild(createButton('...'));
        }

        paginationContainer.appendChild(createButton(totalPages, totalPages, false, currentPage === totalPages));
      }

      paginationContainer.appendChild(createButton('Next', currentPage + 1, currentPage === totalPages));
    }


    if (cards.length > 0) {
        showPage(1);
    }
  });
}