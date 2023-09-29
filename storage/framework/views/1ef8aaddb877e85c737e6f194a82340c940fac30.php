<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('id_producto')); ?>

            <?php echo e(Form::text('id_producto', $producto->id_producto, ['class' => 'form-control' . ($errors->has('id_producto') ? ' is-invalid' : ''), 'placeholder' => 'Id Producto'])); ?>

            <?php echo $errors->first('id_producto', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('nombre')); ?>

            <?php echo e(Form::text('nombre', $producto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre'])); ?>

            <?php echo $errors->first('nombre', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('precio')); ?>

            <?php echo e(Form::text('precio', $producto->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio'])); ?>

            <?php echo $errors->first('precio', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('image_url')); ?>

            <?php echo e(Form::text('image_url', $producto->image_url, ['class' => 'form-control' . ($errors->has('image_url') ? ' is-invalid' : ''), 'placeholder' => 'Image Url'])); ?>

            <?php echo $errors->first('image_url', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('descripcion_prod')); ?>

            <?php echo e(Form::text('descripcion_prod', $producto->descripcion_prod, ['class' => 'form-control' . ($errors->has('descripcion_prod') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Prod'])); ?>

            <?php echo $errors->first('descripcion_prod', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('categoria')); ?>

            <?php echo e(Form::text('categoria', $producto->categoria, ['class' => 'form-control' . ($errors->has('categoria') ? ' is-invalid' : ''), 'placeholder' => 'Categoria'])); ?>

            <?php echo $errors->first('categoria', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('estado')); ?>

            <?php echo e(Form::text('estado', $producto->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado'])); ?>

            <?php echo $errors->first('estado', '<div class="invalid-feedback">:message</div>'); ?>

        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
    </div>
</div><?php /**PATH C:\Users\Juan\Documents\Mis archivos\web_libre\proyecto_php\Restaurante_Web\resources\views/productos/form.blade.php ENDPATH**/ ?>