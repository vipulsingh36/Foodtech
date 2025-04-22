
<?php $__env->startSection('title','Edit Banner Slider'); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<?php $__env->startComponent('admin.components.content-header',['breadcrumb'=>['Dashboard'=>'admin/dashboard','Banner Slider'=>'admin/banner']]); ?>
    <?php $__env->slot('title'); ?> Edit Banner Slider <?php $__env->endSlot(); ?>
    <?php $__env->slot('add_btn'); ?>  <?php $__env->endSlot(); ?>
    <?php $__env->slot('active'); ?> Edit Banner Slider <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!-- Main content -->
<section class="content card">
    <div class="container-fluid card-body">
        <!-- form start -->
        <form class="form-horizontal" id="update_banner"  method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo e(method_field('PUT')); ?>

            <?php if($banner): ?>
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                   <input type="hidden" class="url" value="<?php echo e(url('admin/banner/'.$banner->id)); ?>" >
                   <input type="hidden" class="rdt-url" value="<?php echo e(url('admin/banner')); ?>" >
                    <!-- jquery validation -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Banner Slider Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span>Title</span>
                                    </div>
                                    <div class="col-md-10">
                                    <input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo e($banner->title); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <span class="col-md-2">Image</span>
                                <div class="custom-file col-md-7">
                                    <input type="hidden" class="custom-file-input" name="old_img" value="<?php echo e($banner->banner_img); ?>" />
                                    <input type="file" class="custom-file-input" name="img" onChange="readURL(this);">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                                <div class="col-md-3 text-right">
                                    <?php if($banner->banner_img != ''): ?>
                                    <img id="image" src="<?php echo e(asset('public/banner/'.$banner->banner_img)); ?>" alt="" width="200px" height="150px">
                                    <?php else: ?>
                                    <img id="image" src="<?php echo e(asset('public/banner/')); ?>" alt="" width="80px" height="80px">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span>Page Link</span>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="page_link" placeholder="Page Link" value="<?php echo e($banner->pagelink); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span>Status</span>
                                    </div>
                                    <div class="col-md-10">
                                        <select class="form-control" name="banner_status"  style="width: 100%;">
                                            <option value="1" <?php echo e(($banner->status == "1" ? "selected":"")); ?>>Publish</option>
                                            <option value="0" <?php echo e(($banner->status == "0" ? "selected":"")); ?>>Unpublish</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <?php endif; ?>
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form> <!-- /.form start -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->
</div>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/script/resources/views/admin/banner/edit.blade.php ENDPATH**/ ?>