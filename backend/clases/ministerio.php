<?php
/* Class: Ministerio */
/* Representa los eventos. Cada evento es un recorrido que se realiza en cierto dia y horario. */
  
class Ministerio
{  
  var $id = null;
  var $nombre;
  /*
  var $mensaje;
  */
  var $columnasmodificadas = array();

  
  // Constructor
  
  function __construct($id = null) {
    if($id) {
      $elministerio = execute_select('ministerio', array('*'),'id = '.$id);
      $ministerio = $elministerio[0];
      $this->id = $id;
      $this->nombre = $ministerio['nombre'];
    }
  }  
  
  // Getters 
  
  public function getId() {
    return $this->id;
  }
  
  public function getNombre() {
    return $this->nombre;
  }
  
  // Setters
  
  public function setID($nuevoid) {
    $this->id = $nuevoid;
    array_push($this->columnasmodificadas, 'id');
  }

  public function setNombre($nuevonombre) {
    $this->nombre = $nuevonombre;
    array_push($this->columnasmodificadas, 'nombre');
  }
  

  
  
  
  // Funciones generales


  public function save() {
    if (isset($this->id)) {
      $existe = (count(execute_select('ministerio', array('id'),'id = '.$this->id)) > 0)? true : false;
    } else {
      $existe = false;
    }
    $datos = array();
    foreach($this->columnasmodificadas as $columna) {
      $nombrecolumna = $columna;
      $datos[$nombrecolumna] = $this->$columna; 
    }
    if($existe) {
      execute_update('ministerio', $datos,'id = '.$this->id);
    } else {
      $result_insert = execute_insert('ministerio', $datos);
      $this->id = $result_insert;      
    }
    return $this->id;
  }

  public function getAll()
  {
      $array = array();
      $ministerios = execute_select('ministerio', array('*'));
      if (count($ministerios) > 0) {
        for($i = 0;$i<count($ministerios);$i++)
        {
            $id = $ministerios[$i]['id'];
            $ministerio = new Ministerio($id);
            $array[] = $ministerio;
        }
      }
      return $array;
  }

  public static function delete($id = NULL)
  {
      if($id)
      {
        $bool = execute_delete("ministerio", "id=$id");
        if($bool){
            return true;
        }
        else
        {
            return false;
        }
      }
  }
}
?>