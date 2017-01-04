function login()
{
      var losdatos = {txtUser:$("#txtUser").val(),txtPassword:$("#txtPassword").val()};
      $.ajax({
                url:'./scripts/login.php?o=1',
                type:'POST',
                data:losdatos,
                success:function(data)
                {
                     var vals = data
                     if(vals>=1)
                       {
                          window.location.href="panel.php";
                       }
                       else {
                         alert('Error: Usuario o password');
                       }
                },
                error:function(req,e,er) {
                  alert(er);
                }
              });
 }
