<?php

class DecodeMYJWT {
	public function decode_jwt($token) {

			$data = explode('.', $token[0]);
			if (count($data) < 2) {
					return null;
			}

			$payload = $data[1];

			$remainder = strlen($payload) % 4;
			if ($remainder > 0) {
					$payload .= str_repeat('=', 4 - $remainder);
			}

			$decoded = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);
			return isset($decoded['user_id']) ? $decoded['user_id'] : null;
	}

}
