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
      <div class="row">
           <?
             $accesoActivos = $this->m_seguridad->acceso_modulo(1);
             if ($accesoActivos != 0) {
            ?>
                  
            <a href="<?=base_url()?>index.php?/base/nuevo_registro">
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

            <a href="<?=base_url()?>index.php?/base/lista_registros">
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
          </div>
          <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Registros por Conducta</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-wrench"></i></button>
                  
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong>REGISTROS CAPTURADOS 2018</strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="myChart" height="300" ></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center">
                    <strong>Numerico</strong>
                  </p>
                  <?
                  foreach ($conductas as $conducta) {?>
                 
              
                  <div class="progress-group col-md-6">
                    <span class="progress-text"><?=$conducta->nombre?>:</span>
                    <span class="progress-number"><b><?=$conducta->contador?></b></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 100%"></div>
                    </div>
                  </div>
                <? } ?>
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 col-xs-6">
                  <div class="description-block border-right">
                    
                    <h5 class="description-header">TOTAL DE REGISTROS CAPTURADOS</h5>
                    <span class="description-text"><?=$totalRegistros?></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-xs-6">
                  <div class="description-block border-right">
                    
                    <h5 class="description-header">REGISTROS CLASIFICADOS</h5>
                    <span class="description-text"><?=$una?></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-xs-6">
                  <div class="description-block border-right">
               
                    <h5 class="description-header">REGISTROS POR CLASIFICAR</h5>
                    <span class="description-text"><?=$multiple?></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
         
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
      </div>
     </section>

 
</div>
<script>
var conceptos = <?=$conceptos?>;
var datos = <?=$contador?>;
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: conceptos,
        datasets: [{
            label: '# de registros',
            data: datos,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(25, 159, 64, 0.2)',
                'rgba(255, 15, 164, 0.2)',
                'rgba(100, 150, 50, 0.2)',
                'rgba(100, 50, 100, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(25, 159, 64, 1)',
                'rgba(255, 15, 164, 1)',
                'rgba(100, 150, 50, 1)',
                'rgba(100, 50, 100, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>