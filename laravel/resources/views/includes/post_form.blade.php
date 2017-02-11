<div class="ibox-title">
    <h5>Expand to post</h5>
    <div class="ibox-tools">
        <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
        </a>
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-wrench"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a href="#">Config option 1</a>
            </li>
            <li><a href="#">Config option 2</a>
            </li>
        </ul>
        
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
        <form enctype="multipart/form-data" action="post" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <textarea id='text_body' name="text_body" rows='5' cols='80' placeholder="Your post" calss="form-control"></textarea>
            </div>
            <div class="form-group">
                <span class="fa fa-file-photo-o"> <input type="file" name="post_image" style="display: inline-block"></span>
                
            </div>
            <div class="form-group">
                <button type='submit' class="btn btn-lg btn-white"><i class="fa fa-align-justify"></i>Post</button>
            </div>
        </form>
    </div>
    
</div>