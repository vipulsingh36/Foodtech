<!------ FOOTER-WIDGET ------>
<div class="footer-widget">
    <div class="container-xl container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-3 mb-lg-0">
                <div class="site-info-widget">
                    <div class="footer-logo">
                        <a href="<?php echo e(url('/')); ?>"><h6><?php echo e(site_settings()->site_name); ?></h6></a>
                    </div>
                    <p><?php echo e(site_settings()->description); ?></p>
                </div>
                
            </div>
            <div class="col-lg-3 col-md-6 pl-lg-5 pl-lg-0 mb-4 mb-lg-0">
                <div class="widget-box">
                    <h6 class="widget-title">Categories</h6>
                    <ul class="widget-list">
                        <?php $__currentLoopData = all_category(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($f_cat->parent_category == '0'): ?>
                        <li><a href="<?php echo e(url('c/'.$f_cat->category_slug)); ?>"><i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo e($f_cat->category_name); ?></a></li>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 pl-lg-5 pl-lg-0 mb-4 mb-lg-0">
                <div class="widget-box">
                    <h6 class="widget-title">Links</h6>
                    <ul class="widget-list">
                        <?php $__currentLoopData = site_pages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e($pages->page_slug); ?>"><i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo e($pages->page_title); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <?php if(site_settings()->address != '' || site_settings()->phone != '' || site_settings()->email != ''): ?>
            <div class="col-lg-3 col-md-6 d-flex justify-content-left justify-content-lg-center">
                <div class="contact-widget">
                    <h6 class="widget-title">Contact Us</h6>
                    <ul class="contact-list">
                        <?php if(site_settings()->address != ''): ?>
                        <li>
                            <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                            <span><b>Address: </b><?php echo e(site_settings()->address); ?></span>
                        </li>
                        <?php endif; ?>
                        <?php if(site_settings()->email != ''): ?>
                        <li>
                            <span class="icon"><i class="fas fa-envelope"></i></span>
                            <span><b>Email: </b><?php echo e(site_settings()->email); ?></span>
                        </li>
                        <?php endif; ?>
                        <?php if(site_settings()->phone != ''): ?>
                        <li>
                            <span class="icon"><i class="fas fa-phone-alt"></i></span>
                            <span><b>Contact Us: </b><?php echo e(site_settings()->phone); ?></span>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!------/FOOTER-WIDGET------>

<!------ FOOTER ------>
<div class="footer-bottom py-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-12 align-self-center">
                <input type="hidden" class="demo" value="<?php echo e(url('/')); ?>"></input>
                <span><?php echo e(site_settings()->copyright); ?></span>
            </div>
            <div class="col-md-6 col-12">
                <ul class="social-links">
                    <?php if(social_links()->facebook != ''): ?>
                    <li>
                        <a href="<?php echo e(social_links()->facebook); ?>" class="facebook"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <?php endif; ?>
                    <?php if(social_links()->twitter != ''): ?>
                    <li>
                        <a href="<?php echo e(social_links()->twitter); ?>" class="twitter"><i class="fab fa-twitter"></i></a>
                    </li>
                    <?php endif; ?>
                    <?php if(social_links()->instagram != ''): ?>
                    <li>
                        <a href="<?php echo e(social_links()->instagram); ?>" class="instagram"><i class="fab fa-instagram"></i></a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        
    </div>
</div>
<!------/FOOTER------>

<script src="<?php echo e(asset('public/assets/js/jquery.min.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="<?php echo e(asset('public/assets/js/jquery.flexslider.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/price-range.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/jquery-ui.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/sweetalert2.min.js')); ?>"></script>
<script src="https://unpkg.com/smartwizard@6/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>

<!-- <script src="<?php echo e(asset('assets/js/main_ajax.js')); ?>"></script> -->
<script src="<?php echo e(asset('public/assets/js/action.js')); ?>"></script>
<?php if(!(session()->has('user_name'))){ ?>
<!-- <script src="<?php echo e(asset('public/assets/js/addcart.js')); ?>"></script> -->
<script>
    
</script>
<?php } ?>
<script type="text/javascript">
    $(document).ready(function(){
            
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails",
            start: function(slider){
                $('body').removeClass('loading');
            }
        });

        $('.navbar-light .dmenu').hover(function () {
            $(this).find('.sm-menu').first().stop(true, true).slideDown(300);
            }, function () {
            $(this).find('.sm-menu').first().stop(true, true).slideUp(300)
        });
        
        $('.select2').select2();
    
    });
</script>
<?php echo $__env->yieldContent('pageJsScripts'); ?>
</body>
</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/script/resources/views/public/components/footer.blade.php ENDPATH**/ ?>