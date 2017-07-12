<?php
	function open_charity_preprocess_html(&$vars) {
		$viewport = array(
			'#tag' => 'meta',
			'#attributes' => array(
				'name' => 'viewport',
				'content' => 'user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0',
			),
		);
		drupal_add_html_head($viewport, 'viewport');
	}
?>