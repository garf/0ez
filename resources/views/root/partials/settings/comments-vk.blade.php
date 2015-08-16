<fieldset>
    <legend>
        <i class="fa @lang('socials.services.vk.icon')" style="color: @lang('socials.services.vk.color');"></i>
        @lang('socials.services.vk.title')
    </legend>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="checkbox">
                <label>
                    <input type="checkbox" id="commentsVkEnabled" name="comments_vk_enabled" {{ Conf::get('social.comments.vk.enabled', false) ? 'checked' : '' }}> Enabled
                </label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="vkAppId">App ID <small><a href="https://vk.com/dev/Comments">Get App ID</a></small></label>
                <input type="text" name="vk_app_id" id="vkAppId" value="{{ Conf::get('social.vk.app_id', '') }}" class="form-control">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="commentsVkWidth">Width</label>
                <div class="input-group">
                    <input type="text" name="comments_vk_width" value="{{ Conf::get('social.comments.vk.width', '848') }}" id="commentsVkWidth" class="form-control">
                    <span class="input-group-addon" id="basic-addon2">px</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="commentsVkLimit">Comments Limit</label>
                <select name="comments_vk_limit" id="commentsVkLimit" class="form-control">
                    <option value="5" {{ (Conf::get('social.comments.vk.limit') == '5') ? 'selected' : '' }}>5</option>
                    <option value="10" {{ (Conf::get('social.comments.vk.limit') == '10') ? 'selected' : '' }}>10</option>
                    <option value="15" {{ (Conf::get('social.comments.vk.limit') == '15') ? 'selected' : '' }}>15</option>
                    <option value="20" {{ (Conf::get('social.comments.vk.limit') == '20') ? 'selected' : '' }}>20</option>
                </select>
            </div>
        </div>
    </div>
</fieldset>