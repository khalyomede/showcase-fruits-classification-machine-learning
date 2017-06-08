<?php
	namespace Khalyomede;

	class Image {
		public static function averageColor( $source ) {
			$image = imagecreatefromjpeg( $source );
			$x = imagesx($image);
			$y = imagesy($image);
			$tmp_img = ImageCreateTrueColor(1,1);
			ImageCopyResampled($tmp_img,$image,0,0,0,0,1,1,$x,$y);
			$rgb = ImageColorAt($tmp_img,0,0);
			$r   = ($rgb >> 16) & 0xFF;
			$g = ($rgb >> 8) & 0xFF;
			$b  =  $rgb & 0xFF;

			return [$r, $g, $b];
		}
	}
?>