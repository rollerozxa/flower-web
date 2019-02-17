<style>
table,tr,td,th {
	border: 2px solid black;
	border-collapse: collapse;
	padding: 5px;
	text-align: center;
}
.math {
	font-family: Consolas, monospace;
}
</style>
<span class="title">2. Items and Resources</span>

<p>To make your flower grow, it needs water and sun. If it has no water, your flower will shrink. If it has no sun, it'll "sleep" and it won't shrink no matter what. If you don’t want your flower to shrink when the sun is up, you can buy the "Do not shrink" item at the bottom of the Items page.</p>

<p>Basically, it can be summarized into this table:</p>

<table>
	<tr>
		<td></td>
		<th>Water</th>
		<th>No Water</th>
	</tr>
	<tr>
		<th>Sun</th>
		<td><span style="color:green">Grow!</span></td>
		<td><span style="color:brown">Shrink...*</span></td>
	</tr>
	<tr>
		<th>No Sun</th>
		<td><span style="color:gray">Asleep...</span></td>
		<td><span style="color:gray">Asleep...</span></td>
	</tr>
</table>
<i>* Your flower won't shrink if you buy the "Do not shrink" item at the bottom of the Items page.</i>

<p>Your flower can grow at different speeds, depending on how much water you have, and what items you have. The growth of your flower is calculated as <span class="math">[Basic Growth Rate] * [Multiplier] = [Total Growth]</span>. Your basic growth rate can easily be upgraded by buying more on the items page, but your multiplier is more complicated.</p>

<p>Your multiplier starts at one, and you can increase your multiplier by doing these following things, with the action you need to do and the effect it'll have on the multiplier.</p>

<table>
	<tr>
		<th>Action</th>
		<th>Effect</th>
	</tr>
	<tr>
		<td>Having a fertilizer active.</td>
		<td class="math">3x</td>
	</tr>
	<tr>
		<td>Having a super fertilizer active.</td>
		<td class="math">5x</td>
	</tr>
	<tr>
		<td>Having giga fertilizer active.</td>
		<td class="math">4x</td>
	</tr>
	<tr>
		<td>Having more than 2hrs of water.</td>
		<td class="math">2x</td>
	</tr>
</table>

<p style="color:darkorange">Note - If your flower is dry, the multiplier will always be either -3 or 0 depending on whether you have "Do not shrink" enabled.</p>

<p>Therefore, the maximum multiplier you can have is <span class="math">(((1 * 3) + 1 * 5) * 4) * 2 = 64</span>.</p>


