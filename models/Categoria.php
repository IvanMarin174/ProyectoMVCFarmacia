<?php
namespace Model;
class Categoria  extends ActiveRecord {    
    protected static $nombreTabla= 'categoria';
    protected static $nombreID= 'Categoria';
    protected static $columnasDB= ['idCategoria', 'nombreCategoria'];    
    public $idCategoria;
    public $nombreCategoria;
   
    function __construct($arreglo = []){
        $this->idCategoria = '';
        $this->nombreCategoria = $arreglo['nombreCategoria'] ?? '';

    }
    
}