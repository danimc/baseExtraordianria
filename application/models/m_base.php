<?php 

class m_base extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function obt_centros()
    {
    	return $this->db->get('b_dependencias')->result();
    }
     function obt_sujetos()
    {
    	return $this->db->get('b_sujetos')->result();
    }

    function obt_conceptos() 
    {
        return $this->db->get('b_conceptoreporte')->result();
    }

       function obt_sexo() 
    {
        return $this->db->get('b_sexo')->result();
    }

    function obt_sanciones()
    {
        return $this->db->get('b_sanciones')->result();
    }

    function obt_cronos()
    {
        return $this->db->get('b_cat_seguimiento_cronos')->result();
    }


    function obt_conductas()
    {
        return $this->db->get('b_conceptoreporte')->result();
    }
    function obt_formatos()
    {
        return $this->db->get('b_cat_formatos')->result();
    }

    function obt_registro_seg_colegiados($folio)
    {
        $this->db->where('registro', $folio);
        return $this->db->get('b_seguimiento_colegiados')->num_rows();
    }

    function insertRegistroColegiados($folio)
    {
        $this->registro = $folio;
        $this->db->insert("b_seguimiento_colegiados", $this);
       /* $id = $this->db->insert_id();
        $this->db->close();*/
    }

    function insertar_cron( $folio, $row, $fecha)
    {
        $this->db->set($row, $fecha);
        $this->db->where('registro', $folio);

        $this->db->update('b_seguimiento_colegiados'); 
    }

    function obt_remitentes()
    {
        $qry = "";

        $qry = "SELECT
                 distinct(remitente) 
                 FROM crm.b_registros
                 WHERE remitente != '' 
                 AND remitente IS NOT NULL";

        $remitente = $this->db->query($qry)->result();
        $array = array();
        foreach ($remitente as $rem) {
            $array[] = 
                $rem->remitente;
        }
        return json_encode($array);
    }


    function obt_seguimiento($folio)
    {
   $qry = "SELECT
            usuario.usuario,
            b.oficio,
            dependencias.nombre_dependencia,
            dependencias.abreviatura,
            b.dependencia,
            fecha_seguimiento as fecha,
            seguimiento
            FROM
            b_seguimiento b
            LEFT JOIN usuario ON usuario.codigo = escribiente
            LEFT JOIN dependencias ON  dependencias.id_dependencia = b.dependencia
            INNER JOIN b_registros r
            WHERE r.id = $folio
            AND r.id = b.registro";

        return $this->db->query($qry)->result();
    }




    function obt_puestos()
    {

        $qry = "";

        $qry = "SELECT
                 distinct(puesto) 
                 FROM crm.b_registros
                 WHERE puesto != '' 
                 AND puesto IS NOT NULL";

        $puesto = $this->db->query($qry)->result();
        $array = array();
        foreach ($puesto as $rem) {
            $array[] = 
                $rem->puesto;
        }
        return json_encode($array);
    }

    function obt_victimas()
    {
        $qry = "";

        $qry = "SELECT
                 distinct(denunciante) 
                 FROM crm.b_registros
                 WHERE denunciante != '' 
                 AND denunciante IS NOT NULL";

        $remitente = $this->db->query($qry)->result();
        $array = array();
        foreach ($remitente as $rem) {
            $array[] = 
                $rem->denunciante;
        }
        return json_encode($array);
    }

        function obt_denunciados()
    {
        $qry = "";

        $qry = "SELECT
                 distinct(denunciado) 
                 FROM crm.b_registros
                 WHERE denunciado != '' 
                 AND denunciado IS NOT NULL";

        $remitente = $this->db->query($qry)->result();
        $array = array();
        foreach ($remitente as $rem) {
            $array[] = 
                $rem->denunciado;
        }
        return json_encode($array);
    }


    function obtFolioPlataforma()
    {

        $qry = '';

        $qry =   "SELECT max(consecutivo) as folio 
                  FROM crm.b_registros 
                  where consecutivo 
                  like 'PLAT%'";

        return $this->db->query($qry)->row();
    }

    function obt_nombre_conducta($conducta)
    {
        $qry = '';

        $qry = "SELECT nombre FROM b_conceptoreporte WHERE id = $conducta";
        return $this->db->query($qry)->row();
    }

    function registro_nuevo($datos) 
    {

    	$this->consecutivo         =	$datos['consecutivo']; 	
		$this->fecha               =	$datos['fecha']; 			
		$this->hora 		       =	$datos['hora']; 			
		$this->oficio 		       =	$datos['oficio'];			
		$this->remitente           =	$datos['remitente'];

		$this->denunciado          =    $datos['denunciado'];
        $this->sujetoDenunciado    =    $datos['sujetoDenunciado'];  
        $this->edadDenunciado      =    $datos['edadDenunciado'];    
        $this->sexoDenunciado      =    $datos['sexoDenunciado'];
		
        $this->denunciante         =    $datos['denunciante'];
        $this->sujetoDenunciante   =    $datos['sujetoDenunciante'];  
        $this->edadDenunciante     =    $datos['edadDenunciante'];    
        $this->sexoDenunciante     =    $datos['sexoDenunciante'];

		$this->dependencia 	       =	$datos['dependencia']; 	
		$this->puesto 		       =	$datos['puesto']; 		
		$this->asunto 		       =	$datos['asunto'];
		$this->registrador 	       = 	$datos['registrador'];
       // $this->concepto            =    $datos['concepto'];

		$this->db->insert("b_registros", $this);
        $id = $this->db->insert_id();
        $this->db->close();

        return $id;

        

    }

    function asignar_conducta($folio, $conducta)
    {
        $this->db->set('concepto', $conducta);
        $this->db->where('id', $folio);

        $this->db->update('b_registros');

    }

    function registrar_conductas($registro, $key)
    {
        $qry = "";

        $qry = "INSERT INTO b_conductas (registro, conducta) VALUES ($registro, $key)";

        $this->db->query($qry);

    }

    function lista_registros()
    {
        $qry = "";

        $qry = "SELECT
                b.id,
                b.consecutivo,
                b.oficio,
                b.remitente,
                d.nombre as dependencia,
                b.puesto,
                b.asunto,
                b.fecha,
                b.hora,
                u.usuario,
                b.denunciado,
                b.denunciante,
                su1.nombre as sujeto1 ,
                b.edadDenunciante,
                x1.nombre,
                su2.nombre as sujeto2,
                b.edadDenunciado,
                x2.nombre,
                sancionP.nombre as sancionP,
                sancionL.nombre as sancionL,
                sancionC.nombre as sancionC,
                c.nombre as concepto
                FROM
                b_registros b
                LEFT JOIN
                b_dependencias d ON b.dependencia = d.id
                LEFT JOIN 
                usuario u ON b.registrador = u.codigo
                LEFT JOIN 
                b_sujetos su1 ON b.sujetoDenunciante = su1.id
                LEFT JOIN 
                b_sexo x1 ON b.sexoDenunciante = x1.id
                LEFT JOIN 
                b_sujetos su2 ON b.sujetoDenunciado = su2.id
                LEFT JOIN 
                b_sexo x2 ON b.sexoDenunciado = x2.id
                LEFT JOIN 
                b_conductas conducta ON conducta.registro = b.id
                LEFT JOIN 
                b_conceptoreporte c ON c.id = b.concepto
                LEFT JOIN 
                b_sanciones sancionP ON sancionP.id = b.sancion_penal
                LEFT JOIN 
                b_sanciones sancionL ON sancionL.id = b.sancion_laboral
                LEFT JOIN 
                b_sanciones sancionC ON sancionC.id = b.sancion_colegiados 
                group by b.id";

        return $this->db->query($qry)->result();
    }



    function seguimiento_registro($id)
    {
               $qry = "";

        $qry = "SELECT
                b.id,
                b.consecutivo,
                b.oficio,
                b.remitente,
                b.dependencia as idDependencia,
                d.nombre as dependencia,
                b.puesto,
                b.asunto,
                b.fecha,
                b.hora,
                u.usuario,
                b.denunciado,
                b.denunciante,
                su1.nombre as sujeto1,
                b.sujetoDenunciante,
                b.edadDenunciante,
                x1.nombre as sexo1,
                b.sexoDenunciante,
                su2.nombre as sujeto2,
                b.sujetoDenunciado,
                b.edadDenunciado,
                x2.nombre as sexo2,
                b.sexoDenunciado,
                b.concepto as idConcepto,
                GROUP_CONCAT( c.nombre 
                    SEPARATOR ', ') as concepto,
                sc.nombre as sancionColegiados,
                sp.nombre as sancionPenal,
                sl.nombre as sancionLaboral
                FROM
                b_registros b
                LEFT JOIN
                b_dependencias d ON b.dependencia = d.id
                LEFT JOIN 
                usuario u ON b.registrador = u.codigo
                LEFT JOIN 
                b_sujetos su1 ON b.sujetoDenunciante = su1.id
                LEFT JOIN 
                b_sexo x1 ON b.sexoDenunciante = x1.id
                LEFT JOIN 
                b_sujetos su2 ON b.sujetoDenunciado = su2.id
                LEFT JOIN 
                b_sexo x2 ON b.sexoDenunciado = x2.id
                LEFT JOIN 
                b_sanciones sc ON sc.id = b.sancion_colegiados
                LEFT JOIN 
                b_sanciones sp ON sp.id = b.sancion_penal
                LEFT JOIN 
                b_sanciones sl ON sl.id = b.sancion_laboral
                LEFT JOIN 
                b_conductas conducta ON conducta.registro = b.id
                LEFT JOIN 
                b_conceptoreporte c ON c.id = conducta.conducta
                WHERE 
                b.registrador = u.codigo
                AND
                b.id = $id
                group by b.id";

        return $this->db->query($qry)->row();
    }

    function seguimiento_registro_un_concepto($id)
    {
               $qry = "";

        $qry = "SELECT
                b.id,
                b.consecutivo,
                b.oficio,
                b.remitente,
                b.dependencia as idDependencia,
                d.nombre as dependencia,
                b.puesto,
                b.asunto,
                b.fecha,
                b.hora,
                u.usuario,
                b.denunciado,
                b.denunciante,
                su1.nombre as sujeto1,
                b.sujetoDenunciante,
                b.edadDenunciante,
                x1.nombre as sexo1,
                b.sexoDenunciante,
                su2.nombre as sujeto2,
                b.sujetoDenunciado,
                b.edadDenunciado,
                x2.nombre as sexo2,
                b.sexoDenunciado,
                c.nombre as concepto, 
                sc.nombre as sancionColegiados,
                sp.nombre as sancionPenal,
                sl.nombre as sancionLaboral
                FROM
                b_registros b
                LEFT JOIN
                b_dependencias d ON b.dependencia = d.id
                LEFT JOIN 
                usuario u ON b.registrador = u.codigo
                LEFT JOIN 
                b_sujetos su1 ON b.sujetoDenunciante = su1.id
                LEFT JOIN 
                b_sexo x1 ON b.sexoDenunciante = x1.id
                LEFT JOIN 
                b_sujetos su2 ON b.sujetoDenunciado = su2.id
                LEFT JOIN 
                b_sexo x2 ON b.sexoDenunciado = x2.id
                LEFT JOIN 
                b_sanciones sc ON sc.id = b.sancion_colegiados
                LEFT JOIN 
                b_sanciones sp ON sp.id = b.sancion_penal
                LEFT JOIN 
                b_sanciones sl ON sl.id = b.sancion_laboral
                LEFT JOIN 
                b_conductas conducta ON conducta.registro = b.id
                LEFT JOIN 
                b_conceptoreporte c ON c.id = b.concepto
                WHERE 
                b.registrador = u.codigo
                AND
                b.id = $id
                group by b.id";

        return $this->db->query($qry)->row();
    }

    function editar_captura($datos, $id)
    {
        $this->db->where('id', $id);

      return $this->db->update('b_registros', $datos);
    }

    function insertar_seguimiento($seguimiento)
    {
        $this->db->insert('b_seguimiento', $seguimiento);
    }

    function obt_datetime($id)
    {
        $qry = '';

        $qry = "SELECT
                concat_ws(' ', fecha, hora) as fecha
                from 
                b_registros
                where 
                id = '$id'";

        return $this->db->query($qry)->row();
    }

    function asignar_sancion($folio, $sancion, $dep)
    {
        $this->db->set($dep, $sancion);
        $this->db->where('id', $folio);

        $this->db->update("b_registros");
    }
}
?>