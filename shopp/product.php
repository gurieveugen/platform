<?php
/**
 ** WARNING! DO NOT EDIT!
 **
 ** These templates are part of the core Shopp files
 ** and will be overwritten when upgrading Shopp.
 **
 ** For editable templates, setup Shopp theme templates:
 ** http://docs.shopplugin.net/Setting_Up_Theme_Templates
 **
 **/
?>
<?php if (shopp('product','found')): ?>

	<div class="heading">
		<div class="cart-data"><a href="<?php shopp('cart','url'); ?>"><?php shopp('cart','totalitems'); ?> <?php _e("items added","Shopp"); ?></a> <input type="button" value="<?php _e("View Cart","Shopp"); ?>" onclick="window.location.href='<?php shopp('cart','url'); ?>';"></div>
	</div>

	<?php shopp('product','gallery'); ?>

	<h3><?php shopp('product','name'); ?></h3>
	<?php if(shopp('product','has-specs')): ?>
	<div class="details-specs">
		<?php while(shopp('product','specs')): ?>
			<?php shopp('product','spec','content'); ?>
		<?php endwhile; ?>
	</div>
	<?php endif; ?>
	
	<?php if (shopp('product','freeshipping')): ?>
	<p class="freeshipping"><?php _e('Free Shipping!','Shopp'); ?></p>
	<?php endif; ?>
	
	<?php shopp('product','description'); ?>

	<?php if(shopp('product','has-variations')): ?>
		<ul class="variations-buttons">
			<?php shopp('product','variations-buttons'); ?>
		</ul>
	<?php else: ?>
		<form action="<?php shopp('cart','url'); ?>" method="post" class="shopp product">
		<?php shopp('product','addtocart'); ?>
		</form>
	<?php endif; ?>

<?php else: ?>
<h3><?php _e('Product Not Found','Shopp'); ?></h3>
<p><?php _e('Sorry! The product you requested is not found in our catalog!','Shopp'); ?></p>
<?php endif; ?>
