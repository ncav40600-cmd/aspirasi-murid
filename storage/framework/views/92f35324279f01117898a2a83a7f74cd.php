<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Kategori | Admin Pro</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #00d2ff;
            --secondary: #3a7bd5;
            --bg-dark: #0f172a;
            --card-bg: rgba(30, 41, 59, 0.7);
            --text-main: #f1f5f9;
            --text-muted: #94a3b8;
            --success: #10b981;
            --danger: #ef4444;
        }

        * { margin:0; padding:0; box-sizing:border-box; font-family:'Inter', sans-serif; }

        body {
            background-color: var(--bg-dark);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--text-main);
        }

        .container {
            width: 100%;
            max-width: 1100px;
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 40px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 10px;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-edit {
            background: #333;
            color: white;
        }

        .btn-delete {
            background: var(--danger);
            color: white;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th, .table td {
            padding: 15px;
            border-bottom: 1px solid #333;
        }

        .alert-success {
            background: rgba(16,185,129,0.1);
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .empty {
            text-align:center;
            padding:30px;
            color: var(--text-muted);
        }

        /* 🔙 Tombol kembali */
        .btn-back {
            display: inline-block;
            margin-top: 30px;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }

        .btn-back:hover {
            color: var(--primary);
        }
    </style>
</head>
<body>

<div class="container">

    <div class="header">
        <h2>Kategori Sistem</h2>
        <a href="<?php echo e(route('admin.kategori.create')); ?>" class="btn btn-primary">+ Tambah</a>
    </div>

    
    <?php if(session('success')): ?>
        <div class="alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

            <?php if($kategori->isEmpty()): ?>
                <tr>
                    <td colspan="3" class="empty">
                        Belum ada kategori 😴
                    </td>
                </tr>
            <?php endif; ?>

            <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>#<?php echo e($k->id); ?></td>
                <td><?php echo e($k->keterangan); ?></td>
                <td>

                    <a href="<?php echo e(route('admin.kategori.edit', $k->id)); ?>" class="btn btn-edit">Edit</a>

                    <form action="<?php echo e(route('admin.kategori.destroy', $k->id)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button type="submit" class="btn btn-delete"
                            onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                            Hapus
                        </button>
                    </form>

                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>

    <!-- 🔙 Tombol kembali ke dashboard -->
    <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn-back">
        ⬅️ Kembali ke Dashboard
    </a>

</div>

</body>
</html><?php /**PATH C:\asp\web\resources\views/admin/kategori/index.blade.php ENDPATH**/ ?>