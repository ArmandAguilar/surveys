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
                    txtPregunta10:$('#txtPregunta10').val(),
                    chkIdPregunta1:$('#chkIdPregunta1').val(),
                    chkIdPregunta2:$('#chkIdPregunta2').val(),
                    chkIdPregunta3:$('#chkIdPregunta3').val(),
                    chkIdPregunta4:$('#chkIdPregunta4').val(),
                    chkIdPregunta5:$('#chkIdPregunta5').val(),
                    chkIdPregunta6:$('#chkIdPregunta6').val(),
                    chkIdPregunta7:$('#chkIdPregunta7').val(),
                    chkIdPregunta8:$('#chkIdPregunta8').val(),
                    chkIdPregunta9:$('#chkIdPregunta9').val(),
                    chkIdPregunta10:$('#chkIdPregunta10').val(),
                    txtIdArea:$('#cboPerfil').val()
                  };
   $.ajax({
             url:'./scripts/oper_cencuesta.php?o=1',
             type:'POST',
             data:losdatos,
             success:function(data)
                    {
                       $("#alerta-err").hide(500);
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
                       /*alert(data)*/
                        $("#alerta-oka").show(1000);
                        window.location.href = 'edit_surveys.php';
                    },
             error:function(req,e,er) {
                $("#alerta-err").show(1000);
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
                    txtIdPregunta10:$('#txtIdPregunta10').val(),
                    chkIdPregunta1:$('#chkIdPregunta1').is(':checked'),
                    chkIdPregunta2:$('#chkIdPregunta2').is(':checked'),
                    chkIdPregunta3:$('#chkIdPregunta3').is(':checked'),
                    chkIdPregunta4:$('#chkIdPregunta4').is(':checked'),
                    chkIdPregunta5:$('#chkIdPregunta5').is(':checked'),
                    chkIdPregunta6:$('#chkIdPregunta6').is(':checked'),
                    chkIdPregunta7:$('#chkIdPregunta7').is(':checked'),
                    chkIdPregunta8:$('#chkIdPregunta8').is(':checked'),
                    chkIdPregunta9:$('#chkIdPregunta9').is(':checked'),
                    chkIdPregunta10:$('#chkIdPregunta10').is(':checked'),
                    txtIdArea:$('#cboPerfil').val()
                  };
                  alert($('#chkIdPregunta1').is(':checked'));
                  alert($('#chkIdPregunta2').is(':checked'));
   $.ajax({
             url:'./scripts/oper_cencuesta.php?o=3',
             type:'POST',
             data:losdatos,
             success:function(data)
                    {
                        /*alert(data);*/
                        $("#alerta-err").hide(500);
                        $("#alerta-oka").show(1000);
                        $("#alerta-oka").hide(1000);
                        window.location.href = 'edit_surveys.php';
                    },
             error:function(req,e,er) {
                $("#alerta-err").show(1000);
                alert(er);
             }
          });
}
