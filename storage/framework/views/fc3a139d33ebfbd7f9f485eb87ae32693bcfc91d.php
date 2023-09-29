<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('id_rol')); ?>

            <?php echo e(Form::text('id_rol', $role->id_rol, ['class' => 'form-control' . ($errors->has('id_rol') ? ' is-invalid' : ''), 'placeholder' => 'Id Rol'])); ?>

            <?php echo $errors->first('id_rol', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('rol')); ?>

            <?php echo e(Form::text('rol', $role->rol, ['class' => 'form-control' . ($errors->has('rol') ? ' is-invalid' : ''), 'placeholder' => 'Rol'])); ?>

            <?php echo $errors->first('rol', '<div class="invalid-feedback">:message</div>'); ?>

        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
    </div>
</div><?php /**PATH C:\Users\Juan\Documents\Mis archivos\web_libre\proyecto_php\Restaurante_Web\resources\views/roles/form.blade.php ENDPATH**/ ?>