<div class="ibox-title">
    <h5>New question</h5>
    <div class="ibox-tools">
        <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
        </a>
        
        
    </div>
</div>

<div class="ibox-content no-padding">
    <div class="ibox-title">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <strong>{{ $error }} </strong>
                    @endforeach
            </div>
        @endif
        <form enctype="multipart/form-data" action="ask" method="POST">
        {{ csrf_field() }}
            <div class="form-group {{$errors->has('ques_body')? 'has-error': ''}}">
                <textarea name="ques_body" class="form-control" id="text" name="text" placeholder="Type in your question" rows="7" value="{{old('ques_body')}}"></textarea>
                <h6 class="pull-right" id="count_message"></h6>
            </div>
            <div class="form-group">
                <span class="fa fa-file-photo-o"><input type="file" name="ques_image" style="display: inline-block;"></span>
                
            </div>

            <div class="form-group">
                <button type='submit' class="btn btn-lg btn-white"><i class="fa fa-question-circle-o"></i> Ask</button>
            </div>
            
        </form>
    </div>
    
</div>