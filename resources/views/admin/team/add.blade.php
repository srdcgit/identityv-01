<style>
    .radio-group {
        display: flex;
        align-items: center;
    }

    .radio-group input[type="radio"] {
        margin-right: 5px;
    }

    .radio-group label {
        margin-right: 15px;
    }

    .input-switch {
        display: none;
    }

    .label-switch {
        display: inline-block;
        position: relative;
    }

    .label-switch::before,
    .label-switch::after {
        content: "";
        display: inline-block;
        cursor: pointer;
        transition: all 0.5s;
    }

    .label-switch::before {
        width: 3em;
        height: 1em;
        border: 1px solid #757575;
        border-radius: 4em;
        background: #888888;
    }

    .label-switch::after {
        position: absolute;
        left: 0;
        top: -24%;
        width: 1.5em;
        height: 1.5em;
        border: 1px solid #757575;
        border-radius: 4em;
        background: #ffffff;
    }

    .input-switch:checked~.label-switch::before {
        background: #00a900;
        border-color: #008e00;
    }

    .input-switch:checked~.label-switch::after {
        left: unset;
        right: 0;
        background: #00ce00;
        border-color: #009a00;
    }

    .info-text {
        display: inline-block;
    }

    .info-text::before {
        content: "Not active";
    }

    .input-switch:checked~.info-text::before {
        content: "Active";
    }
</style>
@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.team.Store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Select Category')</label>
                                    <select name="category_id" id="category" class="form-control" required>
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"> {{ $category->title }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Select Subcategory')</label>
                                    <select name="sub_category_id" id="getSubcatagory" class="form-control" required>
                                        <option value="">Select Subcategory</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Name')</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                        placeholder="@lang('Name')">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Designation')</label>
                                    <input type="text" name="designation" value="{{ old('designation') }}" class="form-control"
                                        placeholder="@lang('Designation')">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Linkedin')</label>
                                    <input type="text" name="linkedin" value="{{ old('linkedin') }}" class="form-control"
                                        placeholder="@lang('Linkedin')">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Twiter')</label>
                                    <input type="text" name="twiter" value="{{ old('twiter') }}" class="form-control"
                                        placeholder="@lang('Twiter')">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Facebook')</label>
                                    <input type="text" name="facebook" value="{{ old('facebook') }}" class="form-control"
                                        placeholder="@lang('Facebook')">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price" class="font-weight-bold">@lang('Age')</label>
                                    <input type="text" name="age" value="{{ old('age') }}" class="form-control"
                                        placeholder="@lang('Age')">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('email')</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                        placeholder="@lang('email')">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Phone Number')</label>
                                    <input type="number" name="phone" value="{{ old('phone') }}" class="form-control"
                                        placeholder="@lang('Phone Number')">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('My Services')</label>
                                    <input type="text" name="my_services" value="{{ old('my_services') }}"
                                        class="form-control" placeholder="@lang('My Services')">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Education')</label>
                                    <input type="text" name="education" value="{{ old('education') }}"
                                        class="form-control" placeholder="@lang('Education')">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('College')</label>
                                    <input type="text" name="college" value="{{ old('college') }}"
                                        class="form-control" placeholder="@lang('College')">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('University')</label>
                                    <input type="text" name="university" value="{{ old('university') }}"
                                        class="form-control" placeholder="@lang('University')">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Master Degree')</label>
                                    <input type="text" name="master_degree" value="{{ old('master_degree') }}"
                                        class="form-control" placeholder="@lang('Master Degree')">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Course')</label>
                                    <input type="text" name="course" value="{{ old('course') }}"
                                        class="form-control" placeholder="@lang('Course')">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('My Skills')</label>
                                    <input type="text" name="my_skills" value="{{ old('my_skills') }}"
                                        class="form-control" placeholder="@lang('My Skills')">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Experience')</label>
                                    <input type="text" name="experience" value="{{ old('experience') }}"
                                        class="form-control" placeholder="@lang('Experience')">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Specialization')</label>
                                    <input type="text" name="specialization" value="{{ old('specialization') }}"
                                        class="form-control" placeholder="@lang('Specialization')">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="font-weight-bold">@lang('Image')</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Permanent address')</label>
                                    <input type="text" name="permanent_address" value="{{ old('permanent_address') }}"
                                        class="form-control" placeholder="@lang('Permanent Address')">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Current address')</label>
                                    <input type="text" name="current_address" value="{{ old('current_address') }}"
                                        class="form-control" placeholder="@lang('Current Address')">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Father Name')</label>
                                    <input type="text" name="father_name" value="{{ old('father_name') }}"
                                        class="form-control" placeholder="@lang('Father Name')">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Mother Name')</label>
                                    <input type="text" name="mother_name" value="{{ old('mother_name') }}"
                                        class="form-control" placeholder="@lang('Mother Name')">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Date of Birth')</label>
                                    <input type="date" name="dob" value="{{ old('dob') }}"
                                        class="form-control" placeholder="@lang('D.O.B')">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Select Gender')</label>
                                    <div class="radio-group">
                                        <input type="radio" id="male" name="gender" value="male">
                                        <label for="male">Male</label>

                                        <input type="radio" id="female" name="gender" value="female">
                                        <label for="female">Female</label>

                                        <input type="radio" id="other" name="gender" value="other">
                                        <label for="other">Other</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Nationality')</label>
                                    <input type="text" name="nationality" value="{{ old('nationality') }}"
                                        class="form-control" placeholder="@lang('Indian')">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Religion')</label>
                                    <input type="text" name="religion" value="{{ old('religion') }}"
                                        class="form-control" placeholder="@lang('e.g. Hindu')">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Certificates')</label>
                                    <input type="file" name="certificates" value="{{ old('certificates') }}"
                                        class="Certificates" placeholder="@lang('.pdf')">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Joining Date')</label>
                                    <input type="date" name="joining_date" value="{{ old('joining_date') }}"
                                        class="form-control" placeholder="@lang('Joining Date')">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Emergency Contact')</label>
                                    <input type="number" name="emergency_contact"
                                        value="{{ old('emergency_contact') }}" class="form-control"
                                        placeholder="@lang('Emergency Contact')">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('Description')</label>
                                    <textarea name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="type" class="font-weight-bold">@lang('status')</label>
                                    <input class="input-switch" type="checkbox" id="status" name="status" value="1" {{ old('status') ? 'checked' : '' }}><br>
                                    <label class="label-switch" for="status"></label>
                                    <span class="info-text"></span>
                                </div>
                            </div>


                        </div>
                </div>

                <div class="col-lg-12 ">
                    <div class="form-group float-end p-3">
                        <button type="submit" class="btn btn--primary btn-block btn-lg">
                            @lang('Create')</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <a href="{{ route('admin.team.list') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i
            class="las la-angle-double-left"></i>@lang('Go Back')</a>
@endpush

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
<script>
    $(document).ready(function() {
        CKEDITOR.replace('description');
    });
</script>

<script>
    $(document).ready(function() {
        $(document).on('change', '#category', function() {
            var category_id = $(this).val();
            $.ajax({
                type: "POST",
                url: '{{ route('admin.subcategory.getSubcategory') }}',
                data: {
                    'category_id': category_id,
                    _token: "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function(response) {
                    $('#getSubcatagory').empty();
                    $('#getSubcatagory').html(
                        '<option value="">Select Subcategory</option>');
                    $.each(response, function(key, value) {
                        $('#getSubcatagory').append('<option value="' + value.id +
                            '">' + value.title + '</option>');
                    });
                },
            });
        });
    });
</script>
