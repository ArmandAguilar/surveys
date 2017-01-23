function show_all_task(IdProyecto)
{
  /*redirecto to new script where , we show all task*/
  window.location.href= 'task.php?NumProy=' + IdProyecto
}
function set_surveys(idEncuestado,idTarea)
{
  $('#txtIdEncuestado').val(idEncuestado);
  $('#txtIdTarea').val(idTarea)

}
function apply_surveys()
{
  var losdatos = {
                  idEncuestador:$('#txtIdEncuestador').val(),
                  idEncuestado:$('#txtIdEncuestado').val(),
                  idTarea:$('#txtIdTarea').val(),
                  idEncuesta:$('#cboEncuesta').val()
                }
                alert('IdEncuestador:' + $('#txtIdEncuestador').val());
                alert('IdEncuestado : ' + $('#txtIdEncuestado').val());
                alert('IdTarea :' + $('#txtIdTarea').val());
                alert('IdEncuesta :' + $('#cboEncuesta').val());

                $.ajax({
                          url:'./scripts/oper_proyectos.php?o=1',
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
