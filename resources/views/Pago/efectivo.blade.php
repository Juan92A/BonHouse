@include('layouts.header')
<div class="container mt-5">
    <h2>Resumen del pedido</h2>
    @if (session('error_pedido'))
    <div class="alert alert-danger" role="alert">
        {{ session('error_pedido') }}
    </div>
    @endif
    @php
    session()->forget(['error_pedido', 'success_pedido']);
    @endphp
    @if($tipoventa == 1)    
    <form id="formulario_pedido" action="{{ route('pedido.procesarEvento') }}">
    @else

    <form id="formulario_pedido" action="{{ route('pedido.procesarPedido') }}">
    @endif

        <div class="d-flex flex-row justify-content-between align-items-start">
            <div class="flex-fill mr-3">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio unitario</th>
                                <th>Precio total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $total = 0;
                            @endphp

                            @foreach ($carrito as $item)
                            <tr>
                                <td>{{ $item['producto']->nombre }}</td>
                                <td>{{ $item['cantidad'] }}</td>
                                <td>${{ number_format($item['producto']->precio, 2) }}</td>
                                <td>${{ number_format($item['producto']->precio * $item['cantidad'], 2) }}</td>
                            </tr>
                            @php
                            $total += $item['producto']->precio * $item['cantidad']; // Acumular el total
                            @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-right font-weight-bold">TOTAL A PAGAR:</td>
                                <td class="font-weight-bold">${{ number_format($total, 2) }}</td>
                                <input hidden  name="total_pagar" value="{{ number_format($total, 2) }}">
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>

        <div class="flex-fill col-md-6 mt-4">
    <h2>Nombre para la orden:</h2>

    <div class="mb-3">
        <label for="nombre_cliente" class="form-label">Nombre del cliente:</label>
        <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" required>
    </div>

    @if($tipoventa == 1)
    <div class="row">
        <div class="mb-3 col-md-4">
            <label for="cantidad_personas" class="form-label">Cantidad de personas:</label>
            <input type="number" class="form-control" id="cantidad_personas" name="cantidad_personas" required>
        </div>

       
        <div class="mb-3 col-md-4">
            <label for="telefono" class="form-label">Teléfono:</label>
            <input type="tel" class="form-control" id="telefono" name="telefono" required>
        </div>
        <div class="mb-3 col-md-4">
            <label for="fecha_evento" class="form-label">Fecha del evento:</label>
            <input type="date" class="form-control" id="fecha_evento" name="fecha_evento" required>
        </div>
    </div>
    <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="nombre@ejemplo.com">
        </div>

    @endif

    <button type="submit" class="btn btn-success">Procesar Pedido</button>
    <input type="hidden" name="id_estado_pedido" value="1">
</div>

    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('formulario_pedido').addEventListener('submit', function(event) {
            var cantidadPersonas = document.getElementById('cantidad_personas').value;

            if (cantidadPersonas < 1) {
                alert('La cantidad de personas debe ser mayor a 0.');
                event.preventDefault(); // Evita que se envíe el formulario
            }
        });

        function actualizarTabla() {
            var cantidadPersonas = parseInt(document.getElementById('cantidad_personas').value);

            document.querySelectorAll('tbody tr').forEach(function(row) {
                var cantidad = parseInt(row.cells[1].innerText);
                var precioUnitario = parseFloat(row.cells[2].innerText.replace('$', ''));  // Obtener el precio unitario
                var nuevoPrecioTotal =  precioUnitario * cantidadPersonas;

                // Actualizar la cantidad y el precio total en la tabla
                row.cells[1].innerText =  cantidadPersonas;
                row.cells[3].innerText = "$" + nuevoPrecioTotal.toFixed(2);
            });

            // Actualizar el total a pagar
            var totalPagar = calcularTotalPagar();
            document.querySelector('tfoot td:last-child').innerText = "$" + totalPagar.toFixed(2);
            document.querySelector('input[name="total_pagar"]').value =  totalPagar.toFixed(2);
        }

        function calcularTotalPagar() {
            var totalPagar = 0;

            // Calcular el total a pagar sumando los precios totales de cada producto
            document.querySelectorAll('tbody tr').forEach(function(row) {
                var precioTotal = parseFloat(row.cells[3].innerText.replace('$', ''));
                totalPagar += precioTotal;
                console.log(totalPagar);
            });

            return totalPagar;
        }

        // Agregar un evento al campo de cantidad de personas para actualizar la tabla
        document.getElementById('cantidad_personas').addEventListener('change', actualizarTabla);
    });
    
</script>


