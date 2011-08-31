<?php
/* Class: Evento */
/* Representa los eventos. Cada evento es un recorrido que se realiza en cierto dia y horario. */
  
class Rubro
{  
  var $id = null;
  var $nombre;
  var $mensaje;
  var $columnasmodificadas = array();
  
  
  // Constructor
  
  function __construct($id = null) {
    if($id) {
      $elrubro = execute_select('rubro', array('*'),'id = '.$id);
      $rubro = $elrubro[0];
      $this->id = $id;
      $this->nombre = $rubro['nombre'];
      $this->mensaje = $rubro['mensaje'];
    }
  }  
  
  // Getters 
  
  public function getId() {
    return $this->id;
  }
  
  public function getNombre() {
    return $this->nombre;
  }
  
  public function getMensaje() {
    return $this->mensaje;
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
  
  public function setMensaje($nuevomensaje) {
    $this->mensaje = $nuevomensaje;
    array_push($this->columnasmodificadas, 'mensaje');
  }
  
  
  
  // Funciones generales


  public function save() {
    if (isset($this->id)) {
      $existe = (count(execute_select('rubro', array('id'),'id = '.$this->id)) > 0)? true : false;
    } else {
      $existe = false;
    }
    $datos = array();
    foreach($this->columnasmodificadas as $columna) {
      $nombrecolumna = $columna;
      $datos[$nombrecolumna] = $this->$columna; 
    }
    if($existe) {
      execute_update('rubro', $datos,'id = '.$this->id);
    } else {
      $result_insert = execute_insert('rubro', $datos);
      $this->id = $result_insert;      
    }
    return $this->id;
  }

  public function getAll()
  {
      $array = array();
      $rubros = execute_select('rubro', array('*'));
      if (count($rubros) > 0) {
        for($i = 0;$i<count($rubros);$i++)
        {
            $id = $rubros[$i]['id'];
            $rubro = new Rubro($id);
            $array[] = $rubro;
        }
      }
      return $array;
  }

  public static function delete($id = NULL)
  {
      if($id)
      {
        $bool = execute_delete("recorrido_categoria_rubro", "rubro=$id");
        if(($bool)||(mysql_affected_rows()==0)){
            if(execute_delete("rubro", "id=$id")){
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
      }
  }
}
?>