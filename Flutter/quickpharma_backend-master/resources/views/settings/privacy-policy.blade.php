@extends('layouts.main')
@section('title')
    Privacy Policy
@endsection
@section('page-title')
@endsection
@section('content')
    <div class="row gx-5 gx-xl-10">
        <div class="col-xxl-12 mb-5 mb-xl-10">
            <div class="card card-flush h-xl-100">
                <div class="card-header pt-4 pb-2">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-dark">Privacy Policy</span>
                        {{-- <span class="text-gray-400 mt-1 fw-semibold fs-6">Users from all channels</span> --}}
                    </h3>
                </div>
                <form action="{{ url('settings') }}" method="post">
                    @csrf
                    <div class="card-body border-top pt-6">
                        <input name="type" value="privacy_policy" type="hidden">
                        <div class="row">
                            <div class="col-md-12">
                                <textarea class="form-control" rows="15" name="data" class="form-control col-md-7 col-xs-12">{!! $data !!}</textarea>
                                {{-- <textarea id="tinymce_editor" name="data" class="form-control col-md-7 col-xs-12">{{ $data }}</textarea> --}}
                            </div>
                            <div class="col-12 mt-2 d-flex justify-content-end">
                                <button class="btn btn-theme-color btn-rounded" type="submit" name="submit">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
