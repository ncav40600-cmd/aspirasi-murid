<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori | Admin Pro</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #00d2ff;
            --secondary: #3a7bd5;
            --bg-dark: #0f172a;
            --card-bg: rgba(30, 41, 59, 0.7);
            --text-main: #f1f5f9;
            --text-muted: #94a3b8;
            --danger: #ef4444;
            --input-bg: rgba(15, 23, 42, 0.6);
        }

        * { margin:0; padding:0; box-sizing:border-box; font-family:'Inter', sans-serif; }

        body {
            background-color: var(--bg-dark);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-main);
        }

        .container {
            width: 100%;
            max-width: 550px;
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border-radius: 28px;
            padding: 45px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--primary);
            font-size: 13px;
        }

        .form-group input {
            width: 100%;
            padding: 14px;
            background: var(--input-bg);
            border-radius: 10px;
            border: 1px solid #333;
            color: white;
        }

        .error-input {
            border-color: var(--danger) !important;
        }

        .error-text {
            color: #fca5a5;
            font-size: 12px;
            margin-top: 5px;
        }

        .alert-error {
            background: rgba(239,68,68,0.1);
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .btn-group {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 10px;
        }

        .btn {
            padding: 12px;
            border-radius: 10px;
            cursor: pointer;
            border: none;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-secondary {
            background: #222;
            color: #aaa;
            text-decoration: none;
            display:flex;
            align-items:center;
            justify-content:center;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Edit Kategori</h1>
        <p style="color:#94a3b8;">Perbarui data kategori</p>
    </div>

    
    <?php if($errors->any()): ?>
        <div class="alert-error">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div>⚠️ <?php echo e($error); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.kategori.update', $kategori->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="form-group">
            <label>Kategori</label>
            <input 
                type="text"
                name="keterangan"
                value="<?php echo e(old('keterangan', $kategori->keterangan)); ?>"
                class="<?php $__errorArgs = ['keterangan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-input <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                required
            >

            
            <?php $__errorArgs = ['keterangan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error-text"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="btn-group">
            <a href="<?php echo e(route('admin.kategori.index')); ?>" class="btn btn-secondary">Batal</a>

            <button type="submit" class="btn btn-primary" id="submitBtn">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<script>
    const form = document.querySelector('form');
    const btn = document.getElementById('submitBtn');

    form.addEventListener('submit', function() {
        btn.innerHTML = '⏳ Menyimpan...';
        btn.disabled = true;
    });
</script>

</body>
</html><?php /**PATH C:\asp\web\resources\views/admin/kategori/edit.blade.php ENDPATH**/ ?>