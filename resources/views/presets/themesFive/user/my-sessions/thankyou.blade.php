@extends($activeTemplate . 'layouts.master')
@section('content')
<style>
    .vh_80{
        height: 80vh !important;
    }
</style>
    <section>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <div class="vh_80 d-flex justify-content-center align-items-center">
            <div>
                <div style="background-color: #fff; padding: 25px; border-radius: 10px;">
                    <div class="mb-4 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="75" height="75"
                            fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                    </div>
                    <div class="text-center">
                        <h1>Thank You !</h1>
                        <p>We've send the link to your inbox. Lorem ipsum dolor sit, </p>
                        <a class="btn btn-primary" href="{{ route('user.mysession.viewTeam', $id) }}">Back Home</a>
                    </div>
                </div>
            </div>
    </section>
@endsection
