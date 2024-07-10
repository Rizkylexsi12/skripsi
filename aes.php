<?php
class AES {
	public $output = "";

	// S-Box
	var $sBox = array(
		array(0x63, 0x7C, 0x77, 0x7B, 0xF2, 0x6B, 0x6F, 0xC5, 0x30, 0x01, 0x67, 0x2B, 0xFE, 0xD7, 0xAB, 0x76),
		array(0xCA, 0x82, 0xC9, 0x7D, 0xFA, 0x59, 0x47, 0xF0, 0xAD, 0xD4, 0xA2, 0xAF, 0x9C, 0xA4, 0x72, 0xC0),
		array(0xB7, 0xFD, 0x93, 0x26, 0x36, 0x3F, 0xF7, 0xCC, 0x34, 0xA5, 0xE5, 0xF1, 0x71, 0xD8, 0x31, 0x15),
		array(0x04, 0xC7, 0x23, 0xC3, 0x18, 0x96, 0x05, 0x9A, 0x07, 0x12, 0x80, 0xE2, 0xEB, 0x27, 0xB2, 0x75),
		array(0x09, 0x83, 0x2C, 0x1A, 0x1B, 0x6E, 0x5A, 0xA0, 0x52, 0x3B, 0xD6, 0xB3, 0x29, 0xE3, 0x2F, 0x84),
		array(0x53, 0xD1, 0x00, 0xED, 0x20, 0xFC, 0xB1, 0x5B, 0x6A, 0xCB, 0xBE, 0x39, 0x4A, 0x4C, 0x58, 0xCF),
		array(0xD0, 0xEF, 0xAA, 0xFB, 0x43, 0x4D, 0x33, 0x85, 0x45, 0xF9, 0x02, 0x7F, 0x50, 0x3C, 0x9F, 0xA8),
		array(0x51, 0xA3, 0x40, 0x8F, 0x92, 0x9D, 0x38, 0xF5, 0xBC, 0xB6, 0xDA, 0x21, 0x10, 0xFF, 0xF3, 0xD2),
		array(0xCD, 0x0C, 0x13, 0xEC, 0x5F, 0x97, 0x44, 0x17, 0xC4, 0xA7, 0x7E, 0x3D, 0x64, 0x5D, 0x19, 0x73),
		array(0x60, 0x81, 0x4F, 0xDC, 0x22, 0x2A, 0x90, 0x88, 0x46, 0xEE, 0xB8, 0x14, 0xDE, 0x5E, 0x0B, 0xDB),
		array(0xE0, 0x32, 0x3A, 0x0A, 0x49, 0x06, 0x24, 0x5C, 0xC2, 0xD3, 0xAC, 0x62, 0x91, 0x95, 0xE4, 0x79),
		array(0xE7, 0xC8, 0x37, 0x6D, 0x8D, 0xD5, 0x4E, 0xA9, 0x6C, 0x56, 0xF4, 0xEA, 0x65, 0x7A, 0xAE, 0x08),
		array(0xBA, 0x78, 0x25, 0x2E, 0x1C, 0xA6, 0xB4, 0xC6, 0xE8, 0xDD, 0x74, 0x1F, 0x4B, 0xBD, 0x8B, 0x8A),
		array(0x70, 0x3E, 0xB5, 0x66, 0x48, 0x03, 0xF6, 0x0E, 0x61, 0x35, 0x57, 0xB9, 0x86, 0xC1, 0x1D, 0x9E),
		array(0xE1, 0xF8, 0x98, 0x11, 0x69, 0xD9, 0x8E, 0x94, 0x9B, 0x1E, 0x87, 0xE9, 0xCE, 0x55, 0x28, 0xDF),
		array(0x8C, 0xA1, 0x89, 0x0D, 0xBF, 0xE6, 0x42, 0x68, 0x41, 0x99, 0x2D, 0x0F, 0xB0, 0x54, 0xBB, 0x16)
	);

	// Inverse S-Box
	var $invSBox = array(
		array(0x52, 0x09, 0x6A, 0xD5, 0x30, 0x36, 0xA5, 0x38, 0xBF, 0x40, 0xA3, 0x9E, 0x81, 0xF3, 0xD7, 0xFB),
		array(0x7C, 0xE3, 0x39, 0x82, 0x9B, 0x2F, 0xFF, 0x87, 0x34, 0x8E, 0x43, 0x44, 0xC4, 0xDE, 0xE9, 0xCB),
		array(0x54, 0x7B, 0x94, 0x32, 0xA6, 0xC2, 0x23, 0x3D, 0xEE, 0x4C, 0x95, 0x0B, 0x42, 0xFA, 0xC3, 0x4E),
		array(0x08, 0x2E, 0xA1, 0x66, 0x28, 0xD9, 0x24, 0xB2, 0x76, 0x5B, 0xA2, 0x49, 0x6D, 0x8B, 0xD1, 0x25),
		array(0x72, 0xF8, 0xF6, 0x64, 0x86, 0x68, 0x98, 0x16, 0xD4, 0xA4, 0x5C, 0xCC, 0x5D, 0x65, 0xB6, 0x92),
		array(0x6C, 0x70, 0x48, 0x50, 0xFD, 0xED, 0xB9, 0xDA, 0x5E, 0x15, 0x46, 0x57, 0xA7, 0x8D, 0x9D, 0x84),
		array(0x90, 0xD8, 0xAB, 0x00, 0x8C, 0xBC, 0xD3, 0x0A, 0xF7, 0xE4, 0x58, 0x05, 0xB8, 0xB3, 0x45, 0x06),
		array(0xD0, 0x2C, 0x1E, 0x8F, 0xCA, 0x3F, 0x0F, 0x02, 0xC1, 0xAF, 0xBD, 0x03, 0x01, 0x13, 0x8A, 0x6B),
		array(0x3A, 0x91, 0x11, 0x41, 0x4F, 0x67, 0xDC, 0xEA, 0x97, 0xF2, 0xCF, 0xCE, 0xF0, 0xB4, 0xE6, 0x73),
		array(0x96, 0xAC, 0x74, 0x22, 0xE7, 0xAD, 0x35, 0x85, 0xE2, 0xF9, 0x37, 0xE8, 0x1C, 0x75, 0xDF, 0x6E),
		array(0x47, 0xF1, 0x1A, 0x71, 0x1D, 0x29, 0xC5, 0x89, 0x6F, 0xB7, 0x62, 0x0E, 0xAA, 0x18, 0xBE, 0x1B),
		array(0xFC, 0x56, 0x3E, 0x4B, 0xC6, 0xD2, 0x79, 0x20, 0x9A, 0xDB, 0xC0, 0xFE, 0x78, 0xCD, 0x5A, 0xF4),
		array(0x1F, 0xDD, 0xA8, 0x33, 0x88, 0x07, 0xC7, 0x31, 0xB1, 0x12, 0x10, 0x59, 0x27, 0x80, 0xEC, 0x5F),
		array(0x60, 0x51, 0x7F, 0xA9, 0x19, 0xB5, 0x4A, 0x0D, 0x2D, 0xE5, 0x7A, 0x9F, 0x93, 0xC9, 0x9C, 0xEF),
		array(0xA0, 0xE0, 0x3B, 0x4D, 0xAE, 0x2A, 0xF5, 0xB0, 0xC8, 0xEB, 0xBB, 0x3C, 0x83, 0x53, 0x99, 0x61),
		array(0x17, 0x2B, 0x04, 0x7E, 0xBA, 0x77, 0xD6, 0x26, 0xE1, 0x69, 0x14, 0x63, 0x55, 0x21, 0x0C, 0x7D)
	);

	// Log table based on 0xe5
	var $ltable = array(
		0x00, 0xff, 0xc8, 0x08, 0x91, 0x10, 0xd0, 0x36,
		0x5a, 0x3e, 0xd8, 0x43, 0x99, 0x77, 0xfe, 0x18,
		0x23, 0x20, 0x07, 0x70, 0xa1, 0x6c, 0x0c, 0x7f,
		0x62, 0x8b, 0x40, 0x46, 0xc7, 0x4b, 0xe0, 0x0e,
		0xeb, 0x16, 0xe8, 0xad, 0xcf, 0xcd, 0x39, 0x53,
		0x6a, 0x27, 0x35, 0x93, 0xd4, 0x4e, 0x48, 0xc3,
		0x2b, 0x79, 0x54, 0x28, 0x09, 0x78, 0x0f, 0x21,
		0x90, 0x87, 0x14, 0x2a, 0xa9, 0x9c, 0xd6, 0x74,
		0xb4, 0x7c, 0xde, 0xed, 0xb1, 0x86, 0x76, 0xa4,
		0x98, 0xe2, 0x96, 0x8f, 0x02, 0x32, 0x1c, 0xc1,
		0x33, 0xee, 0xef, 0x81, 0xfd, 0x30, 0x5c, 0x13,
		0x9d, 0x29, 0x17, 0xc4, 0x11, 0x44, 0x8c, 0x80,
		0xf3, 0x73, 0x42, 0x1e, 0x1d, 0xb5, 0xf0, 0x12,
		0xd1, 0x5b, 0x41, 0xa2, 0xd7, 0x2c, 0xe9, 0xd5,
		0x59, 0xcb, 0x50, 0xa8, 0xdc, 0xfc, 0xf2, 0x56,
		0x72, 0xa6, 0x65, 0x2f, 0x9f, 0x9b, 0x3d, 0xba,
		0x7d, 0xc2, 0x45, 0x82, 0xa7, 0x57, 0xb6, 0xa3,
		0x7a, 0x75, 0x4f, 0xae, 0x3f, 0x37, 0x6d, 0x47,
		0x61, 0xbe, 0xab, 0xd3, 0x5f, 0xb0, 0x58, 0xaf,
		0xca, 0x5e, 0xfa, 0x85, 0xe4, 0x4d, 0x8a, 0x05,
		0xfb, 0x60, 0xb7, 0x7b, 0xb8, 0x26, 0x4a, 0x67,
		0xc6, 0x1a, 0xf8, 0x69, 0x25, 0xb3, 0xdb, 0xbd,
		0x66, 0xdd, 0xf1, 0xd2, 0xdf, 0x03, 0x8d, 0x34,
		0xd9, 0x92, 0x0d, 0x63, 0x55, 0xaa, 0x49, 0xec,
		0xbc, 0x95, 0x3c, 0x84, 0x0b, 0xf5, 0xe6, 0xe7,
		0xe5, 0xac, 0x7e, 0x6e, 0xb9, 0xf9, 0xda, 0x8e,
		0x9a, 0xc9, 0x24, 0xe1, 0x0a, 0x15, 0x6b, 0x3a,
		0xa0, 0x51, 0xf4, 0xea, 0xb2, 0x97, 0x9e, 0x5d,
		0x22, 0x88, 0x94, 0xce, 0x19, 0x01, 0x71, 0x4c,
		0xa5, 0xe3, 0xc5, 0x31, 0xbb, 0xcc, 0x1f, 0x2d,
		0x3b, 0x52, 0x6f, 0xf6, 0x2e, 0x89, 0xf7, 0xc0,
		0x68, 0x1b, 0x64, 0x04, 0x06, 0xbf, 0x83, 0x38
	);

	// Inverse log table
	var $atable = array(
		0x01, 0xe5, 0x4c, 0xb5, 0xfb, 0x9f, 0xfc, 0x12,
		0x03, 0x34, 0xd4, 0xc4, 0x16, 0xba, 0x1f, 0x36,
		0x05, 0x5c, 0x67, 0x57, 0x3a, 0xd5, 0x21, 0x5a,
		0x0f, 0xe4, 0xa9, 0xf9, 0x4e, 0x64, 0x63, 0xee,
		0x11, 0x37, 0xe0, 0x10, 0xd2, 0xac, 0xa5, 0x29,
		0x33, 0x59, 0x3b, 0x30, 0x6d, 0xef, 0xf4, 0x7b,
		0x55, 0xeb, 0x4d, 0x50, 0xb7, 0x2a, 0x07, 0x8d,
		0xff, 0x26, 0xd7, 0xf0, 0xc2, 0x7e, 0x09, 0x8c,
		0x1a, 0x6a, 0x62, 0x0b, 0x5d, 0x82, 0x1b, 0x8f,
		0x2e, 0xbe, 0xa6, 0x1d, 0xe7, 0x9d, 0x2d, 0x8a,
		0x72, 0xd9, 0xf1, 0x27, 0x32, 0xbc, 0x77, 0x85,
		0x96, 0x70, 0x08, 0x69, 0x56, 0xdf, 0x99, 0x94,
		0xa1, 0x90, 0x18, 0xbb, 0xfa, 0x7a, 0xb0, 0xa7,
		0xf8, 0xab, 0x28, 0xd6, 0x15, 0x8e, 0xcb, 0xf2,
		0x13, 0xe6, 0x78, 0x61, 0x3f, 0x89, 0x46, 0x0d,
		0x35, 0x31, 0x88, 0xa3, 0x41, 0x80, 0xca, 0x17,
		0x5f, 0x53, 0x83, 0xfe, 0xc3, 0x9b, 0x45, 0x39,
		0xe1, 0xf5, 0x9e, 0x19, 0x5e, 0xb6, 0xcf, 0x4b,
		0x38, 0x04, 0xb9, 0x2b, 0xe2, 0xc1, 0x4a, 0xdd,
		0x48, 0x0c, 0xd0, 0x7d, 0x3d, 0x58, 0xde, 0x7c,
		0xd8, 0x14, 0x6b, 0x87, 0x47, 0xe8, 0x79, 0x84,
		0x73, 0x3c, 0xbd, 0x92, 0xc9, 0x23, 0x8b, 0x97,
		0x95, 0x44, 0xdc, 0xad, 0x40, 0x65, 0x86, 0xa2,
		0xa4, 0xcc, 0x7f, 0xec, 0xc0, 0xaf, 0x91, 0xfd,
		0xf7, 0x4f, 0x81, 0x2f, 0x5b, 0xea, 0xa8, 0x1c,
		0x02, 0xd1, 0x98, 0x71, 0xed, 0x25, 0xe3, 0x24,
		0x06, 0x68, 0xb3, 0x93, 0x2c, 0x6f, 0x3e, 0x6c,
		0x0a, 0xb8, 0xce, 0xae, 0x74, 0xb1, 0x42, 0xb4,
		0x1e, 0xd3, 0x49, 0xe9, 0x9c, 0xc8, 0xc6, 0xc7,
		0x22, 0x6e, 0xdb, 0x20, 0xbf, 0x43, 0x51, 0x52,
		0x66, 0xb2, 0x76, 0x60, 0xda, 0xc5, 0xf3, 0xf6,
		0xaa, 0xcd, 0x9a, 0xa0, 0x75, 0x54, 0x0e, 0x01
	);

	var $w; 		// Key Schedule
	var $pos_w = 0; // posisi cursor key schedule
	var $Nb; 		// Blok pada Data AES
	var $Nk; 		// Blok pada Key AES
	var $Nr; 		// Jumlah Looping / Putaran
	var $log;

	# Parameter $z = key AES
	function AES($z) {
		$this->Nb = 4; // Blok data AES

		# Menghitung Panjang Key 
		# Panjang Key AES (16, 24, 32)
		# untuk mengelompokkan jenis AES (AES-128, AES-192, AES-256)
		$this->Nk = strlen($z) / 4;

		# Validasi untuk memfilter panjang key
		if ($this->Nk != 4 && $this->Nk != 6 && $this->Nk != 8)
			die("Key is " . ($this->Nk * 32) . " bits long. *not* 128, 192, or 256.");

		# Jumlah Putaran / looping pada proses enkripsi & dekripsi
		$this->Nr = $this->Nk + $this->Nb + 2;

		# Nb*(Nr+1) 32-bit words
		$this->w = array();
		# 2-D array of Nb colums and 4 rows
		$this->s = array(array());

		# memanggil function keyexpansion() yang ada di class AES
		$this->keyexpansion($z);
	}

	# function yang berhubungan : 
	#	addRoundKey(), subByte(), ShiftRow(), MixColumns()
	function encrypt($input) {
		# memecah inputan/data ke dalam bentuk String
		$data = str_split($input);

		$state = array();
		$count 	= 0;
		$this->pos_w = 0;

		for ($i = 0; $i < 4; $i++) {
			for ($j = 0; $j < 4; $j++) {
				if ($count < count($data)) {
					$this->state[$i][$j] = ord($data[$count]);
				} else {
					$this->state[$i][$j] = 0;
				}

				$count++;
			}
		}

		// AddRoundKey #1
		for ($i = 0; $i < 4; $i++) {
			for ($j = 0; $j < $this->Nb; $j++) {
				$this->state[$i][$j] = $this->state[$i][$j] ^ $this->w[$i][$this->pos_w + $j];
			}
		}
		$this->pos_w = $this->pos_w + $this->Nb;

		$this->output = "";

		# Proses Utama Enkripsi
		for ($i = 0; $i < $this->Nr - 1; $i++) {
			$putaran = $i + 1;
			$this->output .= "<br>Putaran ke-{$putaran}:<br>";

			$this->state = $this->SubByte($this->state);
			$this->output .= "SubByte:<br>" . json_encode($this->state) . "<br>";

			$this->state = $this->ShiftRow($this->state);
			$this->output .= "ShiftRow:<br>" . json_encode($this->state) . "<br>";

			$this->state = $this->MixColumns($this->state);
			$this->output .= "MixColumns:<br>" . json_encode($this->state) . "<br>";

			$this->state = $this->AddRoundKey($this->state);
			$this->output .= "AddRoundKey:<br>" . json_encode($this->state) . "<br>";
			$this->pos_w = $this->pos_w + $this->Nb;
		}
		$putaran = $i + 1;
		$this->output .= "<br>Putaran ke-{$putaran}:<br>";

		$this->state = $this->SubByte($this->state);
		$this->output .= "SubByte:<br>" . json_encode($this->state) . "<br>";

		$this->state = $this->ShiftRow($this->state);
		$this->output .= "ShiftRow:<br>" . json_encode($this->state) . "<br>";

		$this->state = $this->AddRoundKey($this->state);
		$this->output .= "AddRoundKey:<br>" . json_encode($this->state) . "<br>";

		# Proses mengubah karakter biasa menjadi Randomize ASCII
		$cipher = "";
		foreach ($this->state as $state) {
			foreach ($state as $data) {
				$cipher .= chr($data);
			}
		}
		return $cipher;
	}

	function decrypt($input) {
		$data = str_split($input);

		$state = array();
		$count 	= 0;
		$this->pos_w = (($this->Nr + 1) * 4);
		$modulo = 0;

		for ($i = 0; $i < 4; $i++) {
			for ($j = 0; $j < 4; $j++) {
				$this->state[$i][$j] = ord($data[$count]);
				$count++;
			}
		}

		// AddRoundKey #1
		$this->pos_w = ($this->pos_w) - 4;
		for ($i = 0; $i < 4; $i++) {
			$x = 0;
			for ($j = $this->pos_w; $j < (($this->Nr + 1) * 4); $j++) {

				$y = $x++;

				$this->state[$i][$y] = $this->state[$i][$y] ^ $this->w[$i][$j];
			}
		}

		for ($i = 0; $i < $this->Nr - 1; $i++) {

			$this->state = $this->InvShiftRow($this->state);

			$this->state = $this->InvSubByte($this->state);

			$this->pos_w = ($this->pos_w) - $this->Nb;
			$this->state = $this->AddRoundKey($this->state);

			$this->state = $this->InvMixColumns($this->state);
		}

		$this->state = $this->InvShiftRow($this->state);

		$this->state = $this->InvSubByte($this->state);

		$this->pos_w = ($this->pos_w) - $this->Nb;
		$this->state = $this->AddRoundKey($this->state);


		#Randomize ASCII
		$plain = "";
		foreach ($this->state as $state) {
			foreach ($state as $data) {
				$plain .= chr($data);
			}
		}

		return $plain;
	}

	# function untuk menggabungkan DATA denga KUNCI
	# State XOR Key Schedule
	function AddRoundKey($data) {
		$state = array();
		for ($i = 0; $i < 4; $i++) {

			$this->temp_w = $this->pos_w;
			for ($j = 0; $j < $this->Nb; $j++) {

				$state[$i][$j] = $data[$i][$j] ^ $this->w[$i][$this->pos_w + $j];
			}
		}
		return $state;
	}

	function SubByte($data) {
		$state = $data;

		for ($i = 0; $i < $this->Nb; $i++) {
			for ($j = 0; $j < 4; $j++) {
				$state[$i][$j] = $this->subword($state[$i][$j]);
			}
		}

		return $state;
	}

	function ShiftRow($data) {
		$state = array();

		for ($i = 0; $i < 4; $i++) {
			for ($j = 0; $j < $this->Nb; $j++) {

				$state[$i][$j] = $data[$i][($j + $i) % 4];
			}
		}

		return $state;
	}

	function MixColumns($data) {
		$state = array();

		for ($i = 0; $i < $this->Nb; $i++) {
			$state[0][$i] = $this->mult(0x02, $data[0][$i]) ^ $this->mult(0x03, $data[1][$i]) ^ $this->mult(0x01, $data[2][$i]) ^ $this->mult(0x01, $data[3][$i]);
			$state[1][$i] = $this->mult(0x01, $data[0][$i]) ^ $this->mult(0x02, $data[1][$i]) ^ $this->mult(0x03, $data[2][$i]) ^ $this->mult(0x01, $data[3][$i]);
			$state[2][$i] = $this->mult(0x01, $data[0][$i]) ^ $this->mult(0x01, $data[1][$i]) ^ $this->mult(0x02, $data[2][$i]) ^ $this->mult(0x03, $data[3][$i]);
			$state[3][$i] = $this->mult(0x03, $data[0][$i]) ^ $this->mult(0x01, $data[1][$i]) ^ $this->mult(0x01, $data[2][$i]) ^ $this->mult(0x02, $data[3][$i]);
		}

		return $state;
	}

	function InvSubByte($data) {
		$state = $data;

		for ($i = 0; $i < $this->Nb; $i++) {
			for ($j = 0; $j < 4; $j++) {
				$state[$i][$j] = $this->invSub($state[$i][$j]);
			}
		}

		return $state;
	}

	function InvShiftRow($data) {
		$state = array();

		for ($i = 0; $i < 4; $i++) {
			for ($j = 0; $j < $this->Nb; $j++) {

				$state[$i][($j + $i) % 4] = $data[$i][$j];
			}
		}

		return $state;
	}

	function InvMixColumns($data) {
		$state = array();

		for ($i = 0; $i < $this->Nb; $i++) {
			$state[0][$i] = $this->mult(0x0e, $data[0][$i]) ^ $this->mult(0x0b, $data[1][$i]) ^ $this->mult(0x0d, $data[2][$i]) ^ $this->mult(0x09, $data[3][$i]);
			$state[1][$i] = $this->mult(0x09, $data[0][$i]) ^ $this->mult(0x0e, $data[1][$i]) ^ $this->mult(0x0b, $data[2][$i]) ^ $this->mult(0x0d, $data[3][$i]);
			$state[2][$i] = $this->mult(0x0d, $data[0][$i]) ^ $this->mult(0x09, $data[1][$i]) ^ $this->mult(0x0e, $data[2][$i]) ^ $this->mult(0x0b, $data[3][$i]);
			$state[3][$i] = $this->mult(0x0b, $data[0][$i]) ^ $this->mult(0x0d, $data[1][$i]) ^ $this->mult(0x09, $data[2][$i]) ^ $this->mult(0x0e, $data[3][$i]);
		}

		return $state;
	}

	function mult($a, $b) {
		$sum = $this->ltable[$a] + $this->ltable[$b];
		$sum %= 255;
		// Get the antilog
		$sum = $this->atable[$sum];
		return ($a == 0 ? 0 : ($b == 0 ? 0 : $sum));
	}

	# function untuk melakukan Generate Key
	function keyexpansion($key) {

		# memecah String menjadi Array per karakter
		$arrkey = str_split($key);
		# variable untuk kursor index String Key
		$count 	= 0;

		# konstanta Rcon
		static $rcon = array(
			array(0x01, 0x00, 0x00, 0x00),
			array(0x02, 0x00, 0x00, 0x00),
			array(0x04, 0x00, 0x00, 0x00),
			array(0x08, 0x00, 0x00, 0x00),
			array(0x10, 0x00, 0x00, 0x00),
			array(0x20, 0x00, 0x00, 0x00),
			array(0x40, 0x00, 0x00, 0x00),
			array(0x80, 0x00, 0x00, 0x00),
			array(0x1b, 0x00, 0x00, 0x00),
			array(0x36, 0x00, 0x00, 0x00)
		);

		# Salin Key ke variable w (Key Schedule)
		# ord() : untuk mendapatkan nilai ASCII dari suatu karakter
		for ($i = 0; $i < $this->Nb; $i++) {
			for ($j = 0; $j < 4; $j++) {
				$this->w[$i][$j] = ord($arrkey[$count]);
				$count++;
			}
		}

		# posisi cursor rcon()
		$count_rcon = 0;
		# proses Generate Key
		# function yang berhubungan : subword() , rotword()
		for ($i = 4; $i < 44; $i++) {
			for ($j = 0; $j < 4; $j++) {
				# mengambil nilai columns w(i-1)
				$wmin1	= $this->w[$j][$i - 1];
				# mengambil nilai columns w(i-4)
				$wmin4	= $this->w[$j][$i - 4];

				# melakukan pengecekan apakah i merupakan awal dari block
				if ($i % 4 == 0) {
					# Proses rotword()
					if ($j != 3)
						$wmin1	= $this->w[$j + 1][$i - 1];
					else
						$wmin1	= $this->w[0][$i - 1];

					# melakukan XOR pada : w(i-1) XOR w(i-4) XOR rcon()
					# w(i-1) mengalami proses subword() : pertukaran dengan data dari table sBox
					$this->w[$j][$i] = $this->subword($wmin1) ^ $wmin4 ^ $rcon[$count_rcon][$j];

					# cursor rcon() berpindah ke rcon selanjutnya
					if ($j == 3) $count_rcon++;
				} else {
					# bukan merupakan awal block
					# melakukan XOR pada : w(i-1) XOR w(i-4)
					$this->w[$j][$i] = $wmin1 ^ $wmin4;
				}
			}
		}
		# mengembalikan nilai array w[][] setelah mengalami proses keyexpansion
		return $this->w;
	}

	function rotword($w, $row, $col) {
		return (($row == 0) ? $w[3][$col] : $w[$row - 1][$col]);
	}

	function subword($byte) {
		# menghitung panjang inputan yang sudah dikonversikan menjadi HEX
		# jika panjang inputan 2
		if (strlen(dechex($byte)) == 2) {
			# konversi inputan kedalam bentuk HEX
			# memecah inputan menjadi array
			$hex 	= str_split(dechex($byte));

			# karakter ke-1 menjadi index baris
			$r		= hexdec($hex[0]);
			# karakter ke-2 menjadi index kolom
			$c		= hexdec($hex[1]);
		} else {
			# jika panjang inputan 1
			$r = 0;
			# inputan menjadi index kolom
			$c = $byte;
		}

		# mengembalikan nilai table sBox berdasarkan index baris & kolom
		# r : baris | c : kolom
		return $this->sBox[$r][$c];
	}

	function invSub($byte) {
		if (strlen(dechex($byte)) == 2) {
			$hex 	= str_split(dechex($byte));
			$r		= hexdec($hex[0]);
			$c		= hexdec($hex[1]);
		} else {
			$r = 0;
			$c = $byte;
		}
		return $this->invSBox[$r][$c];
	}
}
