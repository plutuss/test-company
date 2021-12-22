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
                <h3 class="card-title">Update Company</h3>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    @if (session()->has('msg'))
                        <div class="alert alert-success" role="alert">{{session('msg')}}</div>
                    @endif
                </div>

                <form action="{{route('admin.companies.update', $company)}}" method="post" class="w-100">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Company name</label>
                            <input id="name" name="name" type="text" value="{{old('name',$company->name)}}"
                                   class="form-control  @error('name') is-invalid @enderror" placeholder="Enter name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body @error('description') is-invalid @enderror">
                                <textarea id="summernote" name="description">{{old('description',$company->description)}}</textarea>
                            </div>
                            @error('description')
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
