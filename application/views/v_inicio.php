 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <!-- Content Header (Page header) -->
    <section class="content-header">
            <h1>
              Panel de control
              <small>Pagina principal</small>
            </h1><br>
              <ol class="breadcrumb">
               <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              </ol>
    </section>

          <!-- Main content -->
    <section class="content">
           <?
             $accesoActivos = $this->m_seguridad->acceso_modulo(1);
             if ($accesoActivos != 0) {
            ?>
                  
            <a href="<?=base_url()?>index.php?/ticket/nuevo_registro">
              <div class="col-md-3 col-sm-6 col-xs-12">           
                <div class="info-box bg-orange-active">
                  <span class="info-box-icon"><i class="fa fa-ticket"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-number">Registro Nuevo</span>
                    <!-- The progress section is optional -->
                    <div class="progress">
                      <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">
                      Nuevo Registro en la Base de Datos
                    </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div>
            </a>
            <?}?>

                        <a href="<?=base_url()?>index.php?/ticket/lista_registros">
              <div class="col-md-3 col-sm-6 col-xs-12">           
                <div class="info-box bg-blue-active">
                  <span class="info-box-icon"><i class="fa fa-list"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-number">Lista de Registros</span>
                    <!-- The progress section is optional -->
                    <div class="progress">
                      <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">
                      revisa todos los registros
                    </span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div>
            </a>

          
          </section>
        </div>

