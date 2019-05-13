var list = document.getElementById("all_boards");
var desks = [];
var images = [];

function getElements() {
	$.ajax({
		method: "GET",
		url: 'api/feed/get.php'
	}).done(function(data){//anonymus function, async task
		data = JSON.parse(data);
		desks = data;
		show_Table();
		callModalView();
	})
}
getElements();//After deleting this everything works


function callModalView() {
	var createTeamButton = document.getElementById("board_creator");
	createTeamButton.addEventListener("click", showMenu);
}
function getRandomImages() {
	$.ajax({
		method: "GET",
		url: 'api/team/randomImages.php'
	}).done(function(data){//anonymus function, async task
		data = JSON.parse(data);
		console.log(data);
		images = images.concat(data);
		// showMenu(data);
	})
}
getRandomImages();


var slicedUrl = "";

function showMenu() {
	
	var first = "";
	var second = "";
	var third = "";

	first = images[getRandomInt(0, 7)].img;
	second = images[getRandomInt(0, 7)].img;
	third = images[getRandomInt(0, 7)].img;

	for (var i = 0; ; i++) {
		first = images[getRandomInt(0, 7)].img;
		second = images[getRandomInt(0, 7)].img;
		third = images[getRandomInt(0, 7)].img;
		if (first != second && first != third && second != third) {
			break;
		}
	}
		
	console.log(first);
	console.log(second);
	console.log(third);

	document.getElementById("modal").style.display = "flex";
	Object.assign(document.getElementById("modal_inner").style, {
		backgroundImage:"url('"+first+"')",
		backgroundPosition:"center",
		backgroundSize:"cover",
		height:"103px"
	});
	slicedUrl = document.getElementById("modal_inner").style.backgroundImage.slice(4, -1).replace(/"/g, "");
	console.log(slicedUrl);
	var image_box1 = document.getElementById("background_img1");
	image_box1.style.backgroundImage = "url('"+first+"')";
	var image_box2 = document.getElementById("background_img2");
	image_box2.style.backgroundImage = "url('"+second+"')";
	var image_box3 = document.getElementById("background_img3");
	image_box3.style.backgroundImage = "url('"+third+"')";
	var image_box4 = document.getElementById("background_col1");
	image_box4.style.background = '#0067A3';
	var image_box5 = document.getElementById("background_col2");
	image_box5.style.background = '#D29034';
	var image_box6 = document.getElementById("background_col3");
	image_box6.style.background = '#3D3E3E';
	var image_box7 = document.getElementById("background_col4");
	image_box7.style.background = '#458131';
	var image_box8 = document.getElementById("background_col5");
	image_box8.style.background = '#d562db';
	var image_box9 = document.getElementById("background_col6");
	image_box9.style.background = 'white';
	var color = "";
	image_box1.addEventListener("click", changeModalImage); 
	image_box2.addEventListener("click", changeModalImage); 
	image_box3.addEventListener("click", changeModalImage); 
	image_box4.addEventListener("click", changeModalColor); 
	image_box5.addEventListener("click", changeModalColor); 
	image_box6.addEventListener("click", changeModalColor); 
	image_box7.addEventListener("click", changeModalColor); 
	image_box8.addEventListener("click", changeModalColor); 
}
function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function changeModalColor() {
	console.log(this.style.background);
	var color = this.style.background;
	Object.assign(document.getElementById("modal_inner").style, {
		backgroundImage:"none",
		backgroundColor:""+color+"",
		backgroundPosition:"center",
		backgroundSize:"cover",
		height:"103px"
	});
	slicedUrl = color;
}
function changeModalImage() {
	slicedUrl = this.style.backgroundImage.slice(4, -1).replace(/"/g, "");
	//console.log(bi);
	Object.assign(document.getElementById("modal_inner").style, {
		backgroundImage:"url('"+slicedUrl+"')",
		backgroundPosition:"center",
		backgroundSize:"cover",
		height:"103px"
	});
}

function closeMenu() {
	document.getElementById("modal").style.display = "none";
}


function addElement(e){
	e.preventDefault();
	var boardTitle = $("#add_board");
	console.log(slicedUrl);

	$.ajax({
		method:"POST",
		url: "api/feed/save.php",
		data: {
			boardContent: boardTitle.val(),
			imagePath: slicedUrl
		}
	}).done(function(data){//get info from blog if exist FOR HOME if response = 200
		getElements();
		closeMenu();
	}).fail(function(err){
		console.log(err);
	});
}


// function deleteFromList(name, id){
// 	for (var i = 0; i < 2; i++) {
//     	id = id.substring(1);
//     }
//     console.log("deleteFromList() got id: "+id);
//     console.log("deleteFromList() got name: "+name);

// 	console.log(boards);
// 		for (var i = 0;  i < boards.length; i++) {
// 		    for (var j = 0; j < boards[i].items.length; j++) {
// 		    	if (boards[i].name == name) {
// 			       if (boards[i].items[j] != null && boards[i].items[j].id == id) {
// 						console.log(boards[i].items[j]);
// 						deleteElement(boards[i].items[j].id);
// 						delete boards[i].items[j];
// 						console.log("Deleted!");
// 			       }
// 		        }
// 		    }
// 		}
// }

function show_Table() {
	var element = "";
	var board_window = "";

	    for (var j = 0; j < desks.length; j++) {
				// element+='<div class="element id'+ boards[i].items[j].id +'" id="element"  draggable = true>'+
				// 	boards[i].items[j].content+
				// '</div>';
		if (desks[j].img.includes("rgb")) {
				element += '<li class="col2" style="background:'+desks[j].img+'; background-position: center; background-size: cover;">'+
						'<a href="board.php?desk='+desks[j].id+'">'+
							'<div class="board_section_list__element_text">'+
								desks[j].content+
							'</div>'+
						'</a>'+
					'</li>';
			} else {		
			element += '<li class="col2" style="background: url('+desks[j].img+'); background-position: center; background-size: cover;">'+
							'<a href="board.php?desk='+desks[j].id+'">'+
								'<div class="board_section_list__element_text">'+
									desks[j].content+
								'</div>'+
							'</a>'+
						'</li>';
			}
	    }

		board_window +='<div class="boards_header_section">'+
					'<div class="board_header">'+
						'<i class="fas fa-user-alt"></i>'+
						'<h3>Personal Boards</h3>'+
					'</div>'+
					'<ul class="board_section_list">'+
						element+
						'<li class="board_creator col2" id ="board_creator">'+
								'<div class="board_section_list__board_creator__text">'+
									'Create a new board...'+
								'</div>'+
						'</li>'+
						'</ul>'+
				'</div>';
		console.log(board_window);
		list.innerHTML = board_window;
		element=""; //needed to clear elements before moving to another board 
}

