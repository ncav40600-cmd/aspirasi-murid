

<?php $__env->startSection('title', 'Admin - Panel Kendali '); ?>

<?php $__env->startSection('content'); ?>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Outfit:wght@600;800;900&display=swap" rel="stylesheet">

<style>
    :root {
        --max-blue: #0ea5e9;
        --max-blue-soft: rgba(14, 165, 233, 0.1);
        --max-dark: #0f172a;
        --max-sub: #64748b;
        --bg-main: #f1f5f9;
        --glass: rgba(255, 255, 255, 0.8);
        --transition-base: all 0.4s cubic-bezier(0.2, 1, 0.2, 1);
    }

    body {
        background-color: var(--bg-main);
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: var(--max-dark);
        overflow-x: hidden;
    }

    .zenith-wrapper {
        padding: 2rem;
        max-width: 1600px;
        margin: 0 auto;
    }

    /* --- TOP NAVIGATION BAR STYLE --- */
    .command-header {
        margin-bottom: 2.5rem;
        animation: fadeInDown 0.8s ease-out;
    }

    .hero-title {
        font-family: 'Outfit', sans-serif;
        font-weight: 900;
        font-size: 2.8rem;
        letter-spacing: -0.05em;
        line-height: 1;
        background: linear-gradient(135deg, #0f172a 0%, #334155 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* --- BENTO STATS (PREMIUM) --- */
    .stat-card {
        background: var(--glass);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.7);
        border-radius: 24px;
        padding: 1.5rem;
        transition: var(--transition-base);
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 30px -10px rgba(0,0,0,0.05);
    }

    .stat-card:hover {
        transform: translateY(-6px) scale(1.02);
        background: #ffffff;
        border-color: var(--max-blue);
        box-shadow: 0 20px 40px -15px rgba(14, 165, 233, 0.15);
    }

    .stat-icon-box {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.25rem;
        font-size: 1.2rem;
    }

    .val-text {
        font-family: 'Outfit', sans-serif;
        font-size: 2.2rem;
        font-weight: 800;
        line-height: 1;
        margin-bottom: 0.25rem;
    }

    .label-text {
        font-size: 0.75rem;
        font-weight: 700;
        color: var(--max-sub);
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    /* --- DATA TABLE SYSTEM --- */
    .data-panel {
        background: white;
        border-radius: 30px;
        border: 1px solid #e2e8f0;
        padding: 1.5rem;
        box-shadow: 0 20px 50px -20px rgba(0,0,0,0.05);
    }

    .table-custom { border-collapse: separate; border-spacing: 0 8px; }
    .table-custom thead th {
        background: transparent;
        border: none;
        color: var(--max-sub);
        font-size: 0.7rem;
        font-weight: 800;
        text-transform: uppercase;
        padding: 1rem;
    }

    .table-custom tbody tr {
        background: #f8fafc;
        transition: var(--transition-base);
    }

    .table-custom tbody td {
        padding: 1rem;
        border: none;
        font-size: 0.85rem;
    }

    .table-custom tbody tr td:first-child { border-radius: 16px 0 0 16px; }
    .table-custom tbody tr td:last-child { border-radius: 0 16px 16px 0; }

    .table-custom tbody tr:hover {
        transform: scale(1.015);
        background: #ffffff;
        box-shadow: 0 10px 20px -10px rgba(0,0,0,0.1);
        z-index: 10;
    }

    /* --- PILLS & BADGES --- */
    .status-pill {
        padding: 6px 14px;
        border-radius: 10px;
        font-weight: 800;
        font-size: 0.65rem;
        letter-spacing: 0.03em;
    }

    .sp-baru { background: #fee2e2; color: #ef4444; }
    .sp-proses { background: #e0f2fe; color: #0ea5e9; }
    .sp-selesai { background: #dcfce7; color: #10b981; }
    .sp-void { background: #f1f5f9; color: #64748b; }

    /* --- ANIMATIONS --- */
    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .stagger-1 { animation: fadeInUp 0.5s ease-out both; animation-delay: 0.1s; }
    .stagger-2 { animation: fadeInUp 0.5s ease-out both; animation-delay: 0.2s; }

    .pulse-green {
        width: 10px;
        height: 10px;
        background: #10b981;
        border-radius: 50%;
        box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
        animation: pulse 1.5s infinite;
    }
    @keyframes pulse {
        0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
        70% { transform: scale(1); box-shadow: 0 0 0 10px rgba(16, 185, 129, 0); }
        100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
    }
</style>

<div class="zenith-wrapper">
    <div class="command-header d-flex justify-content-between align-items-center">
        <div>
            <h1 class="hero-title">Pusat Kontrol</h1>
            <p class="text-muted fw-bold mb-0 small"><i class="fas fa-satellite me-2"></i> OPERASIONAL SISTEM </p>
        </div>
        <div class="d-none d-md-block">
            <div class="glass p-2 px-4 rounded-pill border d-flex align-items-center">
                <div class="pulse-green me-3"></div>
                <span class="small fw-800">ALIRAN DATA AKTIF</span>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-5">
        <?php
            $stats = [
                ['Total Agregat', $total_aspirasi ?? 0, 'var(--max-dark)', 'fa-database', 'rgba(15, 23, 42, 0.1)'],
                ['Masuk', $baru ?? 0, '#ef4444', 'fa-bolt', '#fee2e2'],
                ['Analisis', $diproses ?? 0, '#0ea5e9', 'fa-microchip', '#e0f2fe'],
                ['Selesai', $selesai ?? 0, '#10b981', 'fa-check-double', '#dcfce7'],
                ['Diarsipkan', $ditolak ?? 0, '#94a3b8', 'fa-box-archive', '#f1f5f9']
            ];
        ?>

        <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xl col-lg-4 col-md-6 stagger-1" style="animation-delay: <?php echo e($index * 0.1); ?>s">
            <div class="stat-card">
                <div class="stat-icon-box" style="background: <?php echo e($stat[4]); ?>; color: <?php echo e($stat[2]); ?>">
                    <i class="fas <?php echo e($stat[3]); ?>"></i>
                </div>
                <div class="val-text" style="color: <?php echo e($stat[2]); ?>"><?php echo e(number_format($stat[1])); ?></div>
                <div class="label-text"><?php echo e($stat[0]); ?></div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-lg-5 stagger-2">
            <div class="data-panel">
                <h6 class="fw-800 mb-4 px-2">MATRIKS STATUS</h6>
                <div style="height: 280px;">
                    <canvas id="statusChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-7 stagger-2">
            <div class="data-panel">
                <h6 class="fw-800 mb-4 px-2">ALUR DISTRIBUSI</h6>
                <div style="height: 280px;">
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="data-panel p-0 stagger-2 overflow-hidden">
        <div class="p-4 px-5 d-flex justify-content-between align-items-center border-bottom">
            <h6 class="mb-0 fw-800">ASPIRASI TERBARU</h6>
            <a href="<?php echo e(route('admin.aspirasi.index')); ?>" class="btn btn-dark btn-sm rounded-pill px-4 fw-800 shadow-sm" style="font-size: 0.7rem;">
                AKSES PENUH <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
        <div class="table-responsive p-4">
            <table class="table table-custom align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">ID Sinyal</th>
                        <th>Asal Pengirim</th>
                        <th>Klasifikasi</th>
                        <th>Kondisi Saat Ini</th>
                        <th class="text-end pe-4">Protokol</th>
                    </tr>
                </thead>
                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $aspirasi_terbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="ps-4 fw-800 text-primary">#<?php echo e($item->id_aspirasi); ?></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <?php if($item->is_anonymous): ?>
                                <div class="rounded-circle me-3 border shadow-sm d-flex align-items-center justify-content-center fw-900 bg-secondary text-white" style="width: 35px; height: 35px; font-size: 10px; font-family: 'Outfit';">
                                    ?
                                </div>
                                <div>
                                    <span class="fw-700">Anonim</span>
                                    <br>
                                    <small class="text-muted fw-600" style="font-family: monospace;"><?php echo e(\Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i')); ?></small>
                                </div>
                                <?php else: ?>
                                <div class="rounded-circle me-3 border shadow-sm d-flex align-items-center justify-content-center fw-900 bg-white" style="width: 35px; height: 35px; font-size: 10px; font-family: 'Outfit';">
                                    <?php echo e(substr($item->display_name ?? $item->full_name, 0, 1)); ?>

                                </div>
                                <div>
                                    <span class="fw-700"><?php echo e($item->display_name ?? $item->full_name); ?></span>
                                    <br>
                                    <small class="text-muted fw-600" style="font-family: monospace;">NIS: <?php echo e($item->display_nis ?? $item->nis); ?></small>
                                </div>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td><span class="text-muted fw-bold small"><?php echo e($item->nama_kategori); ?></span></td>
                        <td>
                            <span class="status-pill <?php echo e(match($item->status) { 'Baru' => 'sp-baru', 'Diproses' => 'sp-proses', 'Selesai' => 'sp-selesai', 'Ditolak' => 'sp-void', default => 'bg-secondary' }); ?>">
                                ● <?php echo e(strtoupper($item->status == 'Diproses' ? 'DALAM PROSES' : $item->status)); ?>

                            </span>
                        </td>
                        <td class="text-end pe-4">
                            <a href="<?php echo e(route('admin.aspirasi.show', $item->id_aspirasi)); ?>" class="btn btn-light btn-sm rounded-pill border fw-800" style="font-size: 10px;">
                                TINJAU <i class="fas fa-chevron-right ms-1"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="5" class="text-center py-5 text-muted fw-bold">TIDAK ADA SINYAL AKTIF TERDETEKSI.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        Chart.defaults.font.family = 'Plus Jakarta Sans';
        Chart.defaults.font.weight = '700';
        Chart.defaults.color = '#94a3b8';

        // Pie Chart (Matriks Status)
        new Chart(document.getElementById('statusChart'), {
            type: 'doughnut',
            data: {
                labels: ['BARU', 'PROSES', 'SELESAI', 'ARSIP'],
                datasets: [{
                    data: [<?php echo e($baru); ?>, <?php echo e($diproses); ?>, <?php echo e($selesai); ?>, <?php echo e($ditolak); ?>],
                    backgroundColor: ['#ef4444', '#0ea5e9', '#10b981', '#94a3b8'],
                    hoverOffset: 25,
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '75%',
                plugins: {
                    legend: { position: 'bottom', labels: { usePointStyle: true, padding: 30, font: { size: 11 } } }
                }
            }
        });

        // Bar Chart (Alur Distribusi)
        new Chart(document.getElementById('categoryChart'), {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($kategoriLabels ?? []); ?>,
                datasets: [{
                    label: 'VOLUME',
                    data: <?php echo json_encode($kategoriValues ?? []); ?>,
                    backgroundColor: '#0f172a',
                    borderRadius: 12,
                    barThickness: 28
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { grid: { borderDash: [5, 5], drawBorder: false }, beginAtZero: true },
                    x: { grid: { display: false } }
                }
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\asp\web\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>