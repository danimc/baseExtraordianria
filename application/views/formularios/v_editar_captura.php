<script>
function editado(){
        var parametros = {
                "id" : $('#id').val(),
                "consecutivo" : $('#consecutivo').val(),
                "oficio" : $('#oficio').val(),
                "fecha"  : $('#fecha').val(),
                "hora"  : $('#hora').val(),
                "remitente"  : $('#remitente').val(),
                "denunciante"  : $('#denunciante').val(),
                "sujetoDenunciante"  : $('#sujetoDenunciante').val(),
                "edadDenunciante"  : $('#edadDenunciante').val(),
                "sexoDenunciante"  : $('#sexoDenunciante').val(),
                "denunciado"  : $('#denunciado').val(),
                "sujetoDenunciado"  : $('#sujetoDenunciado').val(),
                "edadDenunciado"  : $('#edadDenunciado').val(),
                "sexoDenunciado"  : $('#sexoDenunciado').val(),
                "dependencia"  : $('#dependencia').val(),
                "puesto"  : $('#puesto').val(),
                "concepto"  : $('#concepto').val(),
                "asunto"  : $('#asunto').val(),
                "fecha"  : $('#fecha').val(),

        };
        console.log(parametros);
        $.ajax({
                data:  parametros,
                url:   'index.php?/ticket/edicion_captura',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $('#resultado').html(response);                   
                }
        });
}

function folioPlataforma()
{
     $.ajax({
                //data:  parametros,
                url:   'index.php?/ticket/folio_plataforma',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                   $('#consecutivo').val(response),   
                   $('#oficio').val('PLATAFORMA'),   
                   $("#resultado").html("");       
                }
        });
}
</script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Modificar 
            <small>Captura</small>
        </h1><br>
        <ol class="breadcrumb">
            <li><a href="/index"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li>Modificar Captura</li>
        </ol>
    </section>

       
    <!-- Main content -->
    <section class="content">
            <a href="<?=base_url()?>index.php?/ticket/lista_registros" class="btn btn-app bg-blue"><i class="fa fa-arrow-left"></i>Regresar</a>
        <span id="resultado"></span>
          

            <div class="row">
            <div class="col-sm-12">
               
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-tittle"> Denunciante</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                        <div class="col-sm-2">
                            <h4><i class="fa fa-box"></i>No. Consecutivo: </h4>
                        </div>
                        <div class="form-group col-sm-4">
                            <div class="input-group">
                            <div class="input-group-btn">
                              <button type="button" onclick="folioPlataforma();" class="btn btn-danger">Plataforma</button>
                            </div>
                            <!-- /btn-group -->
                            <input  class="form-control" type="text" value="<?=$registro->consecutivo?>" name="consecutivo" id="consecutivo">
                          </div>                             
                            
                        </div>
                       
                        <div align="right" class="col-sm-2">
                            <h4><i class="fa fa-box"></i>Fecha: </h4>
                        </div>
                        <div align="right" class="form-group col-sm-3">
                            
                            <input required="true" class="form-control" type="date" id="fecha" name="fecha" value="<?=$registro->fecha?>" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <h4><i class="fa fa-box"></i>Oficio No.</h4>
                        </div>
                        <div class="form-group col-sm-4">                            
                        <input required="true" class="form-control" value="<?=$registro->oficio?>" type="text" name="oficio" id="oficio"  placeholder="">
                        </div>
                     
                        <div align="right" class="col-sm-2">
                            <h4><i class="fa fa-box"></i>Hora: </h4>
                        </div>
                        <div align="right" class="form-group col-sm-3">                            
                            <input required="true" value="<?=$registro->hora?>" class="form-control" type="time" name="hora" id="hora" value="" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <h4><i class="fa fa-box"></i>Remitente: </h4>
                        </div>
                        <div class="form-group col-sm-9">                            
                            <input required="true" class="form-control" value="<?=$registro->remitente?>" type="text" name="remitente" id="remitente"  placeholder="">
                        </div>
                    </div>
                        <div class="row">

                         <div class="col-sm-2">
                            <h4><i class="fa fa-box"></i>Puesto: </h4>
                        </div>
                        <div class="form-group col-sm-9">                            
                            <input required="true" class="form-control" value="<?=$registro->puesto?>" type="text" name="puesto" id="puesto" placeholder="">
                        </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-2">
                            <h4><i class="fa fa-box"></i>Dependencia: </h4>
                        </div>
                        <div class="form-group col-sm-9">                            
                        <select class="form-control" name="dependencia" id="dependencia">
                            <option value="<?=$registro->idDependencia?>"> <?=$registro->dependencia?> </option>
                            <? foreach ($centros as $centro) {?>
                                <option value="<?=$centro->id?>"><?=$centro->nombre?></option>
                           <? }?>
                        </select>
                        </div> 
                          </div>  
                </div>
                </div> 
            <div class="col-sm-6">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-tittle"> Victima </h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                         <div class="col-sm-3">
                            <h4><i class="fa fa-box"></i>Nombre: </h4>
                        </div>
                        <div class="form-group col-sm-9">                            
                            <input required="true" class="form-control" value="<?=$registro->denunciante?>" type="text" name="denunciante" id="denunciante"  placeholder="">
                        </div>
                        </div>
                        <div class="row">
                         <div class="col-sm-3">
                            <h4><i class="fa fa-box"></i>Tipo: </h4>
                        </div>
                        <div class="form-group col-sm-7">                            
                            <select class="form-control" id="sujetoDenunciante" name="sujetoDenunciante">
                            <option value="<?=$registro->sujetoDenunciante?>"> <?=$registro->sujeto1?>  </option>
                            <? foreach ($sujetos as $sujeto) {?>
                                <option value="<?=$sujeto->id?>"><?=$sujeto->nombre?></option>
                           <? }?>
                        </select>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-sm-3">
                            <h4><i class="fa fa-box"></i>Edad: </h4>
                        </div>
                        <div class="form-group col-sm-3">                            
                        <select class="form-control" name="edadDenunciante" id="edadDenunciante">
                          <option value="<?=$registro->edadDenunciante?>"><?=$registro->edadDenunciante?></option>  
                          <option value="17">Menor de Edad</option>
                          <option value="18"> +18 </option>
                        </select>
                        </div>
                           <div class="col-sm-2">
                            <h4><i class="fa fa-box"></i>Sexo: </h4>
                        </div>
                        <div class="form-group col-sm-4">                            
                        <select class="form-control" id="sexoDenunciante" name="sexoDenunciante">
                            <option value="<?=$registro->sexoDenunciante?>"><?=$registro->sexo1?></option>
                             <? foreach ($sexo as $s) {?>
                                <option value="<?=$s->id?>"><?=$s->nombre?></option>
                           <? }?>
                        </select>
                        </div> 
                        </div>  
 
                        </div>
                    </div>
                </div> 
              

                <div class="col-sm-6">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-tittle"> Denunciado </h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                        <div class="col-sm-3">
                            <h4><i class="fa fa-box"></i>Nombre: </h4>
                        </div>
                        <div class="form-group col-sm-9">                            
                            <input required="true" class="form-control" value="<?=$registro->denunciado?>" type="text" id="denunciado" name="denunciado"  placeholder="">
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-sm-3">
                            <h4><i class="fa fa-box"></i>Tipo: </h4>
                        </div>
                        <div class="form-group col-sm-7">                            
                            <select class="form-control" name="sujetoDenunciado" id="sujetoDenunciado">
                            <option value="<?=$registro->sujetoDenunciado?>"> <?=$registro->sujeto2?>  </option>
                            <? foreach ($sujetos as $sujeto) {?>
                                <option value="<?=$sujeto->id?>"><?=$sujeto->nombre?></option>
                           <? }?>
                        </select>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-sm-3">
                            <h4><i class="fa fa-box"></i>Edad: </h4>
                        </div>
                            <div class="form-group col-sm-3">                            
                                <select class="form-control" id="edadDenunciado" id="edadDenunciado" name="edadDenunciado">
                                    <option value="<?=$registro->edadDenunciado?>"><?=$registro->edadDenunciado?></option>  
                                    <option value="17">Menor de Edad</option>
                                    <option value="18"> +18 </option>
                                </select>
                            </div>  

                            <div class="col-sm-2">
                                <h4><i class="fa fa-box"></i>Sexo: </h4>
                            </div>
                                <div class="form-group col-sm-4">                            
                                <select class="form-control" id="sexoDenunciado" name="sexoDenunciado">
                                    <option value="<?=$registro->sexoDenunciado?>"><?=$registro->sexo2?></option>
                                 <? foreach ($sexo as $s) {?>
                                    <option value="<?=$s->id?>"><?=$s->nombre?></option>
                               <? }?>
                                </select>
                                </div>   
                             </div>
                            </div>
                        </div>
                    </div>                

            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="box box-success">
                   
                    <div class="box-body"> 
                    <!-- /.box-header -->
                        <div class="col-sm-3">
                            <h4><i class="fa fa-box"></i>Conducta: </h4>
                        </div>
                        <div class="form-group col-sm-7">                            
                            <select class="form-control" id="concepto" name="concepto">
                            <option value="<?=$registro->idConcepto?>"><?=$registro->concepto?> </option>
                            <? foreach ($conceptos as $concepto) {?>
                                <option value="<?=$concepto->id?>"><?=$concepto->nombre?></option>
                           <? }?>
                        </select>
                        </div>

                        <input type="hidden" value="<?=$folio?>" id="id" name="id">

                     <div class="col-sm-3">
                            <h4><i class="fa fa-box"></i>Resumen: </h4>
                        </div>
                        <div class="box-body pad col-sm-8">
                            <textarea  required="true" class="textarea" id="asunto" name="asunto" placeholder="Escriba aqui todos los detalles del incidente" style="width: 100%; height: 100px; font-size: 14px; line-height: 20px; border: 1px solid #dddddd; padding: 10px;"><?=$registro->asunto?></textarea>
                                <div class="form-group">
                                    <hr>
                                    <button  id="btn" onclick="editado()" type="submit" class="btn btn-success">
                                            <i class="fa fa-save"></i>
                                            Editar Captura</button>
                             
                                    <a class="btn btn-danger" href="/base">Cancelar</a>
                                    
                                </div>
                        </div>
                      </div>  
                </div>
                </div>
            </div>
            </div>
            </section>
            </div>

            

 <div class="modal fade" id="cerrar" role="dialog">
        <div class="modal-dialog col-sm">
          <div class="modal-content">
            <div class="modal-body">
              <div class="icon" align="center">
                <i class="fa fa-spinner fa-spin" style="font-size:80px;"></i>
              </div>  

              <h4 align="center">Generando Ticket de Servicio...</h4>
              </div>
            
          </div>
        </div>
      </div>

      </div>

<!-- /.content -->

<!-- /.content-wrapper -->
 