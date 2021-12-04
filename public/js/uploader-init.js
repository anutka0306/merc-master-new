$(document).ready(function () {
	const upload_url = $(".uploader-wrapper").data('url');
	if (! upload_url) {
		console.error('В элементе с классом "uploader-wrapper" необходимо определить атрибут data-url с адресом для загрузки фото');
	}
	$(".dm-uploader").dmUploader({
		url: upload_url,
		extFilter: ["jpg", "jpeg", "png", "gif", "mp4", "avi", "mkv", "ogg"],
		dataType: "json",
		onFileExtError: function (file) {
			alert("Загрузка файла '" + file.name + "' запрещена!");
		},
		onDragEnter: function () {
			// Happens when dragging something over the DnD area
			this.addClass('active');
		},
		onDragLeave: function () {
			// Happens when dragging something OUT of the DnD area
			this.removeClass('active');
		},
		
		onNewFile: function (id, file) {
			ui_multi_add_file(id, file);
			if (typeof FileReader !== "undefined" && file.type.substr(0, 5) == "image") {
				var reader = new FileReader();
				var img = $('#uploaderFile' + id).find('img');
				
				reader.onload = function (e) {
					img.attr('src', e.target.result);
				}
				reader.readAsDataURL(file);
			}
			else {
				$('#uploaderFile' + id).find('img').remove();
			}
		},
		onBeforeUpload: function (id) {
			ui_multi_update_file_progress(id, 0, '', true);
			ui_multi_update_file_status(id, 'uploading', 'Загрузка...');
		},
		onUploadProgress: function (id, percent) {
			// Updating file progress
			ui_multi_update_file_progress(id, percent);
		},
		onUploadSuccess: function (id, data) {
			// A file was successfully uploaded
			//console.log('Server Response for file #' + id + ': ' + JSON.stringify(data));
			//console.log('Upload of file #' + id + ' COMPLETED', 'success');
			if (data.status != "OK") {
				ui_multi_update_file_status(id, 'danger', data.message);
				ui_multi_update_file_progress(id, 0, 'danger', false);
			}
			else {
				var msg = (typeof data.message == 'undefined') ? 'Загрузка завершена' : data.message;
				ui_multi_update_file_status(id, 'success', msg);
				ui_multi_update_file_progress(id, 100, 'success', false);
			}
			
		},
		onUploadError: function (id, xhr, status, message) {
			// Happens when an upload error happens
			ui_multi_update_file_status(id, 'danger', message);
			ui_multi_update_file_progress(id, 0, 'danger', false);
		},
		onFallbackMode: function () {
			// When the browser doesn't support this plugin :(
			//console.log('Plugin cant be used here, running Fallback callback', 'danger');
		},
		onFileSizeError: function (file) {
			console.log('Файл \'' + file.name + '\' не загружен - превышен максимальный размер', 'danger');
		}
		
		// ... More callbacks
	});
	
	$('.delete_image').on('click',function (e) {
		e.preventDefault();
		const el = $(this);
		const file = el.data('file');
		const url = el.prop('href');
		$.ajax({
			url,
			type:'DELETE',
			data:{file},
			dataType: 'json',
			success:function(data){
				if (data.status) {
					el.closest('.media_uploader').fadeOut();
				}else{
					alert(data.msg);
				}
			},
			error:function (data) {
				alert('Ошибка удаления файла');
			}
		});
	});
});