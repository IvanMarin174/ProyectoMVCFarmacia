<?php
namespace Model;
class Marca  extends ActiveRecord {
    
    protected static $nombreTabla= 'marca';
    protected static $nombreID= 'Marca';
    protected static $columnasDB= ['idMarca', 'nombreMarca'];   
    public $idMarca;
    public $nombreMarca;
   
    function __construct($arreglo = []){
        $this->idMarca = '';
        $this->nombreMarca = $arreglo['nombreMarca'] ?? '';

    }
    public static function marcasPorCategoria($mensaje){
        $consulta = "SELECT m.nombreMarca FROM producto p, marca m where p.idCategoria = $mensaje and p.idMarca = m.idMarca;";
        $reultado =self::cosultarSQL($consulta);
        return $reultado;
    }
    public static function marcasDesuento(){
        $consulta="SELECT m.nombreMarca FROM producto p, marca m where p.idMarca = m.idMarca and  p.descuento != 0;";
        $reultado =self::cosultarSQL($consulta);
        return $reultado;
    }
}