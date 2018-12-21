@extends('layouts.base')

@section('title')
    Edit Approve Sample Minyak
@endsection

@section('breadcrumb')
    Edit Approve Sample Minyak
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Approve Sample Minyak
                </div>
                <div class="card-body row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <div class="col-md-3">
                                <input name="id_sample" placeholder="Id Sample" class="form-control" type="text" id="id_sample">
                                <span class="invalid-feedback"></span>
                            </div>
                            <button id="find" type="button" class="btn btn-sm btn-primary">Find</button>
                        </div>
                    </div>
                    <div class="col-md-12 tidak-ditemukan" style="display: none">
                        <div class="alert alert-danger">Tidak ditemukan data minyak dengan ID tersebut</div>
                    </div>
                    <div class="col-md-12 ditemukan">
                        <h4>Sample minyak info</h4>
                        <table>
                            <tr>
                                <td>ID</td>
                                <td>:</td>
                                <td class="id"></td>
                            </tr>
                            <tr>
                                <td>Dept</td>
                                <td>:</td>
                                <td class="dept"></td>
                            </tr>
                            <tr>
                                <td>LINE</td>
                                <td>:</td>
                                <td class="line"></td>
                            </tr>
                            <tr>
                                <td>Variant</td>
                                <td>:</td>
                                <td class="variant"></td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td>:</td>
                                <td class="date"></td>
                            </tr>
                            <tr>
                                <td>Time</td>
                                <td>:</td>
                                <td class="time"></td>
                            </tr>
                            <tr>
                                <td>Approver </td>
                                <td> : </td>
                                <td class="approver"></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td class="status"></td>
                            </tr>
                            <tr>
                                <td>
                                <button disabled id="request" type="button" class="btn btn-success"><i class="icon-pencil"></i> Request Edit</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

<script type="text/javascript">
    $('#find').on('click', function () {
        $.ajax({
            url : "{{ URL::to('sample-minyak') }}/"+$('#id_sample').val()+"/edit",
            type : "GET",
            dataType : 'JSON',
            success : function (response) {
                if(response == null)
                {
                    $('.tidak-ditemukan').show(500);
                    $('#requrest').attr('disabled', true);
                    $('.id').text('');
                    $('.dept').text('');
                    $('.line').text('');
                    $('.variant').text('');
                    $('.date').text('');
                    $('.time').text('');
                    $('.approver').text('');
                    $('.status').text('');
                }else{
                    $('.tidak-ditemukan').hide(200);
                    $('#request').removeAttr('disabled');
                    $('.id').text(response.id);
                    $('.dept').text(response.dept_name);
                    $('.line').text(response.line_id);
                    $('.variant').text(response.variant);
                    $('.date').text(response.sample_date);
                    $('.time').text(response.sample_time);
                    $('.approver').text(response.approver);
                    var status = '';
                    if(response.status == 1) {
                        status = 'Created';
                    }else if(response.status == 2) {
                        status = 'Uploaded';
                    }else if (response.status == 3) {
                        status = 'Approved';
                    }
                    $('.status').text(status);
                }
            },
            error : function (error) {
                console.log(error)
            }
        })
    })
    $('#request').on('click', function () {
        $.ajax({
            url : "{{ URL::to('sample-minyak') }}/"+$('#id_sample').val()+"/submit_edit",
            type : "GET",
            dataType : 'JSON',
            success : function (response) {
                if (response.success == 1) {
                    $('#requrest').attr('disabled', true);
                    $('.id').text('');
                    $('.dept').text('');
                    $('.line').text('');
                    $('.variant').text('');
                    $('.date').text('');
                    $('.time').text('');
                    $('.approver').text('');
                    $('.status').text('');
                }
            },
            error : function (error) {
                console.log(error)
            }
        })
    })
</script>

@endpush
