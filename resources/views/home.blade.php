@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{ Auth()->user()->role_code == "2" ? "Surveys Form" : "Surverys List" }}</div>

                <div class="card-body">

                    @if(Auth()->user()->role_code == '1')

                    <form method="POST" action="">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required autocomplete="email">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-end">Phone Number</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="number" class="form-control" name="phone_number" required autocomplete="phone_number">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="dob" class="col-md-4 col-form-label text-md-end">Date of Birth</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control" name="date_of_birth" required autocomplete="date_of_birth">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">Gender</label>

                            <div class="col-md-6">
                                <select name="gender" id="gender" class="form-control" required>
                                    <option value="">Select Gender</option>
                                    <option value="0">Female</option>
                                    <option value="1">Male</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="detail" class="col-md-4 col-form-label text-md-end">Tell Me about Yourself</label>

                            <div class="col-md-6">
                                <textarea name="detail" id="detail" cols="47" rows="10">

                                </textarea>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>

                    @else
                        <h1>You are now login as Customer</h1>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
