@extends($activeTemplate . 'layouts.master')

<style>
    .table tbody th {
    border-bottom-width: 0px !important;
}
</style>
@section('content')
{{-- <div class="card">
    <div class="card-header">
        <h4>Quiz List</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table datatable-save-state">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sl = 1;
                    @endphp
                    @foreach ($quiz_list as $quiz)
                        <tr>
                            <th scope="row">{{ $sl++ }}</th>
                            <td><a>{{ $quiz->title }}</a></td>
                            <td>{{ $quiz->duration }} minutes</td>
                            <td><a href="{{ route('user.join.quiz', $quiz->id) }}">Give Test</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> --}}
<div class="card" style="border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); overflow: hidden;">
    <div class="card-header" style="background-color: #9a2119; color: white; padding: 10px; text-align: center;">
        <h4 style="color: white; margin: 0; line-height: 1.5;">Quiz List</h4>
    </div>

    <div class="card-body" style="padding: 40px; background-color: #f9f9f9;">
        <div class="table-responsive" style="max-width: 80%; margin: 0 auto;">
            <table class="table datatable-save-state data_table" style="border-collapse: separate; border-spacing: 0 10px; width: 100%; font-size: 0.9rem;">
                <a href="{{ route('user.mock-results') }}" class="btn btn-primary float_right">Go To Results</a>
                <thead>
                    <tr style="background-color: #4CAF50; color: white;">
                        <th scope="col" style="padding: 8px 10px; text-align: center;">Sl No.</th> <!-- Reduces padding -->
                        <th scope="col" style="padding: 8px 10px; text-align: center;">Test Name</th>
                        <th scope="col" style="padding: 8px 10px; text-align: center;">Duration</th>
                        <th scope="col" style="padding: 8px 10px; text-align: center;">Quiz Type</th>
                        <th scope="col" style="padding: 8px 10px; text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sl = 1;
                    @endphp
                    @foreach ($quiz_list as $quiz)
                        <tr style="background-color: white; box-shadow: 0 4px 6px rgba(0,0,0,0.05); transition: transform 0.2s;">
                            <th scope="row" style="padding: 12px 15px; text-align: center;">{{ $sl++ }}</th>
                            <td style="padding: 12px 15px; text-align: center;"><a href="#" style="color: #333; text-decoration: none;">{{ $quiz->title }}</a></td>
                            <td style="padding: 12px 15px; text-align: center;">{{ $quiz->duration }} minutes</td>
                            <td style="padding: 12px 15px; text-align: center;">{{ $quiz->quiz_type }}</td>
                            <td style="padding: 12px 15px; text-align: center;">
                                <a href="{{ route('user.join.quiz', $quiz->id) }}" style="background-color: #4CAF50; color: white; padding: 8px 16px; border-radius: 5px; text-decoration: none; transition: background-color 0.3s;">Give Test</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
