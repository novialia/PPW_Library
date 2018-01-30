$(document).ready(function(){
	$("#btn-submit-review").click(function(e){
		e.preventDefault();
		var getreview = $('#review').val();
		var bookid = $('#bookid').val();
		console.log("masuk");
		$.post('../add_review', $('#add-review').serialize(), function(callback){
				var json = JSON.parse(callback);
				var text = '';
				if(json.status === 'ok'){
					text += "<h5><strong>" + json.username + "</strong></h5>" + json.date + "<br>" + getreview + "<br><br>";
					$('.new-review').append(text);
				} else {
					console.log('gagal');
				}
		});
	});
});