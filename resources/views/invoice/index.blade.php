@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Invoices</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
        @if(Auth::user()->position >= 1)
            <a class="btn btn-success " href="{{ route('invoice.create') }}"> Add Invoice Record</a>
        @endif
            <div style="display:inline-block">
                Team:<input type="text" class="col-md-1 team_fil">
                Job_site:<input type="text" class="col-md-2 job_site_fil">
                Date:<input type="date" class="col-md-2 date_fil">
                checker:<input type="text" class="col-md-2 checker_fil">
                <a class="btn btn-success show_btn" style="margin-left:30px"> Search</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if(sizeof($invoice) > 0)
        <table class="table table-bordered"  id="table_body">
            <tr>
                <th>@sortablelink('No')</th>
                <th>@sortablelink('team')</th>
                <th>@sortablelink('account')</th>
                <th>@sortablelink('job_site')</th>
                <th>@sortablelink('invoice')</th>
                <th>@sortablelink('date')</th>
                <th>@sortablelink('checker')</th>
                <th>@sortablelink('other')</th>
                <th>@sortablelink('state')</th>
                <th>@sortablelink('More')</th>
            </tr>
            <tbody>
                    <?php $s_invoice=0; ?>
                @foreach ($invoice as $report)
                    <?php $s_invoice+=$report->invoice; ?>
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $report->team }}</td>
                    <td>{{ $report->account }}</td>
                    <td>{{ $report->job_site }}</td>
                    <td>{{ $report->invoice }}</td>
                    <td>{{ $report->date }}</td>
                    <td>{{ $report->checker }}</td>
                    <td>{{ $report->other }}</td>
                    <td>{{ $report->state }}</td>
                    <td>
                        <form action="{{ route('invoice.destroy',$report->id) }}" method="POST" style="display:flex;">
                            @if($report->state != 'Accepted')
                            <!-- <a class="btn btn-info btn-sm" href="{{ route('invoice.show',$report->id) }}">Detail</a> -->
                            <a class="btn btn-primary btn-sm" href="{{ route('invoice.edit',$report->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            @else
                            <a class="btn btn-primary btn-sm disabled">Edit</a>
                            <a class="btn btn-danger btn-sm disabled">Delete</a>
                            @endif
                            @if(Auth::user()->position == 2)
                            <button type="button" class="btn btn-info btn-sm" onclick='ratify({{ $report->id }})'>Accept</button>
                            <button type="button" class="btn btn-warning btn-sm" onclick='reject({{ $report->id }})'>Decline</button>
                            @endif
                        </form>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td>Sum:</td>
                    <td></td>
                    <td></td>
                    <td>{{ $s_invoice }} </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    @else
        <div class="alert alert-alert">Start Adding to the Database.</div>
    @endif
    {!! $invoice->appends(request()->except('page'))->render() !!}
    <script>
    function ratify(id) {
            $.ajax({
                url: 'invoice_ratifing',
                type: 'GET',
                data: {
                    id:id,
                    action:'ratify'
                },
                success: function(data)
                {
                   $("[onclick='ratify("+id+")']").parents('td').prev().text('Accepted');
                   $("[onclick='ratify("+id+")']").prev().addClass('disabled').attr('type','button');
                   $("[onclick='ratify("+id+")']").prev().prev().prev().prev().addClass('disabled').removeAttr('href');
                }
            });
    }
    <?php if($num > 0){ ?>
    function reject(id) {
            $.ajax({
                url: 'invoice_ratifing',
                type: 'GET',
                data: {
                    id:id,
                    action:'reject'
                },
                success: function(data)
                {
                    $("[onclick='ratify("+id+")']").parents('td').prev().text('Rejected');
                    $("[onclick='ratify("+id+")']").prev().removeClass('disabled').attr('type','submit');
                    $("[onclick='ratify("+id+")']").prev().prev().prev().prev().removeClass('disabled').attr('href','{{ route('invoice.edit',$report->id) }}');

                }
            });
    }
    <?php }?>
    $(function() {
            $('.show_btn').click(function() {
                var team = $('.team_fil').val();
                var job_site = $('.job_site_fil').val();
                var date = $('.date_fil').val();
                var checker =$('.checker_fil').val();
                $('#table_body').load("filterdata_invoice?team="+team+"&job_site="+job_site+"&date="+date+"&checker="+checker, function(data){
                    console.log(data);
                    $(this).show();
                })

            });
        });    
    </script>
@endsection
