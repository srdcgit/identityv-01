@extends($activeTemplate . 'layouts.master')
<style>
    .card {
    max-width: 800px;
    margin: auto;
}

.card-header h4 {
    font-size: 1.25rem;
}

.table {
    margin-bottom: 0;
}

.table th,
.table td {
    padding: 0.5rem;
}

.table thead th {
    background-color: #f8f9fa;
}

.table tbody tr:nth-child(odd) {
    background-color: #f2f2f2;
}

.table tbody tr:hover {
    background-color: #e9ecef;
}

.table tbody th {
    border-bottom-width: 0px !important;
}

.float_right{
    float: right;
}
</style>

@section('content')
    {{-- <div class="card">
        <div class="card-header">
            <h4>Result List</h4>
        </div>
        <div class="card-body">
            <div class="text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Quiz Score</th>
                            <th scope="col">My Score</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sl = 1;
                        @endphp
                        @foreach ($mock_results as $results)
                            <tr>
                                <th scope="row">{{ $sl++ }}</th>
                                <td>{{ $results->title }}</td>
                                <td>{{ $results->quiz_score }}</td>
                                <td>{{ $results->achieved_score }}</td>
                                <td>{{ $results->created_at->format('d-F-Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Result List
             <a href="{{ route('user.list.quiz') }}" class="btn btn-primary float_right">Back</a>
            </h4>
        </div>
        <div class="card-body p-3">
            <div class="text-center">
                <table class="table table-sm data_table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Quiz Score</th>
                            <th scope="col">My Score</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sl = 1;
                        @endphp
                        @foreach ($mock_results as $results)
                            <tr>
                                <th scope="row">{{ $sl++ }}</th>
                                <td>{{ $results->title }}</td>
                                <td>{{ $results->quiz_score }}</td>
                                <td>{{ $results->achieved_score }}</td>
                                <td>{{ $results->created_at->format('d-F-Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
{{-- @if (session('user_role') == 'admin')
    <td>{{ $result->username }}</td>
@endif --}}


