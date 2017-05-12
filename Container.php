<?php
class Container
{
    public $numero;
 	public $descripcion;
    public $pais;
  	public $Foto;

    public function __construct($numero,$descripcion,$pais,$Foto)
	{
		$this->numero = $numero;
		$this->descripcion = $descripcion;
		$this->pais = $pais;
		$this->Foto = $Foto;
	}
}