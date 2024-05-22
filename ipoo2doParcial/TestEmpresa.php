<?php
include_once"Cliente.php";
include_once"Moto.php";
include_once"Venta.php";
include_once"Empresa.php";
// Crear instancias de Cliente
$objCliente1 = new Cliente("Juan Perez", "Calle Falsa 123");
$objCliente2 = new Cliente("Maria Lopez", "Avenida Siempre Viva 456");

// Crear instancias de Motos
$obMoto11 = new MotoNacional(11, 2230000, 2022, "Benelli Imperiale 400", 85, true, 10);
$obMoto12 = new MotoNacional(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true, 10);
$obMoto13 = new MotoNacional(13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false);
$obMoto14 = new MotoImportada(14, 12499900, 2020, "Pitbike Enduro Motocross Apollo Aiii 190cc Plr", 100, true, "Francia", 6244400);

// Crear instancia de Empresa
$empresa = new Empresa("Alta Gama", "Av Argentina 123", [$obMoto11, $obMoto12, $obMoto13, $obMoto14], [$objCliente1, $objCliente2], []);

// Registrar ventas y visualizar resultados
$venta1 = $empresa->registrarVenta([11, 12, 13, 14], $objCliente2);
echo $venta1 . "\n";

$venta2 = $empresa->registrarVenta([13, 14], $objCliente2);
echo $venta2 . "\n";


