<p class="title">Seeds Draw</p>
<p>Buy tickets for the seeds draw, currently worth *<span class="seedc">$201,010,010.00</span> seeds!</p>
<p><b>You have $<font color="green"><?php echo resourceformat($userdata['seeds']); ?></font> seeds available</b></p>
<p>You have <b>0</b> tickets for the next draw that takes place in 5hr 19min</p>
Max tickets per day: 10,000. If you try to buy more, it will simply stop at the max.
<ul>
	<?=itemlist(5, 'buyseedtickets', array(10,1000,10000,250000,4000000,20000000,250000000), 15, 'Buy %q tickets for $%c seeds') ?>
</ul>
<p class="title">Odds for instant-win ticket prizes!</p>
<font color=blue>10 / 4,000,000.00 : <b>+60 offer bonus</b></font><br/>
<font color=red>1 / 4,000,000.00 : <b>(1 Checklist COMPLETED if current not finished) (+3 PGM) (+25 BONUS checklists). You must apply the reward if this is won.</b></font>