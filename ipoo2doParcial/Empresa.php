<?php
class Empresa {
    private $denominacion;
    private $direccion;
    private $coleccionMotos;
    private $coleccionClientes;
    private $coleccionVentas;

    public function __construct($denominacion, $direccion, $coleccionMotos, $coleccionClientes, $coleccionVentas) {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->coleccionMotos = $coleccionMotos;
        $this->coleccionClientes = $coleccionClientes;
        $this->coleccionVentas = $coleccionVentas;
    }

    public function registrarVenta($colCodigosMoto, $objCliente) {
        $motosVendidas = [];
        foreach ($colCodigosMoto as $codigo) {
            foreach ($this->coleccionMotos as $moto) {
                if ($moto->codigo == $codigo && $moto->activo) {
                    $motosVendidas[] = $moto;
                }
            }
        }
        $venta = new Venta($motosVendidas, $objCliente);
        $this->coleccionVentas[] = $venta;
        return $venta;
    }

    public function informarSumaVentasNacionales() {
        $total = 0;
        foreach ($this->coleccionVentas as $venta) {
            $total += $venta->retornarTotalVentaNacional();
        }
        return $total;
    }

    public function informarVentasImportadas() {
        $ventasImportadas = [];
        foreach ($this->coleccionVentas as $venta) {
            if (!empty($venta->retornarMotosImportadas())) {
                $ventasImportadas[] = $venta;
            }
        }
        return $ventasImportadas;
    }

    public function __toString() {
        $info = "Empresa: $this->denominacion, Dirección: $this->direccion\nClientes:\n";
        foreach ($this->coleccionClientes as $cliente) {
            $info .= $cliente . "\n";
        }
        $info .= "Motos:\n";
        foreach ($this->coleccionMotos as $moto) {
            $info .= $moto . "\n";
        }
        $info .= "Ventas:\n";
        foreach ($this->coleccionVentas as $venta) {
            $info .= $venta . "\n";
        }
        return $info;
    }
}
