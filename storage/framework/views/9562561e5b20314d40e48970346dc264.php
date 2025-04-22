<div class="product-grid">
    <div class="product-image">
        <a href="<?php echo e(url('/product/'.$item->slug)); ?>" class="image">
            <?php if($item->thumbnail_img != ''): ?>
            <img class="pic-1" src="<?php echo e(asset('public/products/'.$item->thumbnail_img)); ?>">
            <?php else: ?>
            <img class="pic-1" src="<?php echo e(asset('public/products/default.png')); ?>">
            <?php endif; ?>
        </a>
        <ul class="product-links">
            <?php if(Session::has('user_id')): ?>
            <li><a href="javascript:void(0)" class="addwishlist" data-tip="Add to Wishlist" data-id="<?php echo e($item->id); ?>"><i class="far fa-heart"></i></a></li>
            <?php else: ?>
            <li><a href="<?php echo e(url('user_login')); ?>" data-tip="Add to Wishlist" data-id="<?php echo e($item->id); ?>"><i class="far fa-heart"></i></a></li>
            <?php endif; ?>
        </ul>
        <?php $product_price = get_product_price($item->id); ?>
        <?php if($product_price->discount != ''): ?>
        <span class="product-discount-label">-<?php echo e($product_price->discount); ?></span>
        <?php endif; ?>
    </div>
    <div class="product-content">
        <span class="category"><?php echo e($item->brand_name); ?></span>
        <?php $product_rating = product_rating($item->id);  ?>
        <ul class="rating show-review-rating">
        <?php $rating = 0;  ?>
        <?php if($product_rating->rating_col > 0): ?>
            <?php $rating = ceil($product_rating->rating_sum/$product_rating->rating_col);  ?>  
        <?php endif; ?>
        <?php for($i=1;$i<=5;$i++): ?>
            <?php if($i <= $rating): ?>
                <li class="fa fa-star"></li>
            <?php else: ?>
                <li class="far fa-star"></li>
            <?php endif; ?>
        <?php endfor; ?>
        </ul>
        <h3 class="title"><a href="<?php echo e(url('/product/'.$item->slug)); ?>"><?php echo e(substr($item->product_name,0,25).'...'); ?></a></h3>
        
        <?php if($product_price->discount != ''): ?>
            <span class="old-price"><?php echo e(site_settings()->currency); ?><?php echo e($product_price->old_price); ?></span>
        <?php endif; ?>
        <span class="price"><?php echo e(site_settings()->currency); ?><?php echo e($product_price->new_price); ?></span>
    </div>
</div><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/script/resources/views/public/product-grid.blade.php ENDPATH**/ ?>