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

$('.add-tag').on('click', function(){
    var inputTags = $('#inputTags');
    var newTag = $(this).attr('data-tag');
    var tags = inputTags.tokenfield('getTokens');
    tags.push(newTag);
    inputTags.tokenfield('setTokens', tags);
});

$("#inputImg").fileinput({
    showUpload: false,
    maxFileCount: 1,
    showRemove: false,
    previewFileType: 'image',
    initialPreviewCount: 1,
    autoReplace: true,
    allowedFileTypes: ['image'],
    previewTemplates: {
        image: '<div class="" id="{previewId}" data-fileindex="{fileindex}">\n' +
        '   <img src="{data}" style="max-width: 100%;" class="" title="{caption}" alt="{caption}">\n' +
        '</div>\n',
        generic: '<div class="" id="{previewId}" data-fileindex="{fileindex}">\n' +
        '   {content}\n' +
        '</div>\n'
    }
});

$(function() {
    $('#inputContent').trumbowyg({
        btnsDef: {
            image: {
                dropdown: ['insertImage', 'upload', 'base64'],
                ico: 'insertImage'
            }
        },
        upload:{serverPath: '/upload-image-ajax'},
        btns: ['viewHTML',
            '|', 'formatting',
            '|', 'btnGrp-design',
            '|', 'link',
            '|', 'image',
            '|', 'btnGrp-justify',
            '|', 'btnGrp-lists',
            '|', 'more'],
        mobile: true,
        tablet: true,
        autogrow: true

    });
});