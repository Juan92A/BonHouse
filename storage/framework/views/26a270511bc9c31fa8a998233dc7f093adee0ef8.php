

<?php $__env->startSection('content'); ?>
<style>
    .vintage-text {
        background-color: #f5e8c0;
        font-family: 'Courier New', monospace;
        padding: 10px;
        border-radius: 5px;
        font-size: 44px;
        text-align: center;
    }

    .vintage-button {
        background-color: #f5e8c0;
        color: #964f19;
        border: 2px solid #964f19;
        font-family: 'Courier New', monospace;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        display: inline-block;
        transition: background-color 0.3s, color 0.3s;
    }

    .vintage-button:hover {
        background-color: #964f19;
        color: #f5e8c0;
    }
</style>
<div class="container">
    <h1 class="mt-5 vintage-text">Editar categoría</h1>
    <form method="post" action="<?php echo e(route('categorias.update', ['id_categoria' => $categoria->id_categoria])); ?>">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="id_categoria" value="<?php echo e($categoria->id_categoria); ?>">
        <div class="form-group mt-3">
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo e($categoria->descripcion); ?>">
        </div>
        <div class="form-group mt-3">
            <label for="estado">Estado:</label>
            <select class="form-control" id="estado" name="estado" required>
                <option value="1" <?php echo e(($categoria->estado == 1) ? 'selected' : ''); ?>>Disponible</option>
                <option value="2" <?php echo e(($categoria->estado == 2) ? 'selected' : ''); ?>>No disponible</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-4 vintage-button" onclick="mostrarAlerta()">Actualizar</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
   function mostrarAlerta() {
        Swal.fire({
            title: 'Categoría actualizada',
            text: 'Categoría actualizada correctamente',
            icon: 'success',
            showConfirmButton: false
        });

        // Opcionalmente, puedes agregar un temporizador para cerrar automáticamente la alerta
        setTimeout(function() {
            Swal.close();
        }, 2000); // Cerrar después de 2 segundos (ajusta el valor a tu preferencia)
    }
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\kikii\Desktop\BonHouse\resources\views/categorias/show.blade.php ENDPATH**/ ?>