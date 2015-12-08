function initial() {

	$(".load_more_button").click(function() {
    var p = parseInt($(".load_more_button").attr("page"));
    $(".load_more_button").attr("page", p+1);
    var r = $(".load_more_button").attr("rand");
    var cate = $(".load_more_button").attr("cate");
    var word = $(".load_more_button").attr("word");
    var code = $(".load_more_button").attr("code");
    
    $(".load_more_button").hide();
    $(".loading_gif").show();

		$.ajax({
			url: base_url + "dashboard/get_videos",
			type: 'POST',
			data: {
        'page_no' : p,
        'rand' : r,
        'cate' : cate,
        'word' : word,
        'code' : code
			},
			dataType: 'json',
			success: function(data) {
				var odd_even = 0;
				var widget = "";
				for(var i = 0; i < data.length;  i++) {
					var d = data[i];
					
					widget = '<div class="cube ' + ((++odd_even%2) ? "odd" : "even") + '">'
								+ '<div class="video_cube col-lg-4 col-md-4 ">'
									+ d['embed']
								+ '</div>';
					
					
					widget += '<div class="detail_cube col-lg-5 col-md-4 ">'
									+ '<h4 class="uni_name"><strong>' + (d['college_name']? d['college_name'] : "") + '</strong></h4>'
									+ '<p class="uni_detail">' + d['title'] + '</p>';

					if(d['college_code']) {
            widget += '<a class="video_detail_button" href="' + base_url + 'dashboard/detail/c/' + d['college_code'] + '" >SEE DETAILS <span class="glyphicon glyphicon-chevron-right"></span></a>';
					}
					
					widget += '</div>';

					widget += 	'<div class="favor_cube col-lg-3 col-md-4 ">'
									+ '<p class="st_category">CATEGORY</p>'

									+ '<h4 class="uppercase uni_category">' + (d['college_type_name']? d['college_type_name'] : "") + '</h4>';
          if(bLogin == true) {
            widget += '<input type="button" class="btn btn-primary input-lg" value="ADD TO FAVORITE" onclick="add_to_favorite("c", ' + d['college_code'] + ', ' + d['movie_code'] + ')" >';
          }
          
					widget += '<p class="uni_last_online"><span class="glyphicon glyphicon-time"></span>  ' + d['viewcount'] + ' visits </p>'
								+ '</div>'
							+ '</div>';
							
					if(odd_even == 4) {
						widget += '<div class="ad_cube">'
									+ '<a class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10" href=""></a>'
								+ '</div>';
					}
					
					 $(".dashboard_page .story_lists").append($(widget));
					
				   $(".dashboard_page .video_cube object").attr( {width: 230, height: 180});
				   $(".dashboard_page .video_cube embed").attr( {width: 230, height: 180});
				   $(".dashboard_page .video_cube iframe").attr( {width: 230, height: 180});
          
          if(data.length < 6) {
            $(".load_more_button").hide();
          } else {
            $(".load_more_button").show();
          }
          $(".loading_gif").hide();

				}

			}
		});
		
	});
  
  
  $(".alpha_box .alpha").click(function(e) {
    $(".alpha_box .alpha").removeClass("pick");
    $(this).addClass("pick");
    
  });
  
  $(".sbcn").click(function() {
    var k = $(".alpha_box .alpha.pick").html();
    var panel = $(this).attr("panel");
    var widget = $("#"+panel+" .beta_lists a");
    
    for(i=0; i<widget.length; i++) {
        var w = widget[i];
        $(w).hide();
        
        if(k == null) {
            $(w).show();
        } else {
          if($(w).html().charAt(0) == k) {
            $(w).show();
          }
        }
    } 
  });
}


function set_alpha_board() {
		$.ajax({
			url: base_url + "Ed_api/get_college_list",
			type: 'POST',
			data: {
			},
			dataType: 'json',
			success: function(data) {
        var widget = "";
        
				for(i=0; i<data['1'].length; i++) {

           //widget += '<a href="dashboard/search/'+ data['1'][i]['code'] +'" class="beta col-lg-4">'+ data['1'][i]['code'] +'</a>'
       }
       $("#sectionA .beta_lists").append(widget);
			}
		});
}

function add_to_favorite(search_type, detail_code, movie_code) {
      $.ajax({
        url: base_url + "Ed_api/add_vidoe_favorite",
        type: 'POST',
        data: {
          'movie_code' : movie_code
        },
        dataType: 'json',
        success: function(data) {
          alert(data);
        }
      });

}

$(document).ready(function() {
	 initial();

   $(".dashboard_page .video_cube object").attr( {width: 230, height: 180});
   $(".dashboard_page .video_cube embed").attr( {width: 230, height: 180});
   $(".dashboard_page .video_cube iframe").attr( {width: 230, height: 180});
   
});