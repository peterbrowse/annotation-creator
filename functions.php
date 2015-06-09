<?php
	
function timecode_generator($seconds_in) {
	$seconds_out = gmdate("H:i:s", $seconds_in);
	
	return $seconds_out;
}

function build_button($video_number, $time_point, $start_code, $end_code) {
	global $annotation_start_id,
	$video_id,
	${'h_' . $video_number},
	${'w_' . $video_number},
	${'x_' . $video_number},
	${'y_' . $video_number};

	$button = '<annotation author="" id="annotation_' . ++$annotation_start_id  . '" style="" type="highlight">';
	$button .= '<segment>';
	$button .= '<movingRegion type="rect">';
	$button .= '<rectRegion d="0" h="'. ${'h_' . $video_number} .'" t="' . timecode_generator($start_code) . '" w="'. ${'w_' . $video_number} .'" x="'. ${'x_' . $video_number} .'" y="'. ${'y_' . $video_number} .'"/>';
	$button .= '<rectRegion d="0" h="'. ${'h_' . $video_number} .'" t="' . timecode_generator($end_code) . '" w="'. ${'w_' . $video_number} .'" x="'. ${'x_' . $video_number} .'" y="'. ${'y_' . $video_number} .'"/>';
	$button .= '</movingRegion>';
	$button .= '</segment>';
	$button .= '<action trigger="click" type="openUrl">';
	$button .= '<url link_class="1" target="current" value="http://www.youtube.com/watch?v='. $video_id .'#t='.$time_point.'s"/>';
	$button .= '</action>';
	$button .= '<appearance/>';
	$button .= '</annotation>';
	
	return $button;
}

function build_label($video_number, $start_code, $end_code, $button_selected) {
	
	global $annotation_start_id,
	$label_font_size,
	$label_selected_colour,
	$label_colour,
	${'label_' . $video_number},
	${'h_' . $video_number},
	${'w_' . $video_number},
	${'x_' . $video_number},
	${'y_' . $video_number};
	
	$label = '<annotation author="" id="annotation_'. ++$annotation_start_id .'" style="title" type="text">';
	$label .= '<TEXT>'. ${'label_' . $video_number} .'</TEXT>';
	$label .= '<segment>';
	$label .= '<movingRegion type="rect">';
	$label .= '<rectRegion d="0" h="'. ${'h_' . $video_number} .'" t="' . timecode_generator($start_code) . '" w="'. ${'w_' . $video_number} .'" x="'. ${'x_' . $video_number} .'" y="'. ${'y_' . $video_number} .'"/>';
	$label .= '<rectRegion d="0" h="'. ${'h_' . $video_number} .'" t="' . timecode_generator($end_code) . '" w="'. ${'w_' . $video_number} .'" x="'. ${'x_' . $video_number} .'" y="'. ${'y_' . $video_number} .'"/>';
	$label .= '</movingRegion>';
	$label .= '</segment>';
	if($button_selected) {
		$label .= '<appearance bgAlpha="0.25" bgColor="0" borderAlpha="1" effects="" fgColor="'. $label_selected_colour .'" fontWeight="" textSize="'. $label_font_size .'"/>';
	} else {
		$label .= '<appearance bgAlpha="0.25" bgColor="0" borderAlpha="1" effects="" fgColor="'. $label_colour .'" fontWeight="" textSize="'. $label_font_size .'"/>';
	}
	$label .= '</annotation>';
	
	return $label;
}
?>