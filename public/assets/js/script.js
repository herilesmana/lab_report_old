
var base_url = 'http://localhost/lab-report-new/';

$(document).ready(function () {
	$('.tanggal_sample').val("20/03/1998");
	$('#tanggal_sample a').click(function() {
		$('#tanggal_sample input').toggle()
		$('#tanggal_sample span').toggle()
	})

	// Ketika upload pv diklik

	$('.upload-pv').click(function() {
		var file_pv = $('#file-pv').prop('files')[0];
		var form_data = new FormData();
		form_data.append('file_pv', file_pv);
		$.ajax({
			url: base_url+'sample_minyak/upload_pv',
			dataType: 'JSON',
			data: form_data,
			cache: false,
            contentType: false,
            processData: false,
			type: 'POST',
			success: function (response) {
				console.log(response)
			}
		})
	});

});