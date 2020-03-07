jQuery(document).ready(function($) {
	$('.iriska-tab:first-child').addClass('iriska-tab-active');
	$('.iriska-tab').on('click', function() {
		var data_tab_id = $(this).attr('data-tab-id');
		$('.iriska-tabs-content:not([data-content-id^="' + data_tab_id + '"])').hide();
		$('.iriska-tabs-content[data-content-id^="' + data_tab_id + '"]').fadeIn(500);
		$('.iriska-tab:not([data-tab-id^="' + data_tab_id + '"])').removeClass('iriska-tab-active');
		$(this).addClass('iriska-tab-active');
	});
});