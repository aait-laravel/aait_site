<div class="ibox float-e-margins" style="margin-top:80px; margin-bottom:30px">
        <div class="ibox-title">
            <h5>Add new course</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>                
            </div>
        </div>
        <div class="ibox-content no-padding">
            <div class="ibox-title">
                <section class="row">
                    <form class="form-horizontal" role="form" method="POST" action="storedepartment">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('dep_name') ? ' has-error' : '' }}">
                            <label for="dep_name" class="col-md-4 control-label">Department Name</label>

                            <div class="col-md-6">
                                <input id="dep_name" type="text" class="form-control" name="dep_name" value="{{ old('dep_name') }}" required autofocus>

                                @if ($errors->has('dep_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dep_name') }}</strong>
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
                                    Add Department
                                </button>
                            </div>
                        </div>


                    </form>
                </section>
            </div>
            
        </div>
    </div>



                