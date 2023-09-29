

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="table-responsive">
        <table class="table table-striped table-hover table-borderless align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rol</th> <!-- Nueva columna para el rol -->
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
                                    <select name="role" class="form-select" onchange="this.form.submit()">
                                        <option value="<?php echo e($user->role); ?>"><?php echo e($user->rol ==1?'Administrador':'Usuario'); ?>

                                        </option>
                                        <?php if($user->rol ===1): ?>
                                        <option value="2" <?php echo e($user->role == 2 ? 'selected' : ''); ?>>Usuario</option>
                                        <?php else: ?>
                                        <option value="1" <?php echo e($user->role == 1 ? 'selected' : ''); ?>>Administrador</option>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Juan\Documents\Mis archivos\web_libre\proyecto_php\BonHouse\resources\views/Admin/usuarios.blade.php ENDPATH**/ ?>