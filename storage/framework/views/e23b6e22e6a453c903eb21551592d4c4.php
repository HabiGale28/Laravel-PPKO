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
        <h2 style="font-size: 24px; font-weight: bold; color: #333;">Tulis Berita Baru</h2>
        <a href="<?php echo e(route('admin.berita.index')); ?>" class="btn" style="background: #6c757d; color: white;">&larr; Kembali</a>
    </div>

    <form action="<?php echo e(route('admin.berita.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        
        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">
            
            <!-- KOLOM KIRI: KONTEN -->
            <div style="background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="font-weight: 600;">Judul Berita</label>
                    <input type="text" name="judul" value="<?php echo e(old('judul')); ?>" placeholder="Masukkan judul..." style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>

                <div class="form-group">
                    <label style="font-weight: 600;">Isi Berita</label>
                    <textarea name="konten" rows="15" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"><?php echo e(old('konten')); ?></textarea>
                </div>
            </div>

            <!-- KOLOM KANAN: META -->
            <div style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); height: fit-content;">
                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="font-weight: 600;">Gambar Utama</label>
                    <div style="border: 2px dashed #ddd; padding: 20px; text-align: center; border-radius: 5px; margin-top: 5px;">
                        <input type="file" name="gambar" style="font-size: 12px;">
                    </div>
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="font-weight: 600;">Status</label>
                    <select name="status" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                        <option value="publish">Terbitkan</option>
                        <option value="draft">Simpan Draft</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-add" style="width: 100%; padding: 12px;">Simpan Berita</button>
            </div>
        </div>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\wonderful-indonesia-laravel\resources\views/admin/berita/create.blade.php ENDPATH**/ ?>