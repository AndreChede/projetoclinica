$("#formulario").submit(function(e) {
    var url = "formulario.php"; 
    $.ajax({
           type: "POST",
           url: url,
           data: $("#formulario").serialize(),
           success: function(data)
           {
               alert(data);
              
           }
         });

    e.preventDefault();
});