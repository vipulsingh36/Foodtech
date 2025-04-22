
<?php $__env->startSection('title','My Wishlist'); ?>
<?php $__env->startSection('content'); ?>
<div id="site-content">
    <div class="message"></div>
    <div class="container">
        <div class="section-heading">
            <h3 class="title">My Wishlist</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Wishlist</li>
            </ol>
        </div>
        <div class="row wishlist-data">
            <?php if($products->isNotEmpty()): ?>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3">
              <div class="product-grid">
                <div class="product-image">
                    <a href="<?php echo e(url('/product/'.$item->slug)); ?>" class="image">
                        <img class="pic-1" src="<?php echo e(asset('public/products/'.$item->thumbnail_img)); ?>">
                    </a>
                    <ul class="product-links">
                        <?php if(Session::has('user_id')): ?>
                        <li><a href="javascript:void(0)" class="wishlist-active" data-tip="Add to Wishlist" data-id="<?php echo e($item->id); ?>"><i class="far fa-heart"></i></a></li>
                        <?php else: ?>
                        <li><a href="<?php echo e(url('user_login')); ?>" data-tip="Add to Wishlist" data-id="<?php echo e($item->id); ?>"><i class="far fa-heart"></i></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="product-content">
                    <span class="category"><a href=""><?php echo e($item->brand_name); ?></a></span>
                    <ul class="rating">
                        <li class="fas fa-star"></li>
                        <li class="fas fa-star"></li>
                        <li class="fas fa-star"></li>
                        <li class="fas fa-star"></li>
                        <li class="far fa-star"></li>
                    </ul>
                    <h3 class="title"><a href="<?php echo e(url('/product/'.$item->slug)); ?>"><?php echo e($item->product_name); ?></a></h3>
                    <div class="price"><?php echo e($item->unit_price); ?></div>
                    <button type="button" class="btn btn-danger btn-sm mt-2 remove-wishlist" data-id="<?php echo e($item->id); ?>">Remove from wishlist</button>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php else: ?>
            <div class="col-md-12 text-center">
                <h4>Your Wishlist is Empty</h4>
                <a href="<?php echo e(url('/')); ?>" class="btn btn-primary">Add Items to Wishlist</a>
            </div>
          <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageJsScripts'); ?>
<script src="<?php echo e(asset('assets/js/action.js')); ?>"></script>
<script type="text/javascript">
    // $(window).on('load', function(){
    //     var items = localStorage.getItem('product_ids');
    //     var url = $('.demo').val();
    //     $.ajax({
    //         url: url + '/show_wishlists',
    //         type: 'POST',
    //         data : {"_token": "<?php echo e(csrf_token()); ?>",wishlist_id:items},
    //         success: function(dataResult){
    //             if(dataResult['data'] != ''){
    //                 $('.wishlist-data').html(dataResult['data']);
    //             }else{
    //                 $('.wishlist-data').html("<div class='col-md-12'><div class='content-box text-center'><p class='m-0'>No wishlist found.</p></div></div>");
    //             }
                
    //         }
    //     });
    // });
    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/script/resources/views/public/wishlists.blade.php ENDPATH**/ ?>