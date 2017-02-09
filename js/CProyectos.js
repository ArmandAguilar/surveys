function show_all_task(IdProyecto)
{
  /*redirecto to new script where , we show all task*/
  window.location.href= 'task.php?NumProy=' + IdProyecto
}
function set_surveys(idEncuesta,idEncuestado,idTarea,Tarea,Nombre,Correo)
{

  $('#Pencuesta').empty();

  $('#txtIdEncuesta').val(idEncuesta);
  $('#txtIdEncuestado').val(idEncuestado);
  $('#txtIdTarea').val(idTarea);
  $('txtCorreo').val(Correo);
  $('txtNombre').val(Nombre);
  $('txtTareaNombre').val(Tarea);

  var losdatos = {
                  idEncuestador:$('#txtIdEncuestador').val(),
                  idEncuestado:$('#txtIdEncuestado').val(),
                  idTarea:$('#txtIdTarea').val(),
                  idEncuesta:$('#txtIdEncuesta').val()
                }
                $.ajax({
                          url:'./scripts/oper_proyectos.php?o=2',
                          type:'POST',
                          data:losdatos,
                          success:function(data)
                          {

                              $('#Pencuesta').append(data);
                              Close_Surveys_in_app($('#txtIdTarea').val());

                          },
                          error:function(req,e,er) {
                            alert(er);
                          }
                        });
}

function Close_Surveys(NumProy)
{
     var losdatos = {idTarea:$('#txtIdTarea').val()};
      $.ajax({
                url:'./scripts/oper_proyectos.php?o=3',
                type:'POST',
                data:losdatos,
                success:function(data)
                {
                    if (data == 'Si') {
                      window.location.href = 'task.php?NumProy=' + NumProy;
                    }
                },
                error:function(req,e,er) {
                  alert(er);
                }
              });

}
function Close_Surveys_in_app(NumProy)
{
     var losdatos = {idTarea:$('#txtIdTarea').val()};
      $.ajax({
                url:'./scripts/oper_proyectos.php?o=3',
                type:'POST',
                data:losdatos,
                success:function(data)
                {

                },
                error:function(req,e,er) {
                  alert(er);
                }
              });

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
                          url:'./scripts/oper_proyectos.php?o=3',
                          type:'POST',
                          data:losdatos,
                          success:function(data)
                          {
                              $('#msj').show();
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
                          url:'./scripts/nofication.php?SendNotification=1',
                          type:'GET',
                          data:losdatos,
                          success:function(data)
                          {
                              setTimeout(function(){ window.location.href='task.php?NumProy=' + $('#txtNumProyectos').val();}, 9000);
                          },
                          error:function(req,e,er) {
                            alert(er);
                          }
                        });

}
