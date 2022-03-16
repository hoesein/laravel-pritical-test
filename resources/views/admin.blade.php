@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center py-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Customize Form</div>
                    <div class="card-body">
                        You can include and/or exclude form input fields in this section.

                        @foreach ($dynamic_form as $df)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $df->active }}"
                                    id="{{ $df->id }}" {{ $df->active == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{ $df->input_name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Surveys List</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Name</td>
                                    <td>Email</td>
                                    <td>Date of Birth</td>
                                    <td>Gender</td>
                                    <td>Detail</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($surveys_form as $key => $sf)
                                    @php
                                        $data = json_decode($sf->form_fields);
                                    @endphp
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $data->name ?: 'N/A' }}</td>
                                        <td>{{ $data->email ?: 'N/A' }}</td>
                                        <td>{{ $data->dateofbirth ?: 'N/A' }}</td>
                                        <td>{{ $data->gender ?: 'N/A' }}</td>
                                        <td>{{ $data->yourself ?: 'N/A' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {

            $('input[type=checkbox]').on('change', function() {

                console.log($(this).attr('id'), $(this).is(':checked'));

                let changeData = {
                    id: $(this).attr('id'),
                    status: $(this).is(':checked')
                };

                $.ajax({
                    type: "POST",
                    url: "{{ route('df_update') }}",
                    data: changeData,
                    success: data => {
                        alert(data.msg);
                        window.location.reload();
                    },
                    error: err => {
                        console.log(err);
                    }
                });

            });

        });
    </script>
@endsection
