<ul class="subcategory-list">
    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><a href="<?php echo e($sub_row->category_slug); ?>">
        <?php if($cat_detail->id == $sub_row->id): ?>
        <i class="fas fa-angle-right"></i>
        <?php endif; ?>
        <?php echo e($sub_row->category_name); ?></a></li>
        <?php if($sub_row->sub_category): ?>
            <?php echo $__env->make('public.partials.child-category',['category'=>$sub_row->sub_category,'cat_detail'=>$cat_detail], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/script/resources/views/public/partials/child-category.blade.php ENDPATH**/ ?>