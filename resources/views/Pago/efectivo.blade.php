    @include('layouts.header')

    <style>
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
            transform-style: preserve-3d;
        }

        .card:hover {
            transform: rotateY(10deg);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.4); /* Ajusta los valores según tu preferencia */
        }

        .overlay-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(150, 147, 147, 0.1); /* Fondo con opacidad */
            padding: 10px;
        }

        .vintage-text2 {
            color: #000; /* Color de texto negro */
            font-weight: bold; /* Texto en negrita */
            font-family: 'Courier New', monospace; /* Fuente de estilo retro */
            text-align: center; /* Alineación centrada del texto */
            font-size: 44px; /* Tamaño de fuente */
        }

        /* Estilo para la tabla vintage */
        .vintage-table {
            border-collapse: collapse;
            width: 100%;
            font-family: 'Courier New', monospace; /* Fuente de estilo retro */
            margin-top: 20px; /* Espacio superior */
        }

        .vintage-table th, .vintage-table td {
            border: 1px solid #964f19; /* Borde con color del texto */
            padding: 8px;
            text-align: left;
        }

        .vintage-table thead {
            background-color: #f5e8c0; /* Color de fondo para la fila de encabezados */
        }

        .vintage-table th {
            background-color: #964f19; /* Color de fondo para las celdas de encabezado */
            color: #fff; /* Color del texto de encabezado */
        }

        .vintage-table tbody tr:nth-child(even) {
            background-color: #f5e8c0; /* Color de fondo para filas pares */
        }

        .vintage-table tbody tr:nth-child(odd) {
            background-color: #fff; /* Color de fondo para filas impares */
        }

        .vintage-table tfoot {
            background-color: #f5e8c0; /* Color de fondo para la fila de pie de tabla */
        }

        .vintage-table tfoot td {
            font-weight: bold; /* Texto del pie de tabla en negrita */
        }
        
        .vintage-text {
            background-color: #f5e8c0; /* Fondo desgastado */
            font-family: 'Courier New', monospace; /* Fuente de estilo retro */
            padding: 10px; /* Espacio interno para el texto */
            border-radius: 5px; /* Bordes redondeados */
            font-size: 44px; /* Tamaño de fuente */
            text-align: center; /* Centrar el texto horizontalmente */
        }
    </style>

    <div style="
    background:#e2d9c2;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    height:100%;
    margin:0%
    ">
        <div class="container  p-5 ">
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
        
            <div class="card">
                <div class="position-relative">
                    <img src="{{ asset('imgC/baner2.jpg') }}" alt="Imagen de encabezado" class="card-img-top w-100" style="max-height: 180px;">
                    <div class="overlay-text">
                        @if($tipoventa == 1 )
                        <h2 class="vintage-text2 text-white">Resumen del evento</h2>

                        @else
                        <h2 class="vintage-text2 text-white">Resumen del pedido</h2>

                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <!-- Contenido de la tabla vintage -->
                    <div class="d-flex flex-row justify-content-between align-items-start">
                        <div class="flex-fill mr-3">
                            <div class="table-responsive">
                                <table class="vintage-table">
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
                                        <tr  id="{{ $item['producto']->id_producto}}">
                                            
                                            <td>{{ $item['producto']->nombre }}</td>
                                            <td>
                                            <input type="number" name="cantidad[{{ $item['producto']->id_producto }}]" class="cantidad-input" min="1" data-product-id="{{ $item['producto']->id_producto }}" value="{{ $item['cantidad'] }}">
                                            </td>
                                    
                                            <td class="precioU">${{ number_format($item['producto']->precio, 2) }}</td>
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
                </div>

                <div class="flex-fill col-md-12 mt-4 p-3">
                @if($tipoventa == 1)
                    <h1 class="vintage-text">Programar un Evento</h1>
                @endif
                    <div class="mb-3">
                        <label for="nombre_cliente" class="form-label">Nombre del cliente:</label>
                        <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" required>
                    </div>
                
                    @if($tipoventa == 1)
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label for="cantidad_personas" class="form-label">Cantidad de personas:</label>
                            <input type="number" class="form-control" id="cantidad_personas"  pattern="^[1-9]\d*$" min="1" required   name="cantidad_personas" required  oninput="this.setCustomValidity('')">
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
                
                    <div class="text-center">
                        <button type="submit" class="btn btn-success btn-vintage">Guardar</button>
                        <input type="hidden" name="id_estado_pedido" value="1">
                    </div>
                </div>
                
                    </form>
                </div>
            </div>
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

                    ////////Actualizacion en inputs
            var inputs = document.querySelectorAll('.cantidad-input');
    inputs.forEach(function(input) {
        input.addEventListener('change', function() {
            var row = this.closest('tr');
            var cantidadInput = this;
            var precioUnitarioElement = row.querySelector('.precioU');
            var precioTotalElement = row.querySelector('td:last-child'); // Último <td> en la fila

            var cantidad = parseFloat(cantidadInput.value);
            var precioUnitario = parseFloat(precioUnitarioElement.textContent.replace('$', '').trim());
            var nuevoPrecioTotal = cantidad * precioUnitario;

            // Actualizar el valor en la última columna de la fila
            precioTotalElement.textContent = '$' + nuevoPrecioTotal.toFixed(2);

            // Recalcular el total general
            var total = 0;
            var precioTotalElements = document.querySelectorAll('td:last-child');
                // precioTotalElements.forEach(function(element) {
                //       total += parseFloat(element.textContent.replace('$', ''));
            //});

            var totalPagar = calcularTotalPagar();
                document.querySelector('tfoot td:last-child').innerText = "$" + totalPagar.toFixed(2);
                document.querySelector('input[name="total_pagar"]').value = totalPagar.toFixed(2);
                });
            });


                    function actualizarTabla() {
                        var cantidadPersonas = parseInt(document.getElementById('cantidad_personas').value);
                    
                        // Establecer el valor de "Cantidad de Personas" en todos los campos de entrada
                        var cantidades = document.querySelectorAll('.cantidad-input');
                        cantidades.forEach(function(input) {
                            input.value = cantidadPersonas;
                        });                        
                        if (cantidadPersonas < 1) {
                                alert('La cantidad de personas debe ser mayor a 0.');
                                document.getElementById('cantidad_personas').value =0;
                                cantidades.forEach(function(input) {
                                    input.value = 0;
                                });
                                event.preventDefault(); // Evita que se envíe el formulario
                            
                        }else{  
                            
                            document.querySelectorAll('tbody tr').forEach(function(row) {
                            var precioUnitario = parseFloat(row.querySelector('.precioU').textContent.replace('$', '').trim());
                            var nuevoPrecioTotal = precioUnitario * cantidadPersonas;

                            // Actualizar el precio total en la tabla
                            row.querySelector('td:last-child').innerText = "$" + nuevoPrecioTotal.toFixed(2);
                        });

                        // Actualizar el total a pagar
                        var totalPagar = calcularTotalPagar();
                        document.querySelector('tfoot td:last-child').innerText = "$" + totalPagar.toFixed(2);
                        document.querySelector('input[name="total_pagar"]').value = totalPagar.toFixed(2);
                        }                    
                        
                    }


            function calcularTotalPagar() {
                var totalPagar = 0;

                // Calcular el total a pagar sumando los precios totales de cada producto
                document.querySelectorAll('tbody tr').forEach(function(row) {
                    var precioTotal = parseFloat(row.cells[3].innerText.replace('$', ''));
                    totalPagar += precioTotal;
                });

                return totalPagar;
            }

            // Agregar un evento al campo de cantidad de personas para actualizar la tabla
            document.getElementById('cantidad_personas').addEventListener('change', actualizarTabla);
        });
        
    </script>


