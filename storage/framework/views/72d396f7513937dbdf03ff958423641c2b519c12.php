<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('id_estado_pedido')); ?>

            <?php echo e(Form::text('id_estado_pedido', $estadoPedido->id_estado_pedido, ['class' => 'form-control' . ($errors->has('id_estado_pedido') ? ' is-invalid' : ''), 'placeholder' => 'Id Estado Pedido'])); ?>

            <?php echo $errors->first('id_estado_pedido', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('Estado')); ?>

            <?php echo e(Form::text('Estado', $estadoPedido->Estado, ['class' => 'form-control' . ($errors->has('Estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado'])); ?>

            <?php echo $errors->first('Estado', '<div class="invalid-feedback">:message</div>'); ?>

        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
    </div>
</div><?php /**PATH C:\Users\Juan\Documents\Mis archivos\web_libre\proyecto_php\Restaurante_Web\resources\views/estado-pedidos/form.blade.php ENDPATH**/ ?>