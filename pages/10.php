<?php
$compost = fetch("SELECT * FROM globalcompost ORDER BY compostID DESC LIMIT 1");
?>
<p class="title">Global Compost Heap</p>

<strong style="color:blue">Throw spare seeds on the heap, and you might win prizes for you and all of your friends!</strong>

<p>When the heap passes its current goal the player who put the heap over the top will win the current prize. Also everyone on the winning player's friend list <b>who also contributed something</b> wins too!</p>
<p>When the heap passes its goal it is reset to 0, and a new goal and prize are set for the new heap.</p>
<p>The top <b>10</b> contributors to the heap will also win the prize.</p>

<strong style="color:brown">Current heap status: <span class="seedc">$<?=number_format($compost['compostsize']) ?></span> / <span class="seedc">$<?=number_format($compost['compostmaxsize']) ?></span></strong><br>
<span class="seedc">Next prize: <?=heapprize($compost['compostprize']) ?></span><br>
<ul>
	<?=itemlist(10,'heap',[100,1000,50000,500000,5000000,15000000,50000000],1,'Throw $%q seeds on the heap') ?>
</ul>
<span class="title">Top 10 contributors</span>
<ul class="nobreak">
	<li><span class="blue">[1]</span> Example user 1</li>
	<li><span class="blue">[2]</span> Example user 2</li>
	<li><span class="blue">[3]</span> Example user 3</li>
	<li><span class="blue">[4]</span> Example user 4</li>
	<li><span class="blue">[5]</span> Example user 5</li>
</ul>
