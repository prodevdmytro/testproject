@extends('reports.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Edit Invoice Recorder</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('invoice.index') }}"> Back</a>
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

    <form action="{{ route('invoice.update',$invoice->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>team:</strong>
                    <input type="text" name="team" value="{{$invoice->team}}" value="{{$invoice->team}}"  class="form-control" placeholder="team">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>account:</strong>
                    <input type="text" name="account" value="{{$invoice->account}}" value="{{$invoice->account}}"  class="form-control" placeholder="account">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>job_site:</strong>
                    <input type="text" name="job_site" value="{{$invoice->job_site}}"  class="form-control" placeholder="job_site">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>invoice:</strong>
                    <input type="text" name="invoice" value="{{$invoice->invoice}}"  class="form-control" placeholder="invoice">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>date:</strong>
                    <input type="date" name="date" value="{{$invoice->date}}"  class="form-control" placeholder="date">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>checker:</strong>
                    <input type="text" name="checker" value="{{$invoice->checker}}"  class="form-control" placeholder="checker">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>other:</strong>
                    <input type="text" name="other" value="{{$invoice->other}}"  class="form-control" placeholder="other">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection