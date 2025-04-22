
<?php $__env->startSection('title','Search'); ?>
<?php $__env->startSection('content'); ?>
<div id="site-content">
    <div class="container">
        <form class="row" action="<?php echo e(url(Request::url())); ?>">
            <div class="col-md-3">
                <!-- <form action=""> -->
                    <div class="filter">
                        <div class="filter-header">
                            <h4 class="title">Filter</h4>
                        </div>
                        <div class="filter-item">
                            <?php if(request()->get('keyword') && request()->get('keyword') !=''): ?>
                                <input type="text" hidden name="keyword" value="<?php echo e(request()->get('keyword')); ?>">
                            <?php endif; ?>
                            <h5 class="title">Categories</h5>
                            <div class="dropdown">
                                <ul>
                                    <li class="category_name"><a href="<?php echo e(url('search')); ?>">
                                        <?php if((!request()->get('keyword') || request()->get('keyword') == '') && !$cat_detail ): ?>
                                        <i class="fas fa-angle-right"></i>
                                        <?php endif; ?>
                                    All Categories
                                    </a></li>
                                    <?php if($cat_detail): ?>
                                        <li class="category_name"><a href="<?php echo e(url('c/'.$cat_array->category_slug)); ?>">
                                        <?php if($cat_detail->id == $cat_array->id): ?>
                                        <i class="fas fa-angle-right"></i>
                                        <?php endif; ?>
                                        <?php echo e($cat_array->category_name); ?></a></li>
                                        <?php if($cat_array->sub_category): ?>
                                            <?php echo $__env->make('public.partials.child-category',['category'=>$cat_array->sub_category,'cat_detail'=>$cat_detail], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php $__currentLoopData = $cat_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="category_name"><a href="<?php echo e(url('c/'.$row->category_slug)); ?>">
                                            <?php echo e($row->category_name); ?></a></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="filter-item">
                            <h5 class="title">Price</h5>
                            <div id="slider-range" class="price-filter-range" name="rangeInput" style="display:none;" ></div>

                            <div class="row">
                                <div class="col-md-6">
                                    <span class="d-block">Min</span>
                                    <?php 
                                    $min_price = 0;
                                    if(request()->get('min_price') && request()->get('min_price') != ''){
                                        $min_price = request()->get('min_price');
                                    }                                        
                                    ?>
                                    <input type="number" name="min_price" min=0 max="1000000" oninput="validity.valid||(value='0');" class="price-range-field" value="<?php echo e($min_price); ?>" />
                                </div>
                                <div class="col-md-6">
                                    <span class="d-block">Max</span>
                                    <?php 
                                    $max_price = 1000000;
                                    if(request()->get('max_price') && request()->get('max_price') != ''){
                                        $max_price = request()->get('max_price');
                                    }    
                                    ?>
                                    <input type="number" name="max_price" min=0 max=1000000 class="price-range-field" value="<?php echo e($max_price); ?>" />
                                </div>
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary btn-sm mt-2" onclick="form.submit()">Apply</button>
                                </div>
                            </div>
                        </div>
                        <?php if($brands): ?>
                        <div class="filter-item">
                            <h5 class="title">Brands</h5>
                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="radio-button">
                                    <?php 
                                    $select_brand = '';
                                    if(request()->get('brand') && request()->get('brand') != ''){
                                        $select_brand = ($item->id == request()->get('brand')) ? 'checked' : '';
                                    }                                        
                                    ?>
                                    <input type="checkbox" class="brand" id="<?php echo e($item->id); ?>" name="brand" value="<?php echo e($item->id); ?>" <?php echo e($select_brand); ?>  onchange="form.submit()">
                                    <label for="<?php echo e($item->id); ?>"><?php echo e($item->brand_name); ?></label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                <!-- </form> -->
            </div>
            <div class="col-md-9">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                        <?php if(!empty($cat_detail)): ?>
                            <?php
                            $breadcrumb_ids = get_category_breadcrumb($cat_detail->id);
                            $breadcrumb = \App\Models\Category::select(['id','category_name','category_slug'])->whereIn('id',$breadcrumb_ids)->orderBy('id','ASC')->get();
                            ?>
                            <?php $__currentLoopData = $breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b_row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($b_row->id == $cat_detail->id): ?>
                                    <li class="breadcrumb-item active">
                                    <?php echo e($b_row->category_name); ?>

                                    </li>
                                    <?php else: ?>
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo e(url('c/'.$b_row->category_slug)); ?>"><?php echo e($b_row->category_name); ?></a>
                                    </li>
                                    <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        <li class="breadcrumb-item"><a href="<?php echo e(url('all-products')); ?>">All Products</a></li>
                        <?php endif; ?>
                    </ol>
                </nav>
                <div class="content-box d-flex flex-row justify-content-between align-items-center">
                    <h5 class="title">
                        <?php if($cat_detail): ?>
                            <?php echo e($cat_detail->category_name); ?>

                        <?php elseif(request()->get('keyword') && request()->get('keyword') != ''): ?>
                            <?php echo e(request()->get('keyword')); ?>

                        <?php else: ?>
                            All Products
                        <?php endif; ?>
                    </h5>
                    <div class="d-flex flex-row">
                        <label for="" class="text-nowrap my-auto mr-2">Sort By</label>
                        <?php $sort = ''; ?>
                        <?php if(request()->sort && request()->sort != ''): ?>
                        <?php $sort = request()->sort; ?>
                        <?php endif; ?>
                        
                        <select name="sort" class="form-control" onChange="form.submit()">
                            <option value="latest" <?php echo e((($sort == 'latest') ? 'selected' : '')); ?>>Latest</option>
                            <option value="oldest" <?php echo e((($sort == 'oldest') ? 'selected' : '')); ?>>Oldest</option>
                            <option value="l-h" <?php echo e((($sort == 'l-h') ? 'selected' : '')); ?>>Price:Low to High</option>
                            <option value="h-l" <?php echo e((($sort == 'h-l') ? 'selected' : '')); ?>>Price:High to Low</option>
                        </select>
                    </div>
                </div>
                <div class="row search-res-list">
                    <?php if(!empty($products) && $products->isNotEmpty()): ?>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4">
                            <?php echo $__env->make('public.product-grid',$item, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="col-12">
                            <div class="content-box text-center">
                                <p class="m-0">No Products Found</p>
                            </div>    
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($products)): ?>
                    <div class="col-md-12">
                        <?php echo e($products->appends(request()->query())->links()); ?>

                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/script/resources/views/public/all-products.blade.php ENDPATH**/ ?>