
<?php $__env->startSection('content'); ?>
<div class="container">
  <h1 class="mt-5">Agregar categoria</h1>
  <form class="mt-5" method="post" action="<?php echo e(route('categorias.agregar')); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="">
            </div>    
            <label for="estado">Estado:</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="1">Disponible</option>
                    <option value="2">No disponible</option>
                </select>

                <div class="form-group row mb-3 mt-4">
                  <label for="image_url" class="col-sm-3 col-form-label"><i class="fas fa-image"></i> Subir imagen:</label>
                  <div class="col">
                      <input type="file" class="form-control" id="image_url" name="image_url" accept="image/*" required>
                   
                  </div>
                  <div class="col row">
                      <label for="">Imagen seleccionada</label>
                      <img id="image_preview"  src="#" alt="Preview" style="display: none; max-width: 25%; height: auto;">
                  </div>
              </div>
                <button type="submit" class="btn btn-primary">Agregar categoria</button>

            </div>
  </form>

  <script>
    const imageInput = document.getElementById('image_url');
    const imagePreview = document.getElementById('image_preview');

    imageInput.addEventListener('change', (e) => {
        const file = e.target.files[0];
        const reader = new FileReader();

        reader.onload = (event) => {
            imagePreview.src = event.target.result;
            imagePreview.style.display = 'block';
        };

        reader.readAsDataURL(file);
    });
</script>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Juanjo\Documents\MisArchivos\Gestion\Proyecto\BonHouse\resources\views/categorias/create.blade.php ENDPATH**/ ?>