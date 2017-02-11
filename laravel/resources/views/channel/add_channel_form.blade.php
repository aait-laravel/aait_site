<section class="row">
	<form class="form-horizontal" role="form" method="POST" action="add_channel">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('channel_name') ? ' has-error' : '' }}">
            <label for="channel_name" class="col-md-4 control-label">Channel name</label>

            <div class="col-md-6">
                <input id="channel_name" type="text" class="form-control" name="channel_name" value="{{ old('channel_name') }}" required>

                @if ($errors->has('channel_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('channel_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="description" class="col-md-4 control-label">Description</label>

            <div class="col-md-4">
            	<textarea id="description" class="form-control" name="description" rows="5" cols="5" value="{{old('description')}}" required></textarea>
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
                    Add Channel
                </button>
            </div>
        </div>


    </form>
</section>