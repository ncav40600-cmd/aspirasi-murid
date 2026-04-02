

<?php $__env->startSection('title', 'Detail Aspirasi - Admin'); ?>

<?php $__env->startSection('styles'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap');

    :root {
        --primary: #3b82f6;
        --primary-light: #60a5fa;
        --primary-dark: #1e40af;
        --success: #10b981;
        --warning: #f59e0b;
        --danger: #ef4444;
        --bg-primary: #ffffff;
        --bg-secondary: #f9fafb;
        --bg-tertiary: #f3f4f6;
        --text-primary: #111827;
        --text-secondary: #6b7280;
        --text-tertiary: #9ca3af;
        --border-light: #e5e7eb;
        --border-ultra: #f3f4f6;
    }

    * { -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }

    body {
        background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
        color: var(--text-primary);
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        font-size: 14px;
        line-height: 1.6;
    }

    /* --- Premium Elevation System --- */
    .elevation-1 { box-shadow: 0 1px 2px 0 rgba(0,0,0,0.03), 0 1px 1px -1px rgba(0,0,0,0.03) }
    .elevation-2 { box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05), 0 2px 4px -2px rgba(0,0,0,0.05) }
    .elevation-3 { box-shadow: 0 10px 15px -3px rgba(0,0,0,0.06), 0 4px 6px -4px rgba(0,0,0,0.05) }
    .elevation-4 { box-shadow: 0 20px 25px -5px rgba(0,0,0,0.08), 0 8px 10px -6px rgba(0,0,0,0.05) }

    /* --- Motion & Easing --- */
    @keyframes slideInUp { from { opacity: 0; transform: translateY(12px) } to { opacity: 1; transform: translateY(0) } }
    @keyframes fadeIn { from { opacity: 0 } to { opacity: 1 } }
    @keyframes pulse-glow { 0%, 100% { opacity: 1 } 50% { opacity: 0.6 } }

    /* --- Action Header --- */
    .action-header-bar { background: var(--bg-primary); border: 1px solid var(--border-light); border-radius: 16px; padding: 20px 28px; margin-bottom: 28px; display: flex; align-items: center; justify-content: space-between; animation: slideInUp 0.4s cubic-bezier(0.23, 1, 0.320, 1) }
    .action-header-bar > div:first-child { display: flex; align-items: center; gap: 18px }
    .action-header-bar h5 { font-size: 20px; font-weight: 700; letter-spacing: -0.4px; margin: 0 }
    .action-header-bar .text-muted { font-size: 12px; letter-spacing: 0.8px; text-transform: uppercase; margin-top: 4px }

    .btn-back { width: 44px; height: 44px; display: inline-flex; align-items: center; justify-content: center; border-radius: 12px; background: var(--bg-tertiary); border: none; color: var(--text-primary); cursor: pointer; transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1) }
    .btn-back:hover { background: var(--primary); color: white; transform: translate(-2px, -2px) }

    /* --- Card System: Glass + Depth --- */
    .bento-card { background: var(--bg-primary); border: 1px solid var(--border-light); border-radius: 16px; padding: 32px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); animation: fadeIn 0.5s ease-out }
    .bento-card:hover { border-color: var(--border-ultra); box-shadow: 0 20px 25px -5px rgba(0,0,0,0.08); transform: translateY(-2px) }
    .bento-card h6 { font-size: 11px; font-weight: 700; letter-spacing: 1.2px; text-transform: uppercase; color: var(--text-tertiary); margin-bottom: 20px }

    /* --- Content Surface --- */
    .content-surface { background: linear-gradient(135deg, rgba(59, 130, 246, 0.03) 0%, rgba(59, 130, 246, 0.01) 100%); border-radius: 12px; border: 1px solid rgba(59, 130, 246, 0.08); padding: 24px; font-size: 15px; font-weight: 500; line-height: 1.8; color: var(--text-primary); white-space: pre-line }

    /* --- Status Tracker: Premium --- */
    .ux-tracker { display: flex; justify-content: space-between; margin-bottom: 36px; position: relative }
    .ux-tracker::before { content: ''; position: absolute; top: 24px; left: 5%; right: 5%; height: 2px; background: var(--border-light); z-index: 0 }
    .tracker-step { position: relative; z-index: 1; text-align: center; width: 33.33%; animation: slideInUp 0.5s cubic-bezier(0.23, 1, 0.320, 1) forwards; opacity: 0 }
    .tracker-step:nth-child(1) { animation-delay: 0.1s }
    .tracker-step:nth-child(2) { animation-delay: 0.2s }
    .tracker-step:nth-child(3) { animation-delay: 0.3s }
    .step-icon { width: 52px; height: 52px; background: var(--bg-secondary); border: 2px solid var(--border-light); border-radius: 50%; margin: 0 auto 12px; display: flex; align-items: center; justify-content: center; font-weight: 600; color: var(--text-secondary); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) }
    .tracker-step:nth-child(1) .step-icon { background: rgba(59, 130, 246, 0.1); color: var(--primary); border-color: var(--primary) }
    .tracker-step:nth-child(2) .step-icon { background: rgba(245, 158, 11, 0.1); color: var(--warning); border-color: var(--warning) }
    .tracker-step:nth-child(3) .step-icon { background: rgba(16, 185, 129, 0.1); color: var(--success); border-color: var(--success) }
    .tracker-step.completed .step-icon { background: var(--success); border-color: var(--success); color: white; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.15) }
    .tracker-step.active .step-icon { box-shadow: 0 8px 16px rgba(59, 130, 246, 0.12); transform: scale(1.08) }
    .tracker-step small { font-size: 12px; font-weight: 600; color: var(--text-secondary) }

    /* --- Meta Tile & Buttons --- */
    .meta-tile { background: linear-gradient(135deg, var(--bg-primary) 0%, rgba(59, 130, 246, 0.01) 100%); border: 1px solid var(--border-light); border-radius: 12px; padding: 16px 18px; margin-bottom: 14px; display: flex; align-items: center; gap: 16px; cursor: pointer; transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1) }
    .meta-tile:hover { border-color: var(--primary); background: linear-gradient(135deg, rgba(59, 130, 246, 0.04) 0%, rgba(59, 130, 246, 0.02) 100%); transform: translateY(-2px); box-shadow: 0 8px 16px rgba(59, 130, 246, 0.08) }
    .avatar-circle { width: 44px; height: 44px; min-width: 44px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 20px; font-weight: 600; transition: all 0.2s ease }
    .meta-tile:hover .avatar-circle { transform: scale(1.1) rotate(-5deg) }
    .meta-tile small { font-size: 11px; font-weight: 700; letter-spacing: 0.5px; color: var(--text-tertiary); margin-bottom: 4px; text-transform: uppercase; display: block }
    .meta-tile .fw-bold { font-size: 14px; font-weight: 600; color: var(--text-primary) }
    .meta-tile .fa-copy { opacity: 0; transition: all 0.2s ease }
    .meta-tile:hover .fa-copy { opacity: 1; color: var(--primary) }

    .admin-btn { width: 100%; padding: 14px 16px; border-radius: 12px; font-weight: 700; font-size: 14px; border: none; margin-bottom: 12px; display: flex; align-items: center; justify-content: center; gap: 10px; cursor: pointer; transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1); position: relative; overflow: hidden }
    .admin-btn::before { content: ''; position: absolute; top: 50%; left: 50%; width: 0; height: 0; border-radius: 50%; background: rgba(255, 255, 255, 0.3); transform: translate(-50%, -50%); transition: width 0.6s, height 0.6s }
    .admin-btn:active::before { width: 300px; height: 300px }
    .btn-proses { background: var(--primary); color: white; box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3) }
    .btn-selesai { background: var(--success); color: white; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3) }
    .btn-feedback { background: var(--text-primary); color: white; box-shadow: 0 4px 12px rgba(17, 24, 39, 0.3) }
    .btn-tolak { background: #ef4444; color: white; box-shadow: 0 4px 12px rgba(239, 68, 68, 0.35) }
    .admin-btn:hover { transform: translateY(-3px); box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12) }
    .admin-btn:active { transform: translateY(-1px) }
    .admin-btn:focus-visible { outline: 2px solid var(--primary); outline-offset: 2px }

    /* --- Status Pill: Premium --- */
    .status-pill-large { display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; border-radius: 999px; font-weight: 700; font-size: 13px; letter-spacing: 0.5px; text-transform: capitalize; border: none; transition: all 0.2s ease }
    .status-Baru { background: rgba(239, 68, 68, 0.1); color: #dc2626 }
    .status-Diproses { background: rgba(245, 158, 11, 0.1); color: #d97706 }
    .status-Selesai { background: rgba(16, 185, 129, 0.1); color: #059669 }
    .status-Ditolak { background: rgba(239, 68, 68, 0.15); color: #dc2626 }

    /* --- Badge: Premium --- */
    .bento-card .badge { background: linear-gradient(135deg, rgba(59, 130, 246, 0.08) 0%, rgba(59, 130, 246, 0.04) 100%) !important; border: 1px solid rgba(59, 130, 246, 0.12) !important; color: var(--primary) !important; padding: 10px 16px !important; font-size: 13px !important; font-weight: 600 !important; letter-spacing: 0.4px; text-transform: none; border-radius: 12px !important; transition: all 0.2s ease }
    .bento-card .badge:hover { background: linear-gradient(135deg, rgba(59, 130, 246, 0.12) 0%, rgba(59, 130, 246, 0.06) 100%) !important; transform: translateY(-2px) }

    /* --- Image Wrapper: Premium --- */
    .image-wrapper { border-radius: 14px; overflow: hidden; border: 1px solid var(--border-light); box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05); cursor: pointer; background: var(--bg-secondary); max-height: 620px; display: inline-block; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); position: relative }
    .image-wrapper::after { content: '🔍'; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 32px; opacity: 0; transition: all 0.3s ease; z-index: 2 }
    .image-wrapper:hover { border-color: var(--primary); box-shadow: 0 16px 36px rgba(59, 130, 246, 0.15); transform: translateY(-4px) }
    .image-wrapper:hover::after { opacity: 1; transform: translate(-50%, -50%) scale(1.2) }
    .image-wrapper img { width: 100%; height: auto; object-fit: cover; transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1); display: block }
    .image-wrapper:hover img { transform: scale(1.04) }

    /* --- Copy Toast: Premium --- */
    .copy-toast { position: fixed; right: 24px; bottom: 24px; background: linear-gradient(135deg, var(--text-primary) 0%, rgba(17, 24, 39, 0.95) 100%); color: white; padding: 12px 18px; border-radius: 12px; font-size: 13px; font-weight: 600; box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2); opacity: 0; transform: translateY(16px) scale(0.9); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); z-index: 1100; backdrop-filter: blur(10px) }
    .copy-toast.show { opacity: 1; transform: translateY(0) scale(1) }

    /* --- Modal: Glass Morphism --- */
    .modal-content { background: rgba(255, 255, 255, 0.95) !important; border: 1px solid rgba(0, 0, 0, 0.05) !important; border-radius: 20px !important; backdrop-filter: blur(20px); box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15) !important }
    .modal-header { border-bottom: 1px solid var(--border-light) !important; padding: 28px !important }
    .modal-body { padding: 28px !important }
    .modal-footer { border-top: 1px solid var(--border-light) !important; padding: 28px !important }
    .modal-title { font-size: 18px !important; font-weight: 700 !important; letter-spacing: -0.3px }

    .form-control { border: 1px solid var(--border-light) !important; border-radius: 12px !important; padding: 14px 16px !important; background: var(--bg-secondary) !important; font-size: 14px; transition: all 0.2s ease }
    .form-control:focus { border-color: var(--primary) !important; background: white !important; box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1) !important }

    /* --- Responsive Design --- */
    @media (max-width: 992px) { .bento-card { padding: 24px } .action-header-bar { padding: 16px 20px } .ux-tracker { margin-bottom: 24px } }
    @media (max-width: 768px) { .bento-card { padding: 20px; border-radius: 14px } .action-header-bar { flex-direction: column; gap: 16px } .action-header-bar > div:first-child { width: 100% } .status-pill-large { width: 100%; justify-content: center } }

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <input type="hidden" id="autoOpenFeedback" value="<?php echo e(session('open_feedback') ? '1' : '0'); ?>" />
    
    
    <div class="action-header-bar">
        <div>
            <div class="d-flex align-items-center gap-3">
                <a href="<?php echo e(route('admin.aspirasi.index')); ?>" class="btn btn-back" aria-label="Kembali ke daftar aspirasi" title="Kembali ke daftar">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <div>
                    <span class="text-muted small fw-bold">ID TIKET</span>
                    <h5 class="mb-0">#<?php echo e($aspirasi->id_aspirasi); ?></h5>
                </div>
            </div>
        </div>
        <div class="status-pill-large status-<?php echo e($aspirasi->status); ?>">
            <i class="fas fa-circle-fill" style="font-size: 8px;"></i> <?php echo e($aspirasi->status); ?>

        </div>
    </div>

    <div class="row g-4">
        
        <div class="col-lg-8">
            <div class="bento-card">
                
                <div class="ux-tracker">
                    <div class="tracker-step completed">
                        <div class="step-icon"><i class="fas fa-inbox"></i></div>
                        <span class="small fw-bold">Diterima</span>
                    </div>
                    <div class="tracker-step <?php echo e(in_array($aspirasi->status, ['Diproses', 'Selesai']) ? 'active completed' : ''); ?>">
                        <div class="step-icon"><i class="fas fa-sync"></i></div>
                        <span class="small fw-bold">Diproses</span>
                    </div>
                    <div class="tracker-step <?php echo e($aspirasi->status == 'Selesai' ? 'active completed' : ''); ?>">
                        <div class="step-icon"><i class="fas fa-check-double"></i></div>
                        <span class="small fw-bold">Selesai</span>
                    </div>
                </div>

                <div class="mb-4">
                    <span class="badge">
                        <i class="fas fa-tag me-2"></i> <?php echo e($aspirasi->nama_kategori); ?>

                    </span>
                </div>
                
                <div class="content-surface mb-4">
                    <?php echo e($aspirasi->keterangan); ?>

                </div>

                
                <div class="mt-5">
                    <h6 class="fw-bold text-uppercase"><i class="fas fa-image me-2"></i>Lampiran Bukti</h6>
                    <?php $fotoPath = $aspirasi->foto_aspirasi ?? $aspirasi->foto ?? null; ?>
                    <?php if(!empty($fotoPath)): ?>
                        <div class="image-wrapper rounded-3" data-bs-toggle="modal" data-bs-target="#imageFullModal" style="max-width: 480px; margin-top: 16px;" role="button" tabindex="0" aria-label="Perbesar lampiran" title="Klik untuk memperbesar gambar">
                            <img src="<?php echo e(asset('storage/aspirasi/' . $fotoPath)); ?>" class="img-fluid" alt="Lampiran Bukti">
                        </div>
                        <small class="d-block mt-3 text-muted"><i class="fas fa-lightbulb me-1"></i> Klik gambar untuk melihat dalam ukuran penuh</small>
                    <?php else: ?>
                        <div class="text-center p-6 bg-light rounded-3 border-2 border-dashed mt-4">
                            <i class="fas fa-image-slash fa-2x text-muted mb-2"></i>
                            <p class="text-muted fw-500">Tidak ada lampiran foto</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        
        <div class="col-lg-4">
            
            <div class="bento-card" style="margin-bottom:22px;">
                <h6>Proses Aspirasi</h6>
                
                <?php if($aspirasi->status == 'Baru'): ?>
                    <form action="<?php echo e(route('admin.aspirasi.proses', $aspirasi->id_aspirasi)); ?>" method="POST" class="mb-2" data-no-loading>
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="admin-btn btn-proses">
                            <i class="fas fa-play-circle"></i> Mulai Memproses
                        </button>
                    </form>
                <?php endif; ?>

                <?php if($aspirasi->status == 'Baru'): ?>
                    <button class="admin-btn btn-tolak" data-bs-toggle="modal" data-bs-target="#tolakAspirasiModal">
                        <i class="fas fa-times-circle"></i> Tolak Aspirasi
                    </button>
                <?php endif; ?>

                <?php if($aspirasi->status == 'Diproses'): ?>
                    <button class="admin-btn btn-selesai mb-2" data-bs-toggle="modal" data-bs-target="#umpanBalikModal">
                        <i class="fas fa-check-circle"></i> Selesaikan + Tambah Tanggapan
                    </button>
                <?php endif; ?>

                <?php if($aspirasi->status == 'Selesai'): ?>
                    <button class="admin-btn btn-feedback" data-bs-toggle="modal" data-bs-target="#umpanBalikModal">
                        <i class="fas fa-comment-dots"></i>
                        <?php echo e($aspirasi->umpan_balik ? 'Ubah Tanggapan' : 'Tambah Tanggapan'); ?>

                    </button>
                <?php endif; ?>
            </div>

            
            <div class="bento-card">
                <h6>Data Pelapor</h6>

                <div class="meta-tile">
                    <div class="avatar-circle bg-info text-white">
                        <i class="fas fa-user-secret"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">Identitas Pelapor</small>
                        <span class="fw-bold"><?php echo e($aspirasi->is_anonymous ? 'Anonim (disembunyikan)' : 'Terbuka'); ?></span>
                    </div>
                </div>

                <div class="meta-tile">
                    <div class="avatar-circle bg-primary text-white">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">Email Siswa</small>
                        <span class="fw-bold"><?php echo e($aspirasi->display_email ?? ($aspirasi->email_siswa ?? '-')); ?></span>
                    </div>
                </div>

                <div class="meta-tile">
                    <div class="avatar-circle bg-warning text-white">
                        <i class="fas fa-id-card"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">NIS</small>
                        <span class="fw-bold"><?php echo e($aspirasi->display_nis ?? $aspirasi->nis ?? '-'); ?></span>
                    </div>
                </div>

                <div class="meta-tile">
                    <div class="avatar-circle bg-danger text-white">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">Lokasi</small>
                        <span class="fw-bold"><?php echo e($aspirasi->lokasi ?? 'N/A'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php if(!empty($fotoPath)): ?>
<div class="modal fade" id="imageFullModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0" style="box-shadow: 0 25px 50px rgba(0,0,0,0.2);">
            <div class="modal-body p-0">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close" style="z-index: 10;"></button>
                <img src="<?php echo e(asset('storage/aspirasi/' . $fotoPath)); ?>" class="img-fluid rounded-3" style="width: 100%; object-fit: contain; max-height: 85vh;">
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<div class="modal fade" id="umpanBalikModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Berikan Tanggapan kepada Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('admin.aspirasi.umpan-balik', $aspirasi->id_aspirasi)); ?>" method="POST" data-no-loading>
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <label class="small fw-bold text-uppercase mb-3">Pesan Tanggapan</label>
                    <textarea name="umpan_balik" class="form-control" rows="6" required maxlength="2000" placeholder="Jelaskan langkah penyelesaian aspirasi, tindakan yang telah diambil, dan hasil akhir untuk siswa..."><?php echo e($aspirasi->umpan_balik); ?></textarea>
                    <small class="text-muted d-block mt-2">💌 Siswa akan menerima email dengan tanggapan profesional ini. (Batas: 2000 karakter)</small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary fw-bold">Kirim Tanggapan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="tolakAspirasiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tolak Aspirasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('admin.aspirasi.tolak', $aspirasi->id_aspirasi)); ?>" method="POST" data-no-loading>
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <label class="small fw-bold text-uppercase mb-3">Alasan Penolakan</label>
                    <textarea name="tolak_alasan" class="form-control" rows="5" required maxlength="2000" placeholder="Jelaskan alasan penolakan aspirasi dan rekomendasi selanjutnya..."><?php echo e(old('tolak_alasan')); ?></textarea>
                    <small class="text-muted d-block mt-2">Penjelasan akan tersimpan sebagai umpan balik ke siswa.</small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger fw-bold">Konfirmasi Tolak</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
// Premium copy-to-clipboard with enhanced toast feedback and keyboard support
function showCopyToast(msg){
    let el=document.getElementById('copyToast');
    if(!el){ el=document.createElement('div'); el.id='copyToast'; el.className='copy-toast'; document.body.appendChild(el); }
    el.textContent=msg; el.classList.add('show');
    clearTimeout(window._copyToastTimer);
    window._copyToastTimer=setTimeout(()=>{ el.classList.remove('show') }, 2400);
}

document.addEventListener('DOMContentLoaded', function(){
    // Copy-to-clipboard with keyboard support
    document.querySelectorAll('.copy-mail').forEach(function(node){
        node.addEventListener('click', function(){
            const text=node.getAttribute('data-copy')||'';
            if(!text){ showCopyToast('Tidak ada email tersedia'); return; }
            navigator.clipboard.writeText(text).then(()=> showCopyToast('✓ Email disalin'))
        });
        node.addEventListener('keydown', function(e){ 
            if(e.key==='Enter' || e.key===' ') { e.preventDefault(); node.click(); } 
        });
    });

    // Make image-wrapper keyboard accessible
    document.querySelectorAll('.image-wrapper[role="button"]').forEach(function(img){
        img.addEventListener('keydown', function(e){ 
            if(e.key==='Enter' || e.key===' '){ 
                e.preventDefault(); 
                img.querySelector('img')?.click(); 
                img.dispatchEvent(new Event('click')); 
            } 
        });
    });

    // Enhance form focus states
    document.querySelectorAll('.form-control').forEach(el => {
        el.addEventListener('focus', function() {
            this.parentElement?.classList.add('focused');
        });
        el.addEventListener('blur', function() {
            this.parentElement?.classList.remove('focused');
        });
    });

    // Open feedback modal automatically after status selesai
    const autoOpen = document.getElementById('autoOpenFeedback')?.value;
    if (autoOpen === '1') {
        const umpanBalikModal = new bootstrap.Modal(document.getElementById('umpanBalikModal'));
        umpanBalikModal.show();
    }

    // Handle form submit with loading indicators
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function(e) {
            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn) {
                // Show loading state
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
                submitBtn.disabled = true;
                
                // Store original text for potential restoration
                submitBtn.setAttribute('data-original-text', originalText);
                
                // Optional: Disable all inputs in the form
                const inputs = form.querySelectorAll('input, textarea, select');
                inputs.forEach(input => input.disabled = true);
            }
        });
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\asp\web\resources\views/admin/show.blade.php ENDPATH**/ ?>