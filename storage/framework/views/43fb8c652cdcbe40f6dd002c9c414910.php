
<?php $__env->startSection('title','Profile Settings'); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php $__env->startComponent('admin.components.content-header',['breadcrumb'=>['Dashboard'=>'admin/dashboard']]); ?>
        <?php $__env->slot('title'); ?> Profile Settings <?php $__env->endSlot(); ?>
        <?php $__env->slot('add_btn'); ?> <?php $__env->endSlot(); ?>
        <?php $__env->slot('active'); ?> Profile Settings <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- form start -->
            <form class="form-horizontal" id="updateProfileSetting" method="POST">
            <?php echo e(csrf_field()); ?>

                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                    <input type="hidden" class="url" value="<?php echo e(url('admin/profile-settings')); ?>" >
                    <!-- jquery validation -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Admin Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <span>Admin Name</span>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="admin_name" value="<?php echo e($item->admin_name); ?>"  placeholder="Enter Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <span>Admin Email</span>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="email" class="form-control" name="admin_email" value="<?php echo e($item->admin_email); ?>"  placeholder="Enter Email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <span>Username</span>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="username" value="<?php echo e($item->username); ?>"  placeholder="Enter Username">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary float-right" value="Update"/>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </form> <!-- /.form start -->

            <form class="form-horizontal" id="updateAdminPassword" method="POST">
            <?php echo e(csrf_field()); ?>

                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                    <input type="hidden" class="p-url" value="<?php echo e(url('admin/profile-settings/change-password')); ?>" >
                    <!-- jquery validation -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Change Password</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <span>Old Password</span>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="password" class="form-control" name="password" placeholder="Old Password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <span>New Password</span>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="password" class="form-control" name="new_pass" id="new-pass" placeholder="Enter New Password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <span>Re-enter New Password</span>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="password" class="form-control" name="re_pass"  placeholder="Re-enter New Password">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary float-right" value="Update"/>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </form> <!-- /.form start -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/script/resources/views/admin/settings/profile.blade.php ENDPATH**/ ?>