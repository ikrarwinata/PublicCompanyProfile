$(document).ready(function () {
  bsCustomFileInput.init();
});

function sub_me(selector){
	$(selector).closest(".statis-gallery").remove();
}

$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    $("#add-gallery").on("click", function(){
      var m = $(".statis-gallery").eq(0).clone();
      var delbtn='<button type="button" class="btn btn-danger del-btn" onclick="return sub_me(this)" ><i class="fa fa-trash"></i></button>';
      m.find(".col-lg-2").append(delbtn);

      $("#dinamis-gallery-container").append(m);
    })
})