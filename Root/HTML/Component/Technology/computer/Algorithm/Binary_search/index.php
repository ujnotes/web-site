<?php $alt='Binary Search'; require('../HTML/Fragment/Component_cover.php') ?>

<div id='message'>
		<h3>What is binary search?</h3>
	<p>
		<strong>Binary search</strong> is a way to find a value in sorted data. It compares the target with the value in the middle, discards the half that cannot contain the target, and repeats.
	</p>
	<p>
		Binary search depends on order. The values must already be sorted.
	</p>
	<h3>How does it work?</h3>
	<p>
		Suppose we want to find <strong>37</strong> in this sorted list:
	</p>
	<p>
		<code class='inline'>3, 8, 14, 19, 25, 31, 37, 42, 49, 55, 63, 71, 82, 90, 97</code>
	</p>
	<ol class="list-bullet content-list">
		<li><div>The middle value is <strong>42</strong>. Since 37 is smaller, discard 42 and everything to its right.</div></li>
		<li><div>The middle of the remaining range is <strong>19</strong>. Since 37 is larger, discard 19 and everything to its left.</div></li>
		<li><div>The next middle value is <strong>31</strong>. Since 37 is larger, continue to the right.</div></li>
		<li><div>The next value is <strong>37</strong>, so the search is complete.</div></li>
	</ol>
	<?php $img_title='example'; $ext='svg'; $alt='A sorted row of values is repeatedly divided in half until the target value 37 is found.'; $center='true'; require('Fragment/Component_image.php') ?>
	<p>
		A linear search might inspect the values one by one. Binary search removes about half of the remaining possibilities after every comparison.
	</p>
	<h3>The procedure</h3>
	<p>
		Keep two positions: the beginning and end of the range that may still contain the target.
	</p>
	<ol class="list-bullet content-list">
		<li><div>Find the middle position.</div></li>
		<li><div>Compare its value with the target.</div></li>
		<li><div>If they are equal, return the middle position.</div></li>
		<li><div>If the target is smaller, move the end just before the middle.</div></li>
		<li><div>If the target is larger, move the beginning just after the middle.</div></li>
		<li><div>Stop when the value is found or the range becomes empty.</div></li>
	</ol>
	<pre class='indent-c'><code class='block'>binary_search(values, target)
    low = 0
    high = length(values) - 1

    while low &lt;= high
        middle = low + floor((high - low) / 2)

        if values[middle] == target
            return middle

        if values[middle] &lt; target
            low = middle + 1
        else
            high = middle - 1

    return not found</code></pre>
	<p>
		The expression used for <code class='inline'>middle</code> avoids adding <code class='inline'>low</code> and <code class='inline'>high</code> directly. In languages with fixed-size integers, that prevents an overflow when both positions are large.
	</p>
	<h3>Why must the data be sorted?</h3>
	<p>
		The comparison tells us which half can be discarded only because the values have a known order.
	</p>
	<p>
		If the middle value is 42 and the target is 37, every value after 42 must also be too large. In an unsorted list, 37 could be anywhere, so discarding half would not be justified.
	</p>
	<p>
		Sorting has a cost. Binary search is most useful when the data is already sorted or when it will be searched many times.
	</p>
	<h3>How fast is it?</h3>
	<p>
		Binary search takes <strong>O(log n)</strong> comparisons in the worst case. Doubling the amount of data adds only about one more comparison.
	</p>
	<p>
		For example, a sorted collection of one million values needs at most about 20 comparisons because 2^{20} is slightly more than one million.
	</p>
	<p>
		The iterative form above uses <strong>O(1)</strong> extra space because it keeps only a few positions.
	</p>
	<h3>When is binary search useful?</h3>
	<p>
		Use it when:
	</p>
	<ul class="list-bullet content-list">
		<li><div>the data is sorted;</div></li>
		<li><div>values can be reached directly by position, as in an array; and</div></li>
		<li><div>you need to search the same collection repeatedly.</div></li>
	</ul>
	<p>
		A simple linear search may be better for a small or unsorted collection. A hash table may be better for exact key lookups when order does not matter.
	</p>
	<h3>Common mistakes</h3>
	<ul class="list-bullet content-list">
		<li><div><strong>Searching unsorted data:</strong> the result is not reliable.</div></li>
		<li><div><strong>Updating the wrong boundary:</strong> using <code class='inline'>middle</code> again instead of <code class='inline'>middle + 1</code> or <code class='inline'>middle - 1</code> can cause an endless loop.</div></li>
		<li><div><strong>Ignoring duplicates:</strong> ordinary binary search may return any matching position. Finding the first or last match needs a small variation.</div></li>
		<li><div><strong>Using it on a linked list:</strong> finding the middle repeatedly is not efficient without direct positional access.</div></li>
	</ul>
	<h3>What follows?</h3>
	<p>
		Binary search is a small example of a powerful idea: use what is already known about the data to rule out many possibilities at once. The same reasoning appears in lower-bound searches, database indexes and other <a class="content-link XURL" href="/computer/algorithm" data-target="computer/algorithm" data-title="algorithms">algorithms</a>.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Disclaimer / AI disclosure: This article was created or revised with assistance from artificial intelligence and reviewed by Ujjwal Singh, who takes responsibility for the published content.</em>
	</p>

</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>