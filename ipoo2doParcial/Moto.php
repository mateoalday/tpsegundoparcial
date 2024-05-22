<?php
class Moto {
    protected $codigo;
    protected $costo;
    protected $anioFabricacion;
    protected $descripcion;
    protected $porcentajeIncrementoAnual;
    protected $activo;

    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activo) {
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabricacion = $anioFabricacion;
        $this->descripcion = $descripcion;
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
        $this->activo = $activo;
    }

    public function darPrecioVenta() {
        if (!$this->activo) {
            return -1;
        }

        $anio = date("Y") - $this->anioFabricacion;
        return $this->costo + $this->costo * ($anio * $this->porcentajeIncrementoAnual / 100);
    }

    public function __toString() {
        return "Código: $this->codigo, Costo: $this->costo, Año: $this->anioFabricacion, Descripción: $this->descripcion, Incremento Anual: $this->porcentajeIncrementoAnual, Activo: $this->activo";
    }
}

class MotoNacional extends Moto {
    private $porcentajeDescuento;

    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activo, $porcentajeDescuento = 15) {
        parent::__construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activo);
        $this->porcentajeDescuento = $porcentajeDescuento;
    }

    public function darPrecioVenta() {
        $precioBase = parent::darPrecioVenta();
        if ($precioBase > 0) {
            $precioBase -= $precioBase * ($this->porcentajeDescuento / 100);
        }
        return $precioBase;
    }

    public function __toString() {
        return parent::__toString() . ", Descuento: $this->porcentajeDescuento%";
    }
}

class MotoImportada extends Moto {
    private $paisImportacion;
    private $impuestoImportacion;

    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activo, $paisImportacion, $impuestoImportacion) {
        parent::__construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activo);
        $this->paisImportacion = $paisImportacion;
        $this->impuestoImportacion = $impuestoImportacion;
    }

    public function darPrecioVenta() {
        $precioBase = parent::darPrecioVenta();
        if ($precioBase > 0) {
            $precioBase += $this->impuestoImportacion;
        }
        return $precioBase;
    }

    public function __toString() {
        return parent::__toString() . ", País: $this->paisImportacion, Impuesto: $this->impuestoImportacion";
    }
}
