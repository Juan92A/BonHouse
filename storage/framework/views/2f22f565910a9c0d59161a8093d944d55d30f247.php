 <!-- Suponiendo que tienes una plantilla llamada app.blade.php en resources/views/layouts -->

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mt-3" style="color: #c43f3f;">Editar perfil</h1>
    <hr>
    <?php if(session('msg')): ?>
    <div class="alert alert-<?php echo e(session('msg_type')); ?>" role="alert">
        <?php echo e(session('msg')); ?>

    </div>
    <?php endif; ?>

    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <form action="<?php echo e(route('usuario.actualizarPerfil')); ?>" method="post" class="form-inline">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre_usuario" class="mb-2 mt-3">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="<?php echo e($usuario->name); ?>" value="<?php echo e($usuario->name); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="correo" class="mb-2 mt-3">Correo:</label>
                                    <input type="email" class="form-control" id="correo" name="correo" placeholder="<?php echo e($usuario->email); ?>" value="<?php echo e($usuario->email); ?>" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3" title="Guardar cambios"  onclick="mostrarAlerta()">
                            Guardar Cambios <i class="fa fa-save"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
   function mostrarAlerta() {
        Swal.fire({
            title: 'Datos actualizados',
            text: 'Datos actualizados correctamente',
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\kikii\Desktop\BonHouse\resources\views/usuario/editperfil.blade.php ENDPATH**/ ?>