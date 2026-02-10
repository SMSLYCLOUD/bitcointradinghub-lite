<?php
$content = content('blog.content');
$blogs = element('blog.element')->take(6);
?>

<section class="blog-section sp_pt_120 sp_pb_120 sp_separator_bg" style="background-image: url('<?php echo e(asset('asset/theme3/images/bg/bg6.jpg')); ?>')">
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7 text-center">
            <div class="sp_site_header  wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
              <h2 class="sp_site_title"><?php echo e(__(@$content->data->title)); ?></h2>
            </div>
          </div>
        </div>
        <div class="row gy-4">
            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $comment = App\Models\Comment::where('blog_id', $blog->id)->count();
                ?>
                <div class="col-md-6 col-lg-4">
                    <div class="blog-item">
                        <div class="blog-thumb">
                            <img src="<?php echo e(getFile('blog', @$blog->data->image)); ?>" alt="blog thumb">
                        </div>
                        <div class="blog-content">
                            <ul class="blog-meta mb-2">
                                <li><i class="fas fa-clock"></i> <?php echo e(@$blog->created_at->diffforhumans()); ?></li>
                                <li><i class="fas fa-comment"></i> <?php echo e($comment); ?> <?php echo e(__('comments')); ?></li>
                            </ul>
                            <h4 class="blog-title"><a href="<?php echo e(route('blog', [@$blog->id, Str::slug(@$blog->data->title)])); ?>"><?php echo e(@$blog->data->title); ?></a></h4>
                            <a href="<?php echo e(route('blog', [@$blog->id, Str::slug(@$blog->data->title)])); ?>" class="blog-btn">
                                <span><?php echo e(__('Read More')); ?></span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH /home/bitcointradinghub.org/public_html/core/resources/views/theme3/sections/blog.blade.php ENDPATH**/ ?>