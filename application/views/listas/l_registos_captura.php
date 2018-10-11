<?
$estados = $this->m_ticket->estatus();
?>

 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Panel de control
      <small>Registros | Vista Captura </small>
    </h1><br>
    <ol class="breadcrumb">
      <li><a href="/oag"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"><i class="fa fa-ticket"></i> Registros</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a href="/base" class="btn btn-app bg-blue"><i class="fa fa-arrow-left"></i>Regresar</a>
    <a href="<?=base_url()?>index.php?/ticket/nuevo_registro" class="btn btn-app bg-green"><span class="fa fa-plus"></span>Nuevo Registro</a>
   	   
    <div id="form_newsletter_result"></div>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Vista Registros</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive col-md-12">
         <table id="example1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Cons.</th>
              <th width="10px">Oficio</th>
              <th>Remitente</th>
              <th>Denunciante</th>
              <th>Denunciado</th>
              <th>Concepto</th>
              <th>Asunto</th>
              <th>Acciones</th>

            </tr>
          </thead>
          <tbody>
           <? foreach ($registros as $registro) 
           {
            // $fecha = $this->m_ticket->fecha_text_f($registro->fecha_inicio);
            // $estatus = $this->m_ticket->etiqueta($registro->id_situacion);
            ?>
            <tr class="">
              <td width="10px" ><?=$registro->consecutivo?></td>
              <td ><?=$registro->oficio?></td>
              <td >
                <b> Nombre: </b> <?=$registro->remitente?> <hr>
                <b>Dependencia:</b> <br>
                <?=$registro->dependencia?>
              </td>
              <td >
                <b>Nombre: </b> <?=$registro->denunciante?> <br>
                <b>Edad: </b> <?=$registro->edadDenunciante?> <hr>
                <b>Sujeto: </b> <?=$registro->sujeto1?>                  
              </td>
              <td >
                <b>Nombre: </b><?=$registro->denunciado?> <br>
                <b>Edad: </b> <?=$registro->edadDenunciado?> <hr>
                <b>Sujeto: </b> <?=$registro->sujeto2?> <br>

              </td>
              <td ><?=$registro->concepto?></td>
              <td ><?=$registro->asunto?></td>


          <td width="10px" align="center">
         <?
             $accesoActivos = $this->m_seguridad->acceso_modulo(1);
             if ($accesoActivos != 0) {
            ?>
            <a class="btn btn-info btn-xs " href="<?=base_url()?>index.php?/ticket/editar_captura/<?=$registro->id?>" title="Editar Captura de Entrada"><i class="fa fa-edit"></i> Editar </a>
            <?}?>
             <hr>
            <a class="btn btn-danger btn-xs" href="<?=base_url()?>index.php?/ticket/ver_registro/<?=$registro->id?>" title="Abrir Registro"><i class="fa fa-eye"></i> Abrir  </a>
          </td>     
            </tr>
            <?
          }
          ?>

        </tbody>            
      </table> 
    </div>
  </div>
</div>
  </section>


<script>
  $(function () {
   // $("#example1").DataTable();
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>


<!-------MODAL PARA CAMBIAR EL ESTATUS---->
<!--
<form id="frmStatus">
     <div class="modal fade" id="modalStatus" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-maroon">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Cambiar Status </h4>
            </div>
            <div class="modal-body">
              <p>Cambie el estatus actual del ticket de servicio.</p>
                <select name="estado" class="form-control">
                  <option disabled>Seleccione el estatus del ticket</option>
                  <?
                  foreach ($estados as $estado) {?>
                    <option value="<?=$estado->id?>"><?=$estado->situacion?></option>
                           <?}?>         
                </select>
                <input type="hidden" name="folio" value="<?=$ticket->folio?>">
                <input type="hidden" name="antStatus" value="<?=$ticket->situacion?>">
                </div>
              <div class="modal-footer">
                <button type="button" id="cambiarStatus"   class="btn btn-success" data-dismiss="modal"><i class="fa fa-check"></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i></button>
            </div>
          </div>
        </div>
      </div>
</form>


 BLOQUEADO HASTA REPARAR ERROR EN EL FORMULARIO
<script type="text/javascript">
  $("#cambiarStatus").click(function(){
    var formulario = $("#frmStatus").serializeArray();
    $.ajax({
      type: "POST",
      dataType: 'json',
      url: "<?=base_url()?>index.php?/ticket/cambiar_estatus",
      data: formulario,
    }).done(function(respuesta){
       $("#mensaje").html(respuesta.mensaje);
       if (respuesta.id == 1) {

       // setTimeout('document.location.reload()',1000);
       }     
    });
   });
  </script> -->

        <!-- /.