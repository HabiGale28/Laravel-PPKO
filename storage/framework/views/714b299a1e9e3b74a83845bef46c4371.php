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
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="font-size: 24px; font-weight: bold; color: #333;">Kelola Berita & Informasi</h2>
        <a href="<?php echo e(route('admin.berita.create')); ?>" class="btn btn-add">+ Tulis Berita Baru</a>
    </div>

    <?php if(session('success')): ?>
        <div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Variabel $daftar_berita sekarang sudah dikirim dari Controller -->
            <?php $__empty_1 = true; $__currentLoopData = $daftar_berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($index + 1); ?></td>
                    <td>
                        <?php if($item->gambar): ?>
                            <img src="<?php echo e(asset('uploads/berita/' . $item->gambar)); ?>" width="60" style="border-radius: 5px;">
                        <?php else: ?>
                            <span style="color: #999;">No Image</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <strong><?php echo e($item->judul); ?></strong><br>
                        <small style="color: #777;"><?php echo e($item->created_at->format('d M Y')); ?></small>
                    </td>
                    <td>
                        <?php if($item->status == 'publish'): ?>
                            <span style="background: #d1e7dd; color: #0f5132; padding: 3px 8px; border-radius: 5px; font-size: 12px;">Published</span>
                        <?php else: ?>
                            <span style="background: #fff3cd; color: #664d03; padding: 3px 8px; border-radius: 5px; font-size: 12px;">Draft</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo e(route('admin.berita.edit', $item->id)); ?>" class="btn btn-edit">Edit</a>
                        <form action="<?php echo e(route('admin.berita.destroy', $item->id)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" style="text-align: center; padding: 20px;">Belum ada berita/informasi.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\wonderful-indonesia-laravel\resources\views/admin/berita/index.blade.php ENDPATH**/ ?>