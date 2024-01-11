<?php
namespace Model;




class Medicamento extends ActiveRecord{  
    protected static $nombreTabla= 'medicamento';
    protected static $nombreID= 'Medicamento';
    protected static $columnasDB= ['idMedicamento', 'nombre_generico','concentracion', 'nombre_laboratorio', 'formula',
    'fecha_vencimiento','administracion', 'presentacion', 'receta', 'conservacion','advertencia'];
    protected static $error = '';
    public $idMedicamento;
    public $nombre_generico;
    public $nombre_laboratorio;
    public $concentracion;    
    public $formula;
    public $fecha_vencimiento;
    public $administracion;
    public $presentacion;
    public int $receta;
    public $conservacion;
    public $advertencia;
    
    function __construct($arreglo = [] ){

        $this->idMedicamento =  $arreglo['idProducto'] ?? null;
        $this->nombre_generico = $arreglo['nombre_generico'] ?? '';
        $this->concentracion = $arreglo['concentracion'] ?? '';
        $this->nombre_laboratorio = $arreglo['nombre_laboratorio'] ?? '';        
        $this->formula = $arreglo['formula'] ?? '';
        $this->fecha_vencimiento = $arreglo['fecha_vencimiento'] ?? '';
        $this->administracion = $arreglo['administracion'] ?? '';
        $this->presentacion = $arreglo['presentacion'] ?? '';
        $this->receta = intval($arreglo['receta']) ?? 0;
        $this->conservacion = $arreglo['conservacion'] ?? '';
        $this->advertencia = $arreglo['advertencia'] ?? '';
               

    }
    
    
}