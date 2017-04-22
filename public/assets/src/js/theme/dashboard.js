$(document).ready(function(){
	/**
	* This is for pie chart
	* For more options refer //www.chartjs.org/docs/#doughnut-pie-chart
	*/

	var browserViews = {
	    datasets: [{
	        data: [
	            11,
	            16,
	            7,
	            3,
	            14
	        ],
	        backgroundColor: [
	            "#FF6384",
	            "#4BC0C0",
	            "#FFCE56",
	            "#E7E9ED",
	            "#36A2EB"
	        ],
	        label: 'My dataset' // for legend
	    }],
	    labels: [
	        "Red",
	        "Green",
	        "Yellow",
	        "Grey",
	        "Blue"
	    ]
	};
	var browserViewCanvas = $("#browserView");
	var browserViewsChart = new Chart(browserViewCanvas, {
	    data: browserViews,
	    type: 'polarArea',
	    options: {
	        elements: {
	            arc: {
	                borderColor: "#ffffff"
	            }
	        }
	    }
	});
});