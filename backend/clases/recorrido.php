<?php
/* Class: Recorrido */
/* Representa los recorridos */
  
class Recorrido
{  
  var $id = null;
  var $nombre;
  var $descripcion;
  var $mapa;
  var $ubicacion;
  var $columnasmodificadas = array();
  
  
  // Constructor
  
  function __construct($id = null) {
    if($id) {
      $elrecorrido = execute_select('recorrido', array('*'),'id = '.$id);
      $recorrido = $elrecorrido[0];
      $this->id = $id;
      $this->nombre = $recorrido[$this->nombrecolumna('nombre')];
      $this->descripcion = $recorrido[$this->nombrecolumna('descripcion')];
      $this->mapa = $recorrido[$this->nombrecolumna('mapa')];
      $this->ubicacion = $recorrido[$this->nombrecolumna('ubicacion')];
    }
  }  
  
  // Getters 
  
  public function getId() {
    return $this->id;
  }
  
  public function getNombre() {
    return $this->nombre;
  }
  
  public function getDescripcion() {
    return $this->descripcion;
  }
  
  public function getMapa() {
    return $this->mapa;
  }
  
  public function getUbicacion() {
    return $this->ubicacion;
  }
  
  // Setters
  
  public function setNombre($nuevonombre) {
    $this->nombre = $nuevonombre;
    array_push($this->columnasmodificadas, 'nombre');
  }
  
  public function setDescripcion($nuevadescripcion) {
    $this->descripcion = $nuevadescripcion;
    array_push($this->columnasmodificadas, 'descripcion');
  }
  
  public function setMapa($nuevomapa) {
    $this->mapa = $nuevomapa;
    array_push($this->columnasmodificadas, 'mapa');
  }

  public function setFechahora($nuevafechahora) {
    $this->fechahora = $nuevafechahora;
    array_push($this->columnasmodificadas, 'fechahora');
  }
  
  public function setUbicacion($nuevaubicacion) {
    $this->ubicacion = $nuevaubicacion;
    array_push($this->columnasmodificadas, 'ubicacion');
  }
  
  // Funciones respecto a otros objetos
  
  public function agregarLugar($idlugar) {
    if (!isset($this->id)) {
      $this->save();
    }
    $datos = array('lugar_id' => $idlugar, 'recorrido_id' => $this->id);
    execute_insert('lugar_recorrido',$datos);
  }
  
  public function obtenerLugares($justid = true) {
    if (!isset($this->id)) {
      echo 'Error: no existen lugares para este recorrido.';
    }
    if ($justid) $lugares = execute_select('lugar_recorrido',array('lugar_id'),'recorrido_id = '.$this->id);
    else $lugares = execute_select('lugar_recorrido, lugar', array('*'),'recorrido_id = '.$this->id);
    return $lugares;
  }
  
  public function removerLugar($idlugar) {
    execute_delete('lugar_recorrido','recorrido_id = '.$this->id.' AND lugar_id = '.$idlugar); 
  }
  
  public function agregarCategoria($categoria) {
    if (!isset($this->id)) {
      $this->save();
    }
    $datos = array('categoria' => $categoria, 'recorrido_id' => $this->id);
    execute_insert('recorrido_categoria_rubro',$datos);    
  }
  
  public function agregarRubro($rubro) {
    if (!isset($this->id)) {
      $this->save();
    }
    $datos = array('rubro' => $rubro, 'recorrido_id' => $this->id);
    execute_insert('recorrido_categoria_rubro',$datos);    
  } 
  
  public function agregarMedia($tipo,$descripcion,$url) {
    if (!isset($this->id)) {
      $this->save();
    }
    $datos = array('tipo' => $tipo, 'descripcion' => $descripcion, 'url' => $url, 'recorrido_id' => $this->id);
    execute_insert('recorrido_media',$datos);    
  }
  
  // Funciones generales

  private function nombrecolumna($nombre) {
    switch ($nombre) {
      default:
        return $nombre;
    }
  }   

  public function save() {
    if (isset($this->id)) {
      $existe = (count(execute_select('recorrido', array('id'),'id = '.$this->id)) > 0)? true : false;
    } else {
      $existe = false;
    }
    $datos = array();
    foreach($this->columnasmodificadas as $columna) {
      $nombrecolumna = $this->nombrecolumna($columna);
      $datos[$nombrecolumna] = $this->$columna; 
    }
    if($existe) {
      execute_update('recorrido', $datos,'id = '.$this->id);
    } else {
      $result_insert = execute_insert('recorrido', $datos);
      $this->id = $result_insert;      
    }
    return $this->id;
  }

  public function getAll()
  {
      $array = array();
      $recorridos = execute_select('recorrido', array('*'));
      if (count($recorridos) > 0) {
        for($i = 0;$i<count($recorridos);$i++)
        {
            $id = $recorridos[$i]['id'];
            $recorrido = new Recorrido($id);
            $array[] = $recorrido;
        }
      }
      return $array;
  }

    public static function delete($id = NULL)
  {
      if($id)
      {
        $bool = execute_delete("recorrido", "id=$id");
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