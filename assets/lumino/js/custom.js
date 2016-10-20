function readURL(input) {//alert();
	var id=document.getElementById("fotoLokasi");
	if (input.files && input.files[0]) {
		  var reader = new FileReader();
		  reader.onload = function (e) {
		      $(id).attr('src', e.target.result);
		  }
		  reader.readAsDataURL(input.files[0]);
	}
}

$("[name='fotoProfile']").change(function(){
	readURL(this);
});

/*function submitFormAndGo(formName){
	var id=document.getElementById(formName);
	id.submit(function(){
		alert()
	});
}*/