@extends('admin.layouts.app')

@section('description') @endsection
@section('keywords', '')
@section('title', env('APP_NAME'))

@section('styles')

@endsection
@section('content')
    <div class="col-8 m-auto">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Update client</h3>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    @if (session()->has('msg'))
                        <div class="alert alert-success" role="alert">{{session('msg')}}</div>
                    @endif
                </div>

                <form action="{{route('admin.clients.update',$client)}}" method="post" class="w-100">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Client name</label>
                            <input id="name" name="name" type="text" value="{{old('name',$client->name)}}"
                                   class="form-control  @error('name') is-invalid @enderror" placeholder="Enter name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="email">Client email</label>
                            <input id="email" name="email" type="email" value="{{old('email', $client->email)}}"
                                   class="form-control  @error('email') is-invalid @enderror" placeholder="Enter email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function () {
            // Summernote
            $('#summernote').summernote()
        })
    </script>
@endsection
