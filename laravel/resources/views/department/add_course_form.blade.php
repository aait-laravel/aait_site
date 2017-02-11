
<section class="row">
    <form class="form-horizontal" role="form" method="POST" action="storecourse">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('dep_name') ? ' has-error' : '' }}">
            <label for="course_name" class="col-md-4 control-label">Course Name</label>

            <div class="col-md-6">
                <input id="course_name" type="text" class="form-control" name="course_name" value="{{ old('course_name') }}" required autofocus>

                @if ($errors->has('dep_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('course_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('dep_name') ? ' has-error' : '' }}">
            <label for="ins_name" class="col-md-4 control-label">Instructor Name</label>

            <div class="col-md-6">
                <input id="ins_name" type="text" class="form-control" name="ins_name" value="{{ old('ins_name') }}" required autofocus>

                @if ($errors->has('ins_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('ins_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('course_code') ? ' has-error' : '' }}">
            <label for="course_code" class="col-md-4 control-label">Course Code</label>

            <div class="col-md-6">
                <input id="course_code" type="text" class="form-control" name="course_code" value="{{ old('course_code') }}" required autofocus>

                @if ($errors->has('course_code'))
                    <span class="help-block">
                        <strong>{{ $errors->first('course_code') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="description" class="col-md-4 control-label">Description</label>

            <div class="col-md-4">
                <textarea id="description" class="form-control" name="description" rows="5" cols="5" value="{{old('description')}}" required autofocus></textarea>
                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-default">
                    Add Course
                </button>
            </div>
        </div>


    </form>
</section>
