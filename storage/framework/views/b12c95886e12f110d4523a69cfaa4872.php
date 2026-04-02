

<?php $__env->startSection('title', 'Import User CSV | Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="card p-4">
    <h2>Import User (CSV)</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <div class="alert alert-info">
        Format CSV: username, nis, email, role, kelas, password. Baris pertama harus header.
    </div>

    <form method="POST" action="<?php echo e(route('admin.users.import')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label>File CSV</label>
            <input type="file" name="csv_file" class="form-control" accept=".csv" required>
        </div>

        <button type="submit" class="btn btn-primary">Upload & Import</button>
        <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-secondary">Back</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\asp\web\resources\views/admin/users/import.blade.php ENDPATH**/ ?>