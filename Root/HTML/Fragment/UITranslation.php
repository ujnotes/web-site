<?php

function getUITranslation($key, $lang = 'en') {
	static $translations = NULL;

	if ($translations === NULL) {
		$translations = array();
		$translations_path = __DIR__.'/../../../Config/UITranslations.tsv';

		if (file_exists($translations_path)) {
			$fHandle = fopen($translations_path, 'r');
			$header = fgetcsv($fHandle, 0, "\t", "\"", "\\");
			$languages = array_slice($header, 1);

			while (($row = fgetcsv($fHandle, 0, "\t", "\"", "\\")) !== FALSE) {
				if (!isset($row[0])) continue;
				foreach ($languages as $index => $language) {
					if (isset($row[$index + 1])) {
						$translations[$row[0]][$language] = $row[$index + 1];
					}
				}
			}
			fclose($fHandle);
		}
	}

	if (isset($translations[$key][$lang]) && $translations[$key][$lang] !== '') {
		return $translations[$key][$lang];
	}
	if (isset($translations[$key]['en'])) {
		return $translations[$key]['en'];
	}
	return $key;
}

?>
