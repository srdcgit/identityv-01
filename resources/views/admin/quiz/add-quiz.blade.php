@extends('admin.layouts.app')
@section('panel')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h4 class="card-title">Add New Quiz</h4>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('admin.store.quiz') }}">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Quiz Title</label>
                            <input type="text" placeholder="Quiz Title" name="title" required class="form-control">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Quiz Type</label>
                            <select name="quiz_type" id="quiz_type" class="form-control" required>
                                <option value="">Select</option>
                                <option value="live">Live</option>
                                <option value="mock">Mock</option>

                            </select>
                        </div>
                    </div>

                    <div class="col-md-3" id="from_time_container">
                        <div class="form-group">
                            <label>Valid From</label>
                            <input name="from_time" type="datetime-local" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3" id="to_time_container">
                        <div class="form-group">
                            <label>Valid Till</label>
                            <input name="to_time" type="datetime-local" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Duration</label>
                            <input class="form-control" placeholder="Duration in Minute" name="duration" type="number"
                                required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Quiz List</h5>
        </div>
        <div class="table-responsive">
            <table class="table datatable-save-state">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Add</th>
                        <th>Duration</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sl = 1;
                    @endphp
                    @foreach ($quiz_list as $quiz)
                        <tr>
                            <th scope="row">{{ $sl++ }}</th>
                            <td><b>{{ $quiz->title }}</b></td>
                            <td>{{ $quiz->quiz_type }}</td>
                            @if ($quiz->quiz_type === 'live')
                                <td>{{ \Carbon\Carbon::parse($quiz->from_time)->format('d M Y h:i A') }}</td>
                                <td>{{ \Carbon\Carbon::parse($quiz->to_time)->format('d M Y h:i A') }}</td>
                            @else
                                <td>-</td>
                                <td>-</td>
                            @endif
                            <td>
                                <a href="{{ url('admin/add-question', $quiz->id) }}" class="btn btn-success btn-sm">Add
                                    Questions</a>
                            </td>
                            <td>{{ $quiz->duration }} minutes</td>
                            <td>
                                <a href="{{ route('admin.edit.quiz', $quiz->id) }}" class="btn btn-primary btn-sm">Edt</a>
                            </td>
                            <td>
                                <a onclick="confirmDelete('{{ route('admin.delete.quiz', $quiz->id) }}')"
                                    class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('script')

<script>
    function confirmDelete(deleteUrl) {
        var isConfirmed = confirm("Are you sure you want to delete this item?");

        if (isConfirmed) {
            window.location.href = deleteUrl;
        } else {

            alert("Deletion canceled");
        }
    }
</script>
<script>
    $(document).ready(function() {
        $('#to_time_container').hide();
        $('#from_time_container').hide();
        $('#quiz_type').on('change', function() {
            var quiz = $('#quiz_type').val();
            if (quiz === 'mock') {
                $('#from_time_container').hide();
                $('#to_time_container').hide();
            } else if (quiz === 'live') {
                $('#from_time_container').show();
                $('#to_time_container').show();
            }
        });
    });
</script>

@endpush
