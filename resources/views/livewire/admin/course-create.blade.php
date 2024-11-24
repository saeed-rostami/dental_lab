{{--@extends('admin.layout')--}}

{{--@section('content')--}}
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">ایجاد دوره</h2>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <form wire:submit.prevent="store"  class="needs-validation"
                                      novalidate enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="col-md-10 mb-3">
                                            <label for="exampleInputEmail1">اسم </label>
                                            <input
                                                wire:model="title"
                                                placeholder="اسم را اینجا تایپ کنید..."
                                                name="title" type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" required>
                                            @error('title')
                                            <div class="text-danger"> {{ $message }} </div>
                                            @enderror

                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="validationCustom05">قیمت</label>
                                            <input
                                                wire:model="price"

                                                name="price" type="text" class="form-control" id="validationCustom05"
                                                   required
                                                   placeholder="قیمت ..."
                                            >
                                            @error('price')
                                            <div class="text-danger"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="validationTextarea">توضیحات دوره</label>
                                        <textarea
                                            wire:model="description"
                                            name="description" class="form-control" id="validationTextarea"
                                                  placeholder="توضیحات را اینجا تایپ کنید..." required></textarea>
                                        @error('description')
                                        <div class="text-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input"
                                               id="customControlValidation1" required>
                                        <label class="custom-control-label" for="customControlValidation1">Check this
                                            custom checkbox</label>
                                        <div class="invalid-feedback">Example invalid feedback text</div>
                                    </div>


                                    <div class="custom-file mb-3">
                                        <input name="file" type="file" class="custom-file-input"
                                               id="validatedCustomFile">
                                        <label class="custom-file-label" for="validatedCustomFile">Choose
                                            file...</label>
                                        @error('file')
                                        <div class="text-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary" type="submit">بساز !</button>
                                </form>
                            </div> <!-- /.card-body -->
                        </div> <!-- /.card -->
                    </div> <!-- /.col -->
                </div> <!-- end section -->
            </div> <!-- /.col-12 col-lg-10 col-xl-10 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
{{--@endsection--}}

