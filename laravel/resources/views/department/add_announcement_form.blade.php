<div class="ibox float-e-margins" style="margin-top:80px; margin-bottom:30px">
    <div class="ibox-title">
        <h5>Announce</h5>
        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>                
        </div>
    </div>
    <div class="ibox-content no-padding">
        <div class="ibox-title">
            <section class="row">
                <form class="form-horizontal" role="form" method="POST" action="announce">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('announ_subject') ? ' has-error' : '' }}">
                        <label for="subject" class="col-md-4 control-label">Subject</label>

                        <div class="col-md-6">
                            <input id="subject" type="text" class="form-control" name="subject" value="{{ old('subject') }}" required autofocus>

                            @if ($errors->has('subject'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('subject') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('announ_body') ? ' has-error' : '' }}">
                        <label for="announ_body" class="col-md-4 control-label">Announcement</label>

                        <div class="col-md-4">
                            <textarea id="announ_body" class="form-control" name="announ_body" rows="5" cols="5" value="{{old('announ_body')}}" required autofocus></textarea>
                            @if ($errors->has('announ_body'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('announ_body') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-default">
                                Announce Now
                            </button>
                        </div>
                    </div>


                </form>
            </section>
        </div>
        
    </div>
</div>