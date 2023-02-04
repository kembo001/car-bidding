<?php $__currentLoopData = $auction->bids()->orderBy('bid_amount','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td><?php echo e($bid->user->customer_number); ?></td>

   <?php if($gs->currency_format == 0): ?>
    <td><?php echo e($gs->currency_sign); ?><?php echo e(number_format($bid->bid_amount, 2, ',', '.')); ?></td>
    <?php else: ?> 
    <td><?php echo e(number_format($bid->bid_amount, 2, ',', '.')); ?><?php echo e($gs->currency_sign); ?></td>
    <?php endif; ?>

    <td><?php echo e($bid->updated_at->diffForhumans()); ?></td>

</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<script>

$('#highest').html('<?php echo e($auction->highBids()); ?>');

</script><?php /**PATH F:\xampp\htdocs\new_file\AuctionPro-Files\project\resources\views/load/single-auction.blade.php ENDPATH**/ ?>