

<?php $__env->startSection('content'); ?>
<style>
    .vintage-text {
        background-color: #f5e8c0;
        font-family: 'Courier New', monospace;
        padding: 10px;
        border-radius: 5px;
        font-size: 24px;
        text-align: center;
    }

    .vintage-table {
        width: 100%;
        border-collapse: collapse;
        font-family: 'Courier New', monospace;
    }

    .vintage-table th,
    .vintage-table td {
        border: 1px solid #964f19;
        padding: 8px;
        text-align: left;
    }

    .vintage-table thead {
        background-color: #f5e8c0;
    }

    .vintage-table th {
        background-color: #964f19;
        color: #f5e8c0;
    }

    .vintage-table tbody tr:nth-child(even) {
        background-color: #f5e8c0;
    }

    .vintage-table tbody tr:nth-child(odd) {
        background-color: #fff;
    }
</style>

<div class="container">
    <h1 class="mt-5 vintage-text" style="font-size: 50px">Usuarios</h1>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-borderless align-middle vintage-table">
            <thead class="table-light">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rol</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td>
                        <form method="POST" action="<?php echo e(route('user.updateRole', $user->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="form-group">
                                <?php if(auth()->guard()->check()): ?>
                                <?php if(auth()->user()->name != $user->name): ?>
                                    <select name="rol" class="form-select" onchange="this.form.submit()">
                                        <option value="<?php echo e($user->rol); ?>">
                                            <?php echo e($user->rol == 1 ? 'Administrador' : 'Usuario'); ?>

                                        </option>
                                        <?php if($user->rol === 1): ?>
                                        <option value="2" <?php echo e($user->rol == 2 ? 'selected' : ''); ?>>Usuario</option>
                                        <?php else: ?>
                                        <option value="1" <?php echo e($user->rol == 1 ? 'selected' : ''); ?>>Administrador</option>
                                        <?php endif; ?>
                                    </select>
                                <?php else: ?>
                                <small class="text-muted fs-5">Usuario actual</small>
                                <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Juanjo\Documents\MisArchivos\Gestion\Proyecto\BonHouse\resources\views/Admin/usuarios.blade.php ENDPATH**/ ?>