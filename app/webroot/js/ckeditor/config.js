/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/
//var source = "http://cakeflybook/";
var source = ""; 
//var source = "demo/thegioianhngu/"; 
CKEDITOR.editorConfig = function( config )
{
    config.enterMode = CKEDITOR.ENTER_BR;
	// Define changes to default configuration here. For example:
    config.language = 'vi';
    config.extraPlugins='jwplayer,mp3player,audio,video';
    config.filebrowserBrowseUrl = '/'+source+'js/kcfinder/browse.php?type=files';    
    config.filebrowserImageBrowseUrl = '/'+source+'js/kcfinder/browse.php?type=images';
    config.filebrowserFlashBrowseUrl = '/'+source+'js/kcfinder/browse.php?type=flash';
    
    config.filebrowserUploadUrl = '/'+source+'js/kcfinder/upload.php?type=files';    
    config.filebrowserImageUploadUrl = '/'+source+'js/kcfinder/upload.php?type=images';
    config.filebrowserFlashUploadUrl = '/'+source+'js/kcfinder/upload.php?type=flash';
    config.font_names =
            'Arial/Arial, Helvetica, sans-serif;' +
            'Comic Sans MS/Comic Sans MS, cursive;' +
            'Courier New/Courier New, Courier, monospace;' +
            'Georgia/Georgia, serif;' +
            'Lucida Sans Unicode/Lucida Sans Unicode, Lucida Grande, sans-serif;' +
            'Tahoma/Tahoma, Geneva, sans-serif;' +
            'Times New Roman/Times New Roman, Times, serif;' +
            'Trebuchet MS/Trebuchet MS, Helvetica, sans-serif;' +
            'Calibri/Calibri, Verdana, Geneva, sans-serif;' + /* here is your font */
            'Verdana/Verdana, Geneva, sans-serif';
    //config.toolbar = 'Full';
 
    /**
     * config.toolbar_Full =
     * [	
     * 	{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
     * 	{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
     * 	'-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
     * 	{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
     * 	{ name: 'insert', items : [ 'Image','jwplayer','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ] },
     * 	'/',
     * 	{ name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
     * 	{ name: 'colors', items : [ 'TextColor','BGColor' ] },
     * 	{ name: 'tools', items : [ 'Maximize', 'ShowBlocks','-','About', 'file' ] }
     * ];
     */
    
    // Toolbar configuration generated automatically by the editor based on config.toolbarGroups.
    config.toolbar = [
    	{ name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
    	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
    	{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
    	{ name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
    	'/',
    	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
    	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'language' ] },
    	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
    	{ name: 'insert', items: ['Image','jwplayer', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
        { name: 'insert', items : ['Mp3Player','Audio', 'Video'] },
    	'/',
    	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
    	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
    	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
    	{ name: 'others', items: [ '-' ] },
    	{ name: 'about', items: [ 'About' ] }
    ];
    
    // Toolbar groups configuration.
    config.toolbarGroups = [
    	{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
    	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
    	{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ] },
    	{ name: 'forms' },
    	'/',
    	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
    	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
    	{ name: 'links' },
    	{ name: 'insert' },
    	'/',
    	{ name: 'styles' },
    	{ name: 'colors' },
    	{ name: 'tools' },
    	{ name: 'others' },
    	{ name: 'about' }
    ];
    
};