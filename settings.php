<?php

	//YouTube Variables
	
	$video_id = 'Yr6tdh4ndSk';

	//Settings
	
	$num_count_start = 1;
	$num_videos = 12;
	$single_video_length = 30;
	$total_video_length = $single_video_length * $num_videos;
	
	$start_code = 0;
	$end_code = 360;
	
	$annotation_increment = 1;
	$annotation_updates = $single_video_length / $annotation_increment;
	
	$annotation_start_id = 237651319;
	
	$title_text_displayed = true;
	$button_text_displayed = true;
	
	//Dimensions
	$padding_gap = 1.42857143;
	$box_height = 5.0;
	$box_width = 15;
	$top_row_y = 86;
	$bottom_row_y = $top_row_y + $box_height + $padding_gap;
	
	//Fonts
	$title_font_size = 4.7;
	$label_font_size = 3.5;
	$label_selected_colour = 2384963;
	$label_colour = 16777215;
	
	//END OF SETTINGS
	
?>