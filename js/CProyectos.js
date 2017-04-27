function show_all_task(IdProyecto)
{
  /*redirecto to new script where , we show all task*/
  window.location.href= 'newtask.php?NumProy=' + IdProyecto;
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
                              /Close_Surveys_in_app($('#txtIdTarea').val());/
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
   case 6:
          $('#txtRespuesta6').val(valor);
     break;
   case 7:
          $('#txtRespuesta7').val(valor);
     break;
   case 8:
          $('#txtRespuesta8').val(valor);
     break;
   case 9:
          $('#txtRespuesta9').val(valor);
     break;
   case 10:
          $('#txtRespuesta10').val(valor);
     break;

   }

 }
function setValPregunta_new(NumProy)
{
    /*var losdatos = {txtId:Id,txtValor:Valor,txtIdTarea:$('#txtIdTarea').val()};*/
    var txtPregunta_6 = '';
    var txtRespuesta_6 = '';
    var txtPregunta_7 = '';
    var txtRespuesta_7 = '';
    var txtPregunta_8 = '';
    var txtRespuesta_8 = '';
    var txtPregunta_9 = '';
    var txtRespuesta_9 = '';
    var txtPregunta_10 = '';
    var txtRespuesta_10 = '';

    if ( $("#txtPregunta_6").length )
     {
       txtPregunta_6 = $('#txtPregunta_6').val();
       txtRespuesta_6 = $('#txtRespuesta_6').val();
     }
    if ( $("#txtPregunta_7").length )
      {
        txtPregunta_7 = $('#txtPregunta_7').val();
        txtRespuesta_7 = $('#txtRespuesta_7').val();
      }
    if ( $("#txtPregunta_8").length )
       {
         txtPregunta_8 = $('#txtPregunta_8').val();
         txtRespuesta_8 = $('#txtRespuesta_8').val();
       }
    if ( $("#txtPregunta_9").length )
      {
        txtPregunta_9 = $('#txtPregunta_9').val();
        txtRespuesta_9 = $('#txtRespuesta_9').val();
      }
    if ( $("#txtPregunta_10").length )
      {
        txtPregunta_10 = $('#txtPregunta_10').val();
        txtRespuesta_10 = $('#txtRespuesta_10').val();
      }
      var losdatos = {

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
                      txtPregunta6:txtPregunta_6,
                      txtRespuesta6:txtRespuesta_6,
                      txtPregunta7:txtPregunta_7,
                      txtRespuesta7:txtRespuesta_7,
                      txtPregunta8:txtPregunta_8,
                      txtRespuesta8:txtRespuesta_8,
                      txtPregunta9:txtPregunta_9,
                      txtRespuesta9:txtRespuesta_9,
                      txtPregunta10:txtPregunta_10,
                      txtRespuesta10:txtRespuesta_10,
                      idEncuestador:$('#txtIdEncuestador').val(),
                      idEncuestado:$('#txtIdEncuestado').val(),
                      idEncuesta:$('#txtIdEncuesta').val(),
                      txtIdWorskToClose:$('#txtIdWorskToClose').val()
                    };
      $.ajax({
                url:'./scripts/oper_proyectos.php?o=5',
                type:'POST',
                data:losdatos,
                success:function(data)
                {
                    alert(data);
                    window.location.href = 'newtask.php?NumProy=' + NumProy;
                },
                error:function(req,e,er) {
                  alert(er);
                }
              });
}
