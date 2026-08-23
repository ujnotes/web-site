<?php
	function siteImageDisplayRow($id) {
		static $rows = null;
		if ($rows === null) {
			$rows = array();
			$tsv_path = dirname(__DIR__, 3).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'Image_display.tsv';
			if (!is_readable($tsv_path))
				return null;
			$fh = fopen($tsv_path, 'r');
			if ($fh === false)
				return null;
			$header = fgetcsv($fh, 0, "\t", '"', '\\');
			if ($header === false) {
				fclose($fh);
				return null;
			}
			$header = array_map('strtolower', $header);
			while (($line = fgetcsv($fh, 0, "\t", '"', '\\')) !== false) {
				if (!$line || (isset($line[0]) && $line[0] === ''))
					continue;
				$record = array();
				for ($i = 0; $i < count($header); $i++)
					$record[$header[$i]] = isset($line[$i]) ? $line[$i] : '';
				$slug = strtolower(trim($record['slug'] ?? ''));
				if ($slug === '')
					continue;
				$rows[$slug] = $record;
			}
			fclose($fh);
		}

		$key = strtolower(trim((string)$id));
		return $rows[$key] ?? null;
	}
