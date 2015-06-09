<?php

include 'settings.php';
include 'resources.php';
include 'functions.php';

header('Content-Type: text/xml');

$xml_string = '';
$xml_string = $xml_start;

if($title_text_displayed) {
	$xml_string .= $title;
}


for ($vid = 1; $vid <= $num_videos; $vid++) {
	
	if($button_text_displayed){
		if(($vid - $num_count_start) == 0) {
			$xml_string .= build_label(1, 0, $single_video_length, true);
			$xml_string .= build_label(1, $single_video_length, $total_video_length, false);
		} else if(($vid - $num_videos) == 0) {
			$xml_string .= build_label($num_videos, 0, ($num_videos - 1) * $single_video_length, false);
			$xml_string .= build_label($num_videos, ($num_videos - 1) * $single_video_length, $total_video_length, true);
		} else {
			$before_count = $vid - $num_count_start;
			$before_end_time = $before_count * $single_video_length;
			$after_start_time = $vid * $single_video_length;
			$xml_string .= build_label($vid, 0, $before_end_time, false);
			$xml_string .= build_label($vid, $before_end_time, ($before_end_time + $single_video_length), true);
			$xml_string .= build_label($vid, $after_start_time, $total_video_length, false);
		}
	}
	
	$seconds_before_video = ($vid * $single_video_length) - $single_video_length;
	$seconds_after_video = $total_video_length - ($seconds_before_video + $single_video_length);
	
	$videos_after = $num_videos - $vid;
	$videos_before = $vid - $num_count_start;
	
	$annotation_updates = $single_video_length / $annotation_increment;
	
	for($n_bs = 1; $n_bs <= $annotation_updates; $n_bs++) {
		for($t_h = 1; $t_h <= $videos_after; $t_h++) {
			
/*
			$xml_string .= '<TEXT>';
			$xml_string .= 'Video=' . $vid . ' ';
			$xml_string .= 'Video_Number=' . ($t_h + $vid) . ' ';
			$xml_string .= 'Time_Point=' . ((($t_h * $single_video_length) + ($n_bs * $annotation_increment)) + $seconds_before_video) . ' ';
			$xml_string .= 'Start_Code=' . ((($n_bs * $annotation_increment) + ($vid - 1) * $single_video_length) - 2 ). ' ';
			$xml_string .= 'End_Code=' . (($n_bs * $annotation_increment) + ($vid - 1) * $single_video_length) . ' ';
			$xml_string .= '</TEXT>';
*/

			
			$xml_string .= build_button(
				($t_h + $vid),
				((($t_h * $single_video_length) + ($n_bs * $annotation_increment)) + $seconds_before_video),
				((($n_bs * $annotation_increment) + ($vid - 1) * $single_video_length) - 2 ),
				(($n_bs * $annotation_increment) + ($vid - 1) * $single_video_length)
			);
			
			
		}
		
/*
		if($vid != 1) {
			for($t_f = 1; $t_f <= $videos_before; $t_f++) {
				$xml_string .= '<TEXT>';
				$xml_string .= 'Video=' . $vid . ' ';
				$xml_string .= 'Video_Number=' . (($vid - $t_f) - $vid) . ' ';
				$xml_string .= 'Time_Point=' . (($n_bs * $annotation_increment) + $seconds_before_video) . ' ';
				$xml_string .= '</TEXT>';
			}
		}
*/
	}
}


// $xml_string = $xml_start . $title . build_label(1) . build_button(1, 0, 0, 60) . build_label(2) . build_button(2, 0, 0, 60) . build_label(3) . build_button(3, 0, 0, 60) . build_label(4) . build_button(4, 0, 0, 60) .build_label(5) . build_button(5, 0, 0, 60) . build_label(6) . build_button(6, 0, 0, 60) . build_label(7) . build_button(7, 0, 0, 60) . build_label(8) . build_button(8, 0, 0, 60) . build_label(9) . build_button(9, 0, 0, 60) . build_label(10) . build_button(10, 0, 0, 60) . build_label(11) . build_button(11, 0, 0, 60) . build_label(12) . build_button(12, 0, 0, 60) . $xml_end;

$xml_string .= $xml_end;

print_r($xml_string);

?>