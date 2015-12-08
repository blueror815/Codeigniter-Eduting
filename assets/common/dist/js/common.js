function auto_complete(containerid, params, cate) {
	containerid.autocomplete({
		minLength: 0,
		source: params,
		focus: function( event, ui ) {
			containerid.val( ui.item.value );
			return false;
		},
		select: function( event, ui ) {
			$(".search_form .search_type").val(cate);
			$(".search_form .detail_code").val(ui.item.code);

			containerid.val( ui.item.value );

			return false;
		}
	});	
};

function init() {
   $(".story_menu_pad").addClass('hide');
   
   $(".story_menu_area .story_non_dropdown").click(function() {
		$(".story_menu_pad").removeClass('hide').addClass('show');
   });
   
	$('.story_menu_area .close_button').click(function() {
		$(".story_menu_pad").removeClass('show').addClass('hide');
	});

//   $(".story_menu_area").mouseenter(function() {
//		$(".story_menu_pad").removeClass('hide').addClass('show');
//   }).mouseleave(function() {
//		$(".story_menu_pad").removeClass('show').addClass('hide');
//   });
   
   init_autocomplete();
   search_go();
}

function init_autocomplete() {
	$.ajax({
		url: base_url + "Ed_api/Get_AutoComplete",
		type: 'POST',
		data: {
			'key': 'college',
			'cate': '1'	
		},
		dataType: 'json',
		success: function(data) {
			$('#about_school_tab .search_word').val('');
			$('#about_school_tab .school_cat option[value="1"]').attr("selected", "selected");
			auto_complete($('#about_school_tab .search_word'), data, 'c');
		}
	});	
	
	$.ajax({
		url: base_url + "Ed_api/Get_AutoComplete",
		type: 'POST',
		data: {
			'key': 'people',
			'cate': '1'	
		},
		dataType: 'json',
		success: function(data) {
			$('#about_people_tab .search_word').val('');
			$('#about_people_tab .people_cat option[value="1"]').attr("selected", "selected");
			auto_complete($('#about_people_tab .search_word'), data, 'p');
		}
	});

	$.ajax({
		url: base_url + "Ed_api/Get_AutoComplete",
		type: 'POST',
		data: {
			'key': 'job'	
		},
		dataType: 'json',
		success: function(data) {
			$('#about_job_tab .search_word').val('');
			auto_complete($('#about_job_tab .search_word'), data, 'j');
		}
	});
	
}

function search_go() {
	$(".search_form .search_type").val('c');
	$(".search_form .detail_code").val('');
	
	$(".search_form .search_tap").click(function() {		
		$(".search_form .search_type").val($(this).attr("tag"));
		$(".search_form .detail_code").val('');
	});
}

function search_autocomplete(key) {
	if(key == 'college') {
		var type = $(".school_cat").val();
		
		$.ajax({
			url: base_url + "Ed_api/Get_AutoComplete",
			type: 'POST',
			data: {
				'key': 'college',
				'cate': type	
			},
			dataType: 'json',
			success: function(data) {
				var obj = $('#about_school_tab #search_word');
				
				if(obj.autocomplete( "instance" )) {
					obj.autocomplete( "destroy" ).val('');
				}
				obj.val("");
				$(".search_form .search_type").val('c');
				$(".search_form .detail_code").val('');
				auto_complete(obj, data, 'c');
			}
		});	
	} else if(key == 'people') {
		var type = $(".people_cat").val();
		
		$.ajax({
			url: base_url + "Ed_api/Get_AutoComplete",
			type: 'POST',
			data: {
				'key': 'people',
				'cate': type	
			},
			dataType: 'json',
			success: function(data) {
				var obj = $('#about_people_tab #people_word');
				
				if(obj.autocomplete( "instance" )) {
					obj.autocomplete( "destroy" ).val('');
				}
				obj.val("");
				$(".search_form .search_type").val('p');
				$(".search_form .detail_code").val('');
				auto_complete(obj, data, 'p');
			}
		});			
	} else {
		$.ajax({
			url: base_url + "Ed_api/Get_AutoComplete",
			type: 'POST',
			data: {
				'key': 'job'	
			},
			dataType: 'json',
			success: function(data) {
				var obj = $('#about_job_tab #job_word');
				
				if(obj.autocomplete( "instance" )) {
					obj.autocomplete( "destroy" ).val('');
				}
				obj.val("");
				$(".search_form .search_type").val('j');
				$(".search_form .detail_code").val('');
				auto_complete(obj, data, 'j');
			}
		});			
	}
}

$(document).ready(function() {
	 init();
});