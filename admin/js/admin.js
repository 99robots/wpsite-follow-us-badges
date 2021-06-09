jQuery(function($) {

	// Order

	$("#twitter").hide();
	$("#facebook").hide();
	$("#google").hide();
	$("#linkedin").hide();
	$("#pinterest").hide();
	$("#youtube").hide();
	$("#tumblr").hide();

	if ($("#wpsite_follow_us_settings_twitter_active").is(":checked")) {
		$("#twitter").show();
	}

	if ($("#wpsite_follow_us_settings_facebook_active").is(":checked")) {
		$("#facebook").show();
	}

	if ($("#wpsite_follow_us_settings_google_active").is(":checked")) {
		$("#google").show();
	}

	if ($("#wpsite_follow_us_settings_linkedin_active").is(":checked")) {
		$("#linkedin").show();
	}

	if ($("#wpsite_follow_us_settings_pinterest_active").is(":checked")) {
		$("#pinterest").show();
	}

	if ($("#wpsite_follow_us_settings_youtube_active").is(":checked")) {
		$("#youtube").show();
	}

	if ($("#wpsite_follow_us_settings_tumblr_active").is(":checked")) {
		$("#tumblr").show();
	}

	$("#sortable").sortable({
		revert: true,
		update: function (event, ui) {

	        var data = {
				action: 'wpsite_save_order',
				order: $(this).sortable('toArray')
			};

	        // POST to server using $.post or $.ajax
	        $.post(ajaxurl, data, function(response) {});
	    }
	});

	// Activated

    if ($('#wpsite_follow_us_settings_twitter_active').is(':checked')) {
        $("#wpsite_div_twitter .tw-hideable").show();
        $("#twitter").show();
	} else {
		$("#wpsite_div_twitter .tw-hideable").hide();
		$("#twitter").hide();
	}

	if ($('#wpsite_follow_us_settings_twitter_args_link').is(':checked')) {
		$('.tw-hideable-link-only').hide();
	} else {
		$('.tw-hideable-link-only').show();
	}

	$("#wpsite_follow_us_settings_twitter_active").on("change", function(){

		$("#wpsite_div_twitter .tw-hideable").hide();
		$("#twitter").hide();

		if ($(this).is(":checked")) {
			$("#wpsite_div_twitter .tw-hideable").show();
			$("#twitter").show();
		}
	});

	$("#wpsite_follow_us_settings_facebook_active").on("change", function(){

		$("#wpsite_div_facebook .fb-hideable").hide();
		$("#facebook").hide();

		if ($(this).is(":checked")) {
			$("#wpsite_div_facebook .fb-hideable").show();
			$("#facebook").show();
		}
	});

	$("#wpsite_follow_us_settings_google_active").on("change", function(){

		$("#wpsite_div_google .g-hideable").hide();
		$("#google").hide();

		if ($(this).is(":checked")) {
			$("#wpsite_div_google .g-hideable").show();
			$("#google").show();
		}
	});

	$("#wpsite_follow_us_settings_linkedin_active").on("change", function(){

		$("#wpsite_div_linkedin .li-hideable").hide();
		$("#linkedin").hide();

		if ($(this).is(":checked")) {
			$("#wpsite_div_linkedin .li-hideable").show();
			$("#linkedin").show();
		}
	});

	$("#wpsite_follow_us_settings_pinterest_active").on("change", function(){

		$("#wpsite_div_pinterest .pt-hideable").hide();
		$("#pinterest").hide();

		if ($(this).is(":checked")) {
			$("#wpsite_div_pinterest .pt-hideable").show();
			$("#pinterest").show();
		}
	});

	$("#wpsite_follow_us_settings_youtube_active").on("change", function(){

		$("#wpsite_div_youtube .yt-hideable").hide();
		$("#youtube").hide();

		if ($(this).is(":checked")) {
			$("#wpsite_div_youtube .yt-hideable").show();
			$("#youtube").show();
		}
	});

	$("#wpsite_follow_us_settings_tumblr_active").on("change", function(){

		$("#wpsite_div_tumblr .tb-hideable").hide();
		$("#tumblr").hide();

		if ($(this).is(":checked")) {
			$("#wpsite_div_tumblr .tb-hideable").show();
			$("#tumblr").show();
		}
	});

	// Link Only

	$("#wpsite_follow_us_settings_twitter_args_link").on("change", function(){

		$(".tw-hideable-link-only").show();

		if ($(this).is(":checked")) {
			$(".tw-hideable-link-only").hide();
		}
	});

	$("#wpsite_follow_us_settings_facebook_args_link").on("change", function(){

		$(".fb-hideable-link-only").show();

		if ($(this).is(":checked")) {
			$(".fb-hideable-link-only").hide();
		}
	});

	$("#wpsite_follow_us_settings_google_args_link").on("change", function(){

		$(".g-hideable-link-only").show();

		if ($(this).is(":checked")) {
			$(".g-hideable-link-only").hide();
		}
	});

	$("#wpsite_follow_us_settings_linkedin_args_link").on("change", function(){

		$(".li-hideable-link-only").show();

		if ($(this).is(":checked")) {
			$(".li-hideable-link-only").hide();
		}
	});

	$("#wpsite_follow_us_settings_pinterest_args_link").on("change", function(){

		$(".pt-hideable-link-only").show();

		if ($(this).is(":checked")) {
			$(".pt-hideable-link-only").hide();
		}
	});

	$("#wpsite_follow_us_settings_youtube_args_link").on("change", function(){

		$(".yt-hideable-link-only").show();

		if ($(this).is(":checked")) {
			$(".yt-hideable-link-only").hide();
		}
	});
	$("#wpsite_follow_us_settings_tumblr_args_link").on("change", function(){

		$(".tb-hideable-link-only").show();

		if ($(this).is(":checked")) {
			$(".tb-hideable-link-only").hide();
		}
	});

    // Refresh on nav click

	$("ul.nav li a").on('click', function() {

	    // LinkedIn User Type

		$(".wpsite_follow_us_settings_linkedin_args_user_type").hide();
		$(".wpsite_follow_us_settings_linkedin_args_user_type_" + $("#wpsite_follow_us_settings_linkedin_args_type").val()).show();

		if ($('#wpsite_follow_us_settings_twitter_active').is(':checked')) {
			$("#wpsite_div_twitter .tw-hideable").show();
		} else {
			$("#wpsite_div_twitter .tw-hideable").hide();
		}

		if ($('#wpsite_follow_us_settings_facebook_active').is(':checked')) {
			$("#wpsite_div_facebook .fb-hideable").show();
		} else {
			$("#wpsite_div_facebook .fb-hideable").hide();
		}

		if ($('#wpsite_follow_us_settings_google_active').is(':checked')) {
			$("#wpsite_div_google .g-hideable").show();
		} else {
			$("#wpsite_div_google .g-hideable").hide();
		}
		if ($('#wpsite_follow_us_settings_linkedin_active').is(':checked')) {
			$("#wpsite_div_linkedin .li-hideable").show();
		} else {
			$("#wpsite_div_linkedin .li-hideable").hide();
		}
		if ($('#wpsite_follow_us_settings_pinterest_active').is(':checked')) {
			$("#wpsite_div_pinterest .pt-hideable").show();
		} else {
			$("#wpsite_div_pinterest .pt-hideable").hide();
		}

		if ($('#wpsite_follow_us_settings_youtube_active').is(':checked')) {
			$("#wpsite_div_youtube .yt-hideable").show();
		} else {
			$("#wpsite_div_youtube .yt-hideable").hide();
		}

		if ($('#wpsite_follow_us_settings_tumblr_active').is(':checked')) {
			$("#wpsite_div_tumblr .tb-hideable").show();
		} else {
			$("#wpsite_div_tumblr .tb-hideable").hide();
		}

		// Link Only

		if ($('#wpsite_follow_us_settings_twitter_args_link').is(':checked')) {
			$('.tw-hideable-link-only').hide();
		} else {
			$('.tw-hideable-link-only').show();
		}

		if ($('#wpsite_follow_us_settings_facebook_args_link').is(':checked')) {
			$('.fb-hideable-link-only').hide();
		} else {
			$('.fb-hideable-link-only').show();
		}

		if ($('#wpsite_follow_us_settings_google_args_link').is(':checked')) {
			$('.g-hideable-link-only').hide();
		} else {
			$('.g-hideable-link-only').show();
		}

		if ($('#wpsite_follow_us_settings_linkedin_args_link').is(':checked')) {
			$('.li-hideable-link-only').hide();
		} else {
			$('.li-hideable-link-only').show();
		}

		if ($('#wpsite_follow_us_settings_pinterest_args_link').is(':checked')) {
			$('.pt-hideable-link-only').hide();
		} else {
			$('.pt-hideable-link-only').show();
		}

		if ($('#wpsite_follow_us_settings_youtube_args_link').is(':checked')) {
			$('.yt-hideable-link-only').hide();
		} else {
			$('.yt-hideable-link-only').show();
		}

		if ($('#wpsite_follow_us_settings_tumblr_args_link').is(':checked')) {
			$('.tb-hideable-link-only').hide();
		} else {
			$('.tb-hideable-link-only').show();
		}

	});

	// LinkedIn User Type

	$('#wpsite_follow_us_settings_linkedin_args_type').on("change", function() {
		$(".wpsite_follow_us_settings_linkedin_args_user_type").hide();
		$(".wpsite_follow_us_settings_linkedin_args_user_type_" + $(this).val()).show();
	});

});