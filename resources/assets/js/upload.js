$(document).ready(function() {

	// JSON file uploder

	var jsonFileUploader = new plupload.Uploader({

	    runtimes : 'html5,flash',
	     
	    browse_button : 'select-json-file', // you can pass in id...
	    // container: document.getElementById('container'), // ... or DOM Element itself
	     
	    url : "/collections/data-upload",
	     
	    filters : {
	        max_file_size : '20mb',
	        mime_types: [
	            {title : "JSON files", extensions : "json"},
	        ]
	    },

	    headers: {
	        "x-csrf-token" : $("[name=_token]").val()
	    },

        multipart_params: {
            "name": $("[name=name]").val()
        },

	    // Flash settings
	    flash_swf_url : '/assets/swf/uploader.swf',
	 
	    init: {

	        FilesAdded: function(up, files) {
				jsonFileUploader.settings.multipart_params["name"] = $("[name=name]").val();
                jsonFileUploader.start();
	        },
	 
	        UploadProgress: function(up, file) {
	            $('#select-json-file').find('strong').html('(' + file.percent + '%)');
	        },

            UploadComplete: function(uploader, files) {
                $("#select-json-file").attr("disabled", "disabled");
                //$(".group-select-json-file .alert-success").show();
                $(".group-select-papers").show();
            },
	 
	        Error: function(up, err) {
	            alert('Error: ['+error.code+'] '+error.message);
	        }
	    }
	});

	jsonFileUploader.init();

	// Papers upload

	var papersUploader = new plupload.Uploader({

	    runtimes : 'html5,flash',
	     
	    browse_button : 'select-papers', // you can pass in id...
	    // container: document.getElementById('container'), // ... or DOM Element itself
	     
	    url : "/papers/upload",
	     
	    filters : {
	        max_file_size : '20mb',
	        mime_types: [
	            {title : "PDF files", extensions : "pdf"},
	        ]
	    },

        headers: {
            "x-csrf-token" : $("[name=_token]").val()
        },
	 
	    // Flash settings
	    flash_swf_url : '/assets/swf/uploader.swf',
	 
	    init: {

	        FilesAdded: function(up, files) {
                papersUploader.start();
	        },
	 
	        UploadProgress: function(up, file) {
                $(".group-select-papers .progress-bar")
                    .attr("style", "width: " + file.percent + "%;")
                    .html(file.percent + "%");
	        },

            UploadComplete: function(uploader, files) {
                $("#select-papers").attr("disabled", "disabled");
                $(".group-save-collection").show();
            },
	 
	        Error: function(up, err) {
                alert('Error: ['+error.code+'] '+error.message);
	        }
	    }
	});
	 
	papersUploader.init();

});