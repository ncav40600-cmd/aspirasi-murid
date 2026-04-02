

<?php $__env->startSection('title', 'Management User | Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="card p-4">
    <h2 class="mb-3">Manajemen User</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <div class="d-flex justify-content-between mb-3">
        <form method="GET" action="<?php echo e(route('admin.users.index')); ?>" class="d-flex gap-2">
            <input type="search" name="search" value="<?php echo e($search ?? ''); ?>" placeholder="Cari username / nis / email" class="form-control" />
            <button class="btn btn-primary">Cari</button>
        </form>
        <div>
            <a href="<?php echo e(route('admin.users.import.form')); ?>" class="btn btn-warning">Import CSV</a>
            <a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-success">Tambah User</a>
        </div>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>NIS</th>
                <th>Email</th>
                <th>Role</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($user->id); ?></td>
                <td><?php echo e($user->username); ?></td>
                <td><?php echo e($user->nis); ?></td>
                <td><?php echo e($user->email); ?></td>
                <td><?php echo e(ucfirst($user->role)); ?></td>
                <td><?php echo e($user->kelas ?? '-'); ?></td>
                <td>
                    <a href="<?php echo e(route('admin.users.edit', $user->id)); ?>" class="btn btn-sm btn-secondary">Edit</a>
                    <form method="POST" action="<?php echo e(route('admin.users.destroy', $user->id)); ?>" style="display:inline;" onsubmit="return confirm('Yakin hapus user ini?');">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                    <form method="POST" action="<?php echo e(route('admin.users.reset_password', $user->id)); ?>" style="display:inline; margin-left:4px;" onsubmit="return confirm('Reset password user ini?');">
                        <?php echo csrf_field(); ?>
                        <button class="btn btn-sm btn-info">Reset Password</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <?php echo e($users->withQueryString()->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\asp\web\resources\views/admin/users/index.blade.php ENDPATH**/ ?>