<?php
class Venta {
    private $motosVendidas;
    private $cliente;

    public function __construct($motosVendidas, $cliente) {
        $this->motosVendidas = $motosVendidas;
        $this->cliente = $cliente;
    }

    public function retornarTotalVentaNacional() {
        $total = 0;
        foreach ($this->motosVendidas as $moto) {
            if ($moto instanceof MotoNacional) {
                $total += $moto->darPrecioVenta();
            }
        }
        return $total;
    }

    public function retornarMotosImportadas() {
        $motosImportadas = [];
        foreach ($this->motosVendidas as $moto) {
            if ($moto instanceof MotoImportada) {
                $motosImportadas[] = $moto;
            }
        }
        return $motosImportadas;
    }

    public function __toString() {
        $info = "Cliente: $this->cliente\nMotos Vendidas:\n";
        foreach ($this->motosVendidas as $moto) {
            $info .= $moto . "\n";
        }
        return $info;
    }
}
