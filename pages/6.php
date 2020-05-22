<p class="title">Stars Draw</p>
<p>Buy tickets for the stars draw, currently worth <span class="starc">*201,010,010.00</span> stars!</p>
<p><b>You have <span class="starc"><?=resourceformat($cuser->getData('stars')) ?></span> stars available</b></p>
<p>You have <b>0</b> tickets for the next draw that takes place in 5hr 18min</p>
Max tickets per day: 10,000. If you try to buy more, it will simply stop at the max.
<ul>
	<?=itemlist(6, 'buystartickets', [100,2500,10000,50000,250000,1000000,10000000,100000000], 2, 'Buy %q tickets for *%c stars') ?>
</ul>
<table class="oddstable">
	<tr>
		<th colspan=2>Odds for instant-win ticket prizes!</th>
	</tr><tr style="color:purple">
		<td>1 / 1,000</td>
		<td>+1 friend slot!</td>
	</tr><tr style="color:green">
		<td>1 / 5,000</td>
		<td>+1 seed/hr income!</td>
	</tr><tr style="color:#dd88dd">
		<td>1 / 9,000</td>
		<td>+36.00cm/hr basic growth rate!</td>
	</tr><tr style="color:red">
		<td>1 / 20,000</td>
		<td>+1 PGM</td>
	</tr><tr style="color:green">
		<td>1 / 200,000</td>
		<td>1000 seeds!</td>
	</tr><tr>
		<td>1 / 100,000,000</td>
		<td><?=rainbow_text('Magic seed!') ?></td>
	</tr>
</table>