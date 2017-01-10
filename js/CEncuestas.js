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
