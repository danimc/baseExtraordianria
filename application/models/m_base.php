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

    function obt_remitentes()
    {
        $qry = "";

        $qry = "SELECT distinct(remitente) FROM crm.b_registros";

        return $this->db->query($qry)->result();
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
        $this->concepto            =    $datos['concepto'];

		$this->db->insert("b_registros", $this);

        return $this->db->affected_rows();

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
                b_conceptoreporte c ON b.concepto = c.id
                WHERE 
                b.registrador = u.codigo";

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
                b_conceptoreporte c ON b.concepto = c.id
                WHERE 
                b.registrador = u.codigo
                AND
                b.id = $id";

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
}
?>