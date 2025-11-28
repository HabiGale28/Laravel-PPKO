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
        <h2 style="font-size: 24px; font-weight: bold; color: #333;">Edit Destinasi Wisata</h2>
        <a href="<?php echo e(route('admin.destinasi.index')); ?>" class="btn" style="background: #6c757d; color: white;">&larr; Kembali</a>
    </div>

    <form action="<?php echo e(route('admin.destinasi.update', $destinasi->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        
        <div style="display: grid; grid-template-columns: 300px 1fr; gap: 30px;">
            
            <div style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); height: fit-content;">
                <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 15px; color: #555;">Gambar Utama</h3>
                
                <?php if($destinasi->gambar_utama): ?>
                    <div style="margin-bottom: 15px; text-align: center;">
                        <img src="<?php echo e(asset('uploads/' . $destinasi->gambar_utama)); ?>" alt="Gambar Saat Ini" style="width: 100%; border-radius: 5px; border: 1px solid #ddd;">
                        <p style="font-size: 12px; color: #888; margin-top: 5px;">Gambar saat ini</p>
                    </div>
                <?php endif; ?>

                <div style="border: 2px dashed #ddd; padding: 20px; text-align: center; border-radius: 5px; margin-bottom: 15px;">
                    <span style="font-size: 40px; color: #ccc;">📷</span>
                    <p style="font-size: 12px; color: #999; margin-top: 10px;">Ganti Gambar (Opsional)</p>
                    <input type="file" name="gambar_utama" style="margin-top: 10px; font-size: 12px; width: 100%;">
                </div>
                
                <div class="form-group">
                    <label style="font-size: 14px;">Status</label>
                    <select name="status" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
                        <option value="publish" <?php if(old('status', $destinasi->status) == 'publish'): echo 'selected'; endif; ?>>Publikasikan</option>
                        <option value="draft" <?php if(old('status', $destinasi->status) == 'draft'): echo 'selected'; endif; ?>>Sembunyikan</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-add" style="width: 100%; margin-top: 10px; padding: 12px;">Update Data</button>
            </div>

            <div style="background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                
                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="font-weight: 600;">Judul / Nama Tempat Wisata <span style="color:red">*</span></label>
                    <input type="text" name="judul" value="<?php echo e(old('judul', $destinasi->judul)); ?>" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div class="form-group">
                        <label style="font-weight: 600;">Tipe Pariwisata</label>
                        <select name="tipe_pariwisata" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                            <option value="">Pilih Tipe</option>
                            <option value="Pantai" <?php if(old('tipe_pariwisata', $destinasi->tipe_pariwisata) == 'Pantai'): echo 'selected'; endif; ?>>Pantai</option>
                            <option value="Gunung" <?php if(old('tipe_pariwisata', $destinasi->tipe_pariwisata) == 'Gunung'): echo 'selected'; endif; ?>>Gunung</option>
                            <option value="Budaya" <?php if(old('tipe_pariwisata', $destinasi->tipe_pariwisata) == 'Budaya'): echo 'selected'; endif; ?>>Budaya</option>
                            <option value="Religi" <?php if(old('tipe_pariwisata', $destinasi->tipe_pariwisata) == 'Religi'): echo 'selected'; endif; ?>>Religi</option>
                            <option value="Kuliner" <?php if(old('tipe_pariwisata', $destinasi->tipe_pariwisata) == 'Kuliner'): echo 'selected'; endif; ?>>Kuliner</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: 600;">Lokasi (Kecamatan/Desa)</label>
                        <input type="text" name="lokasi" value="<?php echo e(old('lokasi', $destinasi->lokasi)); ?>" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                    </div>
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="font-weight: 600;">Provinsi</label>
                    <input type="text" name="provinsi" value="<?php echo e(old('provinsi', $destinasi->provinsi)); ?>" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="font-weight: 600;">Deskripsi Singkat (Tampil di Card)</label>
                    <textarea name="deskripsi_singkat" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"><?php echo e(old('deskripsi_singkat', $destinasi->deskripsi_singkat)); ?></textarea>
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="font-weight: 600;">Konten Lengkap (Artikel)</label>
                    <textarea name="konten" rows="10" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"><?php echo e(old('konten', $destinasi->konten)); ?></textarea>
                </div>

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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\wonderful-indonesia-laravel\resources\views/admin/destinasi/edit.blade.php ENDPATH**/ ?>