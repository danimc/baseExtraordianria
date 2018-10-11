<?
    if ($registro->edadDenunciante == 17)
    {
        $edad1 = "Menor de Edad";
    }
    else
    {
        $edad1 = "Mayor de Edad";
    }
      if ($registro->edadDenunciado == 17)
    {
        $edad2 = "Menor de Edad";
    }
    else
    {
        $edad2 = "Mayor de Edad";
    }


?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Ver
                <small>Registro</small>
            </h1><br>
            <ol class="breadcrumb">
                <li><a href="/index"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li>Ver Registro</li>
            </ol>
            <a href="<?=base_url()?>index.php?/ticket/lista_registros" class="btn btn-app bg-blue"><i class="fa fa-arrow-left"></i>Regresar</a>
        </section>


        <!-- Main content -->
        <section class="content">

            <span id="resultado"></span>

            <div class="row">

                <div class="col-sm-12">
                    <div class="col-md-6">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h4 class="box-tittle"> Información de Registro</h4>
                            </div>
                            <div class="box-body">
                                <h5><strong><i class="fa fa-calendar margin-r-5"></i>Fecha de Recepción: </strong>
                                    <?=$fecha?>
                                </h5>
                                <hr>
                                <h5><strong><i class="fa  fa-arrow-circle-o-right margin-r-5"></i> N° Consecutivo: </strong>
                                    <?=$registro->consecutivo ?>
                                </h5>
                                <hr>
                                <h5><strong><i class="fa fa-file-text-o margin-r-5"></i> Oficio: </strong>
                                    <?=$registro->oficio?>
                                </h5>
                                <hr>
                                <h5><strong><i class="fa fa-user margin-r-5"></i> Remitente:</strong>
                                    <?=$registro->remitente?>
                                </h5>
                                <hr>
                                <h5><strong><i class="fa fa-black-tie margin-r-5"></i>Puesto: </strong>
                                    <?=$registro->puesto?>
                                </h5>
                                <hr>
                                <h5><strong><i class="fa fa-institution margin-r-5"></i> Dependencia: </strong>
                                    <?=$registro->dependencia?>
                                </h5>
                                <hr>

                                <h5><strong><i class="fa  fa-exclamation-circle margin-r-5"></i> Concepto: </strong>
                                    <?=$registro->concepto?>
                                </h5>
                                <hr>
                                <h5><strong><i class="fa  fa-indent margin-r-5"></i> Resumen:</strong>
                                    <?=$registro->asunto?>
                                </h5>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <!--Fin de la carta de datos del solicitante-->


                    <div class="col-md-5">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h4 class="box-tittle"> Datos Denunciante</h4>
                            </div>
                            <div class="box-body">
                                <h5><strong><i class="fa  fa-arrow-circle-o-right margin-r-5"></i> Nombre: </strong>
                                    <?=$registro->denunciante ?>
                                </h5>
                                <hr>
                                <h5><strong><i class="fa fa-file-text-o margin-r-5"></i> Tipo: </strong>
                                    <?=$registro->sujeto1?>
                                </h5>
                                <hr>
                                <h5><strong><i class="fa  fa-arrow-circle-o-right margin-r-5"></i> Sexo: </strong>
                                    <?=$registro->sexo1 ?>
                                </h5>
                                <hr>
                                <h5><strong><i class="fa fa-file-text-o margin-r-5"></i> Edad: </strong>
                                    <?=$edad1?>
                                </h5>
                                <hr>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h4 class="box-tittle"> Datos Denunciado</h4>
                            </div>
                            <div class="box-body">
                                <h5><strong><i class="fa  fa-arrow-circle-o-right margin-r-5"></i> Nombre: </strong>
                                    <?=$registro->denunciado ?>
                                </h5>
                                <hr>
                                <h5><strong><i class="fa fa-file-text-o margin-r-5"></i> Tipo: </strong>
                                    <?=$registro->sujeto2?>
                                </h5>
                                <hr>
                                <h5><strong><i class="fa  fa-arrow-circle-o-right margin-r-5"></i> Sexo: </strong>
                                    <?=$registro->sexo2 ?>
                                </h5>
                                <hr>
                                <h5><strong><i class="fa fa-file-text-o margin-r-5"></i> Edad: </strong>
                                    <?=$edad2?>
                                </h5>
                                <hr>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-tittle"> Seguimiento</h3>
                            </div>
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Colegiados</a></li>
                                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Area Penal</a></li>
                                    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="true">Laboral</a></li>
                                </ul>

    <!--##########################################TABS##################################################################-->                            
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">

                                        <table id="example1" class="table  table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="10px">Oficio</th>
                                                    <th>Fecha/Usuario</th>
                                                    <th>Seguimiento</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 

              foreach ($seguimiento as $mensaje){
                  $fecha = $this->m_ticket->fecha_text($mensaje->fecha);
                  if ($mensaje->dependencia == 5) {                    
                    
                ?>
                                                <tr class="">
                                                    <td>
                                                      <?=$mensaje->oficio?>
                                                    </td>
                                                    <td>
                                                    <?=$fecha?> <br>
                                                    <b><?=$mensaje->usuario?></b>
                                                    </td>
                                                    <td>
                                                        <?=$mensaje->seguimiento?>
                                                    </td>
                                                </tr>

                                                <? }} ?>

                                            </tbody>
                                        </table>

                  <?if($dependencia == 5){?>                      
                    <form name="seguimiento" id="seguimiento" method="POST" action="<?=base_url()?>index.php?/ticket/seguimiento">
                    <textarea id="chat" required name="chat" class="form-control" placeholder="Seguimiento"></textarea>
                    <input type="hidden" name="folio" value="<?=$folio?>">
                    <input type="hidden" name="dependencia" value="<?=$dependencia
                    ?>">
                    <br>
                    <button type="submit" class="btn btn-success"><i class="fa fa-comment"></i> Enviar Mensaje</button>
                  </form>

                  <?}?>

                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">
                                        <table id="example2" class="table  table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="10px">Oficio</th>
                                                    <th>Fecha/Usuario</th>
                                                    <th>Seguimiento</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 

              foreach ($seguimiento as $mensaje){
                  $fecha = $this->m_ticket->fecha_text($mensaje->fecha); 
                  if ($mensaje->dependencia == 8) {       
                ?>
                                                <tr class="">
                                                  <td>
                                                      <?=$mensaje->oficio?>
                                                    </td>
                                                    <td>
                                                        <?=$fecha?> <br>
                                                            <b><?=$mensaje->usuario?></b>
                                                    </td>
                                                    <td>
                                                        <?=$mensaje->seguimiento?>
                                                    </td>
                                                </tr>

                                                <? }} ?>

                                            </tbody>
                                        </table>

                                                          <?if($dependencia == 8){?>                      
                                        <form id="seguimiento" method="POST" action="<?=base_url()?>index.php?/ticket/mensaje">
                                        <textarea id="chat" required name="chat" class="form-control" placeholder="Ingrese su Mensaje"></textarea>
                                        <input type="hidden" name="folio" value="<?=$folio?>">
                                          <input type="hidden" name="dependencia" value="<?=$dependencia
                    ?>">
                                        <br>
                                        <button type="submit" class="btn btn-success"><i class="fa fa-comment"></i> Enviar Mensaje</button>
                                      </form>

                  <?}?>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane " id="tab_3">
                                        <table id="example3" class="table  table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="10px">Oficio</th>
                                                    <th>Fecha/Usuario</th>
                                                    <th>Seguimiento</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 

              foreach ($seguimiento as $mensaje){
                  $fecha = $this->m_ticket->fecha_text($mensaje->fecha);
                   if ($mensaje->dependencia == 7) {        
                ?>
                                                <tr class="">
                                                  <td>
                                                      <?=$mensaje->oficio?>
                                                    </td>
                                                    <td>
                                                        <?=$fecha?> <br>
                                                            <b><?=$mensaje->usuario?></b>
                                                    </td>
                                                    <td>
                                                        <?=$mensaje->seguimiento?>
                                                    </td>
                                                </tr>

                                                <? }} ?>

                                            </tbody>
                                        </table>

                    <?if($dependencia == 7){?>       
                    <hr>               
                    <form  method="POST" action="<?=base_url()?>index.php?/ticket/seguimiento">
                      <div class="col-xs-2">
                        <b>Oficio:</b>
                    <input type="text" class="form-control" name="oficio">
                    </div>
                    <div class="col-xs-10">
                      <b>Registro de Seguimiento:</b>
                    <textarea id="seguimiento" required name="seguimiento" class="form-control" placeholder="Ingrese su Mensaje"></textarea>
                    </div>
                    <input type="hidden" name="folio" value="<?=$folio?>">
                      <input type="hidden" name="dependencia" value="<?=$dependencia
                    ?>">
                    <br>
                    <button type="submit" class="btn btn-success btn-xs-3"><i class="fa fa-comment"></i> Enviar Mensaje</button>
                    </form>

                  <?}?>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div>
                        </div>
                    </div>


                </div>
        </section>






        </div>
        <script>
            $(function() {
                // $("#example1").DataTable();
                $('#example1').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": false,
                    "info": true,
                    "autoWidth": true
                });
            // posible error con la tabla dos

                $( '#example3').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": false,
                    "info": false,
                    "autoWidth": true
                });

            });

        </script>

        <!-- /.content -->

        <!-- /.content-wrapper -->