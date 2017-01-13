function encuesta_save()
{
  var losdatos = {
                    txtIdUsuario:$('#txtIdUsuario').val(),
                    txtEncuesta:$('#txtEncuesta').val(),
                    txtPregunta1:$('#txtPregunta1').val(),
                    txtPregunta2:$('#txtPregunta2').val(),
                    txtPregunta3:$('#txtPregunta3').val(),
                    txtPregunta4:$('#txtPregunta4').val(),
                    txtPregunta5:$('#txtPregunta5').val(),
                    txtPregunta6:$('#txtPregunta6').val(),
                    txtPregunta7:$('#txtPregunta7').val(),
                    txtPregunta8:$('#txtPregunta8').val(),
                    txtPregunta9:$('#txtPregunta9').val(),
                    txtPregunta10:$('#txtPregunta10').val()
                  };
   $.ajax({
             url:'./scripts/oper_cencuesta.php?o=1',
             type:'POST',
             data:losdatos,
             success:function(data)
                    {
                       alert(data)
                        $("#alerta-oka").show(1000);
                        txtEncuesta:$('#txtEncuesta').val('');
                        txtPregunta1:$('#txtPregunta1').val('');
                        txtPregunta2:$('#txtPregunta2').val('');
                        txtPregunta3:$('#txtPregunta3').val('');
                        txtPregunta4:$('#txtPregunta4').val('');
                        txtPregunta5:$('#txtPregunta5').val('');
                        txtPregunta6:$('#txtPregunta6').val('');
                        txtPregunta7:$('#txtPregunta7').val('');
                        txtPregunta8:$('#txtPregunta8').val('');
                        txtPregunta9:$('#txtPregunta9').val('');
                        txtPregunta10:$('#txtPregunta10').val('');

                        /*window.location.href = 'home.php';*/
                    },
             error:function(req,e,er) {
                $("#alerta-oka").show(1000);
             }
          });
}

function encuesta_delete(id)
{
  var losdatos = {Id:id};
   $.ajax({
             url:'./scripts/oper_cencuesta.php?o=2',
             type:'POST',
             data:losdatos,
             success:function(data)
                    {
                       alert(data)
                        $("#alerta-oka").show(1000);
                        window.location.href = 'edit_surveys.php';
                    },
             error:function(req,e,er) {
                $("#alerta-oka").show(1000);
             }
          });
}

function encuesta_see(id)
{
  window.location.href = 'edit_any_surveys.php?Id=' + id;
}
function encuesta_save_edit()
{
  var losdatos = {
                    txtEncuesta:$('#txtEncuesta').val(),
                    txtIdEncuesta:$('#txtIdEncuesta').val(),
                    txtPregunta1:$('#txtPregunta1').val(),
                    txtPregunta2:$('#txtPregunta2').val(),
                    txtPregunta3:$('#txtPregunta3').val(),
                    txtPregunta4:$('#txtPregunta4').val(),
                    txtPregunta5:$('#txtPregunta5').val(),
                    txtPregunta6:$('#txtPregunta6').val(),
                    txtPregunta7:$('#txtPregunta7').val(),
                    txtPregunta8:$('#txtPregunta8').val(),
                    txtPregunta9:$('#txtPregunta9').val(),
                    txtPregunta10:$('#txtPregunta10').val(),
                    txtIdPregunta1:$('#txtIdPregunta1').val(),
                    txtIdPregunta2:$('#txtIdPregunta2').val(),
                    txtIdPregunta3:$('#txtIdPregunta3').val(),
                    txtIdPregunta4:$('#txtIdPregunta4').val(),
                    txtIdPregunta5:$('#txtIdPregunta5').val(),
                    txtIdPregunta6:$('#txtIdPregunta6').val(),
                    txtIdPregunta7:$('#txtIdPregunta7').val(),
                    txtIdPregunta8:$('#txtIdPregunta8').val(),
                    txtIdPregunta9:$('#txtIdPregunta9').val(),
                    txtIdPregunta10:$('#txtIdPregunta10').val()
                  };
   $.ajax({
             url:'./scripts/oper_cencuesta.php?o=3',
             type:'POST',
             data:losdatos,
             success:function(data)
                    {
                       alert(data)
                        $("#alerta-oka").show(1000);
                        txtEncuesta:$('#txtEncuesta').val('');
                        txtPregunta1:$('#txtPregunta1').val('');
                        txtPregunta2:$('#txtPregunta2').val('');
                        txtPregunta3:$('#txtPregunta3').val('');
                        txtPregunta4:$('#txtPregunta4').val('');
                        txtPregunta5:$('#txtPregunta5').val('');
                        txtPregunta6:$('#txtPregunta6').val('');
                        txtPregunta7:$('#txtPregunta7').val('');
                        txtPregunta8:$('#txtPregunta8').val('');
                        txtPregunta9:$('#txtPregunta9').val('');
                        txtPregunta10:$('#txtPregunta10').val('');

                        /*window.location.href = 'home.php';*/
                    },
             error:function(req,e,er) {
                $("#alerta-oka").show(1000);
             }
          });
}
