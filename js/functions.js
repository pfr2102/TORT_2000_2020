//Es una funcion que mandas a llamar en el boton de cancelar para borrar todo el contenidos de un form
function limpiarForm(){
  let formulario = document.getElementById('formul');
   formulario.reset();
}

function alertaSucces(msj, desc){
  Swal.fire(
    msj,
    desc,
    'success'
  );
}

function alertas(){
  Swal.fire(
    'hola',
    'perra',
    'success'
  );
}
//funcion  que se manda a llamar por onkeypress en los textarea para que no permita dar enter en el contenido del mismo
function noEnter() {
  var key = event.keyCode;

  if (key === 13) {
      event.preventDefault();
  }
}
///es un funcion que se activ con el evento click para desplegar un SweetAlert
$('.btn-del').on('click', function(e){
  e.preventDefault();
  //const href = 'notas.php'
  const href = $(this).attr('href')
  Swal.fire({
      title: 'ESTAS SEGURO CARNAL?',
      text: "ya no podras revertir los cambios!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, eliminalo!',
      cancelButtonText: 'Canselar'
      }).then((result) => {
      if(result.value){
          if (result.isConfirmed) {
              Swal.fire({
                  title:'Eliminado!',
                  text:'El registro se a eliminado para siempre, adios fuchi.',                                 
                  icon:'success'
              })
          } 
          document.location.href=href; 
      }
  })
});


//es para limitar la fecha minima del input fecha fin en los reportes
$('#fechaInicio').on('change',function(e){
  e.preventDefault();
  fechaInicio = document.getElementById('fechaInicio').value;
  $('#fechaFin').attr('min', fechaInicio);

});