<div id='message'>
		<?php $alt='Small wooden blocks partitioned around a darker pivot, with smaller blocks on the left and larger blocks on the right.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is quick sort?</h3>
	<p>
		<strong>Quick sort</strong>, also called <strong>quicksort</strong>, sorts a collection by choosing a pivot, partitioning the values around it, and then sorting the resulting parts in the same way.
	</p>
	<p>
		The pivot is a value taken from the part being sorted. After partitioning, values on one side belong before the pivot and values on the other side belong after it. The two sides can then be sorted independently.
	</p>
	<h3>Why does the pivot need partitioning?</h3>
	<p>
		Suppose we want to sort <code class='inline'>[6, 2, 8, 3, 1]</code> and choose <strong>6</strong> as the pivot. Three values are smaller than <code class='inline'>6</code>: <code class='inline'>2</code>, <code class='inline'>3</code> and <code class='inline'>1</code>. With positions counted from zero, <code class='inline'>6</code> belongs at index <code class='inline'>3</code> in the finished array.
	</p>
	<p>
		But knowing the pivot’s position is not enough. If we simply swap <code class='inline'>6</code> into index <code class='inline'>3</code>, we might get <code class='inline'>[3, 2, 8, 6, 1]</code>. The value <code class='inline'>8</code> is still on the left of <code class='inline'>6</code>, and <code class='inline'>1</code> is on its right. The array has the right number of values on each side, but it is not partitioned.
	</p>
	<p>
		A valid partition could be <code class='inline'>[2, 3, 1, 6, 8]</code>. Every value left of <code class='inline'>6</code> is smaller, and every value right of it is greater. The order within each side does not matter yet; recursion will sort those parts.
	</p>
	<h3>How does a partition place the pivot?</h3>
	<p>
		There are several partitioning schemes. Here is one called <strong>Lomuto partitioning</strong>. It uses the last value as the pivot and a boundary called <code class='inline'>i</code>: everything before <code class='inline'>i</code> has already been found to be smaller than the pivot.
	</p>
	<p>
		Consider the subarray <code class='inline'>[5, 3, 1, 8, 7]</code>, with <strong>7</strong> as the pivot. The scan sees <code class='inline'>5</code>, <code class='inline'>3</code> and <code class='inline'>1</code>. Each is smaller, so the boundary moves past it. The value <code class='inline'>8</code> leaves the boundary at index <code class='inline'>3</code>. When the scan ends, the algorithm swaps the pivot <strong>7</strong> with <code class='inline'>8</code> at index <code class='inline'>3</code>. The result is <code class='inline'>[5, 3, 1, 7, 8]</code>.
	</p>
	<p>
		That final swap is caused by the boundary, not by a special comparison between 8 and 7 after the scan. The boundary has collected all smaller values on the left and points to the first place where the pivot can go. The swap puts the pivot there; the larger value it replaces moves to the right side.
	</p>
	<p>
		With the strict comparison used here, values equal to the pivot go on its right. Other schemes can use different rules, so their boundaries and returned positions may mean something different.
	</p>
	<h3>Work through a dry run</h3>
	<p>
		Use the arrows beside the example name to change the array. The step buttons move through one dry run. Watch <code class='inline'>j</code> scan the array while <code class='inline'>i</code> marks the next place for a value smaller than the pivot.
	</p>
	<p>
		In the scratch pad, compare the current value with the pivot, decide whether to swap, and move the indices yourself. Each action adds a row. Reveal the reference run when you are ready to compare.
	</p>
<section lang="en" class="frontend-component no-auto-cover" data-component="quick-sort" data-source="/resource/data/quick-sort.json" data-component-script="/resource/components/quick-sort.js" data-component-style="/resource/components/quick-sort.css"><p data-component-status role="status">Loading interactive comparison…</p><noscript><p>Enable JavaScript to use this interactive comparison.</p></noscript></section>
	<h3>What does quick sort do?</h3>
	<p>
		The conceptual algorithm has three steps:
	</p>
	<ol class="list-bullet content-list">
		<li><div>Choose a pivot in the current part of the array.</div></li>
		<li><div>Partition the values around the pivot, placing it or a dividing boundary where the chosen scheme requires.</div></li>
		<li><div>Recursively quick-sort the parts on either side.</div></li>
	</ol>
	<p>
		The process stops when a part has zero or one value, because it is already sorted.
	</p>
	<p>
		In Lomuto’s scheme, the pivot finishes at its final position in each partition step. A recursive call can skip that position:
	</p>
	<pre class='indent-c'><code class='block'>quick_sort(values, low, high)
    if low &gt;= high
        return

    pivot_index = lomuto_partition(values, low, high)
    quick_sort(values, low, pivot_index - 1)
    quick_sort(values, pivot_index + 1, high)</code></pre>
	<p>
		The partition function does the scan and final swap described above. Quicksort itself does not require this exact procedure.
	</p>
	<h3>Is Lomuto the quick sort algorithm?</h3>
	<p>
		Lomuto and Hoare are names for partitioning schemes, not separate names for the overall idea. They organise comparisons and swaps differently. In Lomuto partitioning, the pivot is put into its final position at the end of each pass. A common form of Hoare partitioning returns a dividing boundary; the pivot itself may not be in its final sorted position after that pass.
	</p>
	<p>
		So it helps to keep three levels separate:
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>Quicksort:</strong> partition, then recursively sort the parts.</div></li>
		<li><div><strong>Partitioning scheme:</strong> the method that rearranges values and defines the resulting boundaries.</div></li>
		<li><div><strong>Implementation choices:</strong> how to choose a pivot, handle equal values, reduce recursion, or switch to another method for small parts.</div></li>
	</ul>
	<h3>How fast is quick sort?</h3>
	<p>
		When partitions are reasonably balanced, quicksort takes about <strong>O(n log n)</strong> time. Each level of partitioning scans the values in the current parts, and balanced splits produce about log n levels.
	</p>
	<p>
		If each pivot repeatedly leaves one very large part and one tiny part, the work can grow to <strong>O(n²)</strong>. Choosing a random pivot or using a median-of-three choice makes consistently poor splits less likely, though it does not change the worst-case bound for ordinary quicksort.
	</p>
	<p>
		Many partitioning schemes rearrange the array in place, using little extra working storage. The recursive calls still use a stack: about <strong>O(log n)</strong> space for balanced splits and up to <strong>O(n)</strong> for very uneven splits.
	</p>
	<h3>What is the central idea?</h3>
	<p>
		Counting how many values are smaller than a pivot can tell us where it belongs, but the count alone does not put the other values on the correct sides. Partitioning does that work. Once the pivot or dividing boundary separates the problem into smaller parts, the same reasoning can be applied again.
	</p>
	<p>
		Quicksort is therefore both a simple idea and a family of implementations. The pivot rule and partitioning scheme determine how that idea behaves on real data.
	</p>
	<h3>References</h3>
	<ul class="list-bullet content-list">
		<li><div><a class="content-link" href="https://www.cs.ox.ac.uk/files/6226/H2006%20-%20Historic%20Quicksort.pdf" target="_blank" rel="noopener noreferrer">C. A. R. Hoare, “Quicksort” (1962)</a></div></li>
		<li><div><a class="content-link" href="https://xlinux.nist.gov/dads/HTML/quicksort.html" target="_blank" rel="noopener noreferrer">NIST Dictionary of Algorithms and Data Structures: quicksort</a></div></li>
	</ul>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>
