@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif

            @if (\Session::has('error'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{!! \Session::get('error') !!}</li>
                    </ul>
                </div>
            @endif

            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">Surveys Form</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('df_submit') }}">
                            @csrf

                            @foreach ($dynamic_form as $df)
                                @if ($df->input_type == 'text' || $df->input_type == 'number' || $df->input_type == 'date' || $df->input_type == 'email')
                                    <div class="row mb-3">
                                        <label for=""
                                            class="col-md-4 col-form-label text-md-end">{{ $df->input_name }}</label>

                                        <div class="col-md-6">
                                            <input type="{{ $df->input_type }}" class="form-control"
                                                name="{{ str_replace(' ', '', strtolower($df->input_name)) }}" required
                                                autocomplete="name" autofocus>
                                        </div>
                                    </div>
                                @elseif ($df->input_type == 'select')
                                    <div class="row mb-3">
                                        <label class="col-md-4 col-form-label text-md-end">{{ $df->input_name }}</label>

                                        <div class="col-md-6">
                                            <select name="{{ str_replace(' ', '', strtolower($df->input_name)) }}"
                                                class="form-control" required>
                                                <option value="">Select {{ $df->input_name }}</option>
                                                @php
                                                    $opt = explode(',', $df->input_opt);
                                                    foreach ($opt as $o) {
                                                        echo "<option value='" . $o . "'>" . $o . '</option>';
                                                    }
                                                @endphp
                                            </select>
                                        </div>
                                    </div>
                                @elseif($df->input_type == 'textarea')
                                    <div class="row mb-3">
                                        <label class="col-md-4 col-form-label text-md-end">{{ $df->input_name }}</label>

                                        <div class="col-md-6">
                                            <textarea name="{{ str_replace(' ', '', strtolower($df->input_name)) }}" cols="47" rows="10"></textarea>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
