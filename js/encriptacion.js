function cifrar(){
	var input_pass = document.getElementById("pass");
	input_pass.value = CryptoJS.SHA1(input_pass.value);
	alert(input_pass.value)
}


$(document).ready(function(){
	cifrar()
	alert("hey");
});
