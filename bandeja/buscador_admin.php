<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/estilo1.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>


	<title>Gestión de correspondencia</title>



</head>
<body class="background">

  <?php
        session_start();

        if($_SESSION['turnado'] != true)
        {
            header("Location: ../");
        }

    ?>
    <div class="container-fluid py-3">
    <div class="container-fluid">
            <nav class="navbar navbar-expand-lg " style="background-color: rgb(37,39,35);"> <!-- navbar-dark bg-dark -->

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <div class="navbar-nav mr-auto">
                        <div class="nav-item">
                          <img class="img-fluid" width="150px" height="250px" src="images/Logo.png">
                        </div>
                        <div class="btn-group nav-item">
                          <button type="button" style="font-size: 12px;" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            OPCIONES
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="../enviar/">Enviar documento</a>
                            <a class="dropdown-item" href="../bandeja/">Bandeja</a>
                            <a class="dropdown-item" href="../enviados/">Enviados</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item bd-danger" href="buscador_admin.php" >Buscador</a> <!-- MODIFICAR PARA QUE BUSQUE SOLAMENTE LO DE EL ADMINISTTRADOR  -->
                            <a class="dropdown-item bd-danger" href="rastrea.php" >Compartidos</a> <!-- MODIFICAR PARA QUE RASTREE TOD O LO DE LA DIRECCIÓN -->
                          </div>
                        </div>
                        <!-- Notificaciones para eliminhar mensajes y y solicitudes de actualizaciones de prioridad (En coordinación) y solicitudes -->
                      &nbsp;
                        <div class="btn-group nav-item">
                          <button type="button" disabled style="font-size: 12px;" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            SOLICITUDES <span class="badge badge-warning">Working</span>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="../enviar/">Enviar documento</a>
                            <a class="dropdown-item" href="">Bandeja</a>
                            <a class="dropdown-item" href="../enviados/">Enviados</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item bd-danger" href="buscador_admin.php" disabled>Buscador</a>
                            <a class="dropdown-item bd-danger" href="rastrea.php" disabled>Compartidos</a>
                          </div>
                        </div>

                        &nbsp;
                          <div class="btn-group nav-item">
                            <button type="button" disabled style="font-size: 12px;" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              COORR COORDINACIÓN <span class="badge badge-warning">Locked</span>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="../enviar/">Enviar documento</a>
                              <a class="dropdown-item" href="">Bandeja</a>
                              <a class="dropdown-item" href="../enviados/">Enviados</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item bd-danger" href="buscador_admin.php" disabled>Buscador</a> <!-- BUSCADOR PÓR COORDINACIÓN -->
                              <a class="dropdown-item bd-danger" href="rastrea.php" disabled>Compartidos</a> <!-- COMPARTIDOS POR COORDINACIÓJN -->
                            </div>
                          </div>
                          <!-- REHACER  LAS RUTAS DEPENDIENDO DELL LUGAR DONDE ESTÉ PARADO EL USUARIO (IDE A LOCA QUE NO CREO QUE SE PUEDA ) -->
                      </div>
                      <p style="color:  rgb(37,39,35); font-size:  4px;"  id="idusuairo"><?php echo($_SESSION['id_usuario']);?> &nbsp;</p> <!-- IDENTIFICADOR PARA LA PETICIÓN DINÁMICA DE DATOS -->

                      <p style="color: white;">Bienvenido: &nbsp; </p>
                      <strong><p style="color: white;" id="nombreusuario"><?php echo($_SESSION["usuario"]);?> &nbsp;</p></strong>
                      <strong><p style="color: white;" id="apellidousuario"><?php echo($_SESSION["apellido_p"]);?> &nbsp;&nbsp;&nbsp;</p></strong>
                      <button class="btn btn-outline-warning" onclick="location.href='../logout.php'">Salir</button>
                    </nav>
                    </div>
        </div>
    </div>





    <div class="container-fluid py-2">
        <div class="row justify-content-center">
            <!-- <div class="col-md-6"> -->
              <div class="col-2">
                <label class="form-inline h3"><strong>No. de oficio:</strong></label>
              </div>
              <div class="col-6">
                <input type="text" class="form-control form-inline" name="busca" id="busca" placeholder="Buscar" onkeyup="busca()">
              </div>
            <!-- </div> -->
        </div>
    </div>

    <div class="container-fluid py-2">
                          <!-- CONTENT BLOCK = TABLE NORMAL -->
    <div class="d-flex bg-secondary"> <!-- justify-content-center h-100 -->
    <table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col" style="font-size: 12px;">CLAVE DE MENSAJE</th>
      <th scope="col" style="font-size: 12px;">ENVÍA</th>
      <th scope="col" style="font-size: 12px;">RECIBE</th>
      <th scope="col" style="font-size: 12px;">TITULO DE MENSAJE</th>
      <th scope="col" style="font-size: 12px;">DESCRIPCIÓN</th>
      <th scope="col" style="font-size: 12px;">FECHA ENVÍO</th>
      <th scope="col" style="font-size: 12px;">HORA</th>
      <th scope="col" style="font-size: 12px;">ESTADO</th>
      <th scope="col" style="font-size: 12px;">DOCUMENTO</th>
      <th scope="col" style="font-size: 12px;">RESPUESTA</th>
      <th scope="col" style="font-size: 12px;">MENSAJE RESP</th>
      <th scope="col" style="font-size: 12px;">HORA resp</th>
      <th scope="col" style="font-size: 12px;">FECHA resp</th>
      <th scope="col" style="font-size: 12px;">RESPONDE</th>
      <th scope="col" style="font-size: 12px;">PRIORIDAD</th>
  </thead>
  <tbody id="tabla">


    </tbody>
    </table>


	</div>



    </div>


    <script>


      function busca()
      {
        var busca = document.getElementById('busca').value;
        var tabla = document.getElementById('tabla');
        var al = document.getElementById('alrt');
        tabla.innerHTML = '';
        var row = '<tr>';
        var row2 = '</tr>';

        /*

        var col = row;
        for ( i = 0; i < 12; i++)
        {
          col = col + '<td>' + busca + '</td>';
        }

        col = col + row2;

        tabla.innerHTML = col;

        */
        var datos = new FormData()
        datos.append('s', busca);

        fetch('search1.php',{
                method: 'POST',
                body: datos
            })
            .then( res => res.json())
            .then( data => {

            if (data === 'error')
            {
                alert("Error");
            }

            else
            {
              var tm = data.length;

              if (tm == 0)
              {
                tabla.innerHTML = '<div class="alert alert-danger h5"><strong>¡NO HAY RESULTADOS PARA ESTA BÚSQUEDA!</strong></div>';
              }
              else
              {
                //var arr = JSON.stringify(data);

                for (var i = 0; i < data.length; i++)
                {
                  var tr = document.createElement('tr');

                  var font = document.createAttribute('style');
                  font.value = 'font-size:11px;';
                  tr.setAttributeNode(font);

                  var td = document.createElement('td');
                  var td2 = document.createElement('td');
                  var td3 = document.createElement('td');
                  var td4 = document.createElement('td');
                  var td5 = document.createElement('td');
                  var td6 = document.createElement('td');
                  var td7 = document.createElement('td');
                  var td8 = document.createElement('td');
                  var td9 = document.createElement('td');
                  var td10 = document.createElement('td');
                  var td11 = document.createElement('td');
                  var td12 = document.createElement('td');
                  var td13 = document.createElement('td');
                  var td14 = document.createElement('td');
                  var td15 = document.createElement('td');
                  var btn1 = document.createElement('button');

                  var enl1 = '<button class="btn btn-info" onclick="location.href=\'' +data[i]["enlace1"] +'\'">VER DOCUMENTO</button>';

                  var href = document.createAttribute('onclick');
                  href.value = 'location.href="../expedientes/' + data[i]["enlace1"]+'"';
                  var font2 = document.createAttribute('style');
                  font2.value = 'font-size:8px;';
                  btn1.setAttributeNode(href);
                  btn1.setAttributeNode(font2);

                  var clas = document.createAttribute('class');
                  clas.value='btn btn-success';
                  btn1.setAttributeNode(clas);


                  var cont = document.createTextNode(data[i]["id"]);
                  var cont2 = document.createTextNode(data[i]["envia"]);
                  var cont3 = document.createTextNode(data[i]["recibe"]);
                  var cont4 = document.createTextNode(data[i]["titulo"]);
                  var cont5 = document.createTextNode(data[i]["descripcion"]);
                  var cont6 = document.createTextNode(data[i]["fecha1"]);
                  var cont7 = document.createTextNode(data[i]["hora1"]);
                  var cont8 = document.createTextNode(data[i]["estado"]);
                  var cont9 = document.createTextNode('VER DOCUMENTO');
                  var cont10 = document.createTextNode(data[i]["enlace2"]);
                  var cont11 = document.createTextNode(data[i]["mensaje2"]);
                  var cont12 = document.createTextNode(data[i]["hora2"]);
                  var cont13 = document.createTextNode(data[i]["fecha2"]);
                  var cont14 = document.createTextNode(data[i]["responde"]);
                  var cont15 = document.createTextNode(data[i]["prioridad"]);

                  td.appendChild(cont);
                  td2.appendChild(cont2);
                  td3.appendChild(cont3);
                  td4.appendChild(cont4);
                  td5.appendChild(cont5);
                  td6.appendChild(cont6);
                  td7.appendChild(cont7);
                  td8.appendChild(cont8);
                  btn1.appendChild(cont9);
                  td10.appendChild(cont10);
                  td11.appendChild(cont11);
                  td12.appendChild(cont12);
                  td13.appendChild(cont13);
                  td14.appendChild(cont14);
                  td15.appendChild(cont15);


                  tr.appendChild(td);
                  tr.appendChild(td2);
                  tr.appendChild(td3);
                  tr.appendChild(td4);
                  tr.appendChild(td5);
                  tr.appendChild(td6);
                  tr.appendChild(td7);
                  tr.appendChild(td8);
                  tr.appendChild(btn1);
                  tr.appendChild(td10);
                  tr.appendChild(td11);
                  tr.appendChild(td12);
                  tr.appendChild(td13);
                  tr.appendChild(td14);
                  tr.appendChild(td15);


                  tabla.appendChild(tr);
                }

              }

            }
            })


      }


    </script>


    <?php include 'modal1.php'; ?>
    <?php include 'modal2.php'; ?>
    <script src="custom1.js"></script>
    <script src="custom.js"></script>


    <script>

        function visto(ident, enlace)
        {
            ident.disabled = true;
            datos = new FormData()

            var regex = /(\d+)/g;

            var idmensaje = ident.match(regex);

            datos.append("idmensaje", idmensaje[0]);

            fetch('visto.php',{
                method: 'POST',
                body: datos
            })
            .then( res => res.json())
            .then( data => {

            if (data === 'error')
            {
                alert("Error");
            }

            else
            {

                location.href = enlace;
                ident.disabled = false;
            }
            })

        }

    </script>


    <!--   <script src="js/funciones.js"></script>   -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
