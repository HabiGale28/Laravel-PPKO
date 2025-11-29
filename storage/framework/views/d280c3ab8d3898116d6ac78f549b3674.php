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
        <h2 style="font-size: 24px; font-weight: bold; color: #333;">Tambah Destinasi Wisata</h2>
    </div>

    <form action="<?php echo e(route('admin.destinasi.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        
        <div style="display: grid; grid-template-columns: 300px 1fr; gap: 30px;">
            
            <!-- KOLOM KIRI: UPLOAD GAMBAR -->
            <div style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); height: fit-content;">
                <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 15px; color: #555;">Upload Gambar</h3>
                
                <div style="border: 2px dashed #ddd; padding: 20px; text-align: center; border-radius: 5px; margin-bottom: 15px;">
                    <span style="font-size: 40px; color: #ccc;">📷</span>
                    <p style="font-size: 12px; color: #999; margin-top: 10px;">Upload Gambar Utama</p>
                    <input type="file" name="gambar_utama" style="margin-top: 10px; font-size: 12px;">
                </div>
                
                <div class="form-group">
                    <label style="font-size: 14px;">Status</label>
                    <select name="status" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
                        <option value="publish">Publikasikan</option>
                        <option value="draft">Sembunyikan</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-add" style="width: 100%; margin-top: 10px; padding: 12px;">Simpan Data</button>
            </div>

            <!-- KOLOM KANAN: FORM DATA -->
            <div style="background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                
                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="font-weight: 600;">Judul / Nama Tempat Wisata <span style="color:red">*</span></label>
                    <input type="text" name="judul" value="<?php echo e(old('judul')); ?>" placeholder="Contoh: Pantai Lombok" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div class="form-group">
                        <label style="font-weight: 600;">Tipe Pariwisata</label>
                        <select name="tipe_pariwisata" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                            <option value="">Pilih Tipe</option>
                            <option value="Pantai">Pantai</option>
                            <option value="Gunung">Gunung</option>
                            <option value="Budaya">Budaya</option>
                            <option value="Religi">Religi</option>
                            <option value="Kuliner">Kuliner</option>
                            <option value="Kuliner">Sumber Daya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: 600;">Lokasi (Kecamatan/Desa)</label>
                        <input type="text" name="lokasi" value="<?php echo e(old('lokasi')); ?>" placeholder="Contoh: Kec. Batu Layar" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                    </div>
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="font-weight: 600;">Provinsi</label>
                    <input type="text" name="provinsi" value="<?php echo e(old('provinsi')); ?>" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="font-weight: 600;">Deskripsi Singkat (Tampil di Card)</label>
                    <textarea name="deskripsi_singkat" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"><?php echo e(old('deskripsi_singkat')); ?></textarea>
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="font-weight: 600;">Konten Lengkap (Artikel)</label>
                    <textarea name="konten" rows="10" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"><?php echo e(old('konten')); ?></textarea>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\wonderful-indonesia-laravel\resources\views/admin/destinasi/create.blade.php ENDPATH**/ ?>