
<?php $__env->startSection('title','My Cart'); ?>
<?php $__env->startSection('content'); ?>
<div id="site-content">
    <div class="message"></div>
    <div class="container">
        <div class="section-heading">
            <h3 class="title">My Cart</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Cart</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo e(url('/checkout')); ?>">
                <?php echo csrf_field(); ?>
                <div class="cart-data position-relative">
                    <div class="loader-container">
                        <div class="loader">
                            <span class="loader-inner box-1"></span>
                            <span class="loader-inner box-2"></span>
                            <span class="loader-inner box-3"></span>
                            <span class="loader-inner box-4"></span>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageJsScripts'); ?>
<script>
    $(window).on('load', function(){
        function net_amount(){
            var amount = 0;
            $('.product-total').each(function(){
                var val = $(this).html();
                var total = parseInt(amount) + parseInt(val);
                amount = total;
            });
            $('.total-amount').html(amount);
        }
        if(localStorage.getItem('product_id') != null){
            var product_id = localStorage.getItem('product_id').split(',');
            var colors = JSON.parse(localStorage.getItem('color_ids'));
            var values = JSON.parse(localStorage.getItem('attr'));
            var url = $('.demo').val();
            $.ajax({
                url: url + '/show_cart',
                type: 'POST',
                data : {"_token": "<?php echo e(csrf_token()); ?>",product_id:product_id,color_id:colors,attrvalues:values},
                success: function(dataResult){
                    console.log(dataResult);
                    $('.cart-data').html(dataResult);
                    net_amount();
                }
            });
        }else{
            var data = `<div class="content-box text-center">
                        <p class="">No Cart Found</p>
                        <a href="<?php echo e(url('/')); ?>" class="btn btn-primary">Shop Now</a>
                    </div>`;
            $('.cart-data').html(data);
        }
        
    
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/script/resources/views/public/local-cart.blade.php ENDPATH**/ ?>