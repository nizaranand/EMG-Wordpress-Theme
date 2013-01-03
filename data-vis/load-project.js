


(function($){
	
	$(document).ready(function(){
		/*
		 * To use this first create a new page in Wordpress and set the template to data-vis.php.
		 * Then add a script tag to the page in Wordpress with the global "project" variable set to the name of the associated javascript file.
		 * The project's javascript source file must implement the DataVisualization object and init() and should fetch its own data.
		 */
		if(window.project != null && window.project){
			var sp = document.getElementById("data-vis");
			spinner = new Spinner().spin(sp);
			$("<link/>", {
   				rel: "stylesheet",
   				type: "text/css",
  		 		href: window.theme_prefix + "/data-vis/css/" + window.project + ".css"
			}).appendTo("head");
			$.get(window.theme_prefix + "/data-vis/templates/" + window.project + ".php", function(data){
				$("body").append(data);
			    var data_vis = new DataVisualization();
			    data_vis.init();
				spinner.stop();
			});
		}else{
			console.log("No project source given.");
		}
	});
	
}(jQuery));
