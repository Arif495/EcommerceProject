@extends('admin.master')

@section('body')
    <div class="offset-1 col-lg-10">
        <div class="card">
            <div class="card-header">
                <strong>Add Brand</strong>
                <h3 class="text-center text-success">{{Session::get('message')}}</h3>
            </div>
            <div class="card-body card-block">
                {{Form::open(['route'=>'new-brand','method'=>'post', 'class'=>'form-horizontal'])}}
                <div class="row form-group">
                    <div class="col col-md-3">{{Form::label('brand_name','Brand Name',['class'=>'form-control-label'])}}</div>
                    <div class="col-12 col-md-9">{{Form::text('brand_name','',['class'=>'form-control'])}}</div>
                    <div class="col-12 col-md-9 offset-3"><span class="text-danger">{{$errors->has('brand_name') ? $errors->first('brand_name') : ' '}}</span></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">{{Form::label('brand_description','Brand Description',['class'=>'form-control-label'])}}</div>
                    <div class="col-12 col-md-9">{{Form::text('brand_description','',['class'=>'form-control'])}}</div>
                    <div class="col-12 col-md-9 offset-3"><span class="text-danger">{{$errors->has('brand_description') ? $errors->first('brand_description') : ' '}}</span></div>
                </div>
                <div class="col col-md-3">{{Form::label('publication_status','Publication Status',['class'=>'form-control-label'])}}</div>
                <div class="col col-md-9">
                    <div class="form-check-inline form-check">
                        <label for="inline-radio1" class="form-check-label ">
                            <input type="radio" name="publication_status" value="1" class="form-check-input">Published
                        </label>
                        <label for="inline-radio2" class="form-check-label ">
                            <input type="radio" id="inline-radio2" name="publication_status" value="0" class="form-check-input">Unpublished
                        </label>

                    </div>
                    <div class="col-12 col-md-9"><span class="text-danger">{{$errors->has('publication_status') ? $errors->first('publication_status') : ' '}}</span></div>
                </div>

                <div>
                    <input type="submit" name="btn" class="btn btn-primary btn-sm" value="Submit">
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
