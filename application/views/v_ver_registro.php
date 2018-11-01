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

                                <h5><strong><i class="fa  fa-exclamation-circle margin-r-5"></i> Conducta: </strong>
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
                                <h4 class="box-tittle"> Datos Victima</h4>
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

    <!--##########################################TABS##################################################################
             ##################################### AREA 1 ###################################################-->                            
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="col-xs-6 " >
                                            <h4 align="left">Seguimiento del Área <b>Organos Colegiados:</b></h4>
                                           </div>
                                           <div class="col-xs-6" align="right">
                                               <button class="btn btn-xs btn-default" data-toggle="modal" data-target="#modalColegiados" title="Asignar"><i class="fa fa-get-pocket "></i> SANCIÓN:  </button>
                                               <?if ($registro->sancionColegiados == null) {?>
                                                  <span class="bg-danger"><b>Sin Definir</b></span>
                                               <?}
                                               else{?>
                                                <span class="bg-red"><b><?=$registro->sancionColegiados?></b></span>
                                                <?}?>
                                           </div>
                                     <br><br><br>
                                <hr class="bg-blue">
       
                             <div id="ex1"></div>           

                            <?
                    //if($dependencia == 5){?> 

                    <div id="alertaC"></div>
                    <form id="frmColegiados">
                    <div class="col-xs-2">
                        <b>Oficio:</b>
                    <input type="text" class="form-control" name="oficio">
                    </div>
                    <div class="col-md-2 form-group">
                        <b>Fecha:</b>
                        <input type="date" class="form-control" name="fecha">
                    </div>
                    <div class="col-xs-8">
                      <b>Registro de Seguimiento:</b>
                    <textarea id="seguimiento" required name="seguimiento" class="form-control" placeholder="Ingrese su Mensaje"></textarea>
                    </div>
                    <input type="hidden" name="folio" value="<?=$folio?>">
                    <input type="hidden" name="dependencia" value="5">
                    <br>
                      </form>
                    <button type="submit" id="btnColegiados" class="btn btn-success"><i class="fa fa-comment"></i> Enviar Mensaje</button>
                

                  <?//}?>

                                      </div>
                                <!-- /.tab-pane -->
          <? #####################################AREA 2 ###################################################  ?>                                
     <div class="tab-pane" id="tab_2">
         <div class="col-xs-6 " >
        <h4 align="left">Seguimiento del <b>Área Penal:</b></h4>
        </div>
        <div class="col-xs-6" align="right">
            <button class="btn btn-xs btn-default" data-toggle="modal" data-target="#modalPenal" title="Asignar"><i class="fa fa-get-pocket "></i> SANCIÓN:  </button>
            <?if ($registro->sancionPenal == null) {?>
                <span class="bg-danger"><b>Sin Definir</b></span>
            <?}
            else{?>
            <span class="bg-red"><b><?=$registro->sancionPenal?></b></span>
            <?}?>
        </div>
           <br><br><br>
            <hr class="bg-blue">
               <div id="ex2"></div> 
                 <div id="alertaP"></div>
                 <form id="frmPenal">
                   <div class="col-xs-2">
                        <b>Oficio:</b>
                        <input type="text" class="form-control" name="oficio">
                    </div>
                    <div class="col-md-2 form-group">
                        <b>Fecha:</b>
                        <input type="date" class="form-control" name="fecha">
                    </div>
                    <div class="col-xs-8">
                      <b>Registro de Seguimiento:</b>
                        <textarea id="seguimiento" required name="seguimiento" class="form-control" placeholder="Ingrese su Mensaje"></textarea>
                    </div>
                    <input type="hidden" name="folio" value="<?=$folio?>">
                    <input type="hidden" name="dependencia" value="8">
                    <br>                    
                    </form>
                    <button type="submit" id="btnPenal" class="btn btn-success"><i class="fa fa-comment"></i> Enviar Mensaje</button>
                  <?//}?>
                    </div>
        <!-- #####################################AREA 3 ###################################################-->
                              

            <div class="tab-pane " id="tab_3">
                <div class="col-xs-6 " >
                <h4 align="left">Seguimiento del <b>Área Laboral:</b></h4>
                </div>
                 <div class="col-xs-6" align="right">
                    <button class="btn btn-xs btn-default" data-toggle="modal" data-target="#modalLaboral" title="Asignar"><i class="fa fa-get-pocket "></i> SANCIÓN:  </button>
                    <?if ($registro->sancionLaboral == null) {?>
                        <span class="bg-danger"><b>Sin Definir</b></span>
                    <?}
                    else{?>
                    <span class="bg-red"><b><?=$registro->sancionLaboral?></b></span>
                    <?}?>
                </div>
            <br><br><br>
            <hr class="bg-blue">

                <div id="ex3"></div>

                    <?//if($dependencia == 7){?>       
                    <hr>   
                    
                    <form  id="frmLaboral">
                      <div class="col-xs-2">
                        <b>Oficio:</b>
                        <input type="text" class="form-control" name="oficio">
                    </div>
                    <div class="col-md-2 form-group">
                        <b>Fecha:</b>
                        <input type="date" class="form-control" name="fecha">
                    </div>
                    <div class="col-xs-8">
                      <b>Registro de Seguimiento:</b>
                    <textarea id="seguimiento" required name="seguimiento" class="form-control" placeholder="Ingrese su Mensaje"></textarea>
                    </div>
                    <input type="hidden" name="folio" value="<?=$folio?>">
                      <input type="hidden" name="dependencia" value="7">
                    <br>                    
                    </form>
                    <button type="submit" id="btnLaboral" class="btn btn-success btn-xs-3"><i class="fa fa-comment"></i> Enviar Mensaje</button>

                  <?//}?>   
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


    <form id="sancionColegiados">
     <div class="modal fade" id="modalColegiados" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-red">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">¡Aplicar Sancion! </h4>
            </div>
            <div class="modal-body">
              <p>Seleccione la Sanción correspondiente de la siguiente lista</p>
                <select name="sancion" class="form-control">
                  <option disabled>Selecciones una Sanción</option>
                  <?
                  foreach ($sanciones as $sancion) {?>
                    <option value="<?=$sancion->id?>"><?=$sancion->nombre?></option>
                           <?}?>         
                </select>
                <input type="hidden" name="dependencia" value="5"><!--ESTO CAMBIARA EN UN FUTURO!-->
                <input type="hidden" name="folio" value="<?=$folio?>">
                </div>
              <div class="modal-footer">
                <button type="button" id="colegiados"   class="btn btn-success" data-dismiss="modal"><i class="fa fa-check"></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i></button>
            </div>
          </div>
        </div>
      </div>
</form>
<!-- ####################################################################################################################-->

 <form id="sancionPenal">
     <div class="modal fade" id="modalPenal" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-red">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">¡Aplicar Sancion! </h4>
            </div>
            <div class="modal-body">
              <p>Seleccione la Sanción correspondiente de la siguiente lista</p>
                <select name="sancion" class="form-control">
                  <option disabled>Selecciones una Sanción</option>
                  <?
                  foreach ($sanciones as $sancion) {?>
                    <option value="<?=$sancion->id?>"><?=$sancion->nombre?></option>
                           <?}?>         
                </select>
                <input type="hidden" name="dependencia" value="8"><!--ESTO CAMBIARA EN UN FUTURO!-->
                <input type="hidden" name="folio" value="<?=$folio?>">
                </div>
              <div class="modal-footer">
                <button type="button" id="penal"   class="btn btn-success" data-dismiss="modal"><i class="fa fa-check"></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i></button>
            </div>
          </div>
        </div>
      </div>
</form>

<!-- ####################################################################################################################-->

 <form id="sancionLaboral">
     <div class="modal fade" id="modalLaboral" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-red">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">¡Aplicar Sancion! </h4>
            </div>
            <div class="modal-body">
              <p>Seleccione la Sanción correspondiente de la siguiente lista</p>
                <select name="sancion" class="form-control">
                  <option disabled>Selecciones una Sanción</option>
                  <?
                  foreach ($sanciones as $sancion) {?>
                    <option value="<?=$sancion->id?>"><?=$sancion->nombre?></option>
                           <?}?>         
                </select>
                <input type="hidden" name="dependencia" value="7"><!--ESTO CAMBIARA EN UN FUTURO!-->
                <input type="hidden" name="folio" value="<?=$folio?>">
                </div>
              <div class="modal-footer">
                <button type="button" id="laboral" class="btn btn-success" data-dismiss="modal"><i class="fa fa-check"></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i></button>
            </div>
          </div>
        </div>
      </div>
</form>


    <script>
     $( function(){
        recargaColegiados();
        recargaPenal();
        recargaLaboral();
     });

    $("#btnColegiados").click(function()
    {
    var formulario = $("#frmColegiados").serializeArray();
    $.ajax({

      type: "POST",
      dataType: 'json',
      url: "<?=base_url()?>index.php?/ticket/seguimiento",
      data: formulario,
        }).done(function(respuesta){
            recargaColegiados();
            $("#alertaC").fadeIn(500);
            $('#alertaC').html(respuesta.mensaje);
            setTimeout(function() {
        $("#alertaC").fadeOut(1500);
    },1000);


       
      });
    });

    //FORM  SEGUIMIENTO PENAL
        $("#btnPenal").click(function()
    {
    var formulario = $("#frmPenal").serializeArray();
    $.ajax({

      type: "POST",
      dataType: 'json',
      url: "<?=base_url()?>index.php?/ticket/seguimiento",
      data: formulario,
        }).done(function(respuesta){
            recargaPenal();
            $("#alertaP").fadeIn(500);
            $('#alertaP').html(respuesta.mensaje);
            setTimeout(function() {
        $("#alertaP").fadeOut(1500);
    },1000);

        });
    });

    // FORM LABORAL

    $("#btnLaboral").click(function()
    {
    var formulario = $("#frmLaboral").serializeArray();
    $.ajax({

      type: "POST",
      dataType: 'json',
      url: "<?=base_url()?>index.php?/ticket/seguimiento",
      data: formulario,
        }).done(function(respuesta){
            recargaLaboral();
            $("#alertaL").fadeIn(500);
            $('#alertaL').html(respuesta.mensaje);
            setTimeout(function() {
        $("#alertaP").fadeOut(1500);
    },1000);

        });
    });


    function recargaColegiados()
    {
    var formulario = $("#frmColegiados").serializeArray();
    $.ajax({  
      type: "POST",
      dataType: 'json',
      url: "<?=base_url()?>index.php?/ticket/obt_seguimiento_colegiados",
      data: formulario,
    }).done(function(respuesta){
     $("#ex1").html(respuesta.mensaje);
     $("#example1").DataTable({
           "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": false,
                    "info": true,
                    "autoWidth": true
            });
        });
    }

    function recargaPenal()
    {
    var formulario = $("#frmPenal").serializeArray();
    $.ajax({  
      type: "POST",
      dataType: 'json',
      url: "<?=base_url()?>index.php?/ticket/obt_seguimiento_penal",
      data: formulario,
    }).done(function(respuesta){
     $("#ex2").html(respuesta.mensaje);
     $("#example2").DataTable({
           "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": false,
                    "info": true,
                    "autoWidth": true
            });
        });
    }


    function recargaLaboral()
    {
    var formulario = $("#frmLaboral").serializeArray();
    $.ajax({  
      type: "POST",
      dataType: 'json',
      url: "<?=base_url()?>index.php?/ticket/obt_seguimiento_laboral",
      data: formulario,
    }).done(function(respuesta){
     $("#ex3").html(respuesta.mensaje);
     $("#example3").DataTable({
           "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": false,
                    "info": true,
                    "autoWidth": true
            });
        });
    }
</script>


<script>
    $("#colegiados").click(function(){
    var formulario = $("#sancionColegiados").serializeArray();
    $.ajax({
      type: "POST",
      dataType: 'json',
      url: "<?=base_url()?>index.php?/ticket/asignar_sancion",
      data: formulario,
    }).done(function(respuesta){
       $("#mensaje").html(respuesta.mensaje);
       if (respuesta.id == 1) {

        setTimeout('document.location.reload()',1000);
       }     
    });
   });

    $("#penal").click(function(){
    var formulario = $("#sancionPenal").serializeArray();
    $.ajax({
      type: "POST",
      dataType: 'json',
      url: "<?=base_url()?>index.php?/ticket/asignar_sancion",
      data: formulario,
    }).done(function(respuesta){
       $("#mensaje").html(respuesta.mensaje);
       if (respuesta.id == 1) {

        setTimeout('document.location.reload()',1000);
       }     
    });
   });

      $("#laboral").click(function(){
    var formulario = $("#sancionLaboral").serializeArray();
    $.ajax({
      type: "POST",
      dataType: 'json',
      url: "<?=base_url()?>index.php?/ticket/asignar_sancion",
      data: formulario,
    }).done(function(respuesta){
       $("#mensaje").html(respuesta.mensaje);
       if (respuesta.id == 1) {

        setTimeout('document.location.reload()',1000);
       }     
    });
   });
        </script>
      

        <!-- /.content -->

        <!-- /.content-wrapper -->
