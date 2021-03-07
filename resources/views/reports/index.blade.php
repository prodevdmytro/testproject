@extends('layouts.admin')

@section('content')

    <div class="row" >
        <div class="col-lg-12">
            <h2 class="text-center">Worklogs</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-success " href="{{ route('reports.create') }}"> Add Report</a>
            <div style="display:inline-block">
                date:<input type="date" class="col-md-3 date_fil">
                name:<input type="text" class="col-md-2 name_fil"  placeholder="Input name">
                team:<input type="text" class="col-md-2 team_fil"  placeholder="Input team">            
                <a class="btn btn-success show_btn" style="margin-left:30px"> Search</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
   
    <div id="table_body">
        @if(sizeof($reports) > 0)
            <table class="table table-bordered" id="">
                <tr>
                    <th>@sortablelink('No')</th>
                    <th>@sortablelink('team')</th>
                    <th>@sortablelink('name')</th>
                    <th>@sortablelink('date')</th>
                    <th>@sortablelink('total_hours')</th>
                    <th>@sortablelink('account')</th>
                    <th>@sortablelink('bids')</th>
                    <th>@sortablelink('bidding_hours')</th>
                    <th>@sortablelink('chats')</th>
                    <th>@sortablelink('chatting_hours')</th>
                    <th>@sortablelink('Awards')</th>
                    <th>@sortablelink('Acepts')</th>
                    <th>@sortablelink('pending_tasks')</th>
                    <th>@sortablelink('task_hours')</th>
                    <th>@sortablelink('description')</th>
                    <th>@sortablelink('State')</th>
                    <th>@sortablelink('More')</th>
                </tr>
                <tbody>
                        <?php $s_total_hours=0; ?>
                        <?php $s_bids=0; ?>
                        <?php $s_bidding_hours=0; ?>
                        <?php $s_chats=0; ?>
                        <?php $s_chatting_hours=0; ?>
                        <?php $s_Awards=0; ?>
                        <?php $s_Acepts=0; ?>
                        <?php $s_task_hours=0; ?>
                        <?php $s_pending_tasks=0; ?>
                        

                    @foreach ($reports as $report)
                        <?php $s_total_hours +=$report->total_hours; ?>
                        <?php $s_bids+=$report->bids; ?>
                        <?php $s_bidding_hours+=$report->bidding_hours; ?>
                        <?php $s_chats+=$report->chats; ?>
                        <?php $s_chatting_hours+=$report->chatting_hours; ?>
                        <?php $s_Awards+=$report->Awards; ?>
                        <?php $s_Acepts+=$report->Acepts; ?>
                        <?php $s_task_hours+=$report->task_hours; ?>
                        <?php $s_pending_tasks+=$report->pending_tasks; ?>
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $report->team }}</td>
                        <td>{{ $report->name }}</td>
                        <td>{{ $report->date }}</td>
                        <td style="background:#ffdddd">{{ $report->total_hours }}</td>
                        <td>{{ $report->account }}</td>
                        <td>{{ $report->bids }}</td>
                        <td style="background:#ffddff">{{ $report->bidding_hours }}</td>
                        <td>{{ $report->chats }}</td>
                        <td style="background:#ffddff">{{ $report->chatting_hours }}</td>
                        <td>{{ $report->Awards }}</td>
                        <td>{{ $report->Acepts }}</td>
                        <td>{{ $report->pending_tasks }}</td>
                        <td style="background:#ffddff">{{ $report->task_hours }}</td>
                        <td>{{ $report->description }}</td>
                        <td>{{ $report->state }}</td>
                        <td>
                            <form action="{{ route('reports.destroy',$report->id) }}" method="POST" style="display:flex;">
                                @if($report->state != 'Accepted' && Auth::user()->email == $report->name)
                                <!-- <a class="btn btn-info btn-sm" href="{{ route('reports.show',$report->id) }}">Show</a> -->
                                <a class="btn btn-primary btn-sm" href="{{ route('reports.edit',$report->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                @else
                                <a class="btn btn-primary btn-sm disabled">Edit</a>
                                <a class="btn btn-danger btn-sm disabled">Delete</a>
                                @endif
                                @if(Auth::user()->position == 2 || ((Auth::user()->position == 1)&&(Auth::user()->team == $report->team)))
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
                        <td>{{ $s_total_hours }}</td>
                        <td></td>
                        <td>{{ $s_bids }}</td>
                        <td>{{ $s_bidding_hours }}</td>
                        <td>{{ $s_chats }}</td>
                        <td>{{ $s_chatting_hours }}</td>
                        <td>{{ $s_Awards }}</td>
                        <td>{{ $s_Acepts }}</td>
                        <td>{{ $s_pending_tasks}}</td>
                        <td>{{ $s_task_hours }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        @else
            <div class="alert alert-alert">Start Adding to the Database.</div>
        @endif
    </div>  
  
    {!! $reports->appends(request()->except('page'))->render() !!}
    <script>
        $(function() {
            $('.show_btn').click(function() {
            
                var date = $('.date_fil').val();
                var name = $('.name_fil').val();
                var team = $('.team_fil').val();
                $('#table_body').load("filterdata?date="+date+"&name="+name+"&team="+team, function(data){
                    $(this).show();
                })

            });
        }); 
    function ratify(id) {
            $.ajax({
                url: 'ratifing',
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
                url: 'ratifing',
                type: 'GET',
                data: {
                    id:id,
                    action:'reject'
                },
                success: function(data)
                {
                    $("[onclick='ratify("+id+")']").parents('td').prev().text('Rejected');
                    $("[onclick='ratify("+id+")']").prev().removeClass('disabled').attr('type','submit');
                    $("[onclick='ratify("+id+")']").prev().prev().removeClass('disabled').attr('href','{{ route('reports.edit',$report->id) }}');

                }
            });
    }
    <?php }?>   
    </script>
@endsection
