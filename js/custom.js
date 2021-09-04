function validateForm() {
  var a = document.forms['book']["name"].value;
  var b = document.forms['book']["phone"].value;
  var c = document.forms['book']["email"].value;
  var f = document.forms['book']["trnum"].value;
  if (a === "") {
    alert("Name must be filled out");
    return false;
  }
  if (b === "") {
    alert("Number must be filled out");
    return false;
  }
  if (c === "") {
    alert("Email must be filled out");
    return false;
  }
 
  if (f === "") {
    alert("Number of people must be filled out");
    return false;
  }
}