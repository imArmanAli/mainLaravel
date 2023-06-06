	

	$(function () {
		var MainUrl = "http://localhost/marina/hfh/";
		// get total deparment
		$.ajax({
			type: "POST",
			data: "tblget=tbl_department&status=dep_status",
			url: MainUrl+"backofadmin/total_chart",
			success: function(response) {
				//console.log(response);
				var obj = JSON.parse(response);
				//console.log(obj.Active);
				// now show the result
				var donutData = [
			      	{label: "Active", data: obj.Active, color: "#00A65A"},
			      	{label: "In-Active", data: obj.Inactve, color: "#0073b7"},
			      	{label: "Trash", data: obj.Trash, color: "#F00"}
			    ];
			    $.plot("#department-chart", donutData, {
			      	series: {
			        	pie: {
			              	show: true,
			              	radius: 1,
			              	innerRadius: 0.3,
			              	label: {
				                show: true,
				                radius: 2 / 3,
				                formatter: labelFormatter,
				                threshold: 0.1
			          		}

			        	}
			      	}
			    });
			    // END
			} 
		});	
		// ===CATEGORY CHART
		$.ajax({
			type: "POST",
			data: "tblget=tbl_category&status=cat_status",
			url: MainUrl+"backofadmin/total_chart",
			success: function(response) {
				//console.log(response);
				var obj = JSON.parse(response);
				//console.log(obj.Active);
				// now show the result
				var donutData = [
			      	{label: "Active", data: obj.Active, color: "#00A65A"},
			      	{label: "In-Active", data: obj.Inactve, color: "#0073b7"},
			      	{label: "Trash", data: obj.Trash, color: "#F00"}
			    ];
			    $.plot("#category-chart", donutData, {
			      	series: {
			        	pie: {
			              	show: true,
			              	radius: 1,
			              	innerRadius: 0.3,
			              	label: {
				                show: true,
				                radius: 2 / 3,
				                formatter: labelFormatter,
				                threshold: 0.1
			          		}

			        	}
			      	}
			    });
			    // END
			} 
		});	
		// ===END
		// ===SUB-CATEGORY CHART
		$.ajax({
			type: "POST",
			data: "tblget=tbl_sub_category&status=scat_status",
			url: MainUrl+"backofadmin/total_chart",
			success: function(response) {
				//console.log(response);
				var obj = JSON.parse(response);
				//console.log(obj.Active);
				// now show the result
				var donutData = [
			      	{label: "Active", data: obj.Active, color: "#00A65A"},
			      	{label: "In-Active", data: obj.Inactve, color: "#0073b7"},
			      	{label: "Trash", data: obj.Trash, color: "#F00"}
			    ];
			    $.plot("#subcat-chart", donutData, {
			      	series: {
			        	pie: {
			              	show: true,
			              	radius: 1,
			              	innerRadius: 0.3,
			              	label: {
				                show: true,
				                radius: 2 / 3,
				                formatter: labelFormatter,
				                threshold: 0.1
			          		}

			        	}
			      	}
			    });
			    // END
			} 
		});	
		// ===END
		// ===SUB-CATEGORY CHART
		$.ajax({
			type: "POST",
			data: "tblget=tbl_coupen&status=cp_status",
			url: MainUrl+"backofadmin/total_chart",
			success: function(response) {
				//console.log(response);
				var obj = JSON.parse(response);
				//console.log(obj.Active);
				// now show the result
				var donutData = [
			      	{label: "Active", data: obj.Active, color: "#00A65A"},
			      	{label: "In-Active", data: obj.Inactve, color: "#0073b7"},
			      	{label: "Trash", data: obj.Trash, color: "#F00"}
			    ];
			    $.plot("#coupon-chart", donutData, {
			      	series: {
			        	pie: {
			              	show: true,
			              	radius: 1,
			              	innerRadius: 0.3,
			              	label: {
				                show: true,
				                radius: 2 / 3,
				                formatter: labelFormatter,
				                threshold: 0.1
			          		}

			        	}
			      	}
			    });
			    // END
			} 
		});	
		// ===END


		
	    
	    /*
	     * END DONUT CHART
	     */
	});

	function labelFormatter(label, series) {
		return "<div style='font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;'>"
        + label
        + "<br/>"
        + Math.round(series.percent) + "%</div>";
	}