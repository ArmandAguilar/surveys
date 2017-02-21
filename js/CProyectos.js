function show_all_task(IdProyecto)
{
  /*redirecto to new script where , we show all task*/
  window.location.href= 'task.php?NumProy=' + IdProyecto;
}
function set_surveys(idEncuesta,idEncuestado,idTarea,Tarea,Nombre,Correo)
{
  $('#Pencuesta').empty();
  $('#txtIdEncuesta').val(0);
  $('#txtIdEncuestado').val(0);
  $('#txtIdTarea').val(0);
  $('txtCorreo').val(0);
  $('txtNombre').val(0);
  $('txtTareaNombre').val(0);
  $('#Carga').show();
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
                };
                $.ajax({
                          url:'./scripts/oper_proyectos.php?o=2',
                          type:'POST',
                          data:losdatos,
                          success:function(data)
                          {

                              $('#Pencuesta').append(data);
                              /*Close_Surveys_in_app($('#txtIdTarea').val());*/
                              $('#Carga').hide();

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

function setValAnswers(campo,valor)
 {
   switch (campo) {
     case 1:
               $('#txtRespuesta1').val(valor);
       break;
     case 2:
               $('#txtRespuesta2').val(valor);
         break;
     case 3:
             $('#txtRespuesta3').val(valor);
       break;
     case 4:
             $('#txtRespuesta4').val(valor);
       break;
     case 5:
            $('#txtRespuesta5').val(valor);
       break;

   }

 }
function setValPregunta_new(NumProy)
{
    /*var losdatos = {txtId:Id,txtValor:Valor,txtIdTarea:$('#txtIdTarea').val()};*/
      var losdatos = {
                      txtIdTarea:$('#txtIdTarea').val(),
                      txtPregunta1:$('#txtPregunta_1').val(),
                      txtRespuesta1:$('#txtRespuesta1').val(),
                      txtPregunta2:$('#txtPregunta_2').val(),
                      txtRespuesta2:$('#txtRespuesta2').val(),
                      txtPregunta3:$('#txtPregunta_3').val(),
                      txtRespuesta3:$('#txtRespuesta3').val(),
                      txtPregunta4:$('#txtPregunta_4').val(),
                      txtRespuesta4:$('#txtRespuesta4').val(),
                      txtPregunta5:$('#txtPregunta_5').val(),
                      txtRespuesta5:$('#txtRespuesta5').val(),
                      idEncuestador:$('#txtIdEncuestador').val(),
                      idEncuestado:$('#txtIdEncuestado').val(),
                      idTarea:$('#txtIdTarea').val(),
                      idEncuesta:$('#txtIdEncuesta').val()
                    };
      $.ajax({
                url:'./scripts/oper_proyectos.php?o=5',
                type:'POST',
                data:losdatos,
                success:function(data)
                {
                    Close_Surveys(NumProy);
                },
                error:function(req,e,er) {
                  alert(er);
                }
              });
}
