<div id='message'>
		<p>
		Prices are provided for reference and guidance only and may be out of date. Check the original provider’s official pricing for current rates and billing terms.
	</p>
<section lang="en" class="frontend-component no-auto-cover" data-component="model-pricing" data-source="/resource/data/model-pricing.json" data-component-script="/resource/components/model-pricing.js" data-component-style="/resource/components/model-pricing.css"><p data-component-status role="status">Loading interactive comparison…</p><noscript><p>Enable JavaScript to use this interactive comparison.</p></noscript></section>
	<p>
		Compare selected model offerings in the table and chart. The same model can have different prices through different providers or routes. Click a current row or chart bar to select that offering in the calculator. Provider tags can be combined to filter the comparison.
	</p>
	<p>
		Suggested uses are editorial starting points based on the linked model guides. Test the model on your own workload before choosing it.
	</p>
	<h3>How is the estimate calculated?</h3>
	<p>
		Prices are in US dollars per one million tokens. For a simple uncached workload:
	</p>
	<pre class='indent-c'><code class='block'>Cost in USD =
  requests × (input tokens per request × input rate
  + billable output tokens per request × output rate)
  ÷ 1,000,000</code></pre>
	<p>
		The estimate date selects a published rate for that date, including scheduled price changes recorded in the data. It is not a prediction of future availability or unannounced prices. Batch estimates use the model's own published batch rates.
	</p>
	<p>
		Non-USD prices use the latest available daily reference exchange rate from <a class="content-link" href="https://frankfurter.dev/" target="_blank" rel="noopener noreferrer">Frankfurter</a>. The rate source and date are shown, and you can enter a manual override. The exchange rate is separate from the model-price estimate date. Bank conversion fees and tax are excluded.
	</p>
	<h3>What should I check before choosing a model?</h3>
	<p>
		The lowest estimate is the cheapest listed token cost for your inputs. Test the models on a representative sample to compare the cost of obtaining a usable answer.
	</p>
	<p>
		Different models can turn the same text or image into different token counts. Use measured usage where possible, and include any billable reasoning tokens in your output budget. The calculator covers uncached input and output only. Cache writes, cache reads, storage, search, tools, tax and retries need separate accounting.
	</p>
	<p>
		Check context limits, output limits and account access with the provider. A published price does not guarantee access. Long-prompt rates are applied where they are recorded; a short-context row should not be treated as a quote for an unsupported context length.
	</p>
	<h3>Where do the prices come from?</h3>
	<p>
		Each priced row links to its official source and shows when that source was checked. A checked date is different from the date a rate takes effect. Prices are reviewed manually; this is not a live provider feed.
	</p>
	<p>
		Retired models remain in the archive and are excluded from active estimates. A deprecation notice does not mean an endpoint has already shut down. To-be-released models require an official announcement; unknown prices remain unpriced.
	</p>
	<p>
		The same maintained dataset supplies the comparison in every language. Use “Download price data” to inspect it. Recheck the official source before committing to a large workload.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>