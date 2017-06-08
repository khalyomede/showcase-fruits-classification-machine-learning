<?php
	require_once __DIR__ . '/../app/bootstrap.php';

	use Phpml\Classification\KNearestNeighbors;
	use Khalyomede\Image;

	// Manually increment this value if you add more images
	$numberOfImages = 25;

	$samples = [];
	$labels = [];

	// One of two of the image is an orange, and the others are bananas
	// The labels are in french for your information
	for( $i = 1; $i <= $numberOfImages; $i++ ) {
		$image = __DIR__ . "/img/$i.jpg";
		$samples [] = Image::averageColor( $image );
		$image = null;
		$labels[] = $i % 2 == 0 ? 'orange' : 'banane';		
	}

	$classifier = new KNearestNeighbors();
	$classifier->train($samples, $labels);

	// This should be the image that is NOT in the samples 
	$inputImage = __DIR__ . '/img/26.jpg';
	$sample = Image::averageColor( $inputImage );

	// Here we go, may the odds be with this prediction !
	echo $classifier->predict($sample);
?>