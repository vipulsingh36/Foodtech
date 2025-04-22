
<?php $__env->startSection('title','Forgot Password'); ?>
<?php $__env->startSection('content'); ?>
<div id="site-content" class="py-5"> 
    <div class="container">
        <div class="row">
              <div class="offset-md-4 col-md-4">
              <?php if(Session::has('message')): ?>
                <div class="alert alert-success" role="alert">
                <?php echo e(Session::get('message')); ?>

                </div>
            <?php endif; ?>
                <div class="signup-form">
                    <!-- Form Start -->
                    <form class="form-horizontal mb-3" action="<?php echo e(url('forgot-password')); ?>" method ="POST" autocomplete="off">
                        <h4 class="user-heading mb-4">Forgot Password</h4>
                        <?php echo csrf_field(); ?>
                        <input type="hidden" class="url" value="<?php echo e(url('/')); ?>" >
                        <div class="form-group mb-4">
                            <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                        </div>
                        <input type="submit"  name="save" class="btn btn-primary" value="Send Password Reset Link" required />
                    </form>
                    <span class="login-link"><a href="<?php echo e(url('user_login')); ?>">Back to Login</a></span>
                    <!-- Form End-->
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/script/resources/views/public/forgot-password/forgot.blade.php ENDPATH**/ ?>