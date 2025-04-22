<table class="table table-bordered cart-data">
    <thead>
        <th>Product</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Total</th>
        <th>Remove</th>
    </thead>
    <tbody>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input type="hidden" name="product_id[]" value="<?php echo e($product->id); ?>">
            <input type="hidden" name="product_attr[<?php echo e($product->id); ?>]" value="<?php echo e($product->attrvalues); ?>">
            <input type="hidden" name="product_color[<?php echo e($product->id); ?>]" value="<?php echo e($product->color); ?>">
            <?php if($product->shipping_charges == 'free'): ?>
                <?php $shipping =0; ?>
            <?php else: ?>
                <?php
                    $shipping = \App\Models\City::where('id',session()->get('user_city'))->pluck('cost_city')->first();
                ?>
            <?php endif; ?>
            <tr>
                <td class="d-flex flex-row">
                    <img class="pic-1" src="<?php echo e(asset('public/products/'.$product->thumbnail_img)); ?>" alt="" width="70px">
                    <div class="ml-2"><?php echo e($product->product_name); ?>

                        <?php if($product->color_code != ''): ?>
                            <span><b>Color : </b> <label for="color<?php echo e($product->id); ?>" style="background-color:<?php echo e($product->color_code); ?>;cursor:auto;"></label></span>
                        <?php endif; ?>
                        <?php if($product->attrvalues != ''): ?>
                            <?php
                                echo '<ul>';
                                $p_attr = array_filter(explode(',',$product->attrvalues));
                                for($i=0;$i<count($p_attr);$i++){
                                    $atr_val = array_filter(explode(':',$p_attr[$i]));
                                    echo '<li>';
                                    foreach($attributes as $attr_array){
                                        if($attr_array->id == $atr_val[0]){
                                            echo '<span><b>'.$attr_array->title.':</b></span>';
                                        }
                                    }
                                    foreach($attrvalues as $attr_vals){
                                        if($attr_vals->id == $atr_val[1] && $atr_val[0] == $attr_vals->attribute){
                                            echo ' <span>'.$attr_vals->value.'</span>';
                                        }
                                    }
                                    echo '</li>';
                                }
                                echo '</ul>';
                            ?>
                        <?php endif; ?>
                        <?php if($shipping == '0'): ?>
                        <span>Free Delivery</span>
                        <?php else: ?>
                            <span>Delivery Charges : <?php echo e(site_settings()->currency); ?><?php echo e($shipping); ?></span>
                        <?php endif; ?>
                    </div>
                </td>
                <td>
                    <?php echo e(site_settings()->currency); ?><?php echo e(get_product_price($product->id)->new_price); ?>

                </td>
                <td>
                    <input type="number" class="form-control item-qty" min='1' name="qty[<?php echo e($product->id); ?>]" style="width: 80px;" value="1">
                    <input type="number" class="product-price" name="price[<?php echo e($product->id); ?>]" value="<?php echo e(get_product_price($product->id)->new_price); ?>" hidden>
                    
                    <input type="number" class="product-shipping" value="<?php echo e($shipping); ?>" hidden>
                </td>
                <td>
                    <?php echo e(site_settings()->currency); ?><span class="product-total"><?php echo e(get_product_price($product->id)->new_price + $shipping); ?></span>
                </td>
                <td>
                    <button type="button" class="btn btn-danger remove-cart" data-type="local" data-id="<?php echo e($product->cart_id); ?>"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td colspan="3" align="right"><b>Total Amount</b></td>
            <td class=""><?php echo e(site_settings()->currency); ?><span class="total-amount"></span></td>
        </tr>
    </tbody>
</table>
<a class="btn btn-primary" href="<?php echo e(url('/')); ?>">Continue Shopping</a>
<input type="submit" class="btn btn-success float-right" name="checkout" value="Proceed to Checkout">
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/script/resources/views/public/partials/show-local-cart.blade.php ENDPATH**/ ?>