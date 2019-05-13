var list = document.getElementById("all_boards");
var desks = [];
var images = [];

function getElements() {
	$.ajax({
		method: "GET",
		url: 'api/team/getHighlights.php'
	}).done(function(data){//anonymus function, async task
		data = JSON.parse(data);
		desks = data;
		show_Table();
	})
}
getElements();//After deleting this everything works

function show_Table() {
	var element = "";
	var board_window = "";

	    for (var j = 0; j < desks.length; j++) {
				// element+='<div class="element id'+ boards[i].items[j].id +'" id="element"  draggable = true>'+
				// 	boards[i].items[j].content+
				// '</div>';
			element += '<div class = "remainder">'+
							'<div class = "newRemainder"><h1>Remainder</h1></div>'+
							'<div class = "remainder__textBlock">'+
								'<h1>'+desks[j].name+'</h1>'+
								'<p>'+desks[j].description+'</p>'+
							'</div>'+
						'</div>';	
	    }
		console.log(element);
		list.innerHTML = element;
		element=""; //needed to clear elements before moving to another board 
}