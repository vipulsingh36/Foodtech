
<?php $__env->startSection('title','Edit Product'); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<?php $__env->startComponent('admin.components.content-header',['breadcrumb'=>['Dashboard'=>'admin/dashboard','All Products'=>'admin/products']]); ?>
    <?php $__env->slot('title'); ?> Edit Product <?php $__env->endSlot(); ?>
    <?php $__env->slot('add_btn'); ?>  <?php $__env->endSlot(); ?>
    <?php $__env->slot('active'); ?> Edit Product <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!-- Main content -->
<section class="content card">
    <div class="container-fluid card-body">
        <!-- form start -->
        <form class="form-horizontal" id="update_product"  method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo e(method_field('PUT')); ?>

            <?php if($products): ?>
            <div class="row">
                <!-- left column -->
                <div class="col-md-8">
                   <input type="hidden" class="url" value="<?php echo e(url('admin/products/'.$products->id)); ?>" >
                   <input type="hidden" class="rdt-url" value="<?php echo e(url('admin/products')); ?>" >
                    <!-- jquery validation -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Product Information</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Product Name</span> <small class="text-danger">*</small>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="product_name" placeholder="Product Name" value="<?php echo e($products->product_name); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Category</span> <small class="text-danger">*</small>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="category" class="form-control select2">
                                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($list->id); ?>" <?php echo e(($products->category == $list->id) ? 'selected' : ''); ?>><?php echo e($list->category_name); ?></option>
                                                    <?php $__currentLoopData = $list->childrenCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php echo $__env->make('admin.products.product_edit_child_category', ['child_category' => $childCategory], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Brand</span>
                                    </div>
                                    <div class="col-md-9">
                                        <select class="form-control select2" name="brand" id="">
                                            <option value="" selected disabled>Select Brand</option>
                                            <?php $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($products->brand == $item->id): ?>
                                                    <option value="<?php echo e($item->id); ?>" selected><?php echo e($item->brand_name); ?></option>
                                                <?php else: ?>
                                                    <?php if($item->status == '1'): ?>
                                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->brand_name); ?></option>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Unit</span>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="unit" placeholder="Unit" value="<?php echo e($products->unit); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Minimum Purchase Qty</span> <small class="text-danger">*</small>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="min_qty" placeholder="Minimum Purchase Qty" value="<?php echo e($products->min_qty); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Tags</span> <small class="text-danger">*</small>
                                    </div>
                                    <div class="col-md-9">
                                        <input id="tokenfield" type="text" class="form-control" name="tags" placeholder="Type and hit enter to add a tag" value="<?php echo e($products->tags); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Barcode</span>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="barcode" placeholder="Barcode" value="<?php echo e($products->barcode); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Refundable</span>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="checkbox">
                                            <input type="checkbox" id="checkbox1" name="refundable" <?php echo e(($products->refundable == "1" ? "checked":"")); ?>>
                                            <label for="checkbox1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product Images</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Gallery Images</span>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="gallery-images1"></div>
                                        <input type="text" hidden name="old_gallery" value="<?php echo e($products->gallery_img); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Thumbnail Image</span>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="hidden" class="custom-file-input" name="old_img" value="<?php echo e($products->thumbnail_img); ?>" />
                                        <input type="file" class="custom-file-input" name="thumbnail_img" onChange="readURL(this);">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                    <div class="col-md-2">
                                        <?php if($products->thumbnail_img != ''): ?>
                                            <img id="image" src="<?php echo e(asset('public/products/'.$products->thumbnail_img)); ?>" alt=""  width="100px">
                                        <?php else: ?>
                                            <img id="image" src="<?php echo e(asset('public/products/default.png')); ?>" alt=""  width="100px">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product Variation</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Colors</span>
                                    </div>
                                    <div class="col-md-9">
                                        <select class="form-control select2" name="color[]" id="" multiple="multiple">
                                        <?php if(!empty($colors)): ?>
                                            <?php
                                                $row_facility = array_filter(explode(',',$products->colors));
                                            ?>
                                            <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(in_array($item->id,$row_facility)): ?>
                                                    <option value="<?php echo e($item->id); ?>" selected><?php echo e($item->color_name); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->color_name); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <table class="table">
                                    <thead>
                                        <th>Attribute</th>
                                        <th>Attribute value</th>
                                        <th><a href="javascript:;" class="btn btn-info addRow">+</a></th>
                                    </thead>
                                    <tbody>
                                    <?php $count = 0; ?> 
                                    <?php $__currentLoopData = $attribute_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $count++; ?>
                                        <input type="hidden" name="attr_id[]" value="<?php echo e($value->id); ?>">
                                        <input type="hidden" name="attribute_id" value="<?php echo e($value->attribute_id); ?>">
                                        <tr class="attrcount">
                                            <td>
                                                <select name="attribute[]" id="attribute" class="form-control attribute-select">
                                                    <?php if(!empty($attribute)): ?>
                                                        <?php $__currentLoopData = $attribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php $selected = ($item->id == $value->attribute_id) ? 'selected' : ''; ?>
                                                            <option value="<?php echo e($item->id); ?>" data-attribute="<?php echo e($item->id); ?>" <?php echo e($selected); ?>><?php echo e($item->title); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control attrvalue-select select2" name="attrvalue<?php echo e($count); ?>[]"  id="attrvalue" multiple>
                                                    <?php if(!empty($attrvalues)): ?>
                                                        <?php $__currentLoopData = $attrvalues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php $selected = ($item1->attribute == $value->attribute_id) ? 'selected' : ''; ?>
                                                            <option value="<?php echo e($item1->id); ?>" <?php echo e($selected); ?>><?php echo e($item1->value); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                            </td>
                                            <td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product Price</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Unit Price</span> <small class="text-danger">*</small>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="unit_price" placeholder="Unit Price" value="<?php echo e($products->unit_price); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Tax</span> <small class="text-danger">*</small>
                                    </div>
                                    <div class="col-md-9">
                                        <select class="form-control tax" name="tax" id="">
                                            <option value="" disabled selected>Select Tax</option>
                                            <?php $__currentLoopData = $tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($products->tax == $item->id): ?>
                                                    <option value="<?php echo e($item->id); ?>" data-percent="<?php echo e($item->percent); ?>" selected><?php echo e($item->percent); ?>%</option>
                                                <?php else: ?>
                                                    <?php if($item->status == '1'): ?>
                                                        <option value="<?php echo e($item->id); ?>" data-percent="<?php echo e($item->percent); ?>"><?php echo e($item->percent); ?>%</option>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group taxable_price">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Taxable Price</span> <small class="text-danger">*</small>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="taxable_price" placeholder="Taxable Price" value="<?php echo e($products->taxable_price); ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Quantity</span> <small class="text-danger">*</small>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="quantity" placeholder="Quantity" value="<?php echo e($products->quantity); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Discount Date Range</span>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="datefilter" placeholder="Select Date" value="<?php echo e($products->date_range); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <span>Discount</span>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="number" class="form-control" name="discount" placeholder="Discount" value="<?php echo e($products->discount); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" name="discount_type" id="">
                                            <option value="flat" <?php echo e(($products->discount_type == "flat" ? "selected":"")); ?>>Flat</option>
                                            <option value="percent" <?php echo e(($products->discount_type == "percent" ? "selected":"")); ?>>Percent</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>External Link</span>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="external_link" placeholder="External Link">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>External Link button text</span>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="external_button" placeholder="External Link button text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product Description</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Description</span>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea name="description" id="summernote" class="form-control" id="" cols="30" rows="4"><?php echo htmlspecialchars_decode($products->description); ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">SEO Meta Tags</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Meta Title</span>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="meta_title" placeholder="Meta Title" value="<?php echo e($products->meta_title); ?>">
                                    </div>  
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Meta Description</span>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="meta_desc" placeholder="Meta Description" id="" cols="30" rows="4"><?php echo e($products->meta_desc); ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Slug</span> <small class="text-danger">*</small>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="slug" placeholder="Slug" value="<?php echo e($products->slug); ?>">
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product Videos</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Video Provider</span>
                                    </div>
                                    <div class="col-md-9">
                                        <select class="form-control select2" name="video_provider" id="">
                                            <option value="">You Tube</option>
                                            <option value="">Dailymotion</option>
                                            <option value="">Vimeo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Video Link</span>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="video_link" placeholder="Video Link">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Status</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span>Status</span> <small class="text-danger">*</small>
                                    </div>
                                    <div class="col-md-9">
                                        <select class="form-control" name="product_status"  style="width: 100%;">
                                            <option value="1" <?php echo e(($products->status == "1" ? "selected":"")); ?>>Published</option>
                                            <option value="0" <?php echo e(($products->status == "0" ? "selected":"")); ?>>Draft</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Stock Visibility Store</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-7">
                                        <span>Show Stock Quantity</span>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="checkbox">
                                            <input type="checkbox" id="checkbox2" name="show_qty" <?php echo e(($products->show_quantity == "1" ? "checked":"")); ?>>
                                            <label for="checkbox2"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Today Deal</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span>Status</span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkbox">
                                            <input type="checkbox" id="checkbox5" name="today_deal" <?php echo e(($products->today_deal == "1" ? "checked":"")); ?>>
                                            <label for="checkbox5"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Shipping Configuration</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span>Shipping Charges</span> <small class="text-danger">*</small>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control" name="shipping_charges" id="">
                                            <option value="free" <?php echo e(($products->shipping_charges == "free" ? "selected":"")); ?>>Free Shipping</option>
                                            <option value="area" <?php echo e(($products->shipping_charges == "area" ? "selected":"")); ?>>Area Wise</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-5">
                                        <span>Shipping Days</span> <small class="text-danger">*</small>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="number" class="form-control" name="shipping_days" placeholder="Shipping Days" value="<?php echo e($products->shipping_days); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php endif; ?>
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </div>
        </form> <!-- /.form start -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->
</div>
<?php
$gallery = array_filter(explode(',',$products->gallery_img));
$gallery_array = [];
for($i=0;$i<count($gallery);$i++){
    $g = (object) array('id'=>$i+1,'src'=>asset('public/products/'.$gallery[$i]));
    array_push($gallery_array,$g);
}

?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageJsScripts'); ?>
<script src="<?php echo e(asset('assets/js/tokenfield.js')); ?>"></script>
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

    $(document).on('change','.tax',function(){
        var tax_rate = $(this).children('option:selected').data('percent');
        var unit_price = $('input[name="unit_price"]').val();
        var tax_total = unit_price*tax_rate/100;
        var total = parseInt(unit_price) + parseInt(tax_total);

        var row = '<div class="row">'+
                        '<div class="col-md-3">'+
                            '<span>Taxable Price</span>'+
                        '</div>'+
                        '<div class="col-md-9">'+
                            '<input type="number" class="form-control" name="taxable_price" placeholder="Unit Price" value="'+total+'" readonly>'+  
                        '</div>'+
                '</div>';
        $('.taxable_price').html(row);
    });

    var count = $('.attrcount').length;
    $('thead').on('click', '.addRow', function(){
        count++;
        var tr = '<tr class="attrcount">'+
            '<td>'+
                '<select name="attribute[]" id="attribute" class="form-control attribute-select" data-attr_value="'+count+'">'+
                    '<option value="">Select an Attribute</option>'+
                    <?php foreach($attribute as $item){ ?>
                        '<option value="<?php echo e($item->id); ?>" data-attribute="<?php echo e($item->id); ?>"><?php echo e($item->title); ?>(<?php echo e($item->category_name); ?>)</option>'+
                    <?php }?>
                '</select>'+
            '</td>'+
            '<td>'+
                '<select class="form-control attrvalue-select select2" name="attrvalue'+count+'[]" id="attrvalue'+count+'" multiple>'+
                    '<option value="" disabled selected >First Select Attribute</option>'+
                    
                '</select>'+
            '</td>'+
            '<td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>'+
        '</tr>';

        $('tbody').append(tr);
        $('.select2').select2();
    });

    $('tbody').on('click', '.deleteRow', function(){
        $(this).parent().parent().remove();
    });

    $(function () {

        var preloaded = <?php echo json_encode($gallery_array); ?>;

        $('.gallery-images1').imageUploader({
            preloaded: preloaded,
            imagesInputName: 'gallery1',
            'label': 'Drag and Drop',
            preloadedInputName: 'old',
            maxFiles: 10,
            maxSize: 2 * 1024 * 1024,
        });

    });

    $('#tokenfield').tokenfield({
        autocomplete: {
            delay: 100
        },
        showAutocompleteOnFocus: true
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/script/resources/views/admin/products/edit.blade.php ENDPATH**/ ?>