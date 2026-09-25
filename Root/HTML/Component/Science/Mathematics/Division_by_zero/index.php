<div id='message'>
		<?php $alt='A hand writing equations with chalk on a blackboard.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is division by zero?</h3>
	<p>
		In standard arithmetic, division by zero is undefined. It does not produce infinity, nor does it equal zero; it simply has no valid mathematical answer.
	</p>
	<h3>Division as inverse multiplication</h3>
	<p>
		To see why division by zero fails, consider what division actually means. The expression <strong>a / b = c</strong> asks: find a unique number <strong>c</strong> such that <strong>c × b = a</strong>.
	</p>
	<p>
		Now attempt to divide a non-zero number by zero, say <strong>5 / 0 = c</strong>. This requires finding a number <strong>c</strong> such that:
	</p>
	<p>
		<strong>c × 0 = 5</strong>
	</p>
	<p>
		Because any number multiplied by zero equals zero, no such number <strong>c</strong> can ever exist.
	</p>
	<p>
		What about dividing zero by zero (<strong>0 / 0 = c</strong>)? That requires <strong>c × 0 = 0</strong>. Here the problem reverses: every single number satisfies the equation. Whether <strong>c</strong> is 1, 42, or -7, the statement is true. Because there is no single, well-defined answer, <strong>0 / 0</strong> is indeterminate.
	</p>
	<h3>Division as repeated subtraction</h3>
	<p>
		Another intuitive way to view division is repeated subtraction. Dividing 12 by 3 asks: how many times can you subtract 3 from 12 until nothing remains? The answer is 4 times.
	</p>
	<p>
		Now try dividing 12 by 0. You subtract 0, leaving 12. You subtract 0 again, still leaving 12. You can subtract forever and you will never make any progress toward zero. The process never terminates.
	</p>
	<h3>What happens when you approach zero?</h3>
	<p>
		In calculus, we can examine what happens as the divisor becomes infinitesimally close to zero without reaching it.
	</p>
	<p>
		If you divide 1 by positive numbers approaching zero (0.1, 0.01, 0.0001), the quotient grows without bound toward positive infinity (+∞). But if you approach zero from negative numbers (-0.1, -0.01, -0.0001), the quotient plunges toward negative infinity (-∞).
	</p>
	<p>
		Because approaching zero from the left and right leads in opposite directions, division by zero cannot be assigned a single consistent value.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>
