<?php
/* Class: Evento */
/* Representa los eventos. Cada evento es un recorrido que se realiza en cierto dia y horario. */
  
class Evento
{  
  var $id = null;
  var $recorrido;
  var $fechahora;
  var $acompaniante;
  var $ministerio;
  var $vamm;
  var $columnasmodificadas = array();
  
  
  // Constructor
  
  function __construct($id = null) {
    if($id) {
      $elevento = execute_select('evento', array('*'),'id = '.$id);
      $evento = $elevento[0];
      $this->id = $id;
      $this->fechahora = $evento[$this->nombrecolumna('fechahora')];
      $this->recorrido = $evento[$this->nombrecolumna('recorrido_id')];
      $this->acompaniante = $evento[$this->nombrecolumna('acompaniante_id')];
      $this->ministerio = $evento[$this->nombrecolumna('ministerio_id')];
      $this->vamm = $evento[$this->nombrecolumna('vamm')];
    }
  }  
  
  // Getters 
  
  public function getId() {
    return $this->id;
  }
  
  public function getFechahora() {
    return $this->fechahora;
  }
  
  public function getRecorrido() {
    return $this->recorrido;
  }
  
  public function getAcompaniante() {
    return $this->acompaniante;
  }
  
  public function getMinisterio() {
    return $this->ministerio;
  }  
  
  public function getVamm() {
    return $this->vamm;
  }
  
  // Setters
  
  public function setRecorrido($nuevorecorrido) {
    $this->recorrido = $nuevorecorrido;
    array_push($this->columnasmodificadas, 'recorrido');
  }

  public function setAcompaniante($nuevoacompaniante) {
    $this->acompaniante = $nuevoacompaniante;
    array_push($this->columnasmodificadas, 'acompaniante');
  }
  
  public function setVamm($nuevovamm) {
    $this->vamm = $nuevovamm;
    array_push($this->columnasmodificadas, 'vamm');
  }
  
  public function setMinisterio($nuevoministerio) {
    $this->ministerio = $nuevoministerio;
    array_push($this->columnasmodificadas, 'ministerio');
  }      

  public function setFechahora($nuevafechahora) {
    $this->fechahora = $nuevafechahora;
    array_push($this->columnasmodificadas, 'fechahora');
  }
  
  // Funciones generales

  private function nombrecolumna($nombre) {
    switch ($nombre) {
      case 'recorrido':
        return 'recorrido_id';
        break;
      case 'acompaniante':
        return 'acompaniante_id';
        break;
      case 'ministerio':
        return 'ministerio_id';
        break;
      default:
        return $nombre;
    }
  }   

  public function save() {
    if (isset($this->id)) {
      $existe = (count(execute_select('evento', array('id'),'id = '.$this->id)) > 0)? true : false;
    } else {
      $existe = false;
    }
    $datos = array();
    foreach($this->columnasmodificadas as $columna) {
      $nombrecolumna = $this->nombrecolumna($columna);
      $datos[$nombrecolumna] = $this->$columna; 
    }
    if($existe) {
      execute_update('evento', $datos,'id = '.$this->id);
    } else {
      $result_insert = execute_insert('evento', $datos);
      $this->id = $result_insert;      
    }

  }

  
}
?>