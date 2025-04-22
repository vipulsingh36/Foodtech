<div class="card">
    <div class="card-body table-responsive">
        <table id="<?php echo e($table_id); ?>" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <?php $__currentLoopData = $thead; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $th): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th><?php echo e($th); ?></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
                <tr>
                    <?php $__currentLoopData = $thead; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $th): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th><?php echo e($th); ?></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            </tfoot>
        </table>
    </div> <!-- /.card-body -->
</div> <!-- /.card --><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/script/resources/views/admin/components/data-table.blade.php ENDPATH**/ ?>