<!DOCTYPE html>
<html>
<head>
    <title>BonHouse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body class="font-sans antialiased">
     <div class="min-h-screen bg-gray-100 dark:bg-gray-900">      
     <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

     
        <main>
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>
</html>
    <?php /**PATH C:\Users\Juanjo\Documents\MisArchivos\Gestion\Proyecto\BonHouse\resources\views/layouts/app.blade.php ENDPATH**/ ?>