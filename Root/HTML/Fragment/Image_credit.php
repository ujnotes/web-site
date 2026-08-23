<?php
	if(!isset($id) || $id === '')
		return;

	static $image_credits = null;
	if($image_credits === null) {
		$image_credits = array();
		$csv_path = dirname(__DIR__, 3).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'Image_credits.csv';
		if(!is_readable($csv_path))
			$csv_path = dirname(__DIR__, 3).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'Computer_image_credits.csv';
		if(!is_readable($csv_path))
			return;
		$fh = fopen($csv_path, 'r');
		if($fh === false)
			return;
		$header = fgetcsv($fh, 0, ',', '"', '\\');
		if($header === false) {
			fclose($fh);
			return;
		}
		while(($row = fgetcsv($fh, 0, ',', '"', '\\')) !== false) {
			if(count($row) !== count($header))
				continue;
			$record = array_combine($header, $row);
			if($record === false)
				continue;
			$slug = strtolower(trim($record['slug'] ?? ''));
			if($slug === '' || ($record['status'] ?? '') !== 'replaced')
				continue;
			$image_credits[$slug] = $record;
		}
		fclose($fh);
	}

	$record = $image_credits[strtolower($id)] ?? null;
	if($record === null)
		return;

	$h = function($value) {
		return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
	};
	$linked = function($label, $url) use ($h) {
		$label = trim($label);
		$url = trim($url);
		if($label === '')
			return '';
		if($url === '')
			return '<span>'.$h($label).'</span>';
		return '<a class="content-link cover-credit-link" href="'.$h($url).'" target="_blank" rel="noopener noreferrer">'.$h($label).'</a>';
	};

	$author = trim($record['author'] ?? '');
	$repository = trim($record['repository'] ?? '');
	$license = trim($record['license'] ?? '');
	$file_page = trim($record['file_page_url'] ?? '');
	$license_url = trim($record['license_url'] ?? '');

	$who = $linked($author, $file_page);
	$where = $linked($repository, $file_page);
	$how = $linked($license, $license_url);

	$line = '';
	if($who !== '' && $where !== '' && strcasecmp($author, $repository) !== 0)
		$line = $who.' / '.$where;
	else if($who !== '')
		$line = $who;
	else
		$line = $where;
	if($how !== '')
		$line = $line === '' ? $how : $line.' — '.$how;
	if($line === '')
		return;
?>
<p class='cover-credit'>
	<span class='cover-credit-anchor'>
		<button type='button' class='cover-credit-toggle' aria-expanded='false' aria-label='Image credit'>
			<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' width='14' height='14' aria-hidden='true' focusable='false'>
				<circle cx='8' cy='8' r='6.25' fill='none' stroke='currentColor' stroke-width='1.2'/>
				<circle cx='8' cy='5.2' r='0.85' fill='currentColor'/>
				<path fill='currentColor' d='M7.28 7.15h1.44v4.55H7.28z'/>
			</svg>
		</button>
		<span class='cover-credit-popup'><?php echo $line; ?></span>
	</span>
</p>
