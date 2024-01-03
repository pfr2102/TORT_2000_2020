(function(document) {
    'buscador';

    var LightTableFilter = (function(Arr) {

      var _input;

      function _onInputEvent(e) {
        //para recargar la pagina cuando el input buscador este vacio y recargue la paginacion ya que de otra forma cuando esta vacio pone todos los registros sin paginacion
        var valor = document.getElementById("buscador").value;
        var valor2 = document.getElementById("buscador");
        if(valor=="" || valor==" "){
          valor2.value="";
          //operacion.crear();
          //Mostrar();
          //return;
          //$('#tblDatos').load();
          location.reload();
        }
        //alert("hola");
        _input = e.target;
        var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
        Arr.forEach.call(tables, function(table) {
          Arr.forEach.call(table.tBodies, function(tbody) {
            Arr.forEach.call(tbody.rows, _filter);
          });
        });
      }

      function _filter(row) {
        var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
        row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
      }

      return {
        init: function() {
          var inputs = document.getElementsByClassName('light-table-filter');
          Arr.forEach.call(inputs, function(input) {
            input.oninput = _onInputEvent;
          });
        }
      };
    })(Array.prototype);

    document.addEventListener('readystatechange', function() {     
      if (document.readyState === 'complete') {
        LightTableFilter.init();
      }
    });

  })(document);




/*

function mostrar()
  {
      //Crear la tabla
      var tblPaginador = document.createElement('table');

      //Agregar una fila a la tabla
      var fil = tblPaginador.insertRow(tblPaginador.rows.length);

      //Ahora, agregar las celdas que serán los controles
      var ant = fil.insertCell(fil.cells.length);
      ant.innerHTML = 'Anterior';
      ant.className = 'pag_btn btn btn-outline-info'; //con eso le asigno un estilo y una clase al boton
      var self = this;
      ant.onclick = function()
      {
          if (self.pagActual == 1)
              return;
          self.SetPagina(self.pagActual - 1);
      }

      var num = fil.insertCell(fil.cells.length);
      num.innerHTML = ''; //en teoria, aún no se el número de la página
      num.className = 'numero_page btn btn-outline-secondary';

      var sig = fil.insertCell(fil.cells.length);
      sig.innerHTML = 'Siguiente';
      sig.className = 'pag_btn btn btn-outline-info';
      sig.onclick = function()
      {
          if (self.pagActual == self.paginas)
              return;
          self.SetPagina(self.pagActual + 1);
      }

      //Como ya tengo mi tabla, puedo agregarla al DIV de los controles
      this.miDiv.appendChild(tblPaginador);

  
      if (this.tabla.rows.length - 1 > this.paginas * this.tamPagina)
          this.paginas = this.paginas + 1;

      this.SetPagina(this.pagActual);
  }
}*/