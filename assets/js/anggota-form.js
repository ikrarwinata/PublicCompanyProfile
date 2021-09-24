
function validateform(){
	var form = $("form");

	if(form.find("#password").val() != form.find("#password2").val()){
		alert("Konfirmasi Password Tidak Cocok !");
		return false;
	};
}