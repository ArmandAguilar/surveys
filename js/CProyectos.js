function show_all_task(IdProyecto)
{
  /*redirecto to new script where , we show all task*/
  window.location.href= 'task.php?NumProy=' + IdProyecto
}
function set_surveys(idEncuestado,idTarea,Tarea,Nombre,Correo)
{
  $('#txtIdEncuestado').val(idEncuestado);
  $('#txtIdTarea').val(idTarea);
  $('txtCorreo').val(Correo);
  $('txtNombre').val(Nombre);
  $('txtTareaNombre').val(Tarea);

}
function apply_surveys()
{
  var losdatos = {
                  idEncuestador:$('#txtIdEncuestador').val(),
                  idEncuestado:$('#txtIdEncuestado').val(),
                  idTarea:$('#txtIdTarea').val(),
                  idEncuesta:$('#cboEncuesta').val()
                }
                /*alert('IdEncuestador:' + $('#txtIdEncuestador').val());
                alert('IdEncuestado : ' + $('#txtIdEncuestado').val());
                alert('IdTarea :' + $('#txtIdTarea').val());
                alert('IdEncuesta :' + $('#cboEncuesta').val());*/

                $.ajax({
                          url:'./scripts/oper_proyectos.php?o=1',
                          type:'POST',
                          data:losdatos,
                          success:function(data)
                          {
                              /*alert(data);*/
                              SendNotification();
                          },
                          error:function(req,e,er) {
                            alert(er);
                          }
                        });
}
function SendNotification()
{
  var losdatos = {
                  txtNombre:$('#txtNombre').val(),
                  txtCorreo:$('#txtCorreo').val(),
                  txtTarea:$('#txtTareaNombre').val(),
                  IdEncuesta:$('#cboEncuesta').val()
                }
                /*alert('IdEncuestador:' + $('#txtIdEncuestador').val());
                alert('IdEncuestado : ' + $('#txtIdEncuestado').val());
                alert('IdTarea :' + $('#txtIdTarea').val());
                alert('IdEncuesta :' + $('#cboEncuesta').val());*/

                $.ajax({
                          url:'./scripts/nofication.php?o=1',
                          type:'GET',
                          data:losdatos,
                          success:function(data)
                          {
                              /*alert(data);*/
                              window.location.href='task.php?NumProy=' + $('#txtNumProyectos').val();
                          },
                          error:function(req,e,er) {
                            alert(er);
                          }
                        });

}
