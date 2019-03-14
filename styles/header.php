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
                        <a class="dropdown-item" href="">Bandeja</a>
                        <a class="dropdown-item" href="../enviados/">Enviados</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item bd-danger" href="buscador_admin.php" disabled>Buscador</a> <!-- MODIFICAR PARA QUE BUSQUE SOLAMENTE LO DE EL ADMINISTTRADOR  -->
                        <a class="dropdown-item bd-danger" href="rastrea.php" disabled>Compartidos</a> <!-- MODIFICAR PARA QUE RASTREE TOD O LO DE LA DIRECCIÓN -->
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
