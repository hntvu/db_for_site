CKEDITOR.editorConfig = function (config) {
    config.enterMode = CKEDITOR.ENTER_BR;
    config.language = 'vi';
    config.uiColor = '#5A7391';
    config.skin = 'moonocolor';
    config.toolbarCanCollapse = true;
    config.extraPlugins = 'video,attach';
    config.height = '38em';
    config.width = '100%';
    config.toolbar = [
        {name: 'document', items: ['Source', 'NewPage', 'Templates', 'Preview']},
        {name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord']},
        {name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Subscript', 'Superscript', ]},
        {name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', ]},
        {name: 'insert', items: ['Image', 'Video', 'Flash', 'Iframe', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak']},
        '/',
        {name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize']},
        {name: 'colors', items: ['TextColor', 'BGColor']},
        {name: 'tools', items: ['ShowBlocks', 'RemoveFormat', 'Print']},
        {name: 'links', items: ['Link', 'Unlink', 'Maximize']},
    ];
};
