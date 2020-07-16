<?php
$wPath=dirname(getWebPath(__FILE__))."/";
//echo $wPath;

$ckEditorBase = "ckeditor5-build-classic";
//$ckEditorBase = "ckeditor5-advanced";
$ckEditorBase = "ckeditor5-custom/build";
?>
<script src='<?=$wPath?><?=$ckEditorBase?>/ckeditor.js' type='text/javascript' language='javascript'></script>
<script>
function getFullCKToolbar() {
    return ['heading', '|', 
            'fontFamily', 'fontSize', 'fontBackgroundColor', 'fontColor', 'highlight', '|', 
            'bold', 'italic', 'underline', 'strikethrough', 'subscript', 'superscript', 'link', 'bulletedList', 'numberedList', '|', 
            'alignment', 'indent', 'outdent', '|', 
            'pageBreak', 'horizontalLine', '|', 
            'imageUpload', 'blockQuote', 'insertTable', 'mediaEmbed', 'specialCharacters', 'codeBlock', '|', 
            'undo', 'redo'];
}
function loadCKEditor(editorEle, toolbar) {
    if(toolbar==null) toolbar = [];
    
    toolbar = $.extend([ 'heading', '|', 'bold', 'italic', 'link' , 'underline', '|', 'undo', 'redo'],toolbar);
    
    ClassicEditor
			.create( document.querySelector( editorEle ), {
				toolbar: {
					items: toolbar
				},
				removePlugins: [ 'Title'],
				language: 'en',
				image: {
					toolbar: [
						'imageTextAlternative',
						'imageStyle:full',
				// 		'imageStyle:side',
						'imageStyle:alignLeft',
						'imageStyle:alignCenter',
						'imageStyle:alignRight',
					],
					styles: [
					    'alignCenter',
					    'side',
					    
                        // This option is equal to a situation where no style is applied.
                        'full',
                        // This represents an image aligned to the left.
                        'alignLeft',
                        // This represents an image aligned to the right.
                        'alignRight'
                    ]
				},
				table: {
					contentToolbar: [
						'tableColumn',
						'tableRow',
						'mergeTableCells',
						'tableCellProperties',
						'tableProperties'
					]
				},
				// simpleUpload: {
    //                 uploadUrl: _service("upload"),
    //             },
                ckfinder: {
                    uploadUrl: _service("upload","ckfinder"),//'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
                }
				// licenseKey: '',
				
			} )
			.then( editor => {
				window.editor = editor;
			} )
			.catch( error => {
				//console.error( 'Oops, something gone wrong!' );
				//console.error( 'Please, report the following error in the https://github.com/ckeditor/ckeditor5 with the build id and the error stack trace:' );
				//console.warn( 'Build id: 5l4bpwakv46k-erfdiueqf61o' );
				console.error( error );
			} );
}
</script>