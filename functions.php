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

function build_label($video_number) {
	global $annotation_start_id,
	$start_code,
	$end_code,
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
	$label .= '<appearance bgAlpha="0.25" bgColor="0" borderAlpha="0.10000000149" effects="" fgColor="16777215" fontWeight="bold" textSize="4"/>';
	$label .= '</annotation>';
	
	return $label;
}
?>