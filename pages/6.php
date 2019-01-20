<p class="title">Stars Draw</p>
<p>Buy tickets for the stars draw, currently worth <span class="starc">*201,010,010.00</span> stars!</p>
<p><b>You have *<font color="blue"><?php echo resourceformat($userdata['stars']); ?></font> stars available</b></p>
<p>You have <b>0</b> tickets for the next draw that takes place in 5hr 18min</p>
Max tickets per day: 10,000. If you try to buy more, it will simply stop at the max.
<ul>
	<?=itemlist(6, 'buystartickets', array(10,100,2500,10000,50000,250000,1000000,10000000,100000000), 2, 'Buy %q tickets for *%c stars') ?>
</ul>
<p class="title">Odds for instant-win ticket prizes!</p>
<font color=red>1 / 10000 : <b>+2 PGM. (+1 every 75.0 friends you have!)</b></font><br/>
<font color=red>8 / 10000 : <b>+10.80cm/hr growth: ALL flowers!</b></font><br/>
<font color=green>10 / 10000 : <b>+1 seeds/hr: on all flowers</b></font><br/>
<font color=purple>50 / 10000 : <b>+5 offers bonus!</b></font><br/>
<font color=purple>50 / 10000 : <b>+1 friend slot!</b></font><br/>