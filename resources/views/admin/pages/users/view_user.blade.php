@extends('admin.layout.app')

@section('title', 'User Details | Jiu Jitsu')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">User Details</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">{{ $user->name}}</h4>
                    <p class="card-title-desc">{{ $user->email }}</p>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Trainings</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">Promotions</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#messages1" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                <span class="d-none d-sm-block">Competitions</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane active" id="home1" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">

                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Academy</th>
                                        <th>Professor</th>
                                        <th>Notes</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($trainings->count() > 0)
                                        @foreach($trainings as $item)
                                            <tr>
                                                <th scope="row">{{ $loop->index+1 }}</th>
                                                <td>{{ !empty($item->date) ? $item->date : 'No Data' }}</td>
                                                <td>{{ !empty($item->academy) ? $item->academy : 'No Data' }}</td>
                                                <td>{{ !empty($item->professor) ? $item->professor : 'No Data' }}</td>
                                                <td>{{ !empty($item->notes) ? $item->notes : 'No Data' }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="9" class="text-center">
                                                No Record Found
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="profile1" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">

                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Belt Rank</th>
                                        <th>Degree</th>
                                        <th>Date</th>
                                        <th>Academy</th>
                                        <th>Professor</th>
                                        <th>Notes</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($promotions->count() > 0)
                                        @foreach($promotions as $item)
                                            <tr>
                                                <th scope="row">{{ $loop->index+1 }}</th>
                                                <td>{{ !empty($item->belt_rank) ? $item->belt_rank : 'No Data' }}</td>
                                                <td>{{ !empty($item->degree) ? $item->degree : 'No Data' }}</td>
                                                <td>{{ !empty($item->date) ? $item->date : 'No Data' }}</td>
                                                <td>{{ !empty($item->academy) ? $item->academy : 'No Data' }}</td>
                                                <td>{{ !empty($item->professor) ? $item->professor : 'No Data' }}</td>
                                                <td>{{ !empty($item->notes) ? $item->notes : 'No Data' }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="9" class="text-center">
                                                No Record Found
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="messages1" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">

                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Competition Name</th>
                                        <th>Date</th>
                                        <th>Location</th>
                                        <th>Gender</th>
                                        <th>Weight Division</th>
                                        <th>Age Division</th>
                                        <th>Belt Rank</th>
                                        <th>Competitors</th>
                                        <th>Matches</th>
                                        <th>Wins</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($competition->count() > 0)
                                        @foreach($competition as $item)
                                            <tr>
                                                <th scope="row">{{ $loop->index+1 }}</th>
                                                <td>{{ !empty($item->competition_name) ? $item->competition_name : 'No Data' }}</td>
                                                <td>{{ !empty($item->date) ? $item->date : 'No Data' }}</td>
                                                <td>{{ !empty($item->location) ? $item->location : 'No Data' }}</td>
                                                <td>{{ !empty($item->gender) ? $item->gender : 'No Data' }}</td>
                                                <td>{{ !empty($item->weight) ? $item->weight : 'No Data' }}</td>
                                                <td>{{ !empty($item->age_division) ? $item->age_division : 'No Data' }}</td>
                                                <td>{{ !empty($item->belt_rank) ? $item->belt_rank : 'No Data' }}</td>
                                                <td>{{ !empty($item->competitors) ? $item->competitors : '0' }}</td>
                                                <td>{{ !empty($item->matches) ? $item->matches : '0' }}</td>
                                                <td>{{ !empty($item->wins) ? $item->wins : '0' }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="12" class="text-center">
                                                No Record Found
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
