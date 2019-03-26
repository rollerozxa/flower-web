<p class="title">Seeds Draw</p>
<p>Buy tickets for the seeds draw, currently worth *<span class="seedc">$201,010,010.00</span> seeds!</p>
<p><b>You have $<font color="green"><?php echo resourceformat($userdata['seeds']); ?></font> seeds available</b></p>
<p>You have <b>0</b> tickets for the next draw that takes place in 5hr 19min</p>
Max tickets per day: 10,000. If you try to buy more, it will simply stop at the max.
<ul>
	<?=itemlist(5, 'buyseedtickets', array(100,1000,10000,250000,4000000,20000000,250000000), 15, 'Buy %q tickets for $%c seeds') ?>
</ul>
<table class="oddstable">
	<tr>
		<th colspan=2>Odds for instant-win ticket prizes!</th>
	</tr><tr style="color:blue">
		<td>1 / 1,000</td>
		<td>+6 hours of water!</td>
	</tr><tr style="color:orange">
		<td>1 / 2,000</td>
		<td>+6 hours of sun!</td>
	</tr><tr style="color:gray">
		<td>1 / 6,000</td>
		<td>+6 hours of warp!</td>
	</tr><tr style="color:#FF69B4">
		<td>1 / 50,000</td>
		<td>+6 hours of giga!</td>
	</tr><tr style="color:#6A5ACD">
		<td>1 / 120,000</td>
		<td>3 hours of time warp!</td>
	</tr><tr>
		<td>1 / 100,000,000</td>
		<td><?=rainbow_text('Magic seed!') ?></td>
	</tr>
</table>