<div id='message'>
		<?php $alt='An amber river stone singled out by sunlight among scattered, unordered stones.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is quickselect?</h3>
	<p>
		Quickselect finds the value at a chosen rank in an unsorted collection. For example, it can find the smallest value, the median, or the tenth-smallest value without sorting every item.
	</p>
	<p>
		It uses the same idea as <a class="content-link XURL" href="/technology/computer/algorithm/quick_sort" data-target="technology/computer/algorithm/quick_sort" data-title="quick sort">quick sort</a>: choose a pivot and partition values around it. But quickselect continues only in the part that can contain the answer.
	</p>
	<h3>What does “fourth-smallest” mean?</h3>
	<p>
		Rank counts positions in the sorted order, starting with the smallest. In the list <code class='inline'>9, 2, 7, 4, 1, 8, 3</code>, the fourth-smallest value is <strong>4</strong>, even though the list itself is not sorted.
	</p>
	<p>
		If a program uses zero-based indexes, rank four is index three. For the k-th largest value in a collection of n values, with k counted from one, select zero-based index <code class='inline'>n - k</code>.
	</p>
	<p>
		With repeated values, equal items occupy several ranks. A selection algorithm should define whether it returns a value or a particular item when several items have the same value. Quickselect usually returns the value at the requested rank.
	</p>
	<h3>How does quickselect work?</h3>
	<p>
		Quickselect keeps a range of values that still contains the requested rank:
	</p>
	<ol class="list-bullet content-list">
		<li><div>Choose a pivot from the current range.</div></li>
		<li><div>Partition the range into values less than the pivot, equal to it, and greater than it.</div></li>
		<li><div>Count the positions covered by each group.</div></li>
		<li><div>If the requested rank lies in the equal group, return the pivot.</div></li>
		<li><div>Otherwise, continue only in the lower or higher group that contains the rank.</div></li>
	</ol>
	<p>
		For the example <code class='inline'>9, 2, 7, 4, 1, 8, 3</code>, suppose the pivot is <strong>4</strong>. Partitioning gives lower values <code class='inline'>2, 1, 3</code>, the pivot <code class='inline'>4</code>, and higher values <code class='inline'>9, 7, 8</code>. Three values are below 4, so 4 is the fourth-smallest value. There is no need to order either group.
	</p>
	<p>
		A different pivot might not reveal the answer immediately. Quickselect then discards the group that cannot contain the requested rank and repeats the process on the remaining group.
	</p>
	<h3>A simple version</h3>
	<p>
		The following pseudocode uses a three-way partition. Its rank, <code class='inline'>k</code>, is zero-based. The partition returns <code class='inline'>less_end</code>, the first index not less than the pivot, and <code class='inline'>equal_end</code>, the last index equal to it.
	</p>
	<pre class='indent-c'><code class='block'>quickselect(values, k)
    low = 0
    high = length(values) - 1

    while low &lt;= high
        pivot = choose_random_value(values, low, high)
        (less_end, equal_end) =
            partition_into_less_equal_greater(values, low, high, pivot)

        if k &lt; less_end
            high = less_end - 1
        else if k &lt;= equal_end
            return values[k]
        else
            low = equal_end + 1</code></pre>
	<p>
		The partition operation moves values less than the pivot to the left, equal values into the middle, and greater values to the right. The exact positions depend on the implementation, but the key point is that the next pass handles only one of those regions.
	</p>
	<h3>Work through three examples</h3>
	<p>
		The example controls let you switch between three cases:
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>Distinct values:</strong> find the fourth-smallest value in <code class='inline'>[9, 2, 7, 4, 1, 8, 3]</code>. The answer is <strong>4</strong>.</div></li>
		<li><div><strong>Median:</strong> find the middle value in <code class='inline'>[9, 1, 6, 3, 8, 2, 7, 4, 5]</code>. The answer is <strong>5</strong>.</div></li>
		<li><div><strong>Repeated values:</strong> find the fourth-smallest value in <code class='inline'>[5, 2, 5, 1, 5, 3]</code>. The answer is <strong>5</strong>; the requested rank falls within the group of equal values.</div></li>
	</ul>
	<p>
		Step through each reference run to see how the active range narrows. In the scratch pad, enter an array and choose the rank you want. Make the partition decisions one action at a time, then compare your sequence with the reference run.
	</p>
<section lang="en" class="frontend-component no-auto-cover" data-component="quick-select" data-source="/resource/data/quick-select.json" data-component-script="/resource/components/quick-select.js" data-component-style="/resource/components/quick-select.css"><p data-component-status role="status">Loading interactive comparison…</p><noscript><p>Enable JavaScript to use this interactive comparison.</p></noscript></section>
	<h3>Why is it faster than sorting?</h3>
	<p>
		Sorting arranges every value. Quickselect needs to place only enough values to identify one rank.
	</p>
	<p>
		A partition pass examines the current range once. With a randomly chosen pivot, the expected total work is <strong>O(n)</strong> for n values. It may still take <strong>O(n²)</strong> in the worst case if the pivots repeatedly leave almost all values in the active range.
	</p>
	<p>
		An in-place implementation uses only a small amount of extra storage beyond the array. Some implementations use recursion, which adds call-stack space; an iterative version avoids that stack.
	</p>
	<h3>When is quickselect useful?</h3>
	<p>
		Quickselect is useful when you need a rank-based result but do not need the whole collection sorted. Examples include:
	</p>
	<ul class="list-bullet content-list">
		<li><div>Finding a median or percentile</div></li>
		<li><div>Keeping the k smallest or largest values</div></li>
		<li><div>Choosing a threshold value for a later calculation</div></li>
	</ul>
	<p>
		If you need many ranks or the values in sorted order, sorting once may be simpler. Quickselect can also rearrange the input array, so copy it first when the original order must be preserved.
	</p>
	<h3>What is the main idea?</h3>
	<p>
		Quickselect spends work only where the answer can still be. A pivot divides the collection, and the requested rank tells the algorithm which part to keep.
	</p>
	<p>
		That is why selecting one value can take less work than sorting all of them.
	</p>
	<h3>References</h3>
	<ul class="list-bullet content-list">
		<li><div><a class="content-link" href="https://dl.acm.org/doi/10.1145/366622.366644" target="_blank" rel="noopener noreferrer">C. A. R. Hoare, “Algorithm 65: Find” (1961)</a></div></li>
		<li><div><a class="content-link" href="https://doi.org/10.1145/321765.321781" target="_blank" rel="noopener noreferrer">R. W. Floyd and R. L. Rivest, “Expected Time Bounds for Selection” (1975)</a></div></li>
		<li><div><a class="content-link" href="https://xlinux.nist.gov/dads/HTML/select.html" target="_blank" rel="noopener noreferrer">NIST Dictionary of Algorithms and Data Structures: Select</a></div></li>
	</ul>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>