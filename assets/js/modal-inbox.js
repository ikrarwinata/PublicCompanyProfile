
    $('.modal-btn').on("click", function(){
    	var modal = $(this);
    	var id = modal.attr("aria-id");
	 	$.ajax({
		    type: 'ajax',
		    method: 'POST',
			url:"admin/Komentar/read",
			data:{'id':id},
			ContentType: 'application/json',
			success: function(e){
				var jp = JSON.parse(e);
				$("#modal-title").text(jp.nama);
				$("#modal-title2").text(jp.subject);
				$("#modal-body").text(jp.pesan);
				$("#modal-overlay").find(".overlay").remove();
			},
			error: function(e){
				
			},
			failed: function(e){
				
			}
		});
    	
    });