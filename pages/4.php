<p class="title">Stars Exchange</p>
<b>Seeds: <span class="seedc">$<?=number_format($cuser->getData('seeds'),2) ?></span></b><br>
<b>Stars: <span class="starc">*<?=number_format($cuser->getData('stars'),2) ?></span></b><br>

<div class="box inline sebox" style="background-color:#ffcccc;">
	<h3>Place BUY <span class="starc">Stars</span> order with <span class="seedc">Seeds</span>.</h3>
	<form method="POST">
		<input type="hidden" name="a" value="buystars">
		Buy quantity: <input name="quantity" type="text" value="10">
		<br> @ 50 seeds each<br><br>
		<input type="submit" value="Place Buy Order">
	</form>
</div>

<div class="box inline sebox" style="background-color:#ccffcc;">
	<h3>Place SELL <span class="starc">Stars</span> order to get <span class="seedc">Seeds</span>.</h3>
	<form method="POST">
		<input type="hidden" name="a" value="sellstars">
		Sell quantity: <input name="quantity" type="text" value="10">
		<br> @ 50 seeds each<br><br>
		<input type="submit" value="Place Sell Order">
	</form>
</div>