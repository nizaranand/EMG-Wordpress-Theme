
(function($){
	
	window.DataVisualization = function(){
		var that = {
			spin_opts: {
  				lines: 13,
  				length: 7,
  				width: 4,
  				radius: 10,
 				corners: 1,
 				rotate: 0,
  				color: '#000',
  				speed: 2,
  				trail: 60,
  				shadow: false,
  				hwaccel: false,
  				className: 'spinner',
  				zIndex: 2e9,
  				top: 'auto',
  				left: 'auto'
			},
			spinner: {},
			categories: [
				"RAT",
				"Passing Yards",
				"Completion Percentage",
				"Passing TD",
				"Passing Completions",
				"Passing Attempts",
				"Longest Pass",
				"INT",
				"Rushing Yards",
				"Rushing Average",
				"Rushing TD",
				"Rushing Attempts",
				"Longest Rush"
			],
			mariota: [],
			klein: [],
			
			init: function(){
				// class function
				that.start_spinning();
				that.get_data();
				that.build_layout();
				that.stop_spinning();
			},

			get_data: function(){
				$.getJSON(window.theme_prefix + "/data-vis/data/qbs/mariota.json", function(data){
							  that.mariota = data;
						  });
				$.getJSON(window.theme_prefix + "/data-vis/data/qbs/klein.json", function(data){
							  that.klein = data;
							  that.build_graphs();
						  });
			},
			
			build_layout: function(){
				$("#data-vis").append(
					_.template($("#menus-template").html(), {})
				);
				$("#data-vis").append(
					_.template($("#content-template").html(), {})
				);
			},
						
			build_graphs: function(){
				for(var i = 0; i < that.categories.length; i++){
					that.build_graph(that.categories[i]);
				}
			},
							
			build_graph: function(category){
				var data = [
					{
						key: "Marcus Mariota",
						color: "#51A351",
						values: new Array(that.mariota.length)
					}, 
					{
						key: "Colin Klein",
						color: "#633194",
						values: new Array(that.klein.length)
					}
				];
				// create data subset for the specified category for each qb
				for(var i = 0; i < that.mariota.length; i++){
					$.each(that.mariota[i], function(key, value){
						if(key != category){ return true; } // continue
						data[0].values[i] = { x: "" + (i + 1), y: value };
					});		
				}
				for(var i = 0; i < that.klein.length; i++){
					$.each(that.klein[i], function(key, value){
						if(key != category){ return true; } // continue
						data[1].values[i] = { x: "" + (i + 1), y: value };
					});
				}
				var chart = nv.models.multiBarChart();
				chart.x(function(d) { return d.x; });
				chart.y(function(d) { return parseFloat(d.y); });
				chart.xAxis.axisLabel("Week");
				chart.xAxis.ticks(12);
				$("#" + category.replace(" ", "-")).append("<svg>").attr("width", $(".chart").first().width());
				d3.select("#" + category.replace(" ", "-") + " svg").datum(data).transition().duration(100).call(chart);
				
				// fix positioning of labels
				d3.select("#" + category.replace(" ", "-") + " g.nv-legend").attr("transform", "translate(-100, 5)");
				d3.select("#" + category.replace(" ", "-") + " g.nv-series").each(function(data, index){
					// USE IDS EVERY ONCE IN A WHILE, MY GOD WHOEVER MADE THIS IS A DICK
					var curr = d3.select(this);
					if(curr.select("text").text() == "Marcus Mariota"){
						curr.attr("transform", "translate(-100,5)");
					}
				});

				nv.utils.windowResize(chart.update);
			},
			
			start_spinning: function(){
				var sp = document.getElementById("data-vis");
				that.spinner = new Spinner(that.spin_opts).spin(sp);
			},
			
			stop_spinning: function(){
				that.spinner.stop();
			}
			
		};

		return that;
	};

}(jQuery));