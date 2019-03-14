var boton = document.getElementById('eliminar');

boton.addEventListener('click', function(e){
    e.preventDefault();

    var id_mensaje = document.getElementById('efirstname').value;
    var datos = new FormData();

    datos.append("id_mensaje", id_mensaje);

    fetch('../expedientes/elimina.php',{
        method: 'POST',
        body: datos
    })
    .then( res => res.json())
    .then( data => {
        if (data === 'error')
        {
          alert("ERROR");
          document.getElementById('close').click();
        }

        else
        {
          console.log(data);
          document.getElementById('close').click();
          alert("Se ha eliminado el mensaje");
          location.href="";

        }
    })

})
