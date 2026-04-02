<?php if(session('success')): ?>
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    <i class="fas fa-check-circle me-2"></i>
    <?php echo e(session('success')); ?>


    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>


<?php if(session('error')): ?>
<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
    <i class="fas fa-exclamation-circle me-2"></i>
    <?php echo e(session('error')); ?>


    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>


<?php if(session('info')): ?>
<div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
    <i class="fas fa-info-circle me-2"></i>
    <?php echo e(session('info')); ?>


    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>
<?php /**PATH C:\asp\web\resources\views/partials/flash.blade.php ENDPATH**/ ?>