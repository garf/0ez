<fieldset>
    <legend>
        <i class="fa @lang('socials.services.facebook.icon')" style="color: @lang('socials.services.facebook.color');"></i>
        @lang('socials.services.facebook.title')
    </legend>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="checkbox">
                <label>
                    <input type="checkbox" id="commentsFacebookEnabled" name="comments_facebook_enabled" {{ Conf::get('social.comments.facebook.enabled', false) ? 'checked' : '' }}> Enabled
                </label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="commentsFacebookWidth">Width</label>
                <div class="input-group">
                    <input type="text" name="comments_facebook_width" value="{{ Conf::get('social.comments.facebook.width', '100%') }}" id="commentsFacebookWidth" class="form-control">
                    <span class="input-group-addon" id="basic-addon2">px</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="commentsFacebookLimit">Comments Limit</label>
                <select name="comments_facebook_limit" id="commentsFacebookLimit" class="form-control">
                    <option value="5" {{ (Conf::get('social.comments.facebook.limit') == '5') ? 'selected' : '' }}>5</option>
                    <option value="10" {{ (Conf::get('social.comments.facebook.limit') == '10') ? 'selected' : '' }}>10</option>
                    <option value="15" {{ (Conf::get('social.comments.facebook.limit') == '15') ? 'selected' : '' }}>15</option>
                    <option value="20" {{ (Conf::get('social.comments.facebook.limit') == '20') ? 'selected' : '' }}>20</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="commentsFacebookColorScheme">Color Scheme</label>
                <select name="comments_facebook_color_scheme" id="commentsFacebookColorScheme" class="form-control">
                    <option value="light" {{ (Conf::get('social.comments.facebook.color_scheme') == 'light') ? 'selected' : '' }}>Light</option>
                    <option value="dark" {{ (Conf::get('social.comments.facebook.color_scheme') == 'dark') ? 'selected' : '' }}>Dark</option>
                </select>
            </div>
        </div>
    </div>
</fieldset>