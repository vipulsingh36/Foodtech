
<?php $__env->startSection('title','Pages'); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php $__env->startComponent('admin.components.content-header',['breadcrumb'=>['Dashboard'=>'admin/dashboard']]); ?>
        <?php $__env->slot('title'); ?> All Pages <?php $__env->endSlot(); ?>
        <?php $__env->slot('add_btn'); ?> <a href="<?php echo e(url('admin/pages/create')); ?>" class="align-top btn btn-sm btn-primary">Add New</a> <?php $__env->endSlot(); ?>
        <?php $__env->slot('active'); ?> All Pages <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <!-- /.content-header -->

    <!-- show data table -->
    <?php $__env->startComponent('admin.components.data-table',['thead'=>
        ['S No.','Title','Status','Action']
    ]); ?>
        <?php $__env->slot('table_id'); ?> pages_list <?php $__env->endSlot(); ?>
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
    var table = $("#pages_list").DataTable({
        processing: true,
        serverSide: true,
        ajax: "pages",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'page_title', name: 'page_title'},
            {data: 'status', name: 'status'},
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
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/script/resources/views/admin/pages/index.blade.php ENDPATH**/ ?>