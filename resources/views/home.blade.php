@extends('layouts.base')

@section('title')
    Home
@endsection

@section('breadcrumb')
    Home
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Real Time Lab Report
                </div>
                <div class="card-body">
                    <h4>Welcome To Real Time Lab Report App</h4>
                    <pre><code>Dept : {{ Session::get('department') }} | Group : Dept : {{ Session::get('auth_group') }}</code></pre>
                </div>
            </div>
        </div>
    </div>
@endsection
