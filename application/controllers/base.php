<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {
	
	 function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_seguridad',"",TRUE);
		$this->load->model('m_usuario',"",TRUE);
		$this->load->model('m_base',"",TRUE);
		$this->load->model('m_correos',"",TRUE);
		$this->load->model('m_ticket',"",TRUE);

	}

	public function index()
	{
		$this->load->view('_encabezado');

	}

	function nuevo_registro()
	{
		$codigo = $this->session->userdata("codigo");	
		$datos['fecha']	= date('Y-m-d');
		$datos['hora']	= date('H:i:s');
		$datos['centros'] = $this->m_base->obt_centros();
		$datos['remitentes'] = $this->m_base->obt_remitentes();
		$datos['puestos'] = $this->m_base->obt_puestos();
		$datos['victimas'] = $this->m_base->obt_victimas();
		$datos['denunciados'] = $this->m_base->obt_denunciados();
		$datos['sujetos'] = $this->m_base->obt_sujetos();
		$datos['conceptos'] = $this->m_base->obt_conceptos();
		$datos['sexo'] = $this->m_base->obt_sexo();
		$datos['usuario'] = $this->m_usuario->obt_usuario($codigo);
		$datos['reportante'] = $this->m_ticket->obt_lista_usuarios();
		$datos['categorias'] = $this->m_ticket->obt_categorias();

		$this->load->view('_encabezado');
		$this->load->view('_menuLateral');
		$this->load->view('formularios/v_nuevo_registro', $datos);
		$this->load->view('_footer');
	}

		function registro()
	{

		$conceptos = $_POST['concepto'];
		$contador = count($conceptos);

		
		$datos['registrador'] 		= $this->session->userdata("codigo");
		$datos['consecutivo'] 		= $_POST['consecutivo'];
		$datos['fecha'] 			= $_POST['fecha'];
		$datos['hora'] 				= $_POST['hora'];
		$datos['oficio']			= $_POST['oficio'];
		$datos['remitente'] 		= $_POST['remitente'];
		$datos['denunciante'] 		= $_POST['denunciante'];
		$datos['sujetoDenunciante']	= $_POST['sujetoDenunciante'];
		$datos['edadDenunciante']	= $_POST['edadDenunciante'];
		$datos['sexoDenunciante']	= $_POST['sexoDenunciante'];
		$datos['denunciado']		= $_POST['denunciado'];
		$datos['sujetoDenunciado']	= $_POST['sujetoDenunciado'];
		$datos['edadDenunciado']	= $_POST['edadDenunciado'];
		$datos['sexoDenunciado']	= $_POST['sexoDenunciado'];
		$datos['dependencia'] 		= $_POST['dependencia'];
		$datos['puesto'] 			= $_POST['puesto'];
		$datos['asunto']			= $_POST['asunto'];


		$respuesta = $this->m_base->registro_nuevo($datos);
		
		echo 'registro ' .$respuesta . 'contador: ';
		echo $contador;

		if ($respuesta != 0) {
			$i = 0;
			while ( $i < $contador)  {
				$this->m_base->registrar_conductas($respuesta, $conceptos[$i]);
				$i++;
			}
			
		}
		

		if ($respuesta != 0) {
				$msg = '<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<p><i class="icon fa fa-check"></i>
               					 Registro añadido.
              			</p>';
			}

			echo $msg;		
	}


	function lista_registros()
	{	
		
		$codigo = $this->session->userdata("codigo");
		$rol = $this->session->userdata("rol");
		$folio = $this->uri->segment(3);
		$datos['usuario'] = $this->m_usuario->obt_usuario($codigo);
		$datos['folio'] = $folio;
		$datos['sujetos'] = $this->m_base->obt_sujetos();
		$datos['conceptos'] = $this->m_base->obt_conceptos();
		$datos['sexo'] = $this->m_base->obt_sexo();

		$datos['registros'] = $this->m_base->lista_registros();
				$this->load->view('_encabezado');
				$this->load->view('_menuLateral');
				$this->load->view('listas/l_registos_captura', $datos);
				$this->load->view('_footer');


/*
		switch ($rol) {
			case 1:
				
				$datos['bases'] = $this->m_base->lista_bases_administrador();
				$this->load->view('_encabezado');
				$this->load->view('_menuLateral');
				$this->load->view('listas/l_bases_admin', $datos);
				$this->load->view('_footer');
				break;
			case 2:
				$datos['bases'] = $this->m_base->lista_bases_usuario($codigo);
				$this->load->view('_encabezado');
				$this->load->view('_menuLateral');
				$this->load->view('listas/l_bases_usuarios', $datos);
				$this->load->view('_footer');
				break;
			default:
					echo "no tienes autorizado ingresar a esta sección";
				break;
		}		*/
	}

	function ver_registro($id)
	{
		$folio = $this->uri->segment(3);
		$fecha = $this->m_base->obt_datetime($folio);
		$datos['dependencia'] = $this->session->userdata("dependencia");
		$datos['folio'] = $folio;
		$datos['registro'] = $this->m_base->seguimiento_registro($folio);
		$datos['centros'] = $this->m_base->obt_centros();
		$datos['centros'] = $this->m_base->obt_centros();
		$datos['sujetos'] = $this->m_base->obt_sujetos();
		$datos['conceptos'] = $this->m_base->obt_conceptos();
		$datos['sexo'] = $this->m_base->obt_sexo();
		$datos['sanciones'] = $this->m_base->obt_sanciones();
		//$datos['asignados'] = $this->m_base->obt_asignados();

		$datos['seguimiento'] = $this->m_base->obt_seguimiento($folio);
		$datos['fecha'] = $this->m_ticket->fecha_text($fecha->fecha);

		$this->load->view('_encabezado');
		$this->load->view('_menuLateral');
		$this->load->view('v_ver_registro', $datos);
		$this->load->view('_footer');
	}

	function editar_captura()
	{
		$folio = $this->uri->segment(3);
		$dependencia = $this->session->userdata("dependencia");
		$datos['folio'] = $folio;
		$datos['registro'] = $this->m_base->seguimiento_registro($folio);
		$datos['centros'] = $this->m_base->obt_centros();
		$datos['sujetos'] = $this->m_base->obt_sujetos();
		$datos['conceptos'] = $this->m_base->obt_conceptos();
		$datos['remitentes'] = $this->m_base->obt_remitentes();
		$datos['puestos'] = $this->m_base->obt_puestos();
		$datos['victimas'] = $this->m_base->obt_victimas();
		$datos['denunciados'] = $this->m_base->obt_denunciados();
		$datos['sujetos'] = $this->m_base->obt_sujetos();
		$datos['sexo'] = $this->m_base->obt_sexo();

		//if ($dependencia == 1 || $dependencia == 2) {
			
				$this->load->view('_encabezado');
				$this->load->view('_menuLateral');
				$this->load->view('formularios/v_editar_captura', $datos);
				$this->load->view('_footer');
			//	}
		//else{
			/*	$this->load->view('_encabezado');
				$this->load->view('_menuLateral');
				$this->load->view('formularios/v_seguimiento_usuario', $datos);
				$this->load->view('_footer');*/
		//		}
		


	}

	function edicion_captura()
	{
		$id  = $_POST['id'];
		$datos = array(

				'consecutivo' 		=> $_POST['consecutivo'],
				'fecha' 			=> $_POST['fecha'],
				'hora' 				=> $_POST['hora'],
				'oficio'			=> $_POST['oficio'],
				'remitente' 		=> $_POST['remitente'],

				'denunciante' 		=> $_POST['denunciante'],
				'sujetoDenunciante'	=> $_POST['sujetoDenunciante'],
				'edadDenunciante'	=> $_POST['edadDenunciante'],
				'sexoDenunciante'	=> $_POST['sexoDenunciante'],

				'denunciado'		=> $_POST['denunciado'],
				'sujetoDenunciado'	=> $_POST['sujetoDenunciado'],
				'edadDenunciado'	=> $_POST['edadDenunciado'],
				'sexoDenunciado'	=> $_POST['sexoDenunciado'],

				'dependencia' 		=> $_POST['dependencia'],
				'puesto' 			=> $_POST['puesto']
				// 'concepto'			=> $_POST['concepto'],
				// 'asunto'			=> $_POST['asunto']
		);
		


		//$this->m_base->nuevo_denunciado()

		$respuesta = $this->m_base->editar_captura($datos, $id);

		if ($respuesta != 0) {
				$msg = '<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<p><i class="icon fa fa-check"></i>
               					 Captura Modificada.
              			</p>';
			}

			echo $msg;	
	}

	function asignar_usuario()
	{

		if($_POST['antAsignado'] == ''){
			$estatus = 2; 
		}else{
			$estatus = 7;
		}
		  $codigo = $this->session->userdata("codigo");	
		  $ingeniero = $_POST['ingeniero'];
		  $folio = $_POST['folio'];
		  $fecha= $this->m_base->fecha_actual();
		  $hora= $this->m_base->hora_actual();
		  $usr = $this->m_usuario->obt_usuario($codigo);

		  $this->m_base->asignar_usuario($folio, $ingeniero, $fecha, $hora, $estatus);
		  $this->m_base->h_asignar_usuario($folio, $ingeniero, $fecha, $hora, $estatus);

	    $msg = '<div class="alert alert-success"><p><i class="fa fa-check"></i>Se ha Asignado con Exito</p></div>';

 		  return json_encode($msg);
	}

	function folio_plataforma()
	{

		$datos['folio'] = $this->m_base->obtFolioPlataforma();
		$folio = explode('/', $datos['folio']->folio);
		$suma = $folio[1] + 0001;

		echo (addslashes( 'PLAT/'. $suma ) );

	}

	function asignar_sancion()
	{
		$dependencia 		= $_POST['dependencia'];
		$sancion 			= $_POST['sancion'];
		$folio				= $_POST['folio'];
		$usuario 			= $this->session->userdata('codigo');				
		

		if ($dependencia == 5) {
			$dep = 'sancion_colegiados';			
		}
		if ($dependencia == 8) {
			$dep = 'sancion_penal';	
		}
		if ($dependencia == 7) {
			$dep = 'sancion_laboral';	
		}
		$this->m_base->asignar_sancion($folio, $sancion, $dep);
		
	
		$msg = new \stdClass();
			//$this->m_base->h_cambiar_estatus($folio, $estatus, $fecha, $hora);

			 $msg->id = 1;
			 $msg->mensaje = '<div class="alert alert-success"><p><i class="fa fa-check"></i> Se cambio es estatus</p></div>';
		

		echo json_encode($msg);

	}

	function seguimiento()
	{
		$folio = $_POST['folio'];
		$seguimiento = array(
						'registro'			=> $_POST['folio'],
						'oficio' 		=> $_POST['oficio'],
						'escribiente' 	=> $this->session->userdata('codigo'),
						'dependencia' 	=> $_POST['dependencia'],
						'fecha'			=> $this->m_base->fecha_actual(),
						'hora' 			=> $this->m_base->hora_actual(),
						'seguimiento' 	=> $_POST['seguimiento'],
						'fecha_seguimiento' => $_POST['fecha']
						);
		$this->m_base->insertar_seguimiento($seguimiento);

		$msg = new \stdClass();
			//$this->m_base->h_cambiar_estatus($folio, $estatus, $fecha, $hora);

			 $msg->id = 1;
			 $msg->mensaje = '<div class="alert alert-success"><p><i class="fa fa-check"></i> Seguimiento Añadido</p></div>';
		

		echo json_encode($msg);

		//redirect('base/ver_registro/'.$folio);
	}

	function correo_base_levantado()
	{
		$incidente = $this->uri->segment(3);
		$infoCorreo = $this->m_base->seguimiento_base($incidente);
		$horario = $this->m_base->hora_actual();
		$saludo = '';

		if($horario <= '11:59:59'){
			$saludo = 'Buenos días';
		}
		elseif ($horario <= '19:59:59') {
			$saludo = 'Buenas tardes';
		}
		elseif ($horario <= '23:59:59') {
			$saludo = 'Buenas noches';
		}
		
		$datos['base'] = $infoCorreo;
		$datos['saludo'] = $saludo;		
	    $this->load->view('_head');
		$msg = $this->load->view('correos/c_nuevoTicket', $datos, true);

		$this->load->library('email');
		$this->email->from('incidenciasoag@gmail.com', 'incidenciasOAG');
		$this->email->to($infoCorreo->correo);
		$this->email->cc('incidenciasoag@gmail.com');
		//$this->email->bcc('them@their-example.com');

		$this->email->subject('Registro de Incidente | incidenciasOAG');
		$this->email->message($msg);
		$this->email->set_mailtype('html');
		$this->email->send();

		redirect('base/lista_bases/'. $incidente);

	//	echo $this->email->print_debugger();

	}

	function imprimir_base()
	{
		$datos['registros'] = $this->m_base->lista_registros();

		$this->load->view('_head');
		$this->load->view('i_impresion_base', $datos);
	}

	function obt_seguimiento_colegiados()
	{
		$folio = $_POST['folio'];

		$seguimiento = $this->m_base->obt_seguimiento($folio);

		//echo json_encode($seguimiento);

		$msg = '<table id="example1" class="table  table-hover table-striped">
                <thead>
                    <tr>
                        <th width="100px">Oficio</th>
                        <th width="200px">Fecha/Usuario</th>
                        <th>Seguimiento</th>
                    </tr>
                </thead>
                <tbody>';

              	foreach ($seguimiento as $mensaje){
                	$fecha = $this->m_base->hora_fecha_text($mensaje->fecha);
                	if ($mensaje->dependencia == 5) { 

                  		$msg .=' <tr class="">
                    		<td>
                    	   	' .$mensaje->oficio . '
                    	 	</td>
                    	 	<td>
                    	 	' .$fecha . ' <br>
                    	 	<b>' .$mensaje->usuario . '</b>
                    	 	</td>
                    	 	<td>
                    	    ' .$mensaje->seguimiento . '
                    		</td>
                        </tr>';
                    }
                }
        $msg .= '</tbody> </table>';

       $respuesta = new \stdClass();
		$respuesta->id = 1;
		$respuesta->mensaje = $msg;

	echo json_encode($respuesta);

	}

	function obt_seguimiento_penal()
	{
		$folio = $_POST['folio'];

		$seguimiento = $this->m_base->obt_seguimiento($folio);

		$msg = '<table id="example2" class="table  table-hover table-striped">
                <thead>
                    <tr>
                        <th width="100px">Oficio</th>
                        <th width="200px">Fecha/Usuario</th>
                        <th>Seguimiento</th>
                    </tr>
                </thead>
                <tbody>';

              	foreach ($seguimiento as $mensaje){
                	$fecha = $this->m_base->hora_fecha_text($mensaje->fecha);
                	if ($mensaje->dependencia == 8) { 

                  		$msg .=' <tr class="">
                    		<td>
                    	   	' .$mensaje->oficio . '
                    	 	</td>
                    	 	<td>
                    	 	' .$fecha . ' <br>
                    	 	<b>' .$mensaje->usuario . '</b>
                    	 	</td>
                    	 	<td>
                    	    ' .$mensaje->seguimiento . '
                    		</td>
                        </tr>';
                    }
                }
        $msg .= '</tbody> </table>';

       $respuesta = new \stdClass();
		$respuesta->id = 1;
		$respuesta->mensaje = $msg;

	echo json_encode($respuesta);

	}

	function obt_seguimiento_laboral()
	{
		$folio = $_POST['folio'];

		$seguimiento = $this->m_base->obt_seguimiento($folio);

		$msg = '<table id="example3" class="table  table-hover table-striped">
                <thead>
                    <tr>
                        <th width="100px">Oficio</th>
                        <th width="200px">Fecha/Usuario</th>
                        <th>Seguimiento</th>
                    </tr>
                </thead>
                <tbody>';

              	foreach ($seguimiento as $mensaje){
                	$fecha = $this->m_base->hora_fecha_text($mensaje->fecha);
                	if ($mensaje->dependencia == 7) { 

                  		$msg .=' <tr class="">
                    		<td>
                    	   	' .$mensaje->oficio . '
                    	 	</td>
                    	 	<td>
                    	 	' .$fecha . ' <br>
                    	 	<b>' .$mensaje->usuario . '</b>
                    	 	</td>
                    	 	<td>
                    	    ' .$mensaje->seguimiento . '
                    		</td>
                        </tr>';
                    }
                }
        $msg .= '</tbody> </table>';

       $respuesta = new \stdClass();
		$respuesta->id = 1;
		$respuesta->mensaje = $msg;

	echo json_encode($respuesta);

	}




	function generar_resumen()
	{
		//Carga la librería que agregamos
        $this->load->library('mydompdf');
		$evento = $this->uri->segment(3);
		$data['registros'] = $this->m_base->lista_registros();
     	
     	//$data['poligonos'] =$ $this->m_evento->num_poligonos($evento);

        //$html tendrá el contenido de la vista
          $html = $this->load->view('_encabezado',false, true);
		  $html = $this->load->view('v_pdf',$data, true);

		//$this->load->view('_head');
        //  $this->load->view('v_pdf', $data);
        /*
         * load_html carga en dompdf la vista
         * render genera el pdf
         * stream ("nombreDelDocumento.pdf", Attachment: true | false)
         * true = forza a descargar el pdf
         * false = genera el pdf dentro del navegador
         */
		 $this->mydompdf->load_html($html);
		 $this->mydompdf->setPaper("Legal","Landscape");
		 $this->mydompdf->render();
		 $this->mydompdf->stream("Reporte.pdf", array("Attachment" => true));
				
	}


	
}