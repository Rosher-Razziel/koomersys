document.addEventListener("DOMContentLoaded", function () {
  let rowsPerPage = parseInt(document.getElementById("rowsPerPageSelect").value);
  const table = document.getElementById("usuariosTable");
  const tbody = table.querySelector("tbody");
  const allRows = Array.from(tbody.querySelectorAll("tr")); // todas las filas originales
  const pagination = document.getElementById("pagination");
  const filterSelect = document.getElementById("filterStatus");
  const searchInput = document.getElementById("search-orders"); // input de búsqueda
  const searchForm = document.querySelector(".table-search-form"); // formulario de búsqueda

  let currentPage = 1;
  let filteredRows = [...allRows]; // inicialmente todas
  let totalPages = Math.ceil(filteredRows.length / rowsPerPage);

  function renderTablePage(page) {
    tbody.innerHTML = "";

    let start = (page - 1) * rowsPerPage;
    let end = start + rowsPerPage;

    const rowsToDisplay = filteredRows.slice(start, end);
    rowsToDisplay.forEach(row => tbody.appendChild(row));

    renderPagination();
  }

  function renderPagination() {
    totalPages = Math.ceil(filteredRows.length / rowsPerPage);
    pagination.innerHTML = "";

    // Botón anterior
    const prevLi = document.createElement("li");
    prevLi.className = `page-item ${currentPage === 1 ? "disabled" : ""}`;
    prevLi.innerHTML = `<a class="page-link" href="#">Anterior</a>`;
    prevLi.onclick = function (e) {
      e.preventDefault();
      if (currentPage > 1) {
        currentPage--;
        renderTablePage(currentPage);
      }
    };
    pagination.appendChild(prevLi);

    // --- Números de página con puntos suspensivos ---
    const delta = 2; // cantidad de páginas alrededor
    let start = Math.max(1, currentPage - delta);
    let end = Math.min(totalPages, currentPage + delta);

    // Ajuste cuando estamos al inicio
    if (currentPage <= delta) {
      end = Math.min(1 + delta * 2, totalPages);
    }
    // Ajuste cuando estamos al final
    if (currentPage > totalPages - delta) {
      start = Math.max(totalPages - delta * 2, 1);
    }

    // Primera página
    if (start > 1) {
      addPage(1);
      if (start > 2) addDots();
    }

    // Páginas intermedias
    for (let i = start; i <= end; i++) {
      addPage(i);
    }

    // Última página
    if (end < totalPages) {
      if (end < totalPages - 1) addDots();
      addPage(totalPages);
    }

    // Botón siguiente
    const nextLi = document.createElement("li");
    nextLi.className = `page-item ${currentPage === totalPages ? "disabled" : ""}`;
    nextLi.innerHTML = `<a class="page-link" href="#">Siguiente</a>`;
    nextLi.onclick = function (e) {
      e.preventDefault();
      if (currentPage < totalPages) {
        currentPage++;
        renderTablePage(currentPage);
      }
    };
    pagination.appendChild(nextLi);

    // --- Funciones auxiliares ---
    function addPage(i) {
      const li = document.createElement("li");
      li.className = `page-item ${i === currentPage ? "active" : ""}`;
      li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
      li.onclick = function (e) {
        e.preventDefault();
        currentPage = i;
        renderTablePage(currentPage);
      };
      pagination.appendChild(li);
    }

    function addDots() {
      const li = document.createElement("li");
      li.className = "page-item disabled";
      li.innerHTML = `<span class="page-link">...</span>`;
      pagination.appendChild(li);
    }
  }
  // 🔹 Función de filtrado (estatus + búsqueda)
  function filterRows() {
    const filtro = filterSelect.value;
    const searchText = searchInput.value.toLowerCase();

    filteredRows = allRows.filter(row => {
      const badge = row.querySelector("td:nth-child(6) .badge"); // columna Estatus
      const statusText = badge ? badge.textContent.trim().toLowerCase() : "";

      let matchStatus = false;
      if (filtro === "all") matchStatus = true;
      else if (filtro === "activo" && statusText === "activo") matchStatus = true;
      else if (filtro === "inactivo" && statusText === "inactivo") matchStatus = true;
      else if (filtro === "eliminado" && statusText === "eliminado") matchStatus = true;

      let matchSearch = true;
      if (searchText !== "") {
        matchSearch = row.textContent.toLowerCase().includes(searchText);
      }

      return matchStatus && matchSearch;
    });

    currentPage = 1; // reiniciar a la primera página
    renderTablePage(currentPage);
  }

  // 🔹 Evento al cambiar el selector de registros por página
  document.getElementById("rowsPerPageSelect").addEventListener("change", function () {
    rowsPerPage = parseInt(this.value);
    currentPage = 1;
    renderTablePage(currentPage);
  });

  // 🔹 Evento al cambiar filtro de estatus
  filterSelect.addEventListener("change", filterRows);

  // 🔹 Buscar al escribir (en tiempo real)
  searchInput.addEventListener("keyup", filterRows);

  // 🔹 Buscar con el botón (evita recargar página)
  searchForm.addEventListener("submit", function (e) {
    e.preventDefault();
    filterRows();
  });

  // Inicializar tabla
  renderTablePage(currentPage);
});
