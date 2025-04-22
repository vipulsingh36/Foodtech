
<?php $__env->startSection('title','Product Stock Report'); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php $__env->startComponent('admin.components.content-header',['breadcrumb'=>['Dashboard'=>'admin/dashboard']]); ?>
        <?php $__env->slot('title'); ?> Product Stock Report <?php $__env->endSlot(); ?>
        <?php $__env->slot('add_btn'); ?>  <?php $__env->endSlot(); ?>
        <?php $__env->slot('active'); ?> Product Stock Report <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <!-- /.content-header -->
    <div class="card mx-5">
        <div class="card-header">
            <span><b>Sort By Category</b></span>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card-body">
                    <select name="" class="form-control category-select" id="">
                        <option value="all" selected>All Products</option>
                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            <option value="<?php echo e($list->id); ?>"><?php echo e($list->category_name); ?></option>
                            <?php $__currentLoopData = $list->childrenCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make('admin.category.child_category', ['child_category' => $childCategory], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- show data table -->
    <?php $__env->startComponent('admin.components.data-table',['thead'=>
    ['S No.','Product Name','Stock']
    ]); ?>
        <?php $__env->slot('table_id'); ?> stock_list <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageJsScripts'); ?>
<!-- DataTables -->
<script src="<?php echo e(asset('public/assets/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/responsive.bootstrap4.min.js')); ?>"></script>
<script type="text/javascript">
    var table = $("#stock_list").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "product-stock",
          data: function(d) {
                d.category = $('.category-select option:selected').val();
            }
        },

        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'product_name', name: 'product_name'},
            {data: 'quantity', name: 'quantity'},
            
        ]
    });
    $(document).ready(function(){
        $('.category-select').change(function(){
            table.ajax.reload();
        })
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/script/resources/views/admin/product-stock/index.blade.php ENDPATH**/ ?>