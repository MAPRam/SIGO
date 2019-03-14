var boton = document.getElementById('reenviar');

boton.addEventListener('click', function(e){
    e.preventDefault();

    var id_mensaje = document.getElementById('efirstname').value;

    var id_obj = document.getElementById("destinatario").selectedIndex;
    var id_list = document.getElementById("destinatario").options;
    var msn = document.getElementById('id_mensaje_turnado').value;

    var id_usr = id_list[id_obj].id;


    var datos = new FormData();

    datos.append("id_mensaje", id_mensaje);
    datos.append("id_destino", id_usr);
    datos.append("mensaje", msn);


    fetch('turna.php',{
        method: 'POST',
        body: datos
    })
    .then( res => res.json())
    .then( data => {
        //console.log(data)
        /*if (data === 'repetido')
        {
            formulario.reset();
            respuesta.innerHTML = `<div class="alert alert-danger" role="alert">Es posible que los datos de este usuario ya existan... </div>`;
        }*/
        if (data == 0)
        {
          alert("ES POSIBLE QUE ESTE MENSAJE YA HAYA SIDO REENVIADO O YA NO LO HAYA ENVIADO 10 VECES");
          document.getElementById('close').click();
            //d.style.visibility = "hidden";
            //respuesta.innerHTML = `<div class="alert alert-danger" role="alert">Ha ocurrido un error, intenta mas tarde... </div>`;
        }

        else  
        {
          //$('#edit').modal('show');
          console.log(data);
          document.getElementById('close').click();
          alert("REENVÍO EXITOSO");

          //console.log(data);
            //d.style.visibility = "hidden";
            //respuesta.innerHTML = `<div class="alert alert-warning" role="alert">${data}</div>`; // ${data}

        }
    })

})
