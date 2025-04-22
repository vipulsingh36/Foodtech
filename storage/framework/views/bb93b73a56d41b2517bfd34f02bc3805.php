
<?php $__env->startSection('title','Orders'); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php $__env->startComponent('admin.components.content-header',['breadcrumb'=>['Dashboard'=>'admin/dashboard']]); ?>
        <?php $__env->slot('title'); ?> All Orders <?php $__env->endSlot(); ?>
        <?php $__env->slot('add_btn'); ?>  <?php $__env->endSlot(); ?>
        <?php $__env->slot('active'); ?> All Orders <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <!-- /.content-header -->

    <!-- show data table -->
    <?php $__env->startComponent('admin.components.data-table',['thead'=>
        ['ORDER No.','Product Details','Total Amount','Customer Details','Order Date','Action']
    ]); ?>
        <?php $__env->slot('table_id'); ?> order_list <?php $__env->endSlot(); ?>
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
    var table = $("#order_list").DataTable({
        processing: true,
        serverSide: true,
        ajax: "orders",
        order: [0], //Initial no order.
        columns: [
            {data: 'order_id', name: 'order_id'},
            {data: 'p_id', name: 'product_id'},
            {data: 'amount', name: 'total_amount'},
            {data: 'user_details', name: 'user_details'},
            {data: 'created_at', name: 'order_date'},
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            }
        ]
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/script/resources/views/admin/orders/index.blade.php ENDPATH**/ ?>