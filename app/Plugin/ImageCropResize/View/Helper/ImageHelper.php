<?php
App::uses('AppHelper', 'View/Helper');

class ImageHelper extends AppHelper {

	public $helpers = array('Html');

/**
 * Default Constructor
 *
 * @param View $View The View this helper is being attached to.
 * @param array $settings Configuration settings for the helper.
 */
	public function __construct(View $View, $settings = array()) {
		parent::__construct($View, $settings);

		$explode = explode(DS,realpath(__DIR__ . DS . '..' . DS . '..'));
		$pluginName = end($explode);

		App::uses('Image', $pluginName . '.Lib');
	}

/**
 * Automatically resizes and/or crops an image and returns formatted IMG tag or URL
 *
 * @param string $path Path to the image file
 * @param array $options
 *
 * @return mixed Image tag or URL of the resized/cropped image
 *
 * @access public
 */
	public function resize($path, $options = array()) {
		$options = array_merge(array(
			'width'				=> null,	//Width of the new Image, Default is Original Width
			'height'			=> null,	//Height of the new Image, Default is Original Height
			'aspect'			=> true,	//Keep aspect ratio
			'crop'				=> false,	//Crop the Image
			'cropvars'			=> array(), //How to crop the image, array($startx, $starty, $endx, $endy);
			'autocrop'			=> false,	//Auto crop the image, calculate the crop according to the size and crop from the middle
			'htmlAttributes'	=> array(),	//Html attributes for the image tag
			'quality'			=> 90,		//Quality of the image
			'urlOnly'			=> false,		//Return only the URL or return the Image tag
			'control'			=> null
		), $options);

		foreach ($options as $key => $option) {
			${$key} = $option;
		}

		$relFile = Image::resize($path, $options);

		//Return only the URL
		if ($options['urlOnly']) {
			return $relFile;
		}
		$array = explode(DS, $relFile);			    	
		$array1 = explode("/", $array[0]);
		end($array1);
		$array2 = explode("_", $array1[key($array1)]);
		$array3 = explode("x", $array2[0]);
		if(isset($array3[1]) && $array3[1]<$options['height']){
			$selisihH=$options['height'] - $array3[1];
			$padTop=$selisihH/2;
			$padBot=$selisihH-$padTop;
			if(isset($options['htmlAttributes']['style']))
			$tamp=$options['htmlAttributes']['style'];
			else
				$tamp='';
			$options['htmlAttributes']=array('style'=>$tamp.'padding-top:'.$padTop.'px;'.
															'padding-bottom:'.$padBot.'px;margin:auto;display: block;');		
		}
		return $this->Html->image($relFile,$options['htmlAttributes']);
	}
}
