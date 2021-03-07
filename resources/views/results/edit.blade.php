@extends('reports.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Edit result</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('results.index') }}"> Back</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('results.update',$result->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>proj_id:</strong>
                    <input type="text" name="proj_id" value="{{$result->proj_id}}" value="{{$result->proj_id}}"  class="form-control" placeholder="proj_id">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>proj_name:</strong>
                    <input type="text" name="proj_name" value="{{$result->proj_name}}"  class="form-control" placeholder="proj_name">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>team:</strong>
                    <input type="text" name="team" value="{{$result->team}}"  class="form-control" placeholder="team">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>account:</strong>
                    <input type="text" name="account" value="{{$result->account}}"  class="form-control" placeholder="account">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>client_info:</strong>
                    <input type="text" name="client_info" value="{{$result->client_info}}"  class="form-control" placeholder="client_info">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>job_site:</strong>
                    <input type="text" name="job_site" value="{{$result->job_site}}"  class="form-control" placeholder="job_site">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>bidding_time:</strong>
                    <input type="text" name="bidding_time" value="{{$result->bidding_time}}"  class="form-control" placeholder="bidding_time">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>award_time:</strong>
                    <input type="text" name="award_time" value="{{$result->award_time}}"  class="form-control" placeholder="award_time">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>acept_time:</strong>
                    <input type="text" name="acept_time" value="{{$result->acept_time}}"  class="form-control" placeholder="acept_time">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>member:</strong>
                    <input type="text" name="member" value="{{$result->member}}"  class="form-control" placeholder="member">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>price:</strong>
                    <input type="text" name="price" value="{{$result->price}}"  class="form-control" placeholder="price">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>completed_time:</strong>
                    <input type="text" name="completed_time" value="{{$result->completed_time}}"  class="form-control" placeholder="finish_time">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>other:</strong>
                    <input type="text" name="other" value="{{$result->other}}"  class="form-control" placeholder="other">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection