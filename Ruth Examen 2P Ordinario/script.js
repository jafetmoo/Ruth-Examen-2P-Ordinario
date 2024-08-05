function openTab(tabId) {
    var buttons = document.querySelectorAll('.tab-button');
    buttons.forEach(function (li) {
        li.classList.remove('active');
    });

    var tabPanes = document.querySelectorAll('.tab-pane');
    tabPanes.forEach(function (pane) {
        pane.classList.remove('active');
    });

    var clickedLink = document.querySelector(`a[onclick="openTab('${tabId}')"]`);
    clickedLink.parentElement.classList.add('active');

    document.getElementById(tabId).classList.add('active');
}


function openTab1(tabId) {
    var buttons = document.querySelectorAll('.tab-button');
    buttons.forEach(function(button) {
        button.classList.remove('active');
    });

    var tabPanes = document.querySelectorAll('.tab-pane');
    tabPanes.forEach(function(pane) {
        pane.classList.remove('active');
    });

    document.querySelector(`.tab-button[onclick="openTab('${tabId}')"]`).classList.add('active');
    document.getElementById(tabId).classList.add('active');

    var inputs = document.querySelectorAll(`#${tabId} .searchInput`);
    inputs.forEach(function(input) {
        input.value = '';
    });

    inputs.forEach(function(input) {
        $(input).trigger('input');
    });
}
// CLIENTES
$(document).ready(function() {
        $('.editLibro').on('click', function() {
        var id = $(this).data('id');
        var titulo = $(this).data('titulo');
        var fecha_publicacion = $(this).data('fecha_publicacion');
        var autor_id = $(this).data('autor_id');

        $('#editLibro-id').val(id);
        $('#editLibro-titulo').val(titulo);
        $('#editLibro-fecha_publicacion').val(fecha_publicacion);
        $('#editLibro-autor_id').val(autor_id);
    });

    // Pasa los datos al modal de eliminación
    $('.deleteLibro').on('click', function() {
        var id = $(this).data('id');
        $('#deleteLibro-id').val(id);
    });
});

// AUTORES
document.querySelectorAll('.editAutor').forEach(element => {
    element.addEventListener('click', function() {
        document.getElementById('editAutor-id').value = this.getAttribute('data-id');
        document.getElementById('editAutor-nombre').value = this.getAttribute('data-nombre');
        document.getElementById('editAutor-apellidos').value = this.getAttribute('data-apellidos');
        document.getElementById('editAutor-fecha_nacimiento').value = this.getAttribute('data-fechanacimiento');
    });
});

document.querySelectorAll('.deleteAutor').forEach(element => {
    element.addEventListener('click', function() {
        document.getElementById('deleteAutor-id').value = this.getAttribute('data-id');
    });
});
////////////////////////////////////////BUSCADOR//////////////////////////
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('.xp-searchbar form');
        const input = document.querySelector('.xp-searchbar input');
        const tables = document.querySelectorAll('.table');

        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Evitar el envío del formulario

            const searchTerm = input.value.trim().toLowerCase();

            tables.forEach(table => {
                const tbody = table.querySelector('tbody');
                const rows = tbody.querySelectorAll('tr');

                rows.forEach(row => {
                    const cells = row.querySelectorAll('td');
                    let found = false;

                    cells.forEach(cell => {
                        if (cell.textContent.toLowerCase().includes(searchTerm)) {
                            found = true;
                        }
                    });

                    if (found) {
                        row.style.display = ''; // Mostrar la fila si se encontró la coincidencia
                    } else {
                        row.style.display = 'none'; // Ocultar la fila si no hay coincidencia
                    }
                });
            });
        });
    });