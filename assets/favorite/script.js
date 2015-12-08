function initial() {
  $(".signup-menu").removeClass("show").addClass("hide");
  
  $(".signin-menu").removeClass("show").addClass("hide");

};

function auto_complete(containerid, params) {
    var params = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    $( containerid ).autocomplete({
      source: params
    });
};

$(document).ready(function() {
	initial();
	
  $(".favorite_page .video_cube object").attr( {width: 230, height: 180});
  $(".favorite_page .video_cube embed").attr( {width: 230, height: 180});
  $(".favorite_page .video_cube iframe").attr( {width: 230, height: 180});
   
  auto_complete(".search_form #search_word");
});