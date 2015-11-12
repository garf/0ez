$("#inputLogo").fileinput({
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
$("#inputBg").fileinput({
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

var editor = ace.edit("editorCss");
editor.setTheme("ace/theme/chrome");
editor.getSession().setMode("ace/mode/css");
editor.setOption("minLines", 30);
editor.setOption("maxLines", 30);

var textarea = $('#inputCss');
textarea.closest('form').submit(function () {
    textarea.val(editor.getSession().getValue());

});

$(function () {
    $('#inputHeaderBg').colorpicker();
    $('#inputFooterTopBg').colorpicker();
    $('#inputFooterTopText').colorpicker();
    $('#inputFooterBottomBg').colorpicker();
    $('#inputFooterBottomText').colorpicker();
});