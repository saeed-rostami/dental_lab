<div class="container">
    <div class="row">
    </div> <h4>{{$comment->comment}}</h4>
        <div class="col-md-8">

            <div class="card shadow mb-4">
                <div class="card-body">
                    <form wire:submit.prevent="reply" class="needs-validation"
                          novalidat>
                        @csrf
                        <div class="form-group mb-3">
                            <label for="validationTextarea">پاسخ </label>
                            <textarea
                                wire:model="comment_reply"
                                name="description" class="form-control" id="validationTextarea"
                                placeholder="پاسخ را اینجا تایپ کنید..." required>

                            </textarea>
                            @if($comment->reply)
                                <span>
                                پاسخ شما :
                                {{$comment->reply?->comment}}
                            </span>
                            @endif


                            @error('comment_reply')
                            <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <button class="btn btn-primary" type="submit">ثبت پاسخ !</button>
                    </form>
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div> <!-- /.col -->

</div>
