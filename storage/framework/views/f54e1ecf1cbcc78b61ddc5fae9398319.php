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
        <h2>Buat Pengumuman</h2>
        <form action="<?php echo e(route('admin.pengumuman.store')); ?>" method="POST" enctype="multipart/form-data" style="background:white; padding:20px; border-radius:8px;">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label>Judul Pengumuman</label>
                <input type="text" name="judul" required>
            </div>
            <div class="form-group">
                <label>Isi Pengumuman</label>
                <textarea name="konten" rows="10" style="width:100%; border:1px solid #ddd; padding:10px;"></textarea>
            </div>
            <div class="form-group">
                <label>Gambar Lampiran (Opsional)</label>
                <input type="file" name="gambar">
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status">
                    <option value="publish">Publikasikan</option>
                    <option value="draft">Draft</option>
                </select>
            </div>
            <button class="btn btn-add">Simpan</button>
        </form>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\wonderful-indonesia-laravel\resources\views/admin/pengumuman/create.blade.php ENDPATH**/ ?>