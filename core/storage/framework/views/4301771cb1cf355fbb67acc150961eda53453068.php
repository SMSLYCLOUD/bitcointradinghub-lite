

<form action="<?php echo e($data->redirect_url); ?>" method="POST" id="submit">
    <?php $__currentLoopData = $data->paytm_params; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $params): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <input type="hidden" name="<?php echo e($key); ?>" value="<?php echo e($params); ?>"/>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</form>
<script>
	"use strict";
    document.getElementById("submit").submit();
</script><?php /**PATH /home/bitcointradinghub.org/public_html/core/resources/views/theme3/user/gateway/auto.blade.php ENDPATH**/ ?>