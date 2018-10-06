
<!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Incidencias OAG</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?=base_url()?>src/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons --
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- tema -->
        <link rel="stylesheet" href="<?=base_url()?>src/css/AdminLTE.min.css">
        <!-- Tema -->
        <link rel="stylesheet" href="<?=base_url()?>src/css/skins/skin-blue.min.css">
            <!-- plugins -->
        <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

         <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


<style type="text/css">

@page {

	
}

body {
  font-size: 12px;
}

#header,
#footer {
  position: fixed;
  left: 0;
	right: 0;
	color: #aaa;
	
}

#header {
  top: 0;
	border-bottom: 0.1pt solid #aaa;
}

#footer {
  bottom: 0;
  border-top: 0.1pt solid #aaa;
  font-size: 10px;
}

#header table,
#footer table {
	width: 100%;
	border-collapse: collapse;
	border: none;
}

#header td,
#footer td {
  padding: 0;
	width: 50%;
}

.page-number {
  text-align: center;
}

.page-number:after {
	
  content: "pagina " counter(page) ;
}



</style>
    </head>  

<div id="footer">
  <div class="page-number"></div>
</div>
   <div class="row">
      <div class="">
        <table  class="table table-striped table-responsive">
          <thead>
          <tr>
			  <th>Cons.</th>
              <th>Oficio</th>
              <th>Remitente</th>
              <th>Denunciante</th>
              <th>Denunciado</th>
              <th>Concepto</th>
              <th>Asunto</th>
          </tr>
          </thead>
          <tbody>
             <? foreach ($registros as $registro) 
           {
            // $fecha = $this->m_ticket->fecha_text_f($registro->fecha_inicio);
            // $estatus = $this->m_ticket->etiqueta($registro->id_situacion);
            ?>
          <tr>
           <td width="10px" ><?=$registro->consecutivo?></td>
              <td width="5px" ><?=$registro->oficio?></td>
              <td>
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
          </tr>
          	      <?
          }
          ?>
           
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

			
