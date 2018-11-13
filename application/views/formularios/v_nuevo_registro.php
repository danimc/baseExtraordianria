  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script type="text/javascript">

    $( function(){
        var remi = <?=$remitentes?>;
        var victima = <?=$victimas?>;
        var denunciado = <?=$denunciados?>;
        var puesto = <?=$puestos?>;
        $("#remitente").autocomplete({
            source: remi
        });
        $("#denunciante").autocomplete({
            source: victima
        });
        $("#denunciado").autocomplete({
            source: denunciado
        });
        $("#puesto").autocomplete({
            source: puesto
        });
    });
    </script>

<script>
function registro(){
        var parametros = {
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
               // "concepto"  : $('#concepto').val(),
               // "asunto"  : $('#asunto').val(),
                "fecha"  : $('#fecha').val(),

        };
        console.log(parametros);
        $.ajax({
                data:  parametros,
                url:   'index.php?/ticket/registro',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                    $('#consecutivo').val('');
                    $('#oficio').val(''),
                   // $('#fecha').val(''),
                   // $('#hora').val(''),
                    $('#remitente').val(''),
                    $('#denunciante').val(''),
                    $('#sujetoDenunciante').val(''),
                  //  $('#edadDenunciante').val(''),
                  //  $('#sexoDenunciante').val(''),
                    $('#denunciado').val(''),
                    $('#sujetoDenunciado').val(''),
                  //  $('#edadDenunciado').val(''),
                  //  $('#sexoDenunciado').val(''),
                    $('#dependencia').val(''),
                    $('#puesto').val(''),
                    $('#concepto').val(''),
                    $('#asunto').val(''),

                    setTimeout('document.location.reload()',1000);                    
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
                      //  $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                   $('#consecutivo').val(response),   
                   $('#oficio').val('PLATAFORMA');                        
                }
        });
}
</script>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Nuevo
            <small>Registro</small>
        </h1><br>
        <ol class="breadcrumb">
            <li><a href="/index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Nuevo Registro</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <span id="resultado"></span>
          
          <div class="row">

            <div class="col-sm-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-tittle"> Denunciante </h3>

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
                            <input  class="form-control" type="text" name="consecutivo" id="consecutivo" placeholder="">
                          </div>  
                        </div>
                  
                        <div align="" class="col-sm-2">
                            <h4><i class="fa fa-box"></i>Fecha:</h4>
                        </div>

                            <div align="" class="form-group col-sm-4">                            
                                <input required="true" class="form-control" type="date" id="fecha" name="fecha" value="<?=$fecha?>" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-sm-2">
                                <h4><i class="fa fa-box"></i>Oficio No.</h4>
                            </div>
                            <div class="form-group col-sm-4">                            
                            <input required="true" class="form-control" type="text" name="oficio" id="oficio"  placeholder="">
                            </div>
                            <div align="" class="col-sm-2">
                                <h4><i class="fa fa-box"></i>Hora: </h4>
                            </div>
                            <div align="" class="form-group col-sm-4">                            
                                <input required="true" class="form-control" type="time" name="hora" id="hora" value="" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <h4><i class="fa fa-box"></i>Remitente: </h4>
                            </div>
                            <div class="form-group col-sm-10">                            
                                <input required="true" class="form-control" type="text" name="remitente" id="remitente"  placeholder="">
                            </div>
                        </div>
                        <div class="row">
                         <div class="col-sm-2">
                            <h4><i class="fa fa-box"></i>Puesto: </h4>
                        </div>
                        <div class="form-group col-sm-10">                            
                            <input required="true" class="form-control" type="text" name="puesto" id="puesto" placeholder="">
                        </div>
                    </div>
                       <div class="row">

                           <div class="col-sm-2">
                            <h4><i class="fa fa-box"></i>Dependencia: </h4>
                        </div>
                        <div class="form-group col-sm-10">                            
                        <select class="form-control js-example-basic-single" name="dependencia" id="dependencia">
                            <option value="0"> </option>
                            <? foreach ($centros as $centro) {?>
                                <option value="<?=$centro->id?>"><?=$centro->nombre?></option>
                           <? }?>
                        </select>
                        </div>  

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
                            <h4><i class="fa fa-box"></i>Nombre:</h4>
                        </div>
                        <div class="form-group col-sm-9">                            
                            <input required="true" class="form-control" type="text" name="denunciante" id="denunciante"  placeholder="">
                        </div>
                    </div>
                       <div class="row">
                         <div class="col-sm-3">
                            <h4><i class="fa fa-box"></i>Tipo: </h4>
                        </div>
                        <div class="form-group col-sm-7">                            
                            <select class="form-control" id="sujetoDenunciante" name="sujetoDenunciante">
                            <option value="0"> </option>
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
                          <option value="17">Menor de Edad</option>
                          <option value="18"> +18 </option>
                        </select>
                        </div>
                           <div class="col-sm-2">
                            <h4><i class="fa fa-box"></i>Sexo: </h4>
                        </div>
                        <div class="form-group col-sm-4">                            
                        <select class="form-control" id="sexoDenunciante" name="sexoDenunciante">
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
                            <input required="true" class="form-control" type="text" id="denunciado" name="denunciado"  placeholder="">
                        </div>
                        </div>
                     <div class="row">
                         <div class="col-sm-3">
                            <h4><i class="fa fa-box"></i>Tipo: </h4>
                        </div>
                        <div class="form-group col-sm-7">                            
                            <select class="form-control" name="sujetoDenunciado" id="sujetoDenunciado">
                            <option value="0"> </option>
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
                            <option value="17">Menor de Edad</option>
                            <option value="18" selected=""> +18 </option>
                        </select>
                        </div>  

                        <div class="col-sm-2">
                            <h4><i class="fa fa-box"></i>Sexo: </h4>
                        </div>
                        <div class="form-group col-sm-4">                            
                        <select class="form-control" id="sexoDenunciado" name="sexoDenunciado">
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
        <div class="col-sm-10" align="center">
                <div align="" class="box box-success">
                   
                    <div class="box-body"> 
                    <!-- /.box-header -->
                       <!-- 
                        <div class="col-sm-3">
                            <h4><i class="fa fa-box"></i>Conducta: </h4>
                        </div>
                     <div class="form-group col-sm-7">                            
                            <select class="js-example-basic-multiple form-control" id="concepto" name="concepto" multiple="multiple" >
                            <option value="0"> </option>
                            <? foreach ($conceptos as $concepto) {?>
                                <option value="<?=$concepto->id?>"><?=$concepto->nombre?></option>
                           <? }?>
                        </select>
                 
                        </div> --

                     <div class="col-sm-3">
                            <h4><i class="fa fa-box"></i>Resumen: </h4>
                        </div>
                    <div class="box-body pad col-sm-8">
                        <textarea  required="true" class="textarea" id="asunto" name="asunto" placeholder="Escriba aqui todos los detalles del incidente" style="width: 100%; height: 100px; font-size: 14px; line-height: 20px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        
                    -->
                        <div class="form-group">
                            <br>
                            <div class="col-sm-6">
                              <button  id="btn" onclick="registro()" type="submit" class="btn btn-success btn-block">
                                    <i class="fa fa-save"></i>
                                    Guardar y Capturar otro Registro</button>
                            </div>
                            <div class="col-sm-6">
                                <a class="btn btn-danger btn-block" href="/oagmvc">  <i class="fa fa-close"></i> Cancelar</a>
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
 <script>
     $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
 </script>