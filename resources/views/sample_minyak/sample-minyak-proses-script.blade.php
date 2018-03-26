$(function() {
    $('#pilih-minyak-proses').change(function() {
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
              // $.each(response, function(index, item) {
              //     var table_row = $('<tr>', {});
              //     var table_cell1 = $('<td>', {html: item.line});
              //     var table_cell2 = $('<td>', {html: item.nilai_pv});
              //     var table_cell3 = $('<td>', {html: item.bobot_ffa});
              //     table_row.append(table_cell1,table_cell2,table_cell3);
              //     table_obj.append(table_row);
              // });
              $.each(response, function(index, item) {
                var table_row   = $('<tr>', {});
                var table_cell1 = `<td><input type="hidden" name="line_`+index+`" class="form-control" value="`+item.line+`" />`+item.line+`</td>`;
                var table_cell2 = `<td><input type="hidden" name="tangki_`+index+`" class="form-control" value="`+item.tangki+`" />`+item.tangki+`</td>`;
                var table_cell3 = `<td><input type="text" name="variant_product_`+index+`" class="form-control" value="`+item.variant_product+`" /></td>`;
                var table_cell4 = `<td><input type="text" name="volume_pv_`+index+`" class="form-control" value="`+item.volume_pv+`" /></td>`;
                var table_cell5 = `<td><input type="text" name="bobot_pv_`+index+`" class="form-control" value="`+item.bobot_pv+`" /></td>`;
                var table_cell6 = `<td><input type="text" name="normalitas_pv_`+index+`" class="form-control" value="`+item.normalitas_pv+`" /></td>`;
                var table_cell7 = `<td><input type="text" name="nilai_pv_`+index+`" class="form-control" readonly value="`+item.nilai_pv+`" /></td>`;
                var table_cell8 = `<td><input type="text" name="volume_ffa_`+index+`" class="form-control" value="`+item.volume_ffa+`" /></td>`;
                var table_cell9 = `<td><input type="text" name="bobot_ffa_`+index+`" class="form-control" value="`+item.bobot_ffa+`" /></td>`;
                var table_cell10 = `<td><input type="text" name="normalitas_ffa_`+index+`" class="form-control" value="`+item.normalitas_ffa+`" /></td>`;
                var table_cell11 = `<td><input type="text" name="nilai_ffa_`+index+`" class="form-control" readonly value="`+item.nilai_ffa+`" /></td>`;
                var table_cell12 = `<input type="hidden" name="row" class="form-control" value="`+index+`" />`;
                table_row.append(table_cell1,table_cell2,table_cell3,table_cell4,table_cell5,table_cell6,table_cell7,table_cell8,table_cell9,table_cell10,table_cell11,table_cell12);
                table_obj.append(table_row);
              });
              // // Menampilkan data ke tabel detail pv
              // var pv_obj = $('#pv');
              // $.each(response, function(index, item) {
              //     var table_row = $('<tr>', {});
              //     var table_cell1 = `<td>`+item.line+`</td>`;
              //     var table_cell2 = `<td>`+item.variant_product+`</td>`;
              //     var table_cell3 = `<td><input class="form-control" value="`+item.volume_pv+`" /></td>`;
              //     var table_cell4 = `<td><input class="form-control" value="`+item.bobot_pv+`" /></td>`;
              //     var table_cell5 = `<td><input class="form-control" value="`+item.normalitas_pv+`" /></td>`;
              //     var table_cell6 = `<td><input class="form-control" readonly value="`+item.nilai_pv+`" /></td>`;
              //     table_row.append(table_cell1,table_cell2,table_cell3,table_cell4,table_cell5,table_cell6);
              //     pv_obj.append(table_row);
              // });
              // // Menampilkan data ke tabel detail ffa
              // var pv_obj = $('#ffa');
              // $.each(response, function(index, item) {
              //     var table_row = $('<tr>', {});
              //     var table_cell1 = `<td>`+item.line+`</td>`;
              //     var table_cell2 = `<td>`+item.variant_product+`</td>`;
              //     var table_cell3 = `<td><input class="form-control" value="`+item.volume_pv+`" /></td>`;
              //     var table_cell4 = `<td><input class="form-control" value="`+item.bobot_pv+`" /></td>`;
              //     var table_cell5 = `<td><input class="form-control" value="`+item.normalitas_pv+`" /></td>`;
              //     var table_cell6 = `<td><input class="form-control" readonly value="`+item.nilai_pv+`" /></td>`;
              //     table_row.append(table_cell1,table_cell2,table_cell3,table_cell4,table_cell5,table_cell6);
              //     pv_obj.append(table_row);
              // });

            },
            error : function(error) {
                console.log(error)
            }
        });
    })
    $('#minyakLineForm').submit((event) => {
        event.preventDefault();
        if ($('#tanggal').val() == ""){
          alert('select sample date first!');
        }else if ($('#jam').val() == ""){
          alert('select jam sample fisrt!');
        }else if ($('#dept').val() == ""){
          alert('select department first');
        }else{
          $('#minyakLineForm button').text('Menyimpan..');
          $('#minyakLineForm button').attr('disabled', true);
          var minyakLineData = $('#minyakLineForm').serializeArray();
          minyakLineData.push({
            name: "tanggal_sample",
            value: $('#tanggal').val()
          });
          minyakLineData.push({
            name: "jam_sample",
            value: $('#jam').val()
          });
          minyakLineData.push({
            name: "department",
            value: $('#dept').val()
          });
          minyakLineData.push({
            name: "_token",
            value: "{{ csrf_token() }}"
          });
          $.ajax({
              type: "POST",
              dataType: "json",
              url: "{{ route('sample_minyak.store') }}",
              data: minyakLineData,
              success: (response) => {

                  if (response.succes == 1) {
                      location.href = "{{ route('sample.minyak.input') }}?alert=succes&semua_id="+response.semua_id;
                  }
                  $('#minyakLineForm button').text('Simpan');
                  $('#minyakLineForm button').attr('disabled', false);
              },
              error: (error) => {
                  alert('ada error');
                  console.log(error)
                  $('#minyakLineForm button').text('Simpan');
                  $('#minyakLineForm button').attr('disabled', false);
              }
          })
        }

    })
})
function show_modal_minyak_proses()
{
    $("#form-minyak-proses").modal('show');
}
