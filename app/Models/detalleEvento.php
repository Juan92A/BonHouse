<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;


class DetalleEvento extends Model
{
    protected $table = 'detalleEventos'; // Nombre de la tabla en la base de datos
    public $timestamps = false; // Desactivar las columnas de timestamps (created_at y updated_at)

    protected $fillable = [
        'id_producto',
        'id_pedido',
        'cantidad_personas',
    ]; // Campos que se pueden asignar masivamente

    // Métodos para interactuar con la base de datos

    public function guardarDetallePedido()
    {
        try {
            DB::table('detalleEventos')->insert([
                'id_producto' => $this->idProducto,
                'id_pedido' => $this->idPedido,
                'cantidad_personas' => $this->cantidad_personas,
            ]);

            return true; // Retorna true si se guardó correctamente

        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            return false; // Retorna false si hubo un error
        }
    }

    public function obtenerDetallesPedido($idPedido)
    {
        try {
            $detallesEvento = DetalleEvento::join('productos', 'detalleEventos.id_producto', '=', 'productos.id_producto')
                ->select('detalleEventos.cantidad_personas', 'productos.nombre', 'productos.precio')
                ->where('detalleEventos.id_pedido', $idPedido)
                ->get();
    
            
            return $detallesEvento;
    
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    // Otros métodos para consultar, actualizar o eliminar detalles de pedido si es necesario
}

?>

