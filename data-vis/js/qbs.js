
(function($){
	
	var DataVisualization = function(){
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
				"INT",
				"Rushing Yards",
				"Rushing Average",
				"Rushing TD"
			],
			mariota: {},
			klein: {},	
			
			init: function(){
				// class function
				that.start_spinning();
				that.build_layout();
				that.build_graphs();
				that.stop_spinning();
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
				for(var category in that.categories){
					that.build_graph(category);
				}
			},
							
			build_graph: function(category){
				var data = [
					{
						key: "Marcus Mariota",
						color: "#51A351",
						values: []
					}, 
					{
						key: "Colin Klein",
						color: "#633194",
						values: []
					}
				];
				// create data subset for the specified category for each qb
				for(var i = 0; i < that.mariota.length; i++){
					$.each(that.mariota[i], function(key, value){
						if(key != category){ return true; } // continue
						data[0].values.push({ x: "Week " + (i + 1), y: parseFloat(value) });
					});		
				}
				for(var i = 0; i < that.klein.length; i++){
					$.each(that.klein[i], function(key, value){
						if(key != category){ return true; } // continue
						data[1].values.push({ x: "Week " + (i + 1), y: parseFloat(value) });
					});
				}
				var chart = nv.models.multiBarChart();
				chart.x(function(d) { return d.label; });
				chart.y(function(d) { return d.value; });
				d3.select("#" + category + " svg").datum(data).transition().duration(100).call(chart); 
			},
			
			start_spinning: function(){
				var sp = document.getElementById("data-vis");
				that.spinner = new Spinner(that.spin_opts).spin(sp);
			},
			
			stop_spinning: function(){
				that.spinner.stop();
			}
			
		};
		$.getJSON("../data/qbs/mariota.json", function(data){
			that.mariota = data;
			console.log(that.mariota);
		});
		$.getJSON("../data/qbs/klein.json", function(data){
			that.klein = data;
			console.log(that.klein);
		});
		return that;
	};

}(jQuery));