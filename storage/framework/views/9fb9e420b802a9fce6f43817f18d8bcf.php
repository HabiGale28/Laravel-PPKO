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
    <style>
        .welcome-banner {
            position: relative;
            background-image: url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1920');
            background-size: cover;
            background-position: center;
            padding: 100px 40px;
            border-radius: 10px;
            color: white;
            margin-bottom: 30px;
            overflow: hidden;
        }
        .welcome-banner::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,0.5);
        }
        .welcome-content {
            position: relative;
            z-index: 2;
        }
        .welcome-content h1 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 10px;
        }
        .welcome-content p {
            font-size: 18px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .stat-card {
            background: #343a40;
            color: white;
            padding: 25px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .stat-card .info h3 {
            font-size: 28px;
            font-weight: 700;
        }
        .stat-card .info p {
            font-size: 14px;
            color: #c2c7d0;
            text-transform: uppercase;
        }
        .stat-card .icon {
            font-size: 42px;
            opacity: 0.5;
        }
    </style>

    <div class="welcome-banner">
        <div class="welcome-content">
            <h1>Selamat Datang Admin</h1>
            <p>Web Destinasi Wisata</p>
        </div>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="info">
                <h3><?php echo e($total_destinasi); ?></h3>
                <p>Destinasi Wisata</p>
            </div>
            <div class="icon">🏝️</div>
        </div>
        <div class="stat-card">
            <div class="info">
                <h3><?php echo e($total_berita); ?></h3>
                <p>Berita</p>
            </div>
            <div class="icon">📰</div>
        </div>
        <div class="stat-card">
            <div class="info">
                <h3>0</h3>
                <p>Seni & Kebudayaan</p>
            </div>
            <div class="icon">🎭</div>
        </div>
        <div class="stat-card">
            <div class="info">
                <h3>0</h3>
                <p>Event</p>
            </div>
            <div class="icon">📅</div>
        </div>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\wonderful-indonesia-laravel\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>