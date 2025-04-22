<?php if(sizeof($keywords) > 0): ?>
<div>
    <ul class="list-group">
        <?php $__currentLoopData = $keywords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $keyword): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item rounded-0 border-left-0 border-right-0 py-2 text-capitalize">
                <a href="<?php echo e(url('search?keyword='.ltrim($keyword))); ?>"><?php echo e($keyword); ?></a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    </ul>
</div>
<?php endif; ?>
<div>
<?php if(count($categories) > 0): ?>
    <small class="text-right font-italic p-1 d-block bg-light">Category</small>
    <ul class="list-group list-group-raw">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item rounded-0 border-left-0 border-right-0 py-2 text-capitalize">
                <a class="" href="<?php echo e(url('c/'.$category->category_slug)); ?>"><?php echo e($category->category_name); ?></a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endif; ?>
</div><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/script/resources/views/public/search-content.blade.php ENDPATH**/ ?>