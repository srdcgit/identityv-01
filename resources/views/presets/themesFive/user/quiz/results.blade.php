@extends($activeTemplate . 'layouts.master')

@section('title')
    My Results
@endsection
@section('content')
    <div class="card">
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
                        @foreach ($results as $result)
                            <tr>
                                <th scope="row">{{ $sl++ }}</th>
                                <td>{{ $result->title }}</td>
                                <td>{{ $result->quiz_score }}</td>
                                <td>{{ $result->achieved_score }}</td>
                                {{-- @if (session('user_role') == 'admin')
                                    <td>{{ $result->username }}</td>
                                @endif --}}
                                <td>{{ $result->created_at->format('d-F-Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
