<?php

	function t($text) {

		$lang = 'en'; // global variablein config

		// include translations file instead array here		

		$t = array();
		$t['en'] = array();
		$t['tr'] = array();

		$t['en']['title'] = 'hi';
		$t['tr']['title'] = 'hiklkl';
			// 
		if (isset($t[$lang][$text])) {
			echo $t[$lang][$text];
		} else {
			echo $text;
		}
			//
		// 
	}
