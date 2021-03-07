@if(count($filtered) > 0)
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="{{asset('js/jquery-1.11.0.min.js')}}"></script>
    {{-- <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css"> --}}
        
        <table class="table table-bordered">   
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
                <?php $s_price=0; ?>
                <?php $s_incoming=0; ?>
                <?php $i=0; ?>

                @foreach ($filtered as $report)
                    <?php $s_price+=$report->price; ?>
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
    </table>
    <div class="row">
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('results.index') }}"> Back</a>
        </div>
    </div>

@endif