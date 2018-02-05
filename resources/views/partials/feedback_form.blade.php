<div class="feedback">
  <div class="ta-c">
        @if(isset($feedbackConfig['heading']))
        <h4> {{ $feedbackConfig['heading'] }} </h4>
        @endif
        @if(isset($feedbackConfig['subtxt']))
        <div class="subtext mb-4"> {{ $feedbackConfig['subtxt'] }} </div>
        @endif
  </div>
  <form  action="/contact/sendmessage" method="post" class="contact-form form-horizontal">
    @if(Session::has('success'))
      <div class="alert alert-success" style="text-align: center;">
        <strong>{{session('success')}}</strong>
      </div>
    @endif
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
      <div class="col-sm-12">
        <input name="email" type="email" class="form-control" id="email" placeholder="@lang('messages.email')">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
      </div>
      </div>
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
      <div class="col-sm-12">
        <input name="name" type="text" class="form-control" id="name" placeholder="@lang('messages.name')">
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
      </div>
      </div>
      <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
      <div class="col-sm-12">
        <textarea class="form-control" id="message" name="message" placeholder="@lang('messages.type_your_message_here')" rows="4"></textarea>
                @if ($errors->has('message'))
                    <span class="help-block">
                        <strong>{{ $errors->first('message') }}</strong>
                    </span>
                @endif
      </div>
    </div>
    <div class="btn-wrapper form-group container">
      <button type="submit" class="btn btn-primary contact-btn">@lang('messages.send')&nbsp;@lang('messages.message')</button>
    </div>
  </form>
</div>
