<?php
class Cliente {
    private $nombre;
    private $direccion;

    public function __construct($nombre, $direccion) {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
    }

    public function __toString() {
        return "Cliente: $this->nombre, Dirección: $this->direccion";
    }
}
