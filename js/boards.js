var list = document.getElementById("board_conatainer");
var boards = [];

var $_GET=[];
window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(a,name,value){$_GET[name]=value;});
console.log($_GET);

var desk_id = $_GET.desk;

// $(document).ready(function(){
// 	getElements();
// });

function getElements() {
	$.ajax({
		method: "GET",
		url: 'api/board/get.php?desk_id='+desk_id
	}).done(function(data){//anonymus function, async task
		data = JSON.parse(data);
		boards = data;
		show_Table();
		callcreateBoardElement();
	}).always(function(){
		bindCardAddButton();
		bindBoardFunctions();
		addDragManager();

	});
}
getElements();//After deleting this everything works

function deleteFromList(name, id){
	for (var i = 0; i < 2; i++) {
    	id = id.substring(1);
    }
    console.log("deleteFromList() got id: "+id);
    console.log("deleteFromList() got name: "+name);

	console.log(boards);
		for (var i = 0;  i < boards.length; i++) {
		    for (var j = 0; j < boards[i].items.length; j++) {
		    	if (boards[i].name == name) {
			       if (boards[i].items[j] != null && boards[i].items[j].id == id) {
						console.log(boards[i].items[j]);
						deleteElement(boards[i].items[j].id);
						delete boards[i].items[j];
						console.log("Deleted!");
			       }
		        }
		    }
		}
}

function show_Table() {
	var element = "";
	var board="";
	
	if (boards.length==0) {//if server returns empty list you will show nothing
		list.innerHTML = "";
	}

	for (var i = 0;  i < boards.length; i++) {
	    for (var j = 0; j < boards[i].items.length; j++) {
	    	if (boards[i].items[j] != undefined) {
				element+='<div class="element id'+ boards[i].items[j].id +'" id="element"  draggable = true>'+
					boards[i].items[j].content+
				'</div>';
			}       
	    }
	    var make = boards[i].name;
	    //console.log("Make:"+make);
	    for (var k = 0; k < 6; k++) {
	    	make = make.substring(1);
	    }
	    //console.log("Make:"+make);

		board += '<div class="board" id = "board_'+make+'" data-boardid="'+boards[i].id+'">'+
			'<div class="board_options">'+
				'<input value="'+make+'" class="board_options__name" id="board_options__name">'+
					'<div class="board_options__options">'+
						'<div class="board_functions_back" id="board_functions_back"></div>'+
						'<i class="fas fa-eye"></i>'+
						'<div id="board_functions">'+
							'<i class="fas fa-ellipsis-h"></i>'+
							'<div class = "boardOptionsDropDown" id = "boardOptionsDropDown">'+
								'<div class = "boardOptionsDropDown__inside">'+
										'<h3>Actions List</h3>'+
										'<button id ="delete_board_button">Delete this Board</button>'+
								'</div>'+
							'</div>'+
						'</div>'+
					'</div>'+
				'</div>'+
			'<div class="tasks" id="sortable">'+
				element+
			'</div>'+
			'<div class="board_add_element" id = "board_add_element">'+
				'<i class="fas fa-plus"></i>'+
				'Add another card'+
			'</div>'+
			'</div>';
		//console.log(i)
			list.innerHTML = board;
			element=""; //needed to clear elements before moving to another board 
			//localStorage.setItem("list", JSON.stringify(boards));
	}

	list.innerHTML += 
	'		<div class="new_board" id = "new_board">'+
	'			<div class="new_board_text" id = "new_board_text">'+
	'					<i class="fas fa-plus"></i>'+
	'					Add another board'+
	'			</div>'+
	'			<div class="board_input_back" id = "board_input_back">'+
	'			</div>'+
	'			<div class="new_board_input" id = "new_board_input">'+
						'<form onsubmit = "addBoard(event)" id="new_board_input__form">'+
		'					<input class="newBoradInput" id ="newBoradInput" placeholder = "Enter a name"></input>'+
		'					<button type = "submit" id = "send_board_name_button">Send</button>'+
						'</form>'+
	'			</div>'+
	' 		</div>';
}

function deleteElement(id){
	$.ajax({
		method:"POST",
		url: "api/board/delete.php",
		data: {
			id: id
		}
	}).done(function(data){//get info from blog if exist FOR HOME if response = 200
		
	}).fail(function(err){
		console.log(err);
	});
}

function bindCardAddButton() {
	var addButtonCards = document.querySelectorAll("#board_add_element");

	for (var i = 0; i < addButtonCards.length; i++) {
	    addButtonCards[i].addEventListener("click", showMenu);
	  }
	console.log(addButtonCards);
}


var board_name = ""; //need to get parent id when pressing add card button
var board_id = "";
function showMenu() {
	board_name = this.parentNode.id;//for example board_Life
	board_id = this.parentNode.dataset.boardid;
	console.log('Menu got: '+board_name);
	console.log('Menu got: '+board_id);
	document.getElementById("modal").style.display = "flex";
}

function closeMenu() {
	document.getElementById("modal").style.display = "none";
}

function callcreateBoardElement() {
	var boardAddButton = $("#new_board");
	boardAddButton.bind('click', showAddBoardInput);
	var boardCloseBack = $("#board_input_back");
	boardCloseBack.bind('click', closeAddBoardInput);
}

function showAddBoardInput() {
	document.getElementById("board_input_back").className = "board_input_back_show";

	
	document.getElementById("new_board_text").className = "new_board_text_hidden";
	document.getElementById("new_board_input").className = "new_board_input_showed";

}

function closeAddBoardInput() {
	console.log('close...');
	//Nothing works at all!!!!!!
	//Doesn't change class names 
	//fix it later
	document.getElementById("new_board_text").className = "new_board_text_showed";
	document.getElementById("new_board_input").className = "new_board_input_hidden";

	document.getElementById("board_input_back").style.display = 'none'; 	
}

function addBoard(e) {
	e.preventDefault();
	console.log("Hello");
	var input = $("#newBoradInput");
	$.ajax({
		method:"POST",
		url: "api/board/save.php",
		data: {
			boardName: input.val(),
			desk_id: desk_id
		}
	}).done(function(data){//get info from blog if exist FOR HOME if response = 200
		//getBlogs();
		closeMenu();
		getElements();
	}).fail(function(err){
		console.log(err);
	});
}

function addElement(e){
	e.preventDefault();
	var cardContent = $("#add_card");
	console.log(cardContent.val());
	console.log(board_name);

	$.ajax({
		method:"POST",
		url: "api/board/save.php",
		data: {
			cardContent: cardContent.val(),
			boardId: board_id,
			boardName: board_name
		}
	}).done(function(data){//get info from blog if exist FOR HOME if response = 200
		getElements();
		closeMenu();
	}).fail(function(err){
		console.log(err);
	});
}


function addPeople() {
	console.log('works')
	showModal2("show");
}

function showModal2(action) {
	if (action == 'show') {
		document.getElementById("modal2").style.display = "flex";
	} else {
	 	document.getElementById("modal2").style.display = "none";
	 }
}

var inviteButton = document.getElementById("invite_button");

inviteButton.addEventListener("click", showPeopleList);


var inviteMenuBack = document.getElementById("invite_back");
inviteMenuBack.addEventListener("click", closePeopleList);

function showPeopleList() {
	var inviteMenu = document.getElementById("usersDropDown");
	inviteMenu.style.display = 'block';
	inviteMenuBack.style.display = 'block';
}

function closePeopleList() {
	var inviteMenu = document.getElementById("usersDropDown");
	inviteMenu.style.display = 'none';
	inviteMenuBack.style.display = 'none';
}

function findPeople() {
	var search = $("#searchPeople").val();

	$.ajax({
		method: "GET",
		url: "api/board/search.php?key="+search
	}).done(function (data){
		data = JSON.parse(data);
		console.log(data);
		showPeople(data);
		bindPersonList();
	})
}

function showPeople(people) {
	var list = $("#peopleList");
	var listHTML ="";
	for (var i = 0; i < people.length; i++) {
		listHTML += "<div class = 'foundPeople' id='foundPeople"+people[i].id+"'>" +
							"<h3>" + people[i].name + "</h3>" +  	
							"<p>" + people[i].email + "</p>" +
					"</div>";
	}
	list.html(listHTML);
}

function bindBoardFunctions() {	
	var boardFunctionsButtons = document.querySelectorAll("#board_functions");
	for (var el of boardFunctionsButtons) {
		el.addEventListener("click", showOptionsMenu);
    }

	var optionsBack = document.getElementById("board_functions_back");
	optionsBack.addEventListener("click", closeOptionsMenu);
}

var deleteBoardId = "";

function showOptionsMenu() {
	console.log('opening...');
    deleteBoardId = this.parentNode.parentNode.parentNode.id;
	console.log(deleteBoardId);
	var optionsBack = document.getElementById("board_functions_back");
	var options = document.getElementById("boardOptionsDropDown");
	optionsBack.style.display = "block";
	options.style.display = "block";

	var deleteThisBoard = document.querySelectorAll("#delete_board_button");
	for (var but of deleteThisBoard) {
        but.addEventListener("click", deleteBoard);
    }

    //board_id = deleteThisBoard.parentNode().id;

}

function closeOptionsMenu() {
	console.log('closing...');
	var options = document.getElementById("boardOptionsDropDown");
	var optionsBack = document.getElementById("board_functions_back");
	options.style.display = "none";
	optionsBack.style.display = 'none';
}

function deleteBoard() {
    //console.log(this.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode);
    var board_id = deleteBoardId;
    console.log(board_id);
	console.log('deleting...');
	$.ajax({
		method:"POST",
		url: "api/board/deleteBoard.php",
		data: {
			boardName: board_id
		}
	}).done(function(data){//get info from blog if exist FOR HOME if response = 200
		getElements();
	}).fail(function(err){
		console.log(err);
	});

}

function bindPersonList() {
	var person = document.querySelectorAll(".foundPeople");
	for (var per of person) {
		per.addEventListener("click", personSelected);
    }
}

var found = "";
var personName = "";
var comment = "";

function personSelected() {
	var searchPeopleInput = document.getElementById("searchPeople");
	comment = document.getElementById("comment").value;
	console.log(comment);
	found = this.id;
	personName = this.childNodes[0].innerHTML;
	console.log(personName);
	found = found.substring(11, 12);
	console.log("Person id is: "+found);
	searchPeopleInput.value = personName;
}



function inviteUser(event) {
	event.preventDefault();
	$.ajax({
		method:"POST",
		url: "api/board/invite.php",
		data: {
			id: found,
			full_name: personName,
			desk_id: desk_id,
			comment: comment
		}
	}).done(function(data){//get info from blog if exist FOR HOME if response = 200
		//getBlogs();
		closePeopleList();
	}).fail(function(err){
		console.log(err);
	})
}