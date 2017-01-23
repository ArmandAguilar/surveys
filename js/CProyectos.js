function show_all_task(IdProyecto)
{
  /*redirecto to new script where , we show all task*/
  window.location.href= 'task.php?NumProy=' + IdProyecto
}
function set_surveys(id)
{
  $('#txtIdEncuestado').val(id);
}
function apply_surveys()
{
  var losdatos = {
                  idEncuestado:$('#txtIdEncuestado').val(),
                  idEncuesta:$('#cboEncuesta').val()
                }
                alert($('#txtIdEncuestado').val());
                alert($('#cboEncuesta').val());
}
