
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo e(site_settings()->site_title); ?> | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/fontawesome-free/css/all.min.css')); ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/icheck-bootstrap.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/adminlte.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('public/assets/css/sweetalert-bootstrap-4.min.css')); ?>">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <?php if(site_settings()->site_logo != ''): ?>
    <img src="<?php echo e(asset('public/site/'.site_settings()->site_logo)); ?>" alt="<?php echo e(site_settings()->site_name); ?>" width="150px">
    <?php else: ?>
    <h3><?php echo e(site_settings()->site_name); ?></h3>
    <?php endif; ?>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <form id="adminLogin"  method="POST">
        <?php echo csrf_field(); ?>
        <input type="hidden" class="url" value="<?php echo e(url('/')); ?>">  
        <div class="form-group mb-3">
          <input type="text" class="form-control username" name="username" placeholder="Username" required>
        </div>
        <div class="form-group mb-3">
          <input type="password" class="form-control password" name="password" placeholder="Password" required>
        </div>
        <div class="row">
          <div class="offset-md-8 col-4">
            <input type="submit" class="btn btn-primary float-right" name="login" value="Login">
          </div>
          <div class="col-md-12">
            <div class="col-12">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php if(Session::has('loginError')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(Session::get('loginError')); ?>

                    </div>
                <?php endif; ?>
            </div>
          </div>
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo e(asset('public/assets/js/jquery.min.js')); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('public/assets/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('public/assets/js/adminlte.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/sweetalert2.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/additional-methods.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/admin-login.js')); ?>"></script>
</body>
</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/script/resources/views/admin/admin.blade.php ENDPATH**/ ?>