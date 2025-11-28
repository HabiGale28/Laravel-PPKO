<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div style="margin-bottom: 20px;">
        <a href="<?php echo e(route('admin.galeri.index')); ?>" class="btn" style="background: #777; color: white;">&larr; Kembali ke Album</a>
        <h2>Album: <?php echo e($album->nama_album); ?></h2>
    </div>

    <!-- Form Upload Foto -->
    <div style="background: white; padding: 20px; border-radius: 8px; margin-bottom: 30px;">
        <h4>Upload Foto ke Album Ini</h4>
        <form action="<?php echo e(route('admin.galeri.upload', $album->id)); ?>" method="POST" enctype="multipart/form-data" style="display: flex; gap: 10px; align-items: flex-end;">
            <?php echo csrf_field(); ?>
            <div style="flex: 1;">
                <label>Pilih Foto</label>
                <input type="file" name="file_foto" required style="width: 100%;">
            </div>
            <div style="flex: 1;">
                <label>Judul Foto (Opsional)</label>
                <input type="text" name="judul_foto" style="width: 100%;">
            </div>
            <button class="btn btn-add">Upload</button>
        </form>
    </div>

    <!-- List Foto -->
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); gap: 15px;">
        <?php $__currentLoopData = $album->fotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div style="position: relative; group;">
            <img src="<?php echo e(asset('uploads/fotos/'.$foto->file_foto)); ?>" style="width: 100%; height: 150px; object-fit: cover; border-radius: 5px;">
            <form action="<?php echo e(route('admin.galeri.foto.delete', $foto->id)); ?>" method="POST" style="position: absolute; top: 5px; right: 5px;">
                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                <button onclick="return confirm('Hapus foto?')" style="background: red; color: white; border: none; padding: 5px; border-radius: 3px; cursor: pointer;">X</button>
            </form>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\wonderful-indonesia-laravel\resources\views/admin/galeri/show.blade.php ENDPATH**/ ?>