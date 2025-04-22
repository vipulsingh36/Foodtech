
<?php $__env->startSection('title',site_settings()->site_title); ?>
<?php $__env->startSection('content'); ?>
<!------ BANNER ------>
<div id="banner">
    <div class="flexslider">
        <ul class="slides">
           <?php $__currentLoopData = $banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <?php if($item->status == '1'): ?>
           <li >
               <div class="row">
                 <div class="col-md-12 col-sm-12">
                   <div>
                      <a href="<?php echo e(url($item->pagelink)); ?>" target="_blank"><img class="banner-img" src="<?php echo e(asset('public/banner/'.$item->banner_img)); ?>"></a>
                   </div>
                 </div>
               </div>
           </li>
           <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
<!------/BANNER------>
<?php if($today_deal_products->isNotEmpty()): ?>
<!------ Today Deal PRODUCTS ------>
<div class="product-box">
  <div class="container">
    <div class="section-heading">
        <h3 class="title">Today Deals</h3>
        <a href="<?php echo e(url('/today-deals')); ?>" class="btn btn-primary btn-sm">View All</a>
    </div>
    <div class="row"> 
      <div class="col-md-12">
        <div class=" today-carousel owl-carousel owl-theme">
          <?php $__currentLoopData = $today_deal_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="item">
                <?php echo $__env->make('public.product-grid',$item, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!------/Today Deal PRODUCTS------>
<?php endif; ?>
<!------ LATEST PRODUCTS ------>
<?php if($latest_products->isNotEmpty()): ?>
<div class="product-box">
  <div class="message"></div>
  <div class="container">
    <div class="section-heading">
        <h3 class="title">Latest Products</h3>
        <a href="<?php echo e(url('/search')); ?>" class="btn btn-primary btn-sm">View All</a>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class=" latest-carousel owl-carousel owl-theme">
          <?php $__currentLoopData = $latest_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="item">
                <?php echo $__env->make('public.product-grid',$item, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<!------/LATEST PRODUCTS------>
<?php if($flash_deals->isNotEmpty()): ?>
<!------ BANNER GROUP ------>
<div class="banner-group flash-deals">
  <div class="container">
    <div class="section-heading">
        <h3 class="title">Flash Deals</h3>
          <a href="<?php echo e(url('/flash-deals')); ?>" class="btn btn-primary btn-sm">View All</a>
    </div>
    <div class="row">
      <?php $__currentLoopData = $flash_deals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flash): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php 
            $datetime = explode('-',$flash->flash_date_range);
            $currentDatetime = date('Y-m-d H:i A');
            if($flash->flash_date_range != ''){
              $startDatetime = date('Y-m-d H:i A', strtotime("$datetime[0]"));
              $endDatetime = date('Y-m-d H:i A', strtotime("$datetime[1]"));
            }else{
              $startDatetime = '';
              $endDatetime = '';
            }
        ?>
        <?php if($flash->status == '1'): ?>
          <?php if(($currentDatetime >= $startDatetime) && ($currentDatetime <= $endDatetime)): ?>
          <div class="col-md-4 flash-deal-box">
            <div class="banner-inner">
              <a href="<?php echo e(url('/flash-products/'.$flash->flash_slug)); ?>">
                <img src="<?php echo e(asset('public/flash-deals/'.$flash->flash_image)); ?>" alt="">
              </a>
            </div>
          </div>
          <?php endif; ?>
        <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</div>
<?php endif; ?>
<!------/BANNER GROUP------>

<!------ FLASH SALE PRODUCTS ------>
<?php if($flash_products->isNotEmpty()): ?>
<div class="product-box flash-products">
  <div class="message"></div>
  <div class="container">
    <div class="section-heading">
        <h3 class="title">Flash Sale</h3>
          <a href="<?php echo e(url('/flash-products')); ?>" class="btn btn-primary btn-sm">View All</a>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="flash-carousel owl-carousel owl-theme position-relative">
          <?php $__currentLoopData = $flash_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php 
              date_default_timezone_set('Asia/Kolkata');
              $datetimes = explode('-',$item->flash_date_range);
              $currentDatetimes = date('Y-m-d H:i A');
              if($item->flash_date_range != ''){
                $startDatetimes = date('Y-m-d H:i A', strtotime("$datetimes[0]"));
                $endDatetimes = date('Y-m-d H:i A', strtotime("$datetimes[1]"));
              }else{
                $startDatetimes = '';
                $endDatetimes = '';
              }
            ?>
            <?php if(($currentDatetimes >= $startDatetimes) && ($currentDatetimes <= $endDatetimes)): ?>
            <div class="item flash-product">
              <?php echo $__env->make('public.product-grid',$item, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<!------/FLASH SALE PRODUCTS------>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageJsScripts'); ?>
<script src="<?php echo e(asset('public/assets/js/owl.carousel.js')); ?>"></script>
<script type="text/javascript">
   $(document).ready(function(){
      if($('.flash-deal-box').length < 1){
        $('.banner-group.flash-deals').hide();
      }
      if($('.flash-product').length < 1){
        $('.flash-products').hide();
      }


        var owl = $('.latest-carousel');
        owl.owlCarousel({
            margin: 30,
            loop: true,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                450: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                },
            }
        });

        $('.flash-carousel').owlCarousel({
            margin: 30,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                450: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                },
            }
        });
        $('.today-carousel').owlCarousel({
            margin: 30,
            loop: false,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                450: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                },
            }
        });
    });

    
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/script/resources/views/public/index.blade.php ENDPATH**/ ?>