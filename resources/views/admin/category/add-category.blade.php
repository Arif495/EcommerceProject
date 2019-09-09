@extends('admin.master')

@section('body')
    <div class="offset-1 col-lg-10">
        <div class="card">
            <div class="card-header">
                <strong>Add Category</strong>
                <h3 class="text-center text-success">{{Session::get('message')}}</h3>
            </div>
            <div class="card-body card-block">
                <form action="{{route('new-category')}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="row form-group">
                        <div class="col col-md-3"><label class="form-control-label">Add Category</label></div>
                        <div class="col-12 col-md-9"><input type="text" name="add_category" class="form-control"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">Category Description</label></div>
                        <div class="col-12 col-md-9"><input type="text" name="category_description" class="form-control"></div>
                    </div>
                    <div class="col col-md-3"><label class=" form-control-label">Publication Status</label></div>
                    <div class="col col-md-9">
                        <div class="form-check-inline form-check">
                            <label for="inline-radio1" class="form-check-label ">
                                <input type="radio" id="inline-radio1" name="publication_status" value="1" class="form-check-input">Published
                            </label>
                            <label for="inline-radio2" class="form-check-label ">
                                <input type="radio" id="inline-radio2" name="publication_status" value="0" class="form-check-input">Unpublished
                            </label>
                        </div>
                    </div>
                    <div>
                        <input type="submit" name="btn" class="btn btn-primary btn-sm" value="Submit">
                    </div>
                </form>
            </div>


        </div>
    </div>
@endsection
