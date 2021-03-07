@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Completed Projects</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
        @if(Auth::user()->position >= 1)
            <a class="btn btn-success " href="{{ route('results.create') }}"> Add Result</a>
        @endif
            <div style="display:inline-block">
                Proj_ID:<input type="text" class="col-md-2 proj_id_fil">
                Proj_Name:<input type="text" class="col-md-1 proj_name_fil">
                Client_Info:<input type="text" class="col-md-2 client_fil">
                Member:<input type="text" class="col-md-1 member_fil">
                Team:<input type="text" class="col-md-1 team_fil">
                <a class="btn btn-success show_btn" style="margin-left:30px"> Search</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if(sizeof($results) > 0)
        <table class="table table-bordered"  id="table_body">
            <tr>
                <th>@sortablelink('No')</th>
                <th>@sortablelink('proj_id')</th>
                <th>@sortablelink('proj_name')</th>
                <th>@sortablelink('team')</th>
                <th>@sortablelink('account')</th>
                <th>@sortablelink('client_info')</th>
                <th>@sortablelink('job_site')</th>
                <th>@sortablelink('bidding_time')</th>
                <th>@sortablelink('award_time')</th>
                <th>@sortablelink('acept_time')</th>
                <th>@sortablelink('member')</th>
                <th>@sortablelink('price')</th>
                <th>@sortablelink('completed_time')</th>
                <th>@sortablelink('other')</th>
                <th>@sortablelink('state')</th>
                <th>More</th>
            </tr>
            <tbody>
                    <?php $s_price=0; ?>
                    <?php $s_incoming=0; ?>
                @foreach ($results as $report)
                    <?php $s_price+=$report->price; ?>
                    <?php $s_incoming+=$report->incoming; ?>
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $report->proj_id }}</td>
                    <td>{{ $report->proj_name }}</td>
                    <td>{{ $report->team }}</td>
                    <td>{{ $report->account }}</td>
                    <td>{{ $report->client_info }}</td>
                    <td>{{ $report->job_site }}</td>
                    <td>{{ $report->bidding_time }}</td>
                    <td>{{ $report->award_time }}</td>
                    <td>{{ $report->acept_time }}</td>
                    <td>{{ $report->member }}</td>
                    <td>{{ $report->price }}</td>
                    <td>{{ $report->completed_time }}</td>
                    <td>{{ $report->other }}</td>
                    <td>{{ $report->state }}</td>
                    <td>
                        <form action="{{ route('results.destroy',$report->id) }}" method="POST" style="display:flex;">
                            @if($report->state != 'Accepted')
                            <!-- <a class="btn btn-info btn-sm" href="{{ route('results.show',$report->id) }}">Detail</a> -->
                            <a class="btn btn-primary btn-sm" href="{{ route('results.edit',$report->id) }}">Edit</a>

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
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{ $s_price }}</td>
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

    <script>
    function ratify(id) {
            $.ajax({
                url: 'result_ratifing',
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
                url: 'result_ratifing',
                type: 'GET',
                data: {
                    id:id,
                    action:'reject'
                },
                success: function(data)
                {
                    $("[onclick='ratify("+id+")']").parents('td').prev().text('Rejected');
                    $("[onclick='ratify("+id+")']").prev().removeClass('disabled').attr('type','submit');
                    $("[onclick='ratify("+id+")']").prev().prev().prev().prev().removeClass('disabled').attr('href','{{ route('results.edit',$report->id) }}');

                }
            });
    }
    <?php }?>
    $(function() {
            $('.show_btn').click(function() {
                var proj_id = $('.proj_id_fil').val();
                var proj_name = $('.proj_name_fil').val();
                var client = $('.client_fil').val();
                var member =$('.member_fil').val();
                var team =$('.team_fil').val();
                $('#table_body').load("filterdata_result?proj_id="+proj_id+"&proj_name="+proj_name+"&client="+client+"&member="+member+"&team="+team, function(data){
                    console.log(data);
                    $(this).show();
                })

            });
        });    
    </script>
@endsection
