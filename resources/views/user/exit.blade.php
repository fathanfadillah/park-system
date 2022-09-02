@extends('layouts.app')
 
@section('content')
<main class="form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">EXIT</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('park.exit.save') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" id="parkCode" placeholder="park code..." class="form-control" name="parkCode" required
                                    autofocus>
                                @if ($errors->has('parkCode'))
                                <span class="text-danger">{{ $errors->first('parkCode') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" placeholder="X-XXXX-XXX" id="policyNumber" class="form-control" name="policyNumber" required>
                                @if ($errors->has('policyNumber'))
                                <span class="text-danger">{{ $errors->first('policyNumber') }}</span>
                                @endif
                            </div>
 
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">SUBMIT</button>
                            </div>

                            @if ($message = Session::get('error'))
                                <div class="mt-3 alert alert-danger alert-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @elseif ($message = Session::get('success'))
                                <div class="mt-3 alert alert-success alert-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection