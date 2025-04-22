
<?php $__env->startSection('title','Users'); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php $__env->startComponent('admin.components.content-header',['breadcrumb'=>['Dashboard'=>'admin/dashboard']]); ?>
        <?php $__env->slot('title'); ?> All Users <?php $__env->endSlot(); ?>
        <?php $__env->slot('add_btn'); ?>  <?php $__env->endSlot(); ?>
        <?php $__env->slot('active'); ?> All Users <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <!-- /.content-header -->

    <!-- show data table -->
    <?php $__env->startComponent('admin.components.data-table',['thead'=>
    ['S No.','Name','Email','Phone','City','Pin Code','State','Country','Action']
    ]); ?>
        <?php $__env->slot('table_id'); ?> user_list <?php $__env->endSlot(); ?>
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
    var table = $("#user_list").DataTable({
        processing: true,
        serverSide: true,
        ajax: "users",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'phone', name: 'phone'},
            {data: 'city_name', name: 'city'},
            {data: 'pin_code', name: 'pin_code'},
            {data: 'state_name', name: 'state'},
            {data: 'country_name', name: 'country'},
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
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/script/resources/views/admin/users/index.blade.php ENDPATH**/ ?>