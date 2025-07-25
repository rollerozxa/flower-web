<p class="title">PGM Packages</p>
Got PGM? You can spend it here! PGM Packages can give you resources, including but not limited to:
<ul class="nobreak">
	<li>Water</li>
	<li>Sun</li>
	<li>Giga</li>
	<li>Warp</li>
	<li>Seed income</li>
	<li>Star income</li>
	<li>Basic growth rate</li>
	<li>Stars</li>
	<li>Seeds</li>
</ul>
<p>Each package can contain a random amount of one resource. E.g. you buy 3 PGM Packages, and you get 574 hours of water, 59.3*/h star income, and 7930 hours of warp.</p>

<p>Yes, that's right, you can get star income from PGM Packages! This is an item that is exclusive to PGM Packages, you can't find it anywhere else! The amount of star income you have is also secret, but you can probably notice how much you have just from looking at your star total.</p>
<ul>
	<?=itemlist(7, 'buypgmpack', [2,3,4,8,10,15,20,50,100,500,1000,2500], 2, 'Buy %q PGM Packages for %c PGM') ?>
</ul>

<div class="box" style="background-color:#ccffcc">
	<span class="title">Custom PGM Package</span>
	<p><form action="<?=pagelink(7) ?>" method="POST">
		<input type="hidden" name="a" value="custompgm">
		<?=fieldselect('custompgm', 0, [
			'water'		=> 'Water',
			'sun'		=> 'Sun',
			'giga'		=> 'Giga Fertilizer',
			'warp'		=> 'Time Warp',
			's_income'	=> 'Seed Income',
			't_income'	=> 'Stars Income',
			'bgr'		=> 'Basic Growth Rate',
			'stars'		=> 'Stars',
			'seeds'		=> 'Seeds'
		], true) ?>
	</form></p>
	Each custom PGM Package costs 15 PGM.
</div>