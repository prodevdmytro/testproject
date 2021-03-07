@if($flag > 0)
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="{{asset('js/jquery-1.11.0.min.js')}}"></script>
    {{-- <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css"> --}}
    <table class="table table-bordered">
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

                <?php $s_total_hours=0; ?>
                <?php $s_bids=0; ?>
                <?php $s_chats=0; ?>
                <?php $s_bidding_hours=0; ?>
                <?php $s_Awards=0; ?>
                <?php $s_Acepts=0; ?>
                <?php $s_task_hours=0; ?>
                <?php $s_pending_tasks=0; ?>
                <?php $i=1; ?>
            @foreach ($filtered as $report)
                <?php $s_total_hours +=$report->total_hours; ?>
                <?php $s_bids+=$report->bids; ?>
                <?php $s_chats+=$report->chats; ?>
                <?php $s_bidding_hours+=$report->bidding_hours; ?>
                <?php $s_Awards+=$report->Awards; ?>
                <?php $s_Acepts+=$report->Acepts; ?>
                <?php $s_task_hours+=$report->task_hours; ?>
                <?php $s_pending_tasks+=$report->pending_tasks; ?>
            <tr>
                <td>{{ $i++ }}</td>
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

                        @endif
                        @if(Auth::user()->position ==  2 || ((Auth::user()->position == 1)&&(Auth::user()->team == $report->team)))
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
                <td>{{ $s_bidding_hours}}</td>
                <td>{{ $s_chats }}</td>
                <td></td>
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
    <div class="row">
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('reports.index') }}"> Back</a>
        </div>
    </div>


    @endif
