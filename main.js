tinymce.init({
    selector: '#editor',
	language: 'es_MX',
	branding: false,
	menubar: false,
	toolbar:
		'undo redo | fullscreen | styles forecolor | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | image | bullist | anchor',
	statusbar: false,
	allow_html_in_named_anchor: true,
	advlist_bullet_styles: 'default,lower-alpha,lower-greek,lower-roman,upper-alpha,upper-roman, anchor',
	plugins: 'image | lists advlist | fullscreen',
	file_picker_types: 'file image media',
	file_picker_callback: (callback, value, meta) => {
		// Provide file and text for the link dialog
		if (meta.filetype == 'file') {
		  callback('mypage.html', { text: 'My text' });
		}
	
		// Provide image and alt text for the image dialog
		if (meta.filetype == 'image') {
		  callback('myimage.jpg', { alt: 'My alt text' });
		}
	
		// Provide alternative source and posted for the media dialog
		if (meta.filetype == 'media') {
		  callback('movie.mp4', { source2: 'alt.ogg', poster: 'image.jpg' });
		}
	  }
});