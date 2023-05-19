<?php

$data = <<<'EOD'
	X, -9\\\10\100\-5\\\0\\\\, A
	Y, \\13\\1\, B
	Z, \\\5\\\-3\\2\\\800, C
EOD;

// Menghapus whitespace leading dan trailing pada data
$data = trim($data);

// Memisahkan string berdasarkan karakter pemisah \\
$lines = explode("\n", $data);

// inisialisasi array untuk menyimpan nilai yang di ekstraksi
$result = [];

// Proses pengulangan
foreach ($lines as $line) {
	// memisahkan data dengan koma
	$parts = explode(',', $line);
	
	// Ekstrak nilai individual dan hapus spasi kosong di awal/belakang
	$character = trim($parts[0]);
	$values = explode('\\', trim($parts[1]));
	$label = trim($parts[2]);

	// Proses pengulangan foreach
	foreach ($values as $index => $value) {
		// Skip empty values
		if (empty($value)) continue;
		
		// Ekstrak nomor setelah menghapus garis miring terbalik di depan/di belakang
		$number = trim($value, '\\');
		
		// Tambahkan nilai yang diekstraksi ke hasil array
		$result[] = $character . ', ' . $number . ', ' . $label . ', ' . ($index + 1);
	}
}

// output
foreach ($result as $line) {
	echo $line . "\n";
}

?>
