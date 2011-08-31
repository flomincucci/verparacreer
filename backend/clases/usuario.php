<?php
/*include_once("../system.php");*/
/* Class: Usuario */
/* Representa a los usuarios del sistema */

class Usuario
{
  var $id;
  var $nombre;
  var $mailpersonal;
  var $mailcontacto;
  var $rubro;
  var $categoria;
  var $tipousuario;
  var $mensaje;
  var $ministerio;
  var $columnasmodificadas = array();
  private $password;

  // Constructor

  function __construct($id = null) {
    if($id) {
      $elusuario = execute_select('usuario', array('*'),'id = '.$id);
      if (count($elusuario) > 0) {
        $usuario = $elusuario[0];
        $this->id = $id;
        $this->nombre = $usuario[$this->nombrecolumna('nombre')];
        $this->mailpersonal = $usuario[$this->nombrecolumna('mailpersonal')];
        $this->mailcontacto = $usuario[$this->nombrecolumna('mailcontacto')];
        $this->rubro = $usuario[$this->nombrecolumna('rubro')];
        $this->categoria = $usuario[$this->nombrecolumna('categoria')];
        $this->tipousuario = $usuario[$this->nombrecolumna('tipousuario')];
        $this->mensaje = $usuario[$this->nombrecolumna('mensaje')];
        $this->ministerio = $usuario[$this->nombrecolumna('ministerio_id')];
      }
    }
  }

  // Getters

  public function getId() {
    return $this->id;
  }

  public function getNombre() {
    return $this->nombre;
  }

  public function getMailPersonal() {
    return $this->mailpersonal;
  }

  public function getMailContacto() {
    return $this->mailcontacto;
  }

  public function getRubro() {
    return $this->rubro;
  }

  public function getCategoria() {
    return $this->categoria;
  }

  public function getTipoUsuario() {
    return $this->tipousuario;
  }

  public function getMensaje() {
    return $this->mensaje;
  }

  public function getMinisterio() {
    return $this->ministerio;
  }
  // Setters

  public function setNombre($nuevonombre) {
    $this->nombre = $nuevonombre;
    array_push($this->columnasmodificadas, 'nombre');
  }

  public function setMailPersonal($nuevomail) {
    $this->mailpersonal = $nuevomail;
    array_push($this->columnasmodificadas, 'mailpersonal');
  }

  public function setMailContacto($nuevomail) {
    $this->mailcontacto = $nuevomail;
    array_push($this->columnasmodificadas, 'mailcontacto');
  }

  public function setPassword($nuevopassword) {
    $this->password = crypt($nuevopassword,SALT);
    array_push($this->columnasmodificadas, 'password');
  }

  public function setRubro($nuevorubro) {
    $this->rubro = $nuevorubro;
    array_push($this->columnasmodificadas, 'rubro');
  }

  public function setCategoria($nuevacategoria) {
    $this->categoria = $nuevacategoria;
    array_push($this->columnasmodificadas, 'categoria');
  }

  public function setTipoUsuario($nuevotipousuario) {
    $this->tipousuario = $nuevotipousuario;
    array_push($this->columnasmodificadas, 'tipousuario');
  }

  public function setMensaje($nuevomensaje) {
    $this->mensaje = $nuevomensaje;
    array_push($this->columnasmodificadas, 'mensaje');
  }

  public function setMinisterio($nuevomensaje) {
    $this->ministerio = $nuevomensaje;
    array_push($this->columnasmodificadas, 'ministerio');
  }

  // Funciones relativas a otros objetos

  public function agregarEvento($idevento) {
    if (!isset($this->id)) {
      $this->save();
    }
    $datos = array('evento_id' => $idevento, 'usuario_id' => $this->id);
    execute_insert('usuario_evento',$datos);
  }

  // Funciones

  private function nombrecolumna($nombre) {
    switch ($nombre) {
      case 'mailpersonal':
        return 'mail_personal';
        break;
      case 'mailcontacto':
        return 'mail_contacto';
        break;
      case 'rubro':
        return 'rubro_id';
        break;
    case 'ministerio':
        return 'ministerio_id';
        break;
    case 'password':
            return 'santoysenia';
            break;
      default:
        return $nombre;
    }
  }

  public function save() {
    /* Si existe, actualiza el existente, sino, crea uno nuevo y asigna el ID correspondiente*/
    if (isset($this->id)) {
      $existe = (count(execute_select('usuario', array('id'),'id = '.$this->id)) > 0)? true : false;
    } else {
      $existe = false;
    }
    $datos = array();
    foreach($this->columnasmodificadas as $columna) {
      $nombrecolumna = $this->nombrecolumna($columna);
      $datos[$nombrecolumna] = $this->$columna;
    }
    if($existe) {
      execute_update('usuario', $datos,'id = '.$this->id);
      $this->columnasmodificadas = array();
    } else {
      $result_insert = execute_insert('usuario', $datos);
      $this->id = $result_insert;
      $this->columnasmodificadas = array();
    }
    return $this->id;
  }

  public function getAll()
  {
      $array = array();
      $usuarios = execute_select('usuario', array('*'));
      if (count($usuarios) > 0) {
        for($i = 0;$i<count($usuarios);$i++)
        {
            $id = $usuarios[$i]['id'];
            $usuario = new Usuario($id);
            $array[] = $usuario;
        }
      }
      return $array;
  }

  public static function getInvitedUsers()
  {
      $array = array();
      $usuarios = execute_select('usuario', array('*'),"tipousuario=0");
      if (count($usuarios) > 0) {
        for($i = 0;$i<count($usuarios);$i++)
        {
            $id = $usuarios[$i]['id'];
            $usuario = new Usuario($id);
            $array[] = $usuario;
        }
      }
      return $array;
  }

  public function getRubros()
  {
      $rubro = new Rubro();
      $rubros = $rubro->getAll();
      return $rubros;
  }

  public function getMinisterios()
  {
      $ministerio = new Ministerio();
      $ministerios = $ministerio->getAll();
      return $ministerios;
  }

  public function getUsuarioPorMinisterio($id)
  {
      $array = array();
      $usuarios = execute_select('usuario', array('*'),"ministerio_id=$id");
      if (count($usuarios) > 0) {
        for($i = 0;$i<count($usuarios);$i++)
        {
            $id = $usuarios[$i]['id'];
            $usuario = new Usuario($id);
            $array[] = $usuario;
        }
      }
      return $array;
  }

  public function getUsuarioPorRubro($id)
  {
      $array = array();
      $usuarios = execute_select('usuario', array('*'),"rubro_id=$id");
      if (count($usuarios) > 0) {
        for($i = 0;$i<count($usuarios);$i++)
        {
            $id = $usuarios[$i]['id'];
            $usuario = new Usuario($id);
            $array[] = $usuario;
        }
      }
      return $array;
  }

  public static function delete($id = NULL)
  {
      if($id)
      {
        $bool = execute_delete("usuario", "id=$id");
        echo $bool;
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