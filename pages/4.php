<p class="title">Stars Exchange</p>
<b>Seeds: <span class="seedc">$<?php echo number_format($userdata['seeds'],2) ?></span></b><br>
<b>Stars: <span class="starc">*<?php echo number_format($userdata['stars'],2) ?></span></b><br>

<div class="box inline Spadding" style="background-color:#ffcccc;width:270px;height:200px;">
	<h3>Place BUY <span class="starc">Stars</span> order with <span class="seedc">Seeds</span>.</h3>
	<form method="POST">
		<input type="hidden" name="a" value="buystars">
		Buy quantity: <input name="quantity" type="text" value="10">
		<br> @ 50 seeds each<br><br>
		<input type="submit" value="Place Buy Order">
	</form>
</div>

<div class="box inline Spadding" style="background-color:#ccffcc;width:270px;height:200px;">
	<h3>Place SELL <span class="starc">Stars</span> order to get <span class="seedc">Seeds</span>.</h3>
	<form method="POST">
		<input type="hidden" name="a" value="sellstars">
		Sell quantity: <input name="quantity" type="text" value="10">
		<br> @ 50 seeds each<br><br>
		<input type="submit" value="Place Sell Order">
	</form>
</div>
