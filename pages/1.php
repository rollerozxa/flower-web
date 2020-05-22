<p class="title">Items</p>
<div style="background-color:#ccffcc" class="box">
	<b>Seed income: $<span class=seedc><?=number_format($cuser->getData('seedincome'),2) ?></span> per hour</b>
	<table class="ttbl fullwidth">
		<?php /* Due to galaxy bonus, it costs half as much (original: 100* per 1/hr) */ ?>
		<tr><td><a href="<?=alink(1,'upgradeincome',1) ?>">Upgrade by 0.1/hr</a> : *<?=$cuser->getData('seedincome') * 5 ?> stars</td></tr>
		<tr><td><a href="<?=alink(1,'upgradeincome',10) ?>">Upgrade by 1.0/hr</a> : *<?=$cuser->getData('seedincome') * 50 ?> stars</td></tr>
	</table>
	<b id="blink" style="display:block;font-size:24pt;text-align:center;letter-spacing:3px;color:red">50% OFF!</b>
	<?php /*<b style="color:maroon;">(Seed income is global and no <br> longer on a per-flower basis.)</b>*/ ?>
</div><br>
<div style="background-color:#ffffcc" class="box">
	<b>Basic Growth Rate: <span style="color:purple"><?=number_format($cuser->flower[$gid]->getData('basicgrowthrate') * 0.36,2) ?>cm</span> per hour</b>
	<table class="ttbl fullwidth">
		<tr><td><a href="<?=alink(1,'upgradebgr',1) ?>">Upgrade by 0.36cm/hr</a> *720 stars</td></tr>
		<tr><td><a href="<?=alink(1,'upgradebgr',10) ?>">Upgrade by 3.60cm/hr</a> *7,200 stars</td></tr>
		<tr><td><a href="<?=alink(1,'upgradebgr',100) ?>">Upgrade by 36.00cm/hr</a> *72,000 stars</td></tr>
		<tr><td><a href="<?=alink(1,'upgradebgr',1000) ?>">Upgrade by 360.00cm/hr</a> *720,000 stars</td></tr>
		<tr><td><a href="<?=alink(1,'upgradebgr',10000) ?>">Upgrade by 3,600.00cm/hr</a> *7,200,000 stars</td></tr>
		<tr><td><a href="<?=alink(1,'upgradebgr',100000) ?>">Upgrade by 36,000.00cm/hr</a> *72,000,000 stars</td></tr>
		<tr><td><a href="<?=alink(1,'upgradebgr',1000000) ?>">Upgrade by 360,000.00cm/hr</a> *720,000,000 stars</td></tr>
	</table>
</div>
<span class="title">Water Overdose</span>
<ul>
	<li><a href="<?=alink(1,'buywater',6) ?>">Buy 6 hours of water $120 seeds</a></li>
	<li><a href="<?=alink(1,'buywater',12) ?>">Buy 12 hours of water $240 seeds</a></li>
	<li><a href="<?=alink(1,'buywater',48) ?>">Buy 2 days of water $960 seeds</a></li>
	<li><a href="<?=alink(1,'buywater',168) ?>">Buy 7 days of water $3360 seeds</a></li>
	<li><a href="<?=alink(1,'buywater',720) ?>">Buy 30 days of water $14400 seeds</a></li>
	<li><a href="<?=alink(1,'buywater',10000) ?>">Buy 10,000 hours of water $200000 seeds</a></li>
	<li><a href="<?=alink(1,'buywater',100000) ?>">Buy 100,000 hours of water $2000000 seeds</a></li>
	<li><a href="<?=alink(1,'buywater',1000000) ?>">Buy 1,000,000 hours of water $20000000 seeds</a></li>
	<li>(Water overdose puts your water beyond 100%, so that it keeps the double-growth boost longer than 30 minutes!)</li>
</ul>
<span class="title">Sun Overdose</span>
<ul>
	<li><a href="<?=alink(1,'buysun',6) ?>">Buy 6 hours more sun *12 stars</a></li>
	<li><a href="<?=alink(1,'buysun',12) ?>">Buy 12 hours more sun *24 stars</a></li>
	<li><a href="<?=alink(1,'buysun',48) ?>">Buy 2 days more sun *96 stars</a></li>
	<li><a href="<?=alink(1,'buysun',168) ?>">Buy 7 days more sun *336 stars</a></li>
	<li><a href="<?=alink(1,'buysun',720) ?>">Buy 30 days more sun *1440 stars</a></li>
	<li><a href="<?=alink(1,'buysun',10000) ?>">Buy 10,000 hours more sun *20000 stars</a></li>
	<li><a href="<?=alink(1,'buysun',100000) ?>">Buy 100,000 hours more sun *200000 stars</a></li>
	<li><a href="<?=alink(1,'buysun',1000000) ?>">Buy 1,000,000 hours more sun *2000000 stars</a></li>
	<li>(Sun overdose stretches the current day longer, so that your items don't get used up until the sun goes down.)</li>
</ul>
<span class="title">Auto Water</span> (<?=$cuser->flower[$gid]->getData('autowater') ?>)
<ul>
	<?=itemlist(1,'buyautowater',[1,5,15],$autowater_cost,'Buy %q $%c seeds',ITEMLIST_NOFORMAT) ?>
	<li>(Auto water will keep your plant moist until the sun goes down.)</li>
</ul>
<span class="title">Fertilizer</span> (<?=$cuser->flower[$gid]->getData('fertilizer') ?>)
<ul>
	<?=itemlist(1,'buyfertilizer',[1,5,15],$fertilizer_cost,'Buy %q $%c seeds',ITEMLIST_NOFORMAT) ?>
	<li>(Fertilizer makes your flower grow 3x as fast until the sun goes down.)</li>
</ul>
<span class="title">Super Fertilizer</span> (<?=$cuser->flower[$gid]->getData('superfertilizer') ?>)
<ul>
	<?=itemlist(1,'buysuperfertilizer',[1,5,15],$superfertilizer_cost,'Buy %q *%c stars',ITEMLIST_NOFORMAT) ?>
	<li>(Super fertilizer makes your flower grow 5x as fast until the sun goes down.)</li>
</ul>
<span class="title">Time Warp</span>
<ul>
	<li><a href="<?=alink(1,'buywarp',6) ?>">Buy 6 hours $240 seeds</a></li>
	<li><a href="<?=alink(1,'buywarp',12) ?>">Buy 12 hours $480 seeds</a></li>
	<li><a href="<?=alink(1,'buywarp',48) ?>">Buy 2 days $1920 seeds</a></li>
	<li><a href="<?=alink(1,'buywarp',168) ?>">Buy 7 days $6720 seeds</a></li>
	<li><a href="<?=alink(1,'buywarp',720) ?>">Buy 30 days $28800 seeds</a></li>
	<li><a href="<?=alink(1,'buywarp',10000) ?>">Buy 10,000 hours $400000 seeds</a></li>
	<li><a href="<?=alink(1,'buywarp',100000) ?>">Buy 100,000 hours $4000000 seeds</a></li>
	<li><a href="<?=alink(1,'buywarp',1000000) ?>">Buy 1,000,000 hours $40000000 seeds</a></li>
	<li>(Warp speed runs everything at 750x normal speed until it runs out. So if you buy 6 hours of warp speed, your flower will grow at 750x speed until it passes 6 hours)</li>
</ul>
<span class="title">Giga Fertilizer</span>
<ul>
	<li><a href="<?=alink(1,'buygiga',6) ?>">Buy 6 hours *24 stars</a></li>
	<li><a href="<?=alink(1,'buygiga',12) ?>">Buy 12 hours *48 stars</a></li>
	<li><a href="<?=alink(1,'buygiga',48) ?>">Buy 2 days *192 stars</a></li>
	<li><a href="<?=alink(1,'buygiga',168) ?>">Buy 7 days *672 stars</a></li>
	<li><a href="<?=alink(1,'buygiga',720) ?>">Buy 30 days *2880 Stars</a></li>
	<li><a href="<?=alink(1,'buygiga',10000) ?>">Buy 10,000 hours *40000 Stars</a></li>
	<li><a href="<?=alink(1,'buygiga',100000) ?>">Buy 100,000 hours *400000 Stars</a></li>
	<li><a href="<?=alink(1,'buygiga',1000000) ?>">Buy 1,000,000 hours *4000000 Stars</a></li>
	<li>(Giga fertilizer multiplies your multiplier by 4x until it runs out. So if you buy 6 hours of Giga fertilizer, your flower will grow 4x faster until it passes 6 hours)</li>
</ul>
<div class="box" style="background-color:#ccffcc">
	<b>Bulk items (Tops up ALL of your flowers!) <?=(bulksale() ? '<span style="color:red">(20% off!)</span>' : '') ?></b>
	<ul>
		<?=itemlist(12,'bulk',[500,5000,50000,500000,5000000,50000000],getbulkprice(),'%q hours: *%c stars') ?>
		<li>(Bulk items give you X hours of water, sun, warp and giga for all of your flowers!)</li>
	</ul>
</div>
<?php if ($cuser->flower[$gid]->getData('nevershrink') == 1) { ?>
	Never shrink from drying out: <span style="color:green">Active!</span><br>
<?php } else { ?>
	Never shrink from drying out: Inactive<br>
	<a href="<?=alink(1,'nevershrink') ?>">Buy! *4000 stars</a><br>
<?php } ?>
<script>blink()</script>