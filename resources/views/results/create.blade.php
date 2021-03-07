@extends('reports.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Add Result</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('results.index') }}"> Back</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('results.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>proj_id:</strong>
                    <input type="text" name="proj_id" class="form-control" placeholder="proj_id">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>proj_name:</strong>
                    <input type="text" name="proj_name" class="form-control" placeholder="proj_name">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>team:</strong>
                    <input type="text" name="team" class="form-control" placeholder="team">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>account:</strong>
                    <input type="text" name="account" class="form-control" placeholder="account">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>client_info:</strong>
                       <input type="text" name="client_info" class="form-control" placeholder="client_info">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>job_site:</strong>
                       <input type="text" name="job_site" class="form-control" placeholder="job_site">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>bidding_time:</strong>
                    <input type="text" name="bidding_time" class="form-control" placeholder="yy-mm-dd hh:mm">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>award_time:</strong>
                    <input type="text" name="award_time" class="form-control" placeholder="yy-mm-dd hh:mm">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>acept_time:</strong>
                    <input type="text" name="acept_time" class="form-control" placeholder="yy-mm-dd hh:mm">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>member:</strong>
                    <input type="text" name="member" class="form-control" placeholder="member">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>price:</strong>
                    <input type="text" name="price" class="form-control" placeholder="price">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>completed_time:</strong>
                    <input type="text" name="completed_time" class="form-control" placeholder="yy-mm-dd hh:mm">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>other:</strong>
                    <input type="text" name="other" class="form-control" placeholder="other">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection