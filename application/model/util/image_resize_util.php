<?php

/*
 *  Class: ImageResizeUtil
 *   File: application/model/util/image_resize_util.php
 * Author: David Chau
 * 
 * 
 * A utility class to resize images to 175 x 175 for thumbnail purposes
 * 
 * 
 * Copyright (C) 2016, David Chau
 */

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