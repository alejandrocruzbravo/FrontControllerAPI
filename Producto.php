<?php

class Producto {
    // Método para obtener un producto
    public static function get($id) {
        echo "Obteniendo producto con ID: $id\n";
    }

    // Método para crear un producto
    public static function post($data) {
        echo "Creando producto con los siguientes datos: " . json_encode($data) . "\n";
    }

    // Método para actualizar un producto
    public static function put($id, $data) {
        echo "Actualizando producto con ID: $id con los siguientes datos: " . json_encode($data) . "\n";
    }

    // Método para eliminar un producto
    public static function delete($id) {
        echo "Eliminando producto con ID: $id\n";
    }
}

?>













