function robotface(face){
	if(face=="north")$("#androidbot").css("transform","rotate(0deg)");
	else if(face=="west")$("#androidbot").css("transform","rotate(-90deg)");
	else if(face=="south")$("#androidbot").css("transform","rotate(180deg)");
	else if(face=="east")$("#androidbot").css("transform","rotate(90deg)");
}



$("#play-button").on({
	click: function(){
		var board_size = $("#board-size").val().split(",");
		width = board_size[0];
		if(width>12)width = 12;
		height = board_size[1];
		var column_size = Math.floor(12/width);
		var board = "";
		for (var y = 0; y < height; y++) {
			board = board + "<div class='row'>";
			for(var x = 0; x < width; x++)
			{
				if(column_size*width < 12 && x == 0)
				{
					var offset = Math.floor((12 - column_size*width)/2);
					board = board + "<div class='col-md-"+column_size+" col-md-offset-"+offset+" col-sm-"+column_size+" col-sm-offset-"+offset+" col-xs-"+column_size+" col-xs-offset-"+offset+" column' data='"+x+","+(height-(y+1))+"'></div>";
					
				}else{
					board = board + "<div class='col-md-"+column_size+" col-sm-"+column_size+" col-xs-"+column_size+" column' data='"+x+","+(height-(y+1))+"'></div>";
				}
			}
			board = board + "</div>";
		}
		$("#board").html(board);
		$(".column").height($(".column").width()+30);
		$("#main-menu").modal("hide");
	}
});

$("#robot-placer-modal-button").on({
	click: function(){
		$("#robot-placer").modal("show");
	}
});

$("#main-menu-button").on({
	click: function(){
		$("#main-menu").modal("show");
	}
});

$("#robot-placer-button").on({
	click: function(){
		column = ".column[data='"+x_axis+","+y_axis+"']";
		$(column).html("");
		var robot_place = $("#robot-place").val().split(",");
		x_axis = robot_place[0];
		y_axis = robot_place[1];
		face = robot_place[2];
		if(face==null)face="north";
		var column = ".column[data='"+x_axis+","+y_axis+"']";
		$(column).html(androidbot);
		robotface(face);
		$("#info").html(x_axis+", "+y_axis+", "+face);
		$.post(page+"robot_placer");
		$.post(page+"move_log", { xpos: x_axis, ypos: y_axis, face: face });
		$("#robot-placer").modal("hide");
	}
});

$("#left-button").on({
	click: function(){
		if(face=="north")face = "west";
		else if(face=="west")face = "south";
		else if(face=="south")face = "east";
		else if(face=="east")face = "north";
		robotface(face);
	}
});

$("#right-button").on({
	click: function(){	
		if(face=="north")face = "east";
		else if(face=="east")face = "south";
		else if(face=="south")face = "west";
		else if(face=="west")face = "north";
		robotface(face);
	}
});

$("#move-button").on({
	click: function(){
		column = ".column[data='"+x_axis+","+y_axis+"']";
		$(column).html("");
		if(face=="north")y_axis=parseInt(y_axis)+1;
		else if(face=="east")x_axis=parseInt(x_axis)+1;
		else if(face=="south")y_axis=parseInt(y_axis)-1;
		else if(face=="west")x_axis=parseInt(x_axis)-1;
		if(x_axis > width-1)x_axis=parseInt(x_axis)-1;
		if(y_axis > height-1)y_axis=parseInt(y_axis)-1;
		if(x_axis < 0)x_axis=0;
		if(y_axis < 0)y_axis=0;
		column = ".column[data='"+x_axis+","+y_axis+"']";
		$(column).html(androidbot);
		robotface(face);
		$("#info").html(x_axis+", "+y_axis+", "+face);
		$.post(page+"move_log", { xpos: x_axis, ypos: y_axis, face: face });
	}
});

$("#report-button").on({
	click: function(){
		$.post(page+"report", { xpos: x_axis, ypos: y_axis, face: face }, function(){
			window.open(page+"view_report",'_blank');
		});
		
	}
});

$("#print-session-button").on({
	click: function(){
	
		window.open(page+"print_all_session",'_blank');
		
	}
});

$(document).ready(function(){
	
	//page load modal
	$("#main-menu").modal("show");
	
});
        
		