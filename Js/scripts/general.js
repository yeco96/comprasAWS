$(function(){
 
 //Click al boton Login
$("#btnLogin").click(function(){
   _form = $("#frmLogin");
   
   $.ajax({
       type:'post',
       dataType: 'json',
       url: 'procesadatos.php',
       data: _form.serialize(),
       success: function (_data){        
          if(_data.valido){              
            window.location.href="menu-principal.php";
          }else{
            var dialog = new Messi(
                    'El usuario digitado no existe.',
                    {
                        title: 'Mensaje',
                        titleClass: 'anim info',
                        buttons: [{id: 0, label: 'Cerrar', val: 'X'}]
                    }
            );
          }
       }
   });//ajax   
});
});

