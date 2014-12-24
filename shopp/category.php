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
<?php if(shopp('category','hasproducts','load=prices,images')): ?>
	<div class="category">

	<div class="heading">
		<div class="cart-data"><a href="<?php shopp('cart','url'); ?>"><?php shopp('cart','totalitems'); ?> <?php _e("items added","Shopp"); ?></a> <input type="button" value="<?php _e("View Cart","Shopp"); ?>" onclick="window.location.href='<?php shopp('cart','url'); ?>';"></div>
		<h3><?php shopp('category','name'); ?></h3>
	</div>
	<div class="alignright"><?php shopp('category','pagination','show=10'); ?></div>

	<ul class="products">
		<li class="row"><ul>
		<?php while(shopp('category','products')): ?>
		<?php if(shopp('category','row')): ?></ul></li><li class="row"><ul><?php endif; ?>
			<li class="product">
				<div class="frame">
					<div class="prod-images"><?php shopp('product','gallery-list', 'thumbnmb=4'); ?></div>
						<h4 class="name"><a href="<?php shopp('product','url'); ?>"><?php shopp('product','name'); ?></a></h4>
						<?php if(shopp('product','has-specs')): ?>
						<div class="details-specs">
							<?php while(shopp('product','specs')): ?>
								<?php shopp('product','spec','content'); ?>
							<?php endwhile; ?>
						</div>
						<?php endif; ?>
						<p><?php shopp('product','summary'); ?></p>
					<div class="prod-add-cart">
						<?php if(shopp('product','has-variations')): ?>
							<ul class="variations-buttons">
								<?php shopp('product','variations-buttons'); ?>
							</ul>
						<?php else: ?>
							<form action="<?php shopp('cart','url'); ?>" method="post" class="shopp product">
							<?php shopp('product','addtocart'); ?>
							</form>
						<?php endif; ?>
					</div>
				</div>
			</li>
		<?php endwhile; ?>
		</ul></li>
	</ul>
	
	<div class="alignright"><?php shopp('category','pagination'); ?></div>
	
	</div>
<?php else: ?>
	<?php if (!shopp('catalog','is-landing')): ?>
	<?php shopp('catalog','breadcrumb'); ?>
	<h3><?php shopp('category','name'); ?></h3>
	<p><?php _e('No products were found.','Shopp'); ?></p>
	<?php endif; ?>
<?php endif; ?>
