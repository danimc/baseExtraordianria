<?
    if ($registro->edadDenunciante == 17) {
        $edad1 = "Menor de Edad";
    }
    else {
        $edad1 = "Mayor de Edad";
    }
      if ($registro->edadDenunciado == 17) {
        $edad2 = "Menor de Edad";
    }
    else {
        $edad2 = "Mayor de Edad";
    }
    
    if($dependencia == 5) {
        $bc = "false";
        }
    else {
        $bc = "true";
        } 
    if($dependencia == 8) {
        $bp = "false";
        }
    else {
        $bp = "true";
        }  
    if($dependencia == 7) {
        $bl = "false";
        }
    else {
        $bl = "true";
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
            <a href="<?=base_url()?>index.php?/base/lista_registros" class="btn btn-app bg-blue"><i class="fa fa-arrow-left"></i>Regresar</a>
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
                                <strong><i class="fa fa-calendar margin-r-5"></i>Fecha de Recepción: </strong>
                                    <?=$fecha?>
                                    <hr>
                                <strong><i class="fa  fa-arrow-circle-o-right margin-r-5"></i> N° Consecutivo: </strong>
                                    <?=$registro->consecutivo ?>
                                
                                <hr>
                                <strong><i class="fa fa-file-text-o margin-r-5"></i> Oficio: </strong>
                                    <?=$registro->oficio?>
                                
                                <hr>
                                <strong><i class="fa fa-user margin-r-5"></i> Remitente:</strong>
                                    <?=$registro->remitente?>
                                
                                <hr>
                                <strong><i class="fa fa-black-tie margin-r-5"></i>Puesto: </strong>
                                    <?=$registro->puesto?>
                                
                                <hr>
                                <strong><i class="fa fa-institution margin-r-5"></i> Dependencia: </strong>
                                    <?=$registro->dependencia?>
                                
                                <hr>
                                <a href="#" data-toggle="modal" data-target="#conducta""><span class="pull-right badge bg-blue"><i class="fa fa-pencil"></i> Asignar conducta</span></a>
                                <strong><i class="fa  fa-exclamation-circle margin-r-5"></i> Conducta: </strong>
                                    <?=$registro->concepto?>                                
                                <hr>
                                <a href="#" data-toggle="modal" data-target="#conducta""><span class="pull-right badge bg-red"><i class="fa fa-pencil"></i> Capturar</span></a>
                                <strong><i class="fa  fa-indent margin-r-5"></i> Resumen:</strong>
                                    <?=$registro->asunto?>
                                
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
                                <strong><i class="fa  fa-arrow-circle-o-right margin-r-5"></i> Nombre: </strong>
                                    <?=$registro->denunciante ?>
                                
                                <hr>
                               <strong><i class="fa fa-file-text-o margin-r-5"></i> Tipo: </strong>
                                    <?=$registro->sujeto1?>
                                
                                <hr>
                                <strong><i class="fa  fa-arrow-circle-o-right margin-r-5"></i> Sexo: </strong>
                                    <?=$registro->sexo1 ?>
                                
                                <hr>
                                <strong><i class="fa fa-file-text-o margin-r-5"></i> Edad: </strong>
                                    <?=$edad1?>                                
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
                               <strong><i class="fa  fa-arrow-circle-o-right margin-r-5"></i> Nombre: </strong>
                                    <?=$registro->denunciado ?>
                                
                                <hr>
                                <strong><i class="fa fa-file-text-o margin-r-5"></i> Tipo: </strong>
                                    <?=$registro->sujeto2?>
                                
                                <hr>
                                <strong><i class="fa  fa-arrow-circle-o-right margin-r-5"></i> Sexo: </strong>
                                    <?=$registro->sexo2 ?>                                
                                <hr>
                                <strong><i class="fa fa-file-text-o margin-r-5"></i> Edad: </strong>
                                <hr>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h4 class="box-tittle"> PANEL ORGANOS COLEGIADOS </h4>
                            </div>
                            <div class="box-body">
                                <table class="table">
                                <td> <strong><i class="fa  fa-arrow-circle-o-right margin-r-5"></i> Expediente: </strong>
                                    CUCI/RECT/0981/2018
                                </td>
                                <td>
                                     <strong><i class="fa  fa-arrow-circle-o-right margin-r-5"></i> Acta:</strong> 200215 
                                </td>
                                <tr>
                                <td colspan="2">
                                    <a href="#" data-toggle="modal" data-target="#modalColegiados"><span class="pull-right badge bg-navy"><i class="fa fa-pencil"></i> Cambiar</span></a>
                                     <strong><i class="fa  fa-info margin-r-5"></i> Estado Actual:</strong>
                                        <?=$registro->asunto?>
                                    <span class=""> <?=$registro->sancionColegiados?></span>
                                </td>
                                   <!--  <td>
                                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Fecha de Presentacion: </strong>
                                    <br> 12 de Febrero 2018 
                                    </td>
                                    <td class="bg-gray">
                                          <strong><i class="fa fa-file-text-o margin-r-5"></i> Fecha acta circunstanciada: </strong>
                                    <br> 12 de Febrero 2018 
                                    </td>
                                    <tr>
                                    
                                    <td class="bg-gray">
                                          <strong><i class="fa fa-file-text-o margin-r-5"></i> Fecha citatorio: </strong>
                                    <br> 12 de Febrero 2018 
                                    </td>  
                                    <td class="">
                                          <strong><i class="fa fa-file-text-o margin-r-5"></i> Forma citatorio: </strong>
                                    <br> Eléctronico
                                    </td>  
                                    <tr>
                                    <td colspan="2" class="">
                                          <strong><i class="fa fa-file-text-o margin-r-5"></i> Medida cautelar: </strong> Eléctronico
                                    </td> 
                                    <tr>
                                                                      <td class="">
                                          <strong><i class="fa fa-file-text-o margin-r-5"></i> Fecha acta administrativa: </strong>
                                    <br> 12 de Febrero 2018 
                                    </td>  
                                    <td class="bg-gray">
                                          <strong><i class="fa fa-file-text-o margin-r-5"></i> Fecha resolución: </strong>
                                    <br> Eléctronico
                                    </td> 
                                    <tr>
                                    
                                    <td class="bg-gray">
                                          <strong><i class="fa fa-file-text-o margin-r-5"></i> Fecha notificación: </strong>
                                    <br> 12 de Febrero 2018 
                                    </td>  
                                    <td class="">
                                          <strong><i class="fa fa-file-text-o margin-r-5"></i> Forma notificación: </strong>
                                    <br> Eléctronico
                                    </td>                         -->       
                                </table> 
                              
                                <hr>
                        </div>
                    </div>
                </div>

                    <div class="col-md-6">
                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <h4 class="box-tittle"> PANEL LABORAL </h4>
                            </div>
                            <div class="box-body">
                                <table class="table">
                                <td> <strong><i class="fa  fa-arrow-circle-o-right margin-r-5"></i> Expediente: </strong>
                                    CUCI/RECT/0981/2018
                                </td>
                                <td>
                                     <strong><i class="fa  fa-arrow-circle-o-right margin-r-5"></i> Acta:</strong> 200215 
                                </td>
                                <tr>
                                <td colspan="2">
                                    <a href="#" data-toggle="modal" data-target="#modalLaboral"><span class="pull-right badge bg-navy"><i class="fa fa-pencil"></i> Cambiar</span></a>
                                     <strong><i class="fa  fa-info margin-r-5"></i> Estado Actual:</strong>
                                        <?=$registro->asunto?>
                                    <span class=""> <?=$registro->sancionLaboral?></span>
                                </td>           
                                </table> 
                              
                                <hr>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h4 class="box-tittle"> PANEL ÁREA PENAL </h4>
                            </div>
                            <div class="box-body">
                                <table class="table">
                                <td>
                                 <strong><i class="fa  fa-arrow-circle-o-right margin-r-5"></i> Expediente: </strong>
                                    CUCI/RECT/0981/2018
                                </td>
                                <td>
                                     <strong><i class="fa  fa-arrow-circle-o-right margin-r-5"></i> Acta:</strong> 200215 
                                </td>
                                <tr>
                              
                                <td colspan="2">
                                    <a href="#" data-toggle="modal" data-target="#modalPenal"><span class="pull-right badge bg-navy"><i class="fa fa-pencil"></i> Cambiar</span></a>
                                     <strong><i class="fa  fa-info margin-r-5"></i> Estado Actual:</strong>
                                        <?=$registro->asunto?>
                                    <span class=""> <?=$registro->sancionPenal?></span>
                                </td>                                    
                                </table> 
                              
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
                                    <li class="active"><a href="#tab_0" data-toggle="tab" aria-expanded="false"><b>Resumen General</b> </a></li>
                                    <li class="info"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Organos Colegiados</a></li>
                                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Area Penal</a></li>
                                    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="true">Unidad Laboral</a></li>
                                </ul>

    <!--##########################################TABS##################################################################
             ##################################### SEGUIMIENTO GENERAL ###################################################-->
       

                <div class="tab-content">
                    <div class="tab-pane active" id="tab_0">
                        <div class="col-xs-6 " >
                            <h4 align="left"><b>SEGUIMIENTO GENERAL:</b></h4>
                    </div>
                    <div class="col-xs-6" align="right">
            
                    </div>
                                     <br><br><br>
                     <hr class="bg-blue">
       
                    <div id="ex0"></div>           

                            <?
                    if($dependencia == 5 || $dependencia == 8 || $dependencia == 7 || $dependencia == 1){?> 

                    <div id="alertaG"></div>
                    <form id="frmGeneral">
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
                    <input type="hidden" name="dependencia" value="<?=$dependencia?>">
                    <br>
                      </form>
                    <button type="submit" id="btnGeneral" class="btn btn-success"><i class="fa fa-comment"></i> Capturar Seguimiento</button>
                

                  <?}?>

                     </div>
    <!--------------------------------------------------------- AREA COLEGIADOS ------------------------------------------------->

                    <div class="tab-pane" id="tab_1">
                        <div class="col-xs-12 " >
                            <h4 align="left">Seguimiento del Área <b>Organos Colegiados:</b></h4>
                        </div>
                        <br><br><br>
                    <div class="row btn-default">
                        <div class="col-md-6">
                            <form id="frmCronosCol">
                                <div class="col-md-4 form-group">
                                    <label>Acciones:</label>
                                    <select class="form-control" name="seguimiento">
                                     <?
                                    foreach ($cronos as $crono) {?>
                                        <option value="<?=$crono->id?>"><?=$crono->nombre?></option>
                                    <?
                                    } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Fecha:</label>
                                    <input class="form-control" type="date" name="fecha">                                    
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Forma de entrega:</label>
                                    <select name="forma" class="form-control">
                                        <option value="0" selected="true"></option>
                                     <?
                                    foreach ($formatos as $formas) {?>
                                        <option value="<?=$formas->id?>"><?=$formas->nombre?></option>
                                    <?
                                    } ?>  
                                    </select>

                                    <input type="hidden" name="dependencia" value="5">
                                    <input type="hidden" name="folio" value="<?=$folio?>">

                                </div>
                                </form>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success form-control" name="btnCronCol" id="btnCronCol"><i class="fa fa-save"></i> <b>Registrar cambio</b></button>
                                </div>
                            
                            
                            <br><br>
                        </div>
                        <div class="col-md-6">
                           <!-- <h4>Historial:</h4> <br>
                            <p><b>Fecha de presentacion: </b> <?=$histCol->f_presentacion?></p>
                            <p><b>Fecha de Acta Circunstanciada: </b> <?=$histCol->f_circunstanciada?> </p>
                            <p><b>Fecha de Citatorio: </b> <?=$histCol->f_citatorio?> </p>
                            <p><b>Fecha de Acta Administrativa:</b> <?=$histCol->f_administrativa?> </p>
                            <p><b>Fecha de Resolución: </b> <?=$histCol->f_resolucion?></p>
                            <p><b>Fecha de Notificación:</b> <?=$histCol->f_notificacion?> </p>
                            -->
                        </div>

                    </div>

       
                <div id="ex1"></div>           

                            <?
                    if($dependencia == 5){?> 

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
                    <button type="submit" id="btnColegiados" class="btn btn-success"><i class="fa fa-comment"></i> Capturar Seguimiento</button>
                

                  <?}?>

            </div>
                                <!-- /.tab-pane -->
          <!-- #####################################AREA 2 PENAL###################################################  -->
                                   
     <div class="tab-pane" id="tab_2">
         <div class="col-xs-6 " >
        <h4 align="left">Seguimiento del <b>Área Penal:</b></h4>
        </div>
        <div class="col-xs-6" align="right">
            <button disabled="<?=$bp?>" class="btn btn-xs btn-default" data-toggle="modal" data-target="#modalPenal" title="Asignar"><i class="fa fa-get-pocket "></i> ESTATUS:  </button>
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
                <?
                    if($dependencia == 8){?> 

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
                    <button type="submit" id="btnPenal" class="btn btn-success"><i class="fa fa-comment"></i> Capturar Seguimiento</button>
                  <?}?>
                    </div>
        <!-- #####################################AREA 3 LABORAL ###################################################-->
              

            <div class="tab-pane " id="tab_3">
                <div class="col-xs-6 " >
                <h4 align="left">Seguimiento del <b>Área Laboral:</b></h4>
                </div>
                 <div class="col-xs-6" align="right">
                    <button disabled="<?=$bl?>" class="btn btn-xs btn-default" data-toggle="modal" data-target="#modalLaboral" title="Asignar"><i class="fa fa-get-pocket "></i> ESTATUS:  </button>
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

                    <?if($dependencia == 7){?>       
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
                    <button type="submit" id="btnLaboral" class="btn btn-success btn-xs-3"><i class="fa fa-comment"></i> Capturar Seguimiento</button>

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

<!-- ############################# Modal para asignar Conducta ###############################################--->
    <form id="frmConducta">
     <div class="modal fade" id="conducta" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-red">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">¡Asignar Conducta! </h4>
            </div>
            <div class="modal-body">
              <p>Seleccione la conducta correspondiente:</p>
                <select name="conducta" class="form-control">
                  <option disabled>Selecciones una Conducta</option>
                  <?
                  foreach ($conductas as $conducta) {?>
                    <option value="<?=$conducta->id?>"><?=$conducta->nombre?></option>
                           <?}?>         
                </select>
                <input type="hidden" name="dependencia" value="<?=$dependencia?>">
                <input type="hidden" name="folio" value="<?=$folio?>">
                </div>
              <div class="modal-footer">
                <button type="button" id="btnConducta" class="btn btn-success" data-dismiss="conducta"><i class="fa fa-check"></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="conducta"><i class="fa fa-close"></i></button>
            </div>
          </div>
        </div>
      </div>
</form>

<!--##################################################################################################################-->
    <form id="sancionColegiados">
     <div class="modal fade" id="modalColegiados" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-red">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">¡Aplicar Estatus! </h4>
            </div>
            <div class="modal-body">
              <p>Seleccione el Estatus correspondiente de la siguiente lista</p>
                <select name="sancion" class="form-control">
                  <option disabled>Selecciones un Estatus</option>
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
              <h4 class="modal-title">¡Aplicar Estatus! </h4>
            </div>
            <div class="modal-body">
              <p>Seleccione el Estatus correspondiente de la siguiente lista</p>
                <select name="sancion" class="form-control">
                  <option disabled>Selecciones un Estatus</option>
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
              <h4 class="modal-title">¡Aplicar Estatus! </h4>
            </div>
            <div class="modal-body">
              <p>Seleccione el Estatus correspondiente de la siguiente lista</p>
                <select name="sancion" class="form-control">
                  <option disabled>Selecciones un Estatus</option>
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
        recargaGeneral();
        recargaColegiados();
        recargaPenal();
        recargaLaboral();
     });

    $("#btnGeneral").click(function()
    {
    var formulario = $("#frmGeneral").serializeArray();
    $.ajax({

      type: "POST",
      dataType: 'json',
      url: "<?=base_url()?>index.php?/base/seguimiento",
      data: formulario,
        }).done(function(respuesta){
            recargaGeneral();
            $("#alertaC").fadeIn(500);
            $('#alertaC').html(respuesta.mensaje);
            setTimeout(function() {
        $("#alertaC").fadeOut(500);
    },1000);

      });
    });

    //btn para asignar conductas

    $("#btnConducta").click(function()
    {
    var formulario = $("#frmConducta").serializeArray();
    $.ajax({

      type: "POST",
      dataType: 'json',
      url: "<?=base_url()?>index.php?/base/asignar_conducta",
      data: formulario,
        }).done(function(respuesta){

            if(respuesta == 1) {
                var btn = "<i class='fa fa-check '></i> Conducta Asignada :)";
                document.getElementById('btnConducta').innerHTML = btn;
                setTimeout('document.location.reload()',1000);
            }
            else {
                var btn = "<i class='fa fa-warning '></i> Por favor Seleccione otra :(";
                document.getElementById('btnConducta').innerHTML = btn;
            }
       
      });
    });


     //FORM SEGUIMIENTO COLEGIADOS
    $("#btnColegiados").click(function()
    {
    var formulario = $("#frmColegiados").serializeArray();
    $.ajax({

      type: "POST",
      dataType: 'json',
      url: "<?=base_url()?>index.php?/base/seguimiento",
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
      url: "<?=base_url()?>index.php?/base/seguimiento",
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
      url: "<?=base_url()?>index.php?/base/seguimiento",
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

     function recargaGeneral()
    {
    var formulario = { 
        "folio" : <?=$folio?> 
    };
    console.log(formulario)
    $.ajax({  
      type: "POST",
      dataType: 'json',
      url: "<?=base_url()?>index.php?/base/obt_seguimiento_general",
      data: formulario,
    }).done(function(respuesta){
     $("#ex0").html(respuesta.mensaje);
     $("#example0").DataTable({
           "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": false,
                    "info": true,
                    "autoWidth": true
            });
        });
    }

    function recargaColegiados()
    {
    var formulario = { 
        "folio" : <?=$folio?> 
    };
    console.log(formulario)
    $.ajax({  
      type: "POST",
      dataType: 'json',
      url: "<?=base_url()?>index.php?/base/obt_seguimiento_colegiados",
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
       var formulario = { 
        "folio" : <?=$folio?> 
    };
    $.ajax({  
      type: "POST",
      dataType: 'json',
      url: "<?=base_url()?>index.php?/base/obt_seguimiento_penal",
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
       var formulario = { 
        "folio" : <?=$folio?> 
    };
    $.ajax({  
      type: "POST",
      dataType: 'json',
      url: "<?=base_url()?>index.php?/base/obt_seguimiento_laboral",
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

<!-- ===================================SCRIPTS PARA EL SEGUIMIENTO CRONOLOGICO =========================-->
<script>
    $("#btnCronCol").click(function()
    {
    var formulario = $("#frmCronosCol").serializeArray();
    $.ajax({
     type: "POST",
      dataType: 'json',
      url: "<?=base_url()?>index.php?/base/seguimientoCron",
      data: formulario,
        }).done(function(respuesta){
            recargaColegiados();
            recargaGeneral();
            console.log(respuesta);
           // $("#alertaP").fadeIn(500);
            //$('#alertaP').html(respuesta.mensaje);
        });
    });
</script>


<script>
    $("#colegiados").click(function(){
    var formulario = $("#sancionColegiados").serializeArray();
    $.ajax({
      type: "POST",
      dataType: 'json',
      url: "<?=base_url()?>index.php?/base/asignar_sancion",
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
      url: "<?=base_url()?>index.php?/base/asignar_sancion",
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
      url: "<?=base_url()?>index.php?/base/asignar_sancion",
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
