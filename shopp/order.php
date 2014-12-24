<?php $vouchers = array(); ?>
Content-type: text/html; charset=utf-8
From: [from]
To: [to]
Subject: [subject]

<html>
<body style="font:13px/15px Arial, Helvetica, sans-serif; margin:0;" bgcolor="#efefef"><br>
	<table width="680" bgcolor="#ffffff" align="center" cellspacing="0" cellpadding="0">
		<tr>
			<td>
				<table cellspacing="0" cellpadding="0" width="100%">
					<tr><td colspan="3" height="14">&nbsp;</td></tr>
					<tr>
						<td width="44">&nbsp;</td>
						<td>
							<table cellspacing="0" cellpadding="0" width="100%">
								<tr>
									<td>
										<table style="font:13px/19px Arial, Helvetica, sans-serif" cellspacing="0" cellpadding="0" width="100%">
											<tr>
												<td colspan="2" height="27" width="81">&nbsp;</td>
											</tr>
											<tr>
												<th align="left" width="81">Order Num:</th>
												<td><?php shopp('purchase','id'); ?></td>
											</tr>
											<tr>
												<th align="left" width="81">Order Date:</th>
												<td><?php shopp('purchase','date'); ?></td>
											</tr>
											<tr>
												<th align="left" width="81">Billed To:</th>
												<td><?php shopp('purchase','card'); ?> (<?php shopp('purchase','cardtype'); ?>)</td>
											</tr> 
											<tr>
												<th align="left" width="81">Transaction:</th>
												<td><?php shopp('purchase','transactionid'); ?> (<?php shopp('purchase','payment'); ?>)</td>
											</tr>
										</table>
									</td>
									<td align="right">
										<a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" border="0" width="189" height="101" alt="<?php bloginfo('name'); ?>" ></a>
									</td>
								</tr>
								<tr><td colspan="2" height="31">&nbsp;</td></tr>
							</table>
							<table cellspacing="0" cellpadding="0" width="565">
								<tr>
									<td style="line-height:15px" valign="top">
										<table style="font:13px/15px Arial, Helvetica, sans-serif" cellspacing="0" cellpadding="0" width="100%">
											<tr>
												<th align="left" style="font-size:12px; background-image:url(<?php bloginfo('template_url'); ?>/images/line.gif); background-position: 0 7px; background-repeat: no-repeat;"><font style="display:inline-block; background:#ffffff; margin: 0 0 0 8px; padding: 0 4px 5px; color:#999999">Billed to</font></th>
											</tr>
											<tr>
												<td style="font-size:14px; line-height:16px; padding: 0 0 0 9px;"><?php shopp('purchase','firstname'); ?> <?php shopp('purchase','lastname'); ?></td>
											</tr>
											<tr>
												<td style="padding: 0 0 0 9px;"><?php shopp('purchase','company'); ?></td>
											</tr>
											<tr>
												<td style="padding: 0 0 0 9px;"><?php shopp('purchase','address'); ?></td>
											</tr>
											<tr>
												<td style="padding: 0 0 0 9px;"><?php shopp('purchase','city'); ?>, <?php shopp('purchase','state'); ?> <?php shopp('purchase','postcode'); ?></td>
											</tr>
											<tr>
												<td style="padding: 0 0 0 9px;"><?php shopp('purchase','country'); ?></td>
											</tr>
										</table>
									</td>
									<td><img src="<?php bloginfo('template_url'); ?>/images/transparent.gif" width="35" height="1" alt=""></td>
									<td style="line-height:15px" valign="top">
										<table style="font:13px/15px Arial, Helvetica, sans-serif" cellspacing="0" cellpadding="0" width="100%">
											<tr>
												<th align="left" style="font-size:12px; background-image:url(<?php bloginfo('template_url'); ?>/images/line.gif); background-position: 0 7px; background-repeat: no-repeat;"><font style="background:#ffffff; margin: 0 0 0 8px; padding: 0 4px 5px; color:#999999">Ship to</font></th>
											</tr>
											<tr>
												<td style="font-size:14px; line-height:16px; padding: 0 0 0 9px;"><?php shopp('purchase','firstname'); ?> <?php shopp('purchase','lastname'); ?></td>
											</tr>
											<tr>
												<td style="padding: 0 0 0 9px;"><?php shopp('purchase','shipaddress'); ?></td>
											</tr>
											<tr>
												<td style="padding: 0 0 0 9px;"><?php shopp('purchase','shipcity'); ?>, <?php shopp('purchase','shipstate'); ?> <?php shopp('purchase','shippostcode'); ?></td>
											</tr>
											<tr>
												<td style="padding: 0 0 0 9px;"><?php shopp('purchase','shipcountry'); ?></td>
											</tr>
											<tr>
												<td style="padding:0 0 0 9px;"><font style="display:block; padding: 17px 0 0">Shipping: <?php shopp('purchase','shipmethod'); ?></font></td>
											</tr>
										</table>
									</td>
								</tr>
								<tr><td colspan="3" height="55"></td></tr>
							</table>
							<?php if (shopp('purchase','hasitems')): ?>
							<table cellspacing="0" cellpadding="0" width="100%">
								<tr>
									<td>
										<table cellspacing="0" cellpadding="0" width="100%" style="font-size:13px; line-height:15px">
											<tr>
												<th align="left" style="padding:3px 5px 8px 0">Items Ordered</th>
												<th align="left" style="padding:3px 5px 8px 0">Quantity</th>
												<th align="right" style="padding:3px 5px 8px 0">Item Price</th>
												<th align="right" style="padding:3px 5px 8px 0">Item Total</th>
											</tr>
											<?php while(shopp('purchase','items')):
												if (shopp('purchase','item-options','return=true') == 'voucher') {
													$vid = shopp('purchase','item-id','return=true');
													$vname = shopp('purchase','item-name','return=true');
													$vprice = shopp('purchase','item-total','return=true');
													$vouchers[] = array('price' => $vprice, 'promo' => get_voucher_promo($vid, $vname, $vprice));
												}
											?>
											<tr>
												<td><?php shopp('purchase','item-name'); ?><?php shopp('purchase','item-options','before= - '); ?><?php if (shopp('purchase','item-options','return=true') != 'voucher') { ?><br>(<?php shopp('purchase','item-description'); ?>)<?php } ?></td>
												<td><?php shopp('purchase','item-quantity'); ?></td>
												<td align="right" style="padding:3px 5px 12px 0"><?php shopp('purchase','item-unitprice'); ?></td>
												<td align="right" style="padding:3px 5px 12px 0"><?php shopp('purchase','item-total'); ?></td>
											</tr>
											<?php endwhile; ?>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table align="right" cellspacing="0" cellpadding="0" width="242" style="font-size:13px">
											<tr>
												<th align="right" style="padding:3px 5px 8px 0">Subtotal</th>
												<td align="right" style="padding:3px 5px 8px 0"><?php shopp('purchase','subtotal'); ?></td>
											</tr>
											<tr>
												<th align="right" style="padding:3px 5px 8px 0">Shipping</th>
												<td align="right" style="padding:3px 5px 8px 0"><?php shopp('purchase','freight'); ?></td>
											</tr>
											<tr>
												<th align="right" style="padding:3px 5px 8px 0">Total</th>
												<td align="right" style="padding:3px 5px 8px 0"><?php shopp('purchase','total'); ?></td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<?php endif; ?>
							<?php if (count($vouchers) > 0) : ?>
							<table cellspacing="0" cellpadding="0" style="font-size:13px;" width="100%">
								<tr>
									<td style="padding:0px 0px 10px 0px">Voucher is valid for 12 months from purchase date.</td>
								</tr>
								<?php if (shopp('purchase','has-data')) : ?>
								<?php while(shopp('purchase','orderdata')): ?>
								<tr>
									<td align="left" style="padding:0px 10px 5px 0px"><strong><?php shopp('purchase','data','name=true'); ?>:</strong> <?php shopp('purchase','data'); ?></td>
								</tr>
								<?php endwhile; ?>
								<?php endif; ?>
							</table>
							<?php endif; ?>
						</td>
						<td width="38">&nbsp;</td>
					</tr>
					<tr><td colspan="3" height="35">&nbsp;</td></tr>
				</table>
				<?php if (count($vouchers) > 0) : ?>
				<table cellspacing="0" cellpadding="0" width="100%">
				  <?php foreach($vouchers as $voucher) { echo $vsep; ?>
				  <tr><td>
					<table cellspacing="0" cellpadding="0" width="100%" style="background:#887e70 url(<?php bloginfo('template_url'); ?>/images/bg-voucher.png) no-repeat 14px 50%;">
						<tr>
							<td colspan="3" height="23">&nbsp;</td>
						</tr>
						<tr>
							<td width="30">&nbsp;</td>
							<td>
								<table cellspacing="0" cellpadding="0" width="100%" align="center" style="font-size: 13px; line-height: 15px; text-align:center; color:#ffffff;">
									<tr><td colspan="3" height="27">&nbsp;</td></tr>
									<tr>
										<td>
											<a href="<?php echo home_url('/'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo-voucher.png" width="192" height="99" border="0" alt="" ></a>
										</td>
									</tr>
									<tr><td style="line-height:15px; padding: 6px 0 0">This voucher entitles the bearer to redeem <br></td></tr>
									<tr><td style="padding: 5px 0 0; line-height:15px"><font align="center" style="display:block; font: bold 23px/20px Arial,Helvetica,sans-serif;"></font></td></tr>
									<tr><td style="font: bold 23px/20px Arial,Helvetica,sans-serif;"><?php echo str_replace('.00', '', $voucher['price']); ?></td></tr>
									<tr>
										<td style="padding: 0 0 6px;line-height:0"><img src="<?php bloginfo('template_url'); ?>/images/divider.gif" width="250" height="2" alt="" /></td>
									</tr>
									<tr><td style="line-height:15px">in the *cooking school<br><br>Valid for 12 months.</td></tr>
									<tr>
										<td style="padding:23px 0; font-size: 9px; line-height: 14px">
											*To book into a cooking class, please ensure you have subscribed through the website to receive the latest list of classes from the newsletter,<br>which is released quarterly. These classes are very popular and book out within days of being released. Use the voucher code below to book online.<br>
											Cancellation policy: With a min of 14 days notice a place in another class may be arranged subject to availability, <br>If we choose to give you a credit with less than 14 days notice a $50pp charge will be applied.
										</td>
									</tr>
									<tr>
										<td style="padding:0 0 10px 0; font-size: 12px; color:#76B840">Redeem voucher online with: <font style="color:#FFFFFF;"><?php echo $voucher['promo']; ?></font></td>
									</tr>
									<tr>
										<td style="font-size:10px; color:#45555f">
											<font style="font-size:10px;">Fyshwick Markets F1B Mildura St ACT 2609</font>
											<img style="display:inline-block; margin: 1px 0 0" src="<?php bloginfo('template_url'); ?>/images/separator.gif" width="1" height="7" alt="" >
											<font style="font-size:10px;"><strong>P</strong> 02 6295 77 22</font>
											<img src="<?php bloginfo('template_url'); ?>/images/separator.gif" width="1" height="7" alt="" >
											<font style="font-size:10px;"><strong>F</strong> 02 6295 77 55</font>
											<img src="<?php bloginfo('template_url'); ?>/images/separator.gif" width="1" height="7" alt="" >
											<font style="font-size:10px;">
												<strong>E</strong> <a href="mailto:info@3seeds.com.au" style="font-size:10px; text-decoration:none;"><font color="#45555f">info@3seeds.com.au</font></a>
											</font>
											<img src="<?php bloginfo('template_url'); ?>/images/separator.gif" width="1" height="7" alt="" >
											<font style="font-size:10px;">
												<strong>W</strong> <a href="<?php echo home_url('/'); ?>" style="font-size:10px; text-decoration:none;"><font color="#45555f">3seeds.com.au</font></a>
											</font>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td width="30">&nbsp;</td>
						</tr>
					</table>
				  </td></tr>
				  <?php $vsep = '<tr><td height="2"></td></tr>'; } // foreach($vouchers as $voucher) { ?>
				</table>
				<?php endif; ?>
			</td>
		</tr>
	</table><br>
</body>
</html>
