window.onload = function() {
  window.addDragManager=function() {
    var elem = document.querySelectorAll("#element");
    var logo = document.querySelectorAll("#header_logo");

    console.log(elem);
     for (var el of elem) {
        el.addEventListener("dragstart", startDrag);
        el.addEventListener("dragend", startEnd);
      }

      for (var archieve of logo) {
        archieve.addEventListener("dragover", dragOver);
        archieve.addEventListener("dragenter", dragEnter);
        archieve.addEventListener("dragleave", dragLeave);
        archieve.addEventListener("drop", dragDrop);
      }
  };
addDragManager();
};
  var classNameOfElement =""; 

  var darggedElemenet="";

   

function startDrag() {
  console.log("dragstart");
  Object.assign(this.style, {border: "solid red 1px"});
  classNameOfElement = this.className;
  setTimeout(()=>  this.className = "invisible", 0);//time in ms
  header_logo.className = "openedBox";
  header_logo.innerHTML = "Drag Here to Archieve";
  darggedElemenet = this;
}
function startEnd() {
  this.className = classNameOfElement;/*There is some trouble with ids please fix it before WEB!*/
  Object.assign(this.style, {border: "none"});
   header_logo.className = "header_logo";
   header_logo.innerHTML = "My Boards";
}

function dragOver(e) {
    e.preventDefault()
}

function dragEnter(e) {
  e.preventDefault();
  this.className += " openedBoxHovered";
}

function dragLeave() {
  this.className = 'openedBoxStop';
}

function dragDrop(e) {
  e.preventDefault();
  console.log("dropped");
  darggedElemenet.style.display = "none"; 
  
  var classid=classNameOfElement;
  for (var i = 0; i < 8; i++) {
    classid = classid.substring(1);
  }

  console.log("classNameOfElement: "+classNameOfElement);
  console.log("classid: "+classid);
  deleteFromList(darggedElemenet.parentNode.parentNode.id, classid);//looks like everything crashes when this function is being called
  localStorage.setItem("list", JSON.stringify(boards));
}
