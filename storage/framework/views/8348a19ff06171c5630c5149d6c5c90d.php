

<?php $__env->startSection('title', 'Zenith - Ajukan Aspirasi'); ?>

<?php $__env->startSection('styles'); ?>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;400;600;800&family=Outfit:wght@300;800&display=swap" rel="stylesheet">
<style>
    :root {
        --canvas-bg: #f8fafc;
        --porcelain-white: #ffffff;
        --slate-deep: #0f172a;
        --slate-muted: #64748b;
        --border-soft: #e2e8f0;
        --accent-glow: #6366f1;
    }

    body {
        background-color: var(--canvas-bg);
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: var(--slate-deep);
        background-image: radial-gradient(#cbd5e1 0.5px, transparent 0.5px);
        background-size: 30px 30px;
        background-attachment: fixed;
    }

    /* --- Sophisticated Header --- */
    .pinnacle-header {
        padding: 80px 0 50px;
        text-align: center;
    }

    .pinnacle-badge {
        font-family: 'Outfit', sans-serif;
        font-weight: 800;
        font-size: 0.7rem;
        letter-spacing: 4px;
        text-transform: uppercase;
        color: var(--slate-muted);
        border: 1px solid var(--border-soft);
        padding: 8px 20px;
        border-radius: 100px;
        background: #fff;
        display: inline-block;
        margin-bottom: 25px;
    }

    .pinnacle-main-title {
        font-weight: 800;
        font-size: 3.5rem;
        letter-spacing: -3px;
        line-height: 0.95;
        margin-bottom: 20px;
    }

    .pinnacle-main-title span {
        font-weight: 200;
        color: var(--slate-muted);
    }

    /* --- Master Canvas --- */
    .master-form-canvas {
        max-width: 850px;
        margin: 0 auto 120px;
        background: var(--porcelain-white);
        border-radius: 32px;
        padding: 70px;
        box-shadow: 
            0 1px 3px rgba(0,0,0,0.02),
            0 20px 40px -20px rgba(0,0,0,0.05),
            0 50px 100px -20px rgba(0,0,0,0.03);
        position: relative;
        overflow: hidden;
    }

    .master-form-canvas::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; height: 1px;
        background: linear-gradient(90deg, transparent, var(--border-soft), transparent);
    }

    /* --- Input Architecture --- */
    .form-group-spatial {
        margin-bottom: 35px;
    }

    .spatial-label {
        font-size: 0.75rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: var(--slate-deep);
        margin-bottom: 15px;
        display: block;
    }

    .spatial-label i {
        margin-right: 8px;
        color: var(--accent-glow);
        font-size: 0.8rem;
    }

    .spatial-input {
        width: 100%;
        background: #fdfdfd;
        border: 1px solid var(--border-soft);
        border-radius: 16px;
        padding: 18px 24px;
        font-size: 0.95rem;
        font-weight: 500;
        color: var(--slate-deep);
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .spatial-input:focus {
        background: #ffffff;
        border-color: var(--slate-deep);
        box-shadow: 0 10px 30px rgba(0,0,0,0.04);
        outline: none;
        transform: translateY(-2px);
    }

    /* --- Custom File Upload Style --- */
    .spatial-file-wrapper {
        position: relative;
        display: flex;
        align-items: center;
        gap: 15px;
        background: #fdfdfd;
        border: 2px dashed var(--border-soft);
        border-radius: 16px;
        padding: 18px;
        transition: 0.3s;
        cursor: pointer;
    }

    .spatial-file-wrapper:hover {
        border-color: var(--accent-glow);
        background: #f8fafc;
    }

    .spatial-file-input {
        position: absolute;
        inset: 0;
        opacity: 0;
        cursor: pointer;
        z-index: 2;
    }

    .file-custom-icon {
        width: 48px;
        height: 48px;
        background: #f1f5f9;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--accent-glow);
        font-size: 1.2rem;
    }

    .file-info-text {
        display: flex;
        flex-direction: column;
    }

    .file-info-text .main-text {
        font-size: 0.9rem;
        font-weight: 700;
        color: var(--slate-deep);
    }

    .file-info-text .sub-text {
        font-size: 0.75rem;
        color: var(--slate-muted);
    }

    /* --- Action Terminal --- */
    .terminal-actions {
        margin-top: 50px;
        padding-top: 40px;
        border-top: 1px solid #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .btn-pinnacle-back {
        text-decoration: none;
        color: var(--slate-muted);
        font-weight: 700;
        font-size: 0.85rem;
        padding: 12px 24px;
        border-radius: 12px;
        transition: 0.3s;
    }

    .btn-pinnacle-back:hover {
        background: var(--border-soft);
        color: var(--slate-deep);
    }

    .btn-pinnacle-send {
        background: var(--slate-deep);
        color: #fff;
        border: none;
        padding: 20px 45px;
        border-radius: 18px;
        font-weight: 800;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 15px;
        transition: 0.4s cubic-bezier(0.19, 1, 0.22, 1);
        cursor: pointer;
    }

    .btn-pinnacle-send:hover {
        background: var(--accent-glow);
        transform: translateY(-4px) scale(1.02);
        box-shadow: 0 20px 40px rgba(99, 102, 241, 0.2);
    }

    .error-minimal {
        background: #fff;
        border: 1px solid #fee2e2;
        border-radius: 16px;
        padding: 20px;
        margin-bottom: 40px;
        display: flex;
        align-items: center;
        gap: 15px;
        color: #b91c1c;
        font-size: 0.9rem;
        font-weight: 600;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <header class="pinnacle-header">
        <div class="pinnacle-badge">New Aspiration</div>
        <h1 class="pinnacle-main-title">Bentuk Masa <span>Depan.</span></h1>
    </header>

    <div class="master-form-canvas">
        <?php if($errors->any()): ?>
            <div class="error-minimal">
                <i class="fas fa-exclamation-triangle"></i>
                <span>Pastikan semua parameter terisi dengan benar (Maks. Gambar 2MB).</span>
            </div>
        <?php endif; ?>

        
        <form action="<?php echo e(route('siswa.aspirasi.store')); ?>" method="POST" enctype="multipart/form-data" data-no-loading>
            <?php echo csrf_field(); ?>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group-spatial">
                        <label class="spatial-label"><i class="fas fa-grid-2"></i> Kategori</label>
                        <select name="id_kategori" class="spatial-input <?php $__errorArgs = ['id_kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                            <option value="">Select Category</option>
                            <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($k->id_kategori); ?>" <?php echo e(old('id_kategori') == $k->id_kategori ? 'selected' : ''); ?>>
                                    <?php echo e($k->keterangan); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-spatial">
                        <label class="spatial-label"><i class="fas fa-location-dot"></i> Lokasi</label>
                        <input type="text" name="lokasi" class="spatial-input <?php $__errorArgs = ['lokasi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                               value="<?php echo e(old('lokasi')); ?>" placeholder="Contoh: Lab Komputer 1" required>
                    </div>
                </div>
            </div>

            <div class="form-group-spatial">
                <label class="spatial-label"><i class="fas fa-user-secret"></i> Kirim Secara Anonim</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="is_anonymous" id="isAnonymous" value="1">
                    <label class="form-check-label" for="isAnonymous">
                        Ya, kirim aspirasi ini secara anonim (email tidak akan ditampilkan)
                    </label>
                </div>
            </div>

            <div class="form-group-spatial" id="emailGroup">
                <label class="spatial-label"><i class="fas fa-fingerprint"></i> Email Validasi</label>
                <input type="email" name="email_siswa" id="emailSiswa" class="spatial-input <?php $__errorArgs = ['email_siswa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                       value="<?php echo e(old('email_siswa', $user->email ?? '')); ?>" placeholder="nama@domain.com">
                <small class="form-text text-muted">Email akan digunakan untuk validasi dan notifikasi.</small>
            </div>

            <div class="form-group-spatial">
                <label class="spatial-label"><i class="fas fa-camera"></i> Lampiran Visual (Opsional)</label>
                <div class="spatial-file-wrapper">
                    <input type="file" name="foto" id="fotoInput" class="spatial-file-input <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" accept="image/*">
                    <div class="file-custom-icon">
                        <i class="fas fa-cloud-arrow-up"></i>
                    </div>
                    <div class="file-info-text">
                        <span class="main-text" id="fileName">Pilih foto atau seret ke sini</span>
                        <span class="sub-text">JPG, PNG, atau WEBP (Maksimal 2MB)</span>
                    </div>

                    
                    <div style="margin-left:auto; z-index:1;">
                        <img id="fotoPreview" src="" alt="Preview" style="display:none; width:96px; height:64px; object-fit:cover; border-radius:8px; border:1px solid var(--border-soft); box-shadow:0 6px 18px rgba(0,0,0,0.06);" data-bs-toggle="modal" data-bs-target="#previewModal" />
                    </div>
                </div>
                <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-danger small mt-2 d-block"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group-spatial">
                <label class="spatial-label"><i class="fas fa-paragraph"></i> Detail Aspirasi</label>
                <textarea name="keterangan" class="spatial-input <?php $__errorArgs = ['keterangan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                          rows="5" placeholder="Deskripsikan perubahan yang Anda inginkan secara sistematis..." required><?php echo e(old('keterangan')); ?></textarea>
            </div>

            <div class="terminal-actions">
                <a href="<?php echo e(route('siswa.dashboard')); ?>" class="btn-pinnacle-back">
                    <i class="fas fa-chevron-left me-2"></i> Kembali
                </a>
                <button type="submit" class="btn-pinnacle-send">
                    Kirim Aspirasi <i class="fas fa-arrow-right-long"></i>
                </button>
            </div>
        </form>
    </div>
</div>

            
            <div class="mt-4 d-flex align-items-center gap-2">
                <span class="spatial-label" style="margin-bottom:0; margin-right:12px;">Status Laporan:</span>
                <span class="status-pill status-Baru" style="padding:6px 12px; border-radius:12px; background:#fee2e2; color:#ef4444; font-weight:700;">Baru</span>
                <span class="status-pill status-Diproses" style="padding:6px 12px; border-radius:12px; background:#fef3c7; color:#d97706; font-weight:700;">Diproses</span>
                <span class="status-pill status-Selesai" style="padding:6px 12px; border-radius:12px; background:#dcfce7; color:#15803d; font-weight:700;">Selesai</span>
                <span class="status-pill status-ditolak" style="padding:6px 12px; border-radius:12px; background:#fff7ed; color:#ea580c; font-weight:700;">Ditolak</span>
            </div>

        </form>
    </div>
</div>


<div class="modal fade" id="previewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body p-0">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                <img id="previewModalImg" src="" class="img-fluid rounded-3" alt="Preview Foto">
            </div>
        </div>
    </div>
</div>

<script>
    // Enhanced preview: tampilkan nama file + thumbnail + buka modal untuk melihat lebih besar
    const fotoInput = document.getElementById('fotoInput');
    const fileNameEl = document.getElementById('fileName');
    const fotoPreview = document.getElementById('fotoPreview');
    const previewModalImg = document.getElementById('previewModalImg');

    fotoInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        const wrapper = document.querySelector('.spatial-file-wrapper');
        if(!file) {
            fileNameEl.textContent = "Pilih foto atau seret ke sini";
            fotoPreview.style.display = 'none';
            wrapper.style.borderColor = '';
            wrapper.style.background = '';
            previewModalImg.src = '';
            return;
        }

        fileNameEl.textContent = file.name;

        // show thumbnail
        const reader = new FileReader();
        reader.onload = function(evt) {
            fotoPreview.src = evt.target.result;
            previewModalImg.src = evt.target.result;
            fotoPreview.style.display = 'block';
        }
        reader.readAsDataURL(file);

        // visual feedback
        wrapper.style.borderColor = 'var(--accent-glow)';
        wrapper.style.background = '#eef2ff';
    });

    // Jika thumbnail diklik, bootstrap modal akan membuka preview (data-bs-toggle attr sudah dipasang)

    // Handle anonymous checkbox
    const isAnonymousCheckbox = document.getElementById('isAnonymous');
    const emailGroup = document.getElementById('emailGroup');
    const emailInput = document.getElementById('emailSiswa');

    isAnonymousCheckbox.addEventListener('change', function() {
        if (this.checked) {
            emailGroup.style.display = 'none';
            emailInput.required = false;
            emailInput.value = '';
        } else {
            emailGroup.style.display = 'block';
            emailInput.required = true;
        }
    });

    // Handle form submit with loading indicator
    const form = document.querySelector('form');
    const submitBtn = document.querySelector('.btn-pinnacle-send');

    form.addEventListener('submit', function(e) {
        // Show loading state
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim...';
        submitBtn.disabled = true;
        
        // Optional: Disable all inputs
        const inputs = form.querySelectorAll('input, textarea, select');
        inputs.forEach(input => input.disabled = true);
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\asp\web\resources\views/siswa/create.blade.php ENDPATH**/ ?>