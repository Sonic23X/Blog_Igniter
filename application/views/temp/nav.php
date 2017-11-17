<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand">PHP ENTERPRISE</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?= base_url()?>">Inicio</a>
                    </li>
                    <li>
                        <a href="<?= base_url()?>Contact">Contáctanos</a>
                    </li>
                    <?php if(!$this->session->userdata('login')){ ?>
                    <li class='dropdown'>
                      <a class='dropdown-toggle' data-toggle='dropdown' style="background: none;">Iniciar Sesión <strong class='caret'></strong></a>
                      <div class='dropdown-menu' style='padding: 10px; padding-bottom: 0px; background: none; width: 400px;'>
                        <form action='<?= base_url()?>Login' method='post' accept-charset='UTF-8' role="form">
                          <div class='form-group'>
                            <input class='form-control large' style='text-align: center;' type='text' name='user' placeholder='usuario'/>
                          </div>
                          <div class='form-group'>
                            <input class='form-control large' style='text-align: center;' type='password' name='password' placeholder='contraseña' />
                          </div>
                          <div class='form-group'>
                            <input class='btn-default form-control' type='submit' value="Iniciar Sesión">
                            <hr>
                            <a name='regis' id='regis' href='<?= base_url()?>Home/registrar' style = "text-decoration: none;">¿No estás registrado?... ¡Registrate!</a>
                          </div>
                          <div>
                            <a> </a>
                          </div>
                          </form>
                      </div>
                    </li>
                    <?php } else { ?>
                        <li class='dropdown'>
                          <a class='dropdown-toggle' data-toggle='dropdown' style="background: none;"><?= $this->session->userdata('usuario')?> <strong class='caret'></strong></a>
                          <div class='dropdown-menu' style='padding: 10px; padding-bottom: 0px; background: #4a7582; width: 200px;'>
                            <div class='form-group'>
                              <a href="<?= base_url()?>Perfil/" style="text-decoration: none;">Perfil</a>
                            </div>
                            <a href="<?= base_url()?>Login/logout" style="text-decoration: none;">Cerrar sesion</a>
                            <hr>
                        </li>
                    <?php }?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
