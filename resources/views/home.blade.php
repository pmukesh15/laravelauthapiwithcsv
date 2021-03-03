@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! <a target="_blank" href="{{route('import')}}"> Click here to import your data !!!</a>.<br/>
                    <a class="links link" href="{{route('viewuploads')}}"> View Imported Data</a><br/><br/>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
