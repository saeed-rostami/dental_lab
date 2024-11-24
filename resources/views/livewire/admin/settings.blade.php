<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="page-title">تنظیمات</h2>
            <div class="row">
                <div class="col-md-8">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form wire:submit.prevent="update"  class="needs-validation"
                                  novalidate enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="col-md-2 mb-3">
                                        <label for="exampleInputEmail1">تلگرام </label>
                                        <input
                                            wire:model="telegram"
                                            name="telegram" type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="تلگرام..."
                                            aria-describedby="emailHelp" required>
                                        @error('telegram')
                                        <div class="text-danger"> {{ $message }} </div>
                                        @enderror

                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="validationCustom05">واتس آپ</label>
                                        <input
                                            wire:model="whatsapp"

                                            name="whatsapp" type="text" class="form-control" id="validationCustom05"
                                            required
                                            placeholder="واتس آپ ..."
                                        >
                                        @error('whatsapp')
                                        <div class="text-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="validationCustom05">اینستاگرام</label>
                                        <input
                                            wire:model="instagram"

                                            name="instagram" type="text" class="form-control" id="validationCustom05"
                                            required
                                            placeholder="اینستاگرام ..."
                                        >
                                        @error('instagram')
                                        <div class="text-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="validationCustom05">شماره ثابت</label>
                                        <input
                                            wire:model="phone"

                                            name="phone" type="text" class="form-control" id="validationCustom05"
                                            required
                                            placeholder="شماره ثابت ..."
                                        >
                                        @error('phone')
                                        <div class="text-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="validationCustom05">شماره همراه</label>
                                        <input
                                            wire:model="mobile"

                                            name="mobile" type="text" class="form-control" id="validationCustom05"
                                            required
                                            placeholder="شماره همراه ..."
                                        >
                                        @error('mobile')
                                        <div class="text-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="validationCustom05">ایمیل </label>
                                        <input
                                            wire:model="email"

                                            name="email" type="text" class="form-control" id="validationCustom05"
                                            required
                                            placeholder="ایمیل ..."
                                        >
                                        @error('email')
                                        <div class="text-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="validationTextarea">آدرس </label>
                                    <textarea
                                        wire:model="address"
                                        name="address" class="form-control" id="validationTextarea"
                                        placeholder="آدرس را اینجا تایپ کنید..." required></textarea>
                                    @error('address')
                                    <div class="text-danger"> {{ $message }} </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="validationTextarea">درباره ما </label>
                                    <textarea
                                        wire:model="about"
                                        name="about" class="form-control" id="validationTextarea"
                                        placeholder="توضیحات را اینجا تایپ کنید..." required></textarea>
                                    @error('about')
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
                                    <label class="custom-file-label" for="validatedCustomFile">لوگو</label>
                                    @error('file')
                                    <div class="text-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <button class="btn btn-primary" type="submit">تایید</button>
                            </form>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div> <!-- /.col -->
            </div> <!-- end section -->
        </div> <!-- /.col-12 col-lg-10 col-xl-10 -->
    </div> <!-- .row -->
</div>

