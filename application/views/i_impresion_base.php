
<body >
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> Base de Acoso y Hostigamiento
          <small class="pull-right">fecha: <? echo date('d-m-Y');?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <!-- /.row -->
    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
			  <th>Cons.</th>
              <th width="10px">Oficio</th>
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
          </tr>
          <tr>
          	      <?
          }
          ?>
            <td>1</td>
            <td>Need for Speed IV</td>
            <td>247-925-726</td>
            <td>Wes Anderson umami biodiesel</td>
            <td>$50.00</td>
          </tr>
          <tr>
            <td>1</td>
            <td>Monsters DVD</td>
            <td>735-845-642</td>
            <td>Terry Richardson helvetica tousled street art master</td>
            <td>$10.70</td>
          </tr>
          <tr>
            <td>1</td>
            <td>Grown Ups Blue Ray</td>
            <td>422-568-642</td>
            <td>Tousled lomo letterpress</td>
            <td>$25.99</td>
          </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        <p class="lead">Payment Methods:</p>
        <img src="../../dist/img/credit/visa.png" alt="Visa">
        <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
        <img src="../../dist/img/credit/american-express.png" alt="American Express">
        <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr
          jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
        </p>
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <p class="lead">Amount Due 2/22/2014</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td>$250.30</td>
            </tr>
            <tr>
              <th>Tax (9.3%)</th>
              <td>$10.34</td>
            </tr>
            <tr>
              <th>Shipping:</th>
              <td>$5.80</td>
            </tr>
            <tr>
              <th>Total:</th>
              <td>$265.24</td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>