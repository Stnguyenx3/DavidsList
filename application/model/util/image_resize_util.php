<?php

class ImageResizeUtil {
	public static function resizeImage($largeImage) {
		$image = imagecreatefromstring(base64_decode($largeImage));
		$image = imagescale($image, 175, 175);

		ob_start();
		imagejpeg($image);
		$contents = ob_get_contents();
		ob_end_clean();
		imagedestroy($image);
		
		return $contents;
	}
} 