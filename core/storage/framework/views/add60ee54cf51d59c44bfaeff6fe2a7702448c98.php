<?php $__env->startSection('content'); ?>
    <section class="page-banner">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2 class="title text-white"><?php echo e(__($pageTitle)); ?></h2>
                    <ul class="page-breadcrumb justify-content-center mt-2">
                        <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                        <li><?php echo e(__($pageTitle)); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Portfolio Section ======= -->
    <section class="sp_pt_100 sp_pb_100">
        <div class="container">
            <div class="col-md-12">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="site-card">
                            <div class="card-body">
                                <h4 class="text-center mb-4"><b><?php echo e(@$data->data->title); ?></b></h4>
                                <p class="text-justifys"> <?= clean(@$data->data->description) ?></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section><!-- End Portfolio Section -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make(template().'layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bitcointradinghub.org/public_html/core/resources/views/theme3/pages/service.blade.php ENDPATH**/ ?>