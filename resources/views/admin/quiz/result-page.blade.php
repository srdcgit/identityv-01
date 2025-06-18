@extends('admin.layouts.app')
@section('panel')

<div class="card">
    <div class="card-header">
        <h4>Result List</h4>
    </div>
    <div class="card-body">
        <div class="text-center">
            {{-- @dd($results) --}}
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Quiz Score</th>
                        <th scope="col">User Score</th>
                        <th scope="col">User Name</th>
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
                            <td>{{ $result->getUser->name }}</td>
                            <td>{{ $result->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('breadcrumb-plugins')
    <a href="{{ route('admin.quiz.add') }}" class="btn btn-sm btn--primary ">
        @lang('Add Question')</a>
@endpush

@push('script')
    
@endpush
