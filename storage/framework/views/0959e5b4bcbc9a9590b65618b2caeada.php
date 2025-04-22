
<?php $__env->startSection('title',$product->product_name); ?>
<?php $__env->startSection('content'); ?>
<div id="site-content">
    <div class="message"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="content-box single-product">
                    <div class="flexslider">
                        <ul class="slides">
                            <!-- <input type="hidden" name="id[]" id="product-id" value="<?php echo e($product->id); ?>"> -->
                            <?php 
                                $images = array_filter(explode(',',$product->gallery_img));
                            ?>
                            <?php for($i=0; $i < count($images); $i++): ?>
                                <li data-thumb="<?php echo e(asset('public/products/'.$images[$i])); ?>" >
                                    <img src="<?php echo e(asset('public/products/'.$images[$i])); ?>" />
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                    <span class="add-favourite addwishlist" data-id="<?php echo e($product->id); ?>"><i class="fas fa-heart"></i></span>
                </div>
            </div>
            <div class="col-md-6">
                <!-- <form action="<?php echo e(url('/checkout')); ?>"> -->
                    <?php echo csrf_field(); ?>
                <input type="hidden" name="product_id" id="product_id" value="<?php echo e($product->id); ?>">
                <div class="product-info">
                    <span class="brand-name"><?php echo e($product->brand_name); ?></span>
                    <p class="product-name"><?php echo e($product->product_name); ?></p>
                    <?php $product_price = get_product_price($product->id); ?>
                    <div class="product-price">
                        <span class="special-price"><?php echo e(site_settings()->currency); ?><?php echo e($product_price->new_price); ?></span>
                        <?php if($product_price->discount != ''): ?>
                        <span class="old-price"><?php echo e(site_settings()->currency); ?><?php echo e($product_price->old_price); ?></span>
                        <span class="discount-price"><?php echo e($product_price->discount); ?> off</span>
                        <?php endif; ?>
                    </div>
                    <ul class="rating">
                    <?php if($product->rating_col > 0): ?>
                          <?php $rating = ceil($product->rating_sum/$product->rating_col);  ?>  
                        <?php else: ?>
                          <?php $rating = 0;  ?>  
                        <?php endif; ?>
                        <?php for($i=1;$i<=5;$i++): ?>
                            <?php if($i <= $rating): ?>
                              <li class="fa fa-star"></li>
                            <?php else: ?>
                              <li class="far fa-star"></li>
                            <?php endif; ?>
                        <?php endfor; ?>
                        <li>(<?php echo e($product->rating_col); ?> reviews)</li>
                    </ul>
                    <div class="product-color">
                        <?php
                            $p_colors = array_filter(explode(',',$product->colors));
                            $i=0;
                        ?>
                        <?php if(!empty($p_colors)): ?>
                        <label>Color:</label>
                            <ul class="option-list">
                            <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(in_array($item1->id,$p_colors)): ?>
                                    <?php $color_check = ($i==0) ? 'checked' : '';  ?>
                                    <li class="radio-button">
                                        <input type="radio" name="product_color" <?php echo e($color_check); ?> id="color<?php echo e($item1->id); ?>" required value="<?php echo e($item1->id); ?>" data-id="<?php echo e($product->id); ?>">
                                        <label for="color<?php echo e($item1->id); ?>" style="background-color:<?php echo e($item1->color_code); ?>"></label>
                                    </li>
                                    <?php $i++;  ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $value = array_filter(explode(',',$row->attrvalues));
                        ?>
                        <div class="product-attributes">
                            <span><?php echo e($row->title); ?>:</span>
                            <?php $j=0;  ?>
                            <?php $__currentLoopData = $attrvalues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(in_array($item1->id,$value)): ?>
                                <?php $attr_check = ($j==0) ? 'checked' : '';  ?>
                                    <input type="hidden" name="product_attrvalues"  value="<?php echo e($item1->id); ?>" data-id="<?php echo e($row->product_id); ?>">
                                    <input type="radio" class="attrvalue" data-attr="<?php echo e($item1->attribute); ?>" id="attrvalue<?php echo e($item1->id); ?>" name="<?php echo e(strtolower($row->title)); ?>" <?php echo e($attr_check); ?> value="<?php echo e($item1->id); ?>" required>
                                    <label for="attrvalue<?php echo e($item1->id); ?>"><?php echo e($item1->value); ?></label>
                                    <?php $j++;  ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- if($product->shipping_charges == 'free')
                        <div class="product-shipping">
                            <span><b>Shipping Charges: </b></span>
                            <p class="badge badge-success">Free</p>
                            <input type="hidden" name="shipping" value="0" data-id="<?php echo e($product->id); ?>">
                        </div>
                    else -->
                        <div class="product-shipping">
                            <span class="shipping-head">Delivery: </span>
                            <select class="form-control shipping" name="shipping" id="" required>
                                <option value="" selected disabled>Select Location</option>
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $selected = ''; ?>
                                    <?php if(session()->get('user_city') == $city->id): ?>
                                        <?php $selected = 'selected'; ?>
                                    <?php endif; ?>
                                    <option value="<?php echo e($city->id); ?>" data-p-ship="<?php echo e($product->shipping_charges); ?>" <?php echo e($selected); ?> data-shipping="<?php echo e($city->cost_city); ?>"><?php echo e($city->city_name); ?> (<?php echo e($city->state_name); ?>)</option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="shipping-charges"></div>
                    <!-- endif -->
                    <div class="product-btn">
                        <?php if(session()->has('user_name')){ ?>
                            <?php if(in_array($product->id,$cart)): ?>
                            <a href="<?php echo e(url('/cart')); ?>" class="btn btn-primary">Go to cart</a>
                            <?php else: ?>
                            <button type="button" class="btn btn-primary mr-2" id="addcart" data-user="<?php echo e(session()->get('user_id')); ?>" data-id="<?php echo e($product->id); ?>">Add to cart</button>
                            <?php endif; ?>
                                <a href="#" class="btn btn-danger" id="checkout">Buy Now</a>
                                <!-- <button type="submit" class="btn btn-danger">Buy Now</button> -->
                        <?php }else{ ?>
                            <button type="button" class="btn btn-primary mr-2" id="addcart" data-user='' data-id="<?php echo e($product->id); ?>">Add to cart</button>
                            <a href="<?php echo e(url('/user_login')); ?>" class="btn btn-danger">Buy Now</a>
                        <?php } ?>
                    </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h4 class="title">Description</h4>
                </div>
                <p><?php echo htmlspecialchars_decode($product->description); ?></p>
            </div>
        </div>
        <div class="row">
            <?php if($reviews->isNotEmpty()): ?>
            <div class="col-md-6">
                <div class="section-heading">
                    <h4 class="title">Reviews</h4>
                </div>
                <div class="product-reviews">
                    <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="review-item">
                        <h6><span class="bg-success"><i class="fa fa-star"></i> <?php echo e($review->rating); ?></span> <?php echo e($review->title); ?></h6>
                        <p><?php echo e($review->desc); ?></p>
                        <span class="user"><?php echo e($review->name); ?></span>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>
            <?php if($product->video_link != ''): ?>
            <div class="col-md-6">
                <div class="section-heading">
                    <h4 class="title">Video</h4>
                </div>
                
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!------ RELATED PRODUCTS ------>
<?php if($related->isNotEmpty($related)): ?>
<div class="product-box">
  <div class="container">
    <div class="section-heading">
        <h3 class="title">Related Products</h3>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="owl-carousel owl-theme related-carousel">
            <?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('public.product-grid',$item, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<!------/RELATED PRODUCTS------>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageJsScripts'); ?>
<script src="<?php echo e(asset('public/assets/js/owl.carousel.js')); ?>"></script>
<script type="text/javascript">
   $(document).ready(function(){
       
        $(document).on('click','#checkout',function(){
            var attr = {};
            var p_id = $('input[name=product_id]').val();
    
            if($('input[name=product_color]').length > 0){
            var color_id = $('input[name="product_color"]:checked').val();
                if(color_id == ''){
                    alert('Select Color');
                }
            }
            if($('.product-attributes').length > 0){
                var attr_val = '';
                $('.product-attributes').each(function(){
                    var key = $(this).children('input[class=attrvalue]:checked').attr('data-attr');
                    var val = $(this).children('input[class=attrvalue]:checked').val();
                    attr_val += key+':'+val+',';
                }); 
                attr[p_id] = attr_val;
            }

            var base_url = $('.demo').val();
            var location = $('.shipping option:selected').val();
            if(location == ''){
                Swal.fire({
                    icon: 'warning',
                    title: 'Select Location',
                    showConfirmButton: false,
                    timer: 1000
                });
            }else{
                var url = base_url+"/checkout?product_id=" + p_id + "&product_color=" +color_id + "&product_attr=" + encodeURIComponent(JSON.stringify(attr))+"&location="+location+"&qty=1";
                window.location.href = url;
            }
        
        });

        var owl = $('.related-carousel');
        owl.owlCarousel({
            margin: 30,
            loop: false,
            nav: false,
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

    function increment() {
            document.getElementById('demoInput').stepUp();
        }
    function decrement() {
        document.getElementById('demoInput').stepDown();
    }

    function show_shipping_charges(){
        var shipping_charges = $('.shipping').children('option:selected').data('shipping');
        var product_shipping = $('.shipping').children('option:selected').data('p-ship');
        if(product_shipping != 'free'){
            if(shipping_charges != undefined && shipping_charges > -1){
                var row = '<p><span><b>Shipping Charges :</b> <?php echo e(site_settings()->currency); ?>'+shipping_charges+'</span></p>';
            }
        }else{
            var row = '<p><span><b>Shipping Charges :</b> Free</span></p>';
        }
        $('.shipping-charges').html(row);
    }
    show_shipping_charges();

    $(document).on('change','.shipping',function(){
        show_shipping_charges();
    });

        
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/script/resources/views/public/product.blade.php ENDPATH**/ ?>