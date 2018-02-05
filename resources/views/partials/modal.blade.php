<div class="modal fade" id="customerFeedback" tabindex="-1" role="dialog" aria-labelledby="customerFeedbackLabel">
  <div class="modal-dialog" role="document">
  	<form  action="/contact/booknow" method="post" class="contact-form form-horizontal">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="customerFeedbackLabel">Become our customer today.</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
        	  	<div class="form-group email{{ $errors->has('email') ? ' has-error' : '' }}">
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
        	  	<div class="form-group name{{ $errors->has('name') ? ' has-error' : '' }}">
        			<div class="col-sm-12">
        				<input name="name" type="text" class="form-control" id="name" placeholder="@lang('messages.name')">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
        			</div>
        	  	</div>
        	  	<div class="form-group message{{ $errors->has('message') ? ' has-error' : '' }}">
        			<div class="col-sm-12">
        				<textarea class="form-control" id="message" name="message" placeholder="@lang('messages.type_your_message_here')"></textarea>
                        @if ($errors->has('message'))
                            <span class="help-block">
                                <strong>{{ $errors->first('message') }}</strong>
                            </span>
                        @endif
        			</div>
        		</div>
                <div class="form-group g-recaptcha-response{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
					<div class="col-sm-12">
                        {!! Recaptcha::render([ 'lang' => 'en' ]) !!}
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="help-block">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
          </div>
          <div class="modal-footer" style="text-align: left;">
              <button type="submit" class="btn btn-primary contact-btn">@lang('messages.send')&nbsp;@lang('messages.message')</button>
              <!-- <div style="margin-top: 20px; font-size: 18px; color: red;">or Call us on +61 2 8790 6444</div> -->
          </div>
        </div>
    </form>
  </div>
</div>
