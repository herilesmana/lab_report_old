$(function() {
    $('#pilih-minyak-{{ $sample }}').change(function() {
        $('#table-minyak-proses').hide();
        $('.waiting-minyak-proses').show();
        var form_data = new FormData();
        var minyak_proses = $(this).prop('files')[0];
        form_data.append('minyak_proses', minyak_proses);
        form_data.append('_token', "{{ csrf_token() }}");
        $.ajax({
            type: 'POST',
            url: "{{ route('sample.minyak.upload') }}",
            data : form_data,
            contentType: false,
            cache: false,
            processData: false,
            success : function(response) {
              // Menampilkan animasi loading dan menyembunyikan tabel utama
              $('.waiting-minyak-proses').hide();
              $('#table-minyak-proses').show();
              console.log(response);
              // Menampilkan data ke tabel utama
              var table_obj = $('#table-minyak-proses');
              $('#table-minyak-proses tbody tr').remove();
              $('#pv tbody tr').remove();
              $.each(response, function(index, item) {
                  var table_row = $('<tr>', {});
                  var table_cell1 = $('<td>', {html: item.line});
                  var table_cell2 = $('<td>', {html: item.nilai_pv});
                  var table_cell3 = $('<td>', {html: item.bobot_ffa});
                  table_row.append(table_cell1,table_cell2,table_cell3);
                  table_obj.append(table_row);
              });
              // Menampilkan data ke tabel detail pv
              var pv_obj = $('#pv');
              $.each(response, function(index, item) {
                  var table_row = $('<tr>', {});
                  var table_cell1 = `<td>`+item.line+`</td>`;
                  var table_cell2 = `<td>`+item.variant_product+`</td>`;
                  var table_cell3 = `<td><input class="form-control" value="`+item.volume_pv+`" /></td>`;
                  var table_cell4 = `<td><input class="form-control" value="`+item.bobot_pv+`" /></td>`;
                  var table_cell5 = `<td><input class="form-control" value="`+item.normalitas_pv+`" /></td>`;
                  var table_cell6 = `<td><input class="form-control" readonly value="`+item.nilai_pv+`" /></td>`;
                  table_row.append(table_cell1,table_cell2,table_cell3,table_cell4,table_cell5,table_cell6);
                  pv_obj.append(table_row);
              });
              // Menampilkan data ke tabel detail ffa
              var pv_obj = $('#ffa');
              $.each(response, function(index, item) {
                  var table_row = $('<tr>', {});
                  var table_cell1 = `<td>`+item.line+`</td>`;
                  var table_cell2 = `<td>`+item.variant_product+`</td>`;
                  var table_cell3 = `<td><input class="form-control" value="`+item.volume_pv+`" /></td>`;
                  var table_cell4 = `<td><input class="form-control" value="`+item.bobot_pv+`" /></td>`;
                  var table_cell5 = `<td><input class="form-control" value="`+item.normalitas_pv+`" /></td>`;
                  var table_cell6 = `<td><input class="form-control" readonly value="`+item.nilai_pv+`" /></td>`;
                  table_row.append(table_cell1,table_cell2,table_cell3,table_cell4,table_cell5,table_cell6);
                  pv_obj.append(table_row);
              });

            },
            error : function(error) {
                console.log(error)
            }
        });
    })
})
function show_modal_minyak_proses()
{
    $("#form-minyak-proses").modal('show');
}
