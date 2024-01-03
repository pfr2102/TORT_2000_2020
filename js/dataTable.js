/*var myTable = document.querySelector("#tblDatos");
var dataTable = new DataTable(myTable);*/

$(document).ready( function () {
    $('#tblDatos').DataTable({
        
      pageLength : 7,
      lengthMenu: [[7, 10, 20,40,50, -1], [7, 10, 20,40,50, 'Todos']],
        language: {
            processing:     "Tratamiento en curso...",
            search:         "Buscar:" ,
            info:           " _TOTAL_ REGISTROS",
            lengthMenu:    "Filtrar _MENU_ registros",
            infoEmpty:      "No existen registros",
            infoFiltered:   "(filtrado de _MAX_ registros en total)",
            infoPostFix:    "",
            loadingRecords: "Cargando elementos...",
            zeroRecords:    "No se encontraron los datos de tu busqueda..",
            emptyTable:     "No hay ningun registro en la tabla",
            paginate: {
                first:      "Primero",
                previous:   "Anterior",
                next:       "Siguiente",
                last:       "Ultimo"
            },
            aria: {
                sortAscending:  ": Active para odernar en modo ascendente",
                sortDescending: ": Active para ordenar en modo descendente  ",
            },
            /*buttons:[
               {
                   extends: 'excelHtml5',
                   Text: '<i class="fas fa-file-excel"></i>',
                   titleAttr: 'Exportar a Excel',
                   className:'btn btn-success'
               }
           ]*/
        }
    } );
} );

