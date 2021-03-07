@extends('reports.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Add Report</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('reports.index') }}"> Back</a>
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

    <form action="{{ route('reports.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>name:</strong>
                    <input type="text" name="name" class="form-control" value="{{Auth::user()->email}}" readonly placeholder="Name">
                </div>
            </div>
            <input type="hidden" name="team" value="{{Auth::user()->team}}" placeholder="date">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>date:</strong>
                    <input type="date" name="date" class="form-control" placeholder="date">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>total_hours:</strong>
                    <input type="text" name="total_hours" class="form-control" placeholder="total_hours">
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
                    <strong>bids:</strong>
                    <input type="text" name="bids" class="form-control" placeholder="bids">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>bidding_hours:</strong>
                    <input type="text" name="bidding_hours" class="form-control" placeholder="time for bidding">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>chats:</strong>
                    <input type="text" name="chats" class="form-control" placeholder="chats">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>chatting_hours:</strong>
                    <input type="text" name="chatting_hours" class="form-control" placeholder="time for interview">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Awards:</strong>
                    <input type="text" name="Awards" class="form-control" placeholder="awards">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Acepts:</strong>
                    <input type="text" name="Acepts" class="form-control" placeholder="acepts">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>pending_tasks:</strong>
                    <input type="text" name="pending_tasks" class="form-control" placeholder="pending_tasks">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>task_hours:</strong>
                    <input type="text" name="task_hours" class="form-control" placeholder="task_hours">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>description:</strong>
                    <input type="text" name="description" class="form-control" placeholder="description">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection