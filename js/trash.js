
var addButtons = $("#board_add_element");
addButtons.on('click', function(){
	$("#modal").css("display", "flex")
	board_id = this.parentNode.id;
});
console.log(addButtons);


var board_id = ""; //need to get parent id when pressing add card button
function showMenu() {
	document.getElementById("modal").style.display = "flex";
	board_id = this.parentNode.id;
}

function closeMenu() {
	document.getElementById("modal").style.display = "none";
}

function addElement(e){
	e.preventDefault();
	var cardContent = $("#add_card");
	console.log(cardContent.val());
	console.log(board_id);

	$.ajax({
		method:"POST",
		url: "api/board/save.php",
		data: {
			cardContent: cardContent.val(),
			boardId: board_id
		}
	}).done(function(data){//get info from blog if exist FOR HOME if response = 200
		getBlogs();
		closeMenu();
	}).fail(function(err){
		console.log(err);
	});
}


var boardAddButton = $("#new_board");
boardAddButton.bind('click', showAddBoardInput);

function showAddBoardInput() {
	var boardAddText = $("#new_board_text");
	var boardInputText = $("#new_board_input");

	boardAddText.css("display","none");
	boardInputText.css("display","flex");
}


var boardAddButton = $("#send_board_name_button");
boardAddButton.bind('click', addBoard);

function addBoard() {
	console.log("Hello");
	var input = $("#newBoradInput");
	$.ajax({
		method:"POST",
		url: "api/board/save.php",
		data: {
			boardName: input.val()
		}
	}).done(function(data){//get info from blog if exist FOR HOME if response = 200
		//getBlogs();
		closeMenu();
		var boardAddText = $("#new_board_text");
		var boardInputText = $("#new_board_input");
		boardInputText.css("display","none");
		boardAddText.css("display","block");
	}).fail(function(err){
		console.log(err);
	});
}