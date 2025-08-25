@extends('admin.layouts.app')
@section('panel')

<div class="card">
    <div class="card-header header-elements-inline">
        <h4 class="card-title">Edit Quiz</h4>
    </div>
    <div class="card-block pdng">
        <a href="{{ route('admin.add.quiz') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
        <a href="{{ route('admin.edit.quiz', $edit_quiz->id) }}" class="btn btn-info"><i class="fas fa-sync-alt"></i>
            Refresh</a>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('admin.update.quiz') }}">
            @csrf
            <div class="row">
                <input type="hidden" name="id" value="{{ $edit_quiz->id }}">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Quiz Title</label>
                        <input type="text" name="title" required class="form-control"
                            value="{{ $edit_quiz->title }}">
                    </div>
                </div>

                @if ($edit_quiz->quiz_type === 'live')
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Valid From</label>
                            <input name="from_time" type="datetime-local" class="form-control"
                                value="{{ $edit_quiz->from_time }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Valid Till</label>
                            <input name="to_time" type="datetime-local" class="form-control"
                                value="{{ $edit_quiz->to_time }}">
                        </div>
                    </div>
                @endif

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Duration</label>
                        <input class="form-control" name="duration" type="number" required
                            value="{{ $edit_quiz->duration }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@push('script')

@endpush
