
<?php $__env->startSection('title','My Profile'); ?>
<?php $__env->startSection('content'); ?>
<div id="site-content">
    <div class="container">
        <div class="section-heading">
            <h3 class="title">My Profile</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Profile</li>
            </ol>
        </div>
            <form class="row" id="EditProfile" method="POST" style="width:100%;">
                <?php echo csrf_field(); ?>
                <div class="col-md-3">
                    <div class="content-box">
                        <?php if($user->user_img != ''): ?>
                            <img id="image" class="mb-2 w-100" src="<?php echo e(asset('public/users/'.$user->user_img)); ?>" alt="" >
                        <?php else: ?>
                            <img id="image" class="mb-2 w-100" src="<?php echo e(asset('public/users/default.png')); ?>" alt="" width="100%">
                        <?php endif; ?>
                        <div>
                            <input type="hidden" name="old_img" value="<?php echo e($user->user_img); ?>" />
                            <input type="file" class="form-control" name="img" onChange="readURL(this);" width="100%">
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="content-box">
                        <div class="form-group row mb-3">
                            <label class="col-lg-3 col-sm-5 col-form-label">Full Name : </label>
                            <div class="col-lg-5 col-sm-7">
                                <input type="text" class="form-control" name="name" value="<?php echo e($user->name); ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-lg-3 col-sm-5 col-form-label">Email / Username : </label>
                            <div class="col-lg-5 col-sm-7">
                                <input type="email" class="form-control" name="email" value="<?php echo e($user->email); ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="staticphone" class="col-lg-3 col-sm-5 col-form-label">Phone No : </label>
                            <div class="col-lg-5 col-sm-7">
                                <input type="number" class="form-control" name="phone" value="<?php echo e($user->phone); ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="staticphone" class="col-lg-3 col-sm-5 col-form-label">Country : </label>
                            <div class="col-lg-5 col-sm-7">
                                <select class="form-control select-country" name="country" id="">
                                    <option value="">Select Country</option>
                                    <?php if(!empty($country)): ?>
                                        <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countries): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $selected = ($countries->id == $user->country) ? 'selected' : ''; ?>
                                            <option value="<?php echo e($countries->id); ?>" data-country="<?php echo e($countries->id); ?>" <?php echo e($selected); ?>><?php echo e($countries->country_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="staticphone" class="col-lg-3 col-sm-5 col-form-label">State : </label>
                            <div class="col-lg-5 col-sm-7">
                                <select class="form-control select-state" name="state" id="state">
                                    <option value="">First Select Country</option>
                                    <?php if(!empty($state)): ?>
                                        <?php $__currentLoopData = $state; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $states): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $selected = ($states->id == $user->state) ? 'selected' : ''; ?>
                                            <option value="<?php echo e($states->id); ?>" data-state="<?php echo e($states->id); ?>" <?php echo e($selected); ?>><?php echo e($states->state_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="staticphone" class="col-lg-3 col-sm-5 col-form-label">City : </label>
                            <div class="col-lg-5 col-sm-7">
                                <select class="form-control" name="city" id="city">
                                    <option value="">First Select State</option>
                                    <?php if(!empty($city)): ?>
                                        <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $selected = ($cities->id == $user->city) ? 'selected' : ''; ?>
                                            <option value="<?php echo e($cities->id); ?>" <?php echo e($selected); ?>><?php echo e($cities->city_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="staticphone" class="col-lg-3 col-sm-5 col-form-label">Address : </label>
                            <div class="col-lg-5 col-sm-7">
                                <?php if($user->address != ''): ?>
                                    <input type="text" class="form-control" name="address" value="<?php echo e($user->address); ?>">
                                <?php else: ?>
                                    <input type="text" class="form-control" name="address" value="">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="staticphone" class="col-lg-3 col-sm-5 col-form-label">Pin Code : </label>
                            <div class="col-lg-5 col-sm-7">
                                <?php if($user->pin_code != ''): ?>
                                    <input type="number" class="form-control" name="code" value="<?php echo e($user->pin_code); ?>">
                                <?php else: ?>
                                    <input type="number" class="form-control" name="code" value="">
                                <?php endif; ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">UPDATE</button> 
                    </div>
                    <div class="message"></div>
                </div>
            </form>
    </div>
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
<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/script/resources/views/public/my-profile.blade.php ENDPATH**/ ?>