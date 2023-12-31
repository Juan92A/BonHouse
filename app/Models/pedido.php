<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pedido extends Model
{
    protected $table = 'pedidos'; // Nombre de la tabla en la base de datos
    public $timestamps = false; // Desactivar las columnas de timestamps (created_at y updated_at)

    protected $fillable = [
        'total_pagar',
        'fecha_pedido',
        'id_estado_pedido',
        'id_usuario',
        'nombre_cliente',
    ]; // Campos que se pueden asignar masivamente

    // Métodos para interactuar con la base de datos

    public function guardar()
    {
        try {
            $pedido = new Pedido([
                'total_pagar' => $this->total_pagar,
                'fecha_pedido' => $this->fecha_pedido,
                'id_estado_pedido' => $this->id_estado_pedido,
                'id_usuario' => $this->id_usuario,
                'nombre_cliente' => $this->nombre_cliente,
            ]);

            $pedido->save();
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function listarPedidos($fecha = null, $estado = null)
    {
        try {
            if ($fecha === null) {
                $fecha = date('Y-m-d');
            }

            $query = DB::table('pedidos')
                ->join('users', 'pedidos.id_usuario', '=', 'users.id')
                ->join('estado_pedidos', 'pedidos.id_estado_pedido', '=', 'estado_pedidos.id_estado_pedido')
                ->where('pedidos.fecha_pedido', $fecha);

            if ($estado !== null) {
                $query->orWhere('pedidos.id_estado_pedido', $estado);
            }

            $resultados = $query->get();

            return $resultados;

        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    public function actualizarEstado($id_pedido, $id_estado)
    {
        try {
            DB::table('pedidos')
                ->where('id_pedido', $id_pedido)
                ->update(['id_estado_pedido' => $id_estado]);
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function obtenerPedidoPorId($idPedido)
    {
        try {
            $pedido = DB::table('pedidos')
                ->join('users', 'pedidos.id_usuario', '=', 'users.id')
                ->join('estado_pedidos', 'pedidos.id_estado_pedido', '=', 'estado_pedidos.id_estado_pedido')
                ->where('pedidos.id_pedido', $idPedido)
                ->first();

              

            return $pedido;

        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function obtenerPedidosPorUsuario($id_usuario, $fecha = null, $estado = null)
    {
        try {
            $query = DB::table('pedidos AS p')
                ->select('p.*')
                ->join('users AS u', 'u.id', '=', 'p.id_usuario')
                ->join('estado_pedidos AS ep', 'ep.id_estado_pedido', '=', 'p.id_estado_pedido')
                ->where('p.id_usuario', $id_usuario);
    
            if ($fecha !== null && $estado !== null && $fecha !== "" && $estado !== "") {
                $query->where('p.fecha_pedido', $fecha)
                    ->where('p.id_estado_pedido', $estado);
            } elseif ($fecha !== null && $fecha !== "") {
                $query->where('p.fecha_pedido', $fecha);
            } elseif ($estado !== null && $estado !== "") {
                $query->where('p.id_estado_pedido', $estado);
            }
    
            $resultados = $query->get();

        
          
            return $resultados;
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
    

    // Otros métodos para consultar, actualizar o eliminar pedidos si es necesario
}

?>

