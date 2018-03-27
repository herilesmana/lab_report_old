$(function() {
    $('#pilih-sample-mie').change(function() {
        $('#table-sample-mie').hide();
        $('.waiting-sample-mie').show();
        var form_data = new FormData();
        var sample_mie = $(this).prop('files')[0];
        form_data.append('sample_mie', sample_mie);
        form_data.append('_token', "{{ csrf_token() }}");
        $.ajax({
            type: 'POST',
            url: "{{ route('sample.mie.upload') }}",
            data : form_data,
            contentType: false,
            cache: false,
            processData: false,
            success : function(response) {
              // Menampilkan animasi loading dan menyembunyikan tabel utama
              $('.waiting-sample-mie').hide();
              $('#table-sample-mie').show();
              console.log(response);
              // Menampilkan data ke tabel utama
              var table_obj = $('#table-sample-mie');
              $('#table-sample-mie tbody tr').remove();
              $.each(response, function(index, item) {
                var table_row   = $('<tr>', {});
                var table_cell3 = `<td><input type="text" name="variant_product_`+index+`" class="form-control" value="`+item.variant_product+`" /></td>`;
                var table_cell4 = `<td><input type="text" name="bobot_sample_`+index+`" class="form-control" value="`+item.bobot_sample+`" /></td>`;
                var table_cell5 = `<td><input type="text" name="labu_awal_`+index+`" class="form-control" value="`+item.labu_awal+`" /></td>`;
                var table_cell6 = `<td><input type="text" name="labu_akhir_`+index+`" class="form-control" value="`+item.labu_akhir+`" /></td>`;
                var table_cell7 = `<td><input type="text" name="nilai_fc_`+index+`" class="form-control" readonly value="`+item.nilai_fc+`" /></td>`;
                var table_cell8 = `<td><input type="text" name="cawan_kosong_`+index+`" class="form-control" value="`+item.cawan_kosong+`" /></td>`;
                var table_cell9 = `<td><input type="text" name="cawan_dengan_sample_`+index+`" class="form-control" value="`+item.cawan_dengan_sample+`" /></td>`;
                var table_cell10 = `<td><input type="text" name="bobot_akhir_`+index+`" class="form-control" value="`+item.bobot_akhir+`" /></td>`;
                var table_cell11 = `<td><input type="text" name="nilai_ka_`+index+`" class="form-control" readonly value="`+item.nilai_ka+`" /></td>`;
                var table_cell12 = `<input type="hidden" name="row" class="form-control" value="`+index+`" />`;
                table_row.append(table_cell3,table_cell4,table_cell5,table_cell6,table_cell7,table_cell8,table_cell9,table_cell10,table_cell11,table_cell12);
                table_obj.append(table_row);
              });
            },
            error : function(error) {
                console.log(error)
            }
        });
    })
    $('#SampleMieForm').submit( (event) => {
        event.preventDefault();
        if ($('#tanggal').val() == ""){
            alert('select sample date first!');
        }else if ($('#shift').val() == ""){
            alert('select shift first');
        }else if ($('#dept').val() == ""){
            alert('select department first');
        }else{
            $('#SampleMieForm button').text('Menyimpan..');
            $('#SimpleMieForm button').attr('disabled', true);
            var SampleMieData = $('#SampleMieForm').serializeArray();
            SampleMieData.push({
                name: "tanggal_sample",
                value: $('#tanggal').val()
            });
            SampleMieData.push({
                name: "shift",
                value: $('#shift').val()
            });
            SampleMieData.push({
                name: "department",
                value: $('#dept').val()
            });
            SampleMieData.push({
                name: "_token",
                value: "{{ csrf_token() }}"
            });
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ route('sample_mie.store') }}",
                data: SampleMieData,
                success: (response) => {
                    if (response.succes == 1) {
                        location.href = "{{ route('sample.mie.input') }}?alert=succes&semua_id="+response.semua_id;
                    }
                    $('#SampleMieForm button').text('Simpan');
                    $('#SampleMieForm button').attr('disabled', false);
                },
                error: (error) => {
                    alert('ada error');
                    console.log(error)
                    $('#SampleMieForm button').text('Simpan');
                    $('#SampleMieForm button').attr('disabled', false);
                }
            })
        }

    })
})
function show_modal_minyak_proses()
{
    $("#form-minyak-proses").modal('show');
}
