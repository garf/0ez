$('#inputTags').tokenfield();
$('#inputTags').on('tokenfield:createtoken', function (event) {
    var existingTokens = $(this).tokenfield('getTokens');
    $.each(existingTokens, function (index, token) {
        if (token.value === event.attrs.value)
            event.preventDefault();
    });
});

//DateTimePicker
$(function () {
    $('#inputPublishedAt').datetimepicker({
        locale: 'en',
        format: 'YYYY-MM-DD HH:mm:ss'
    });
});

//CKEditor
var editor = CKEDITOR.replace('textarea1', {});

$('.add-tag').on('click', function(){
    var newTag = $(this).attr('data-tag');
    var tags = $('#inputTags').tokenfield('getTokens');
    tags.push(newTag);
    $('#inputTags').tokenfield('setTokens', tags);
});
