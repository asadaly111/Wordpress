<!doctype html>
<html>
<head>
	<title>Proper Title</title>
	<style>
	#selectedFiles img {
		max-width: 200px;
		max-height: 200px;
		float: left;
		margin-bottom:10px;
	}
</style>
</head>
<body>
	<form id="myForm" method="post" action="submit.php" enctype="multipart/form-data">
		<div class="contact-inner-1 row">
			<div class="col-md-6">
				<div class="form-group">
					<input type="email" name="userEmail" class="form-control valid" placeholder="Email">
				</div>
				<div class="form-group">
					<input type="text" name="location" class="form-control valid" placeholder="Location" required="required" aria-invalid="false">
				</div>
				<div class="form-group">
					<input type="text" name="company_name" class="form-control valid" placeholder="Company Name" required="required" aria-invalid="false">
				</div>
				<div class="form-group">
					<input type="number" step="1" name="company_phone" class="form-control valid" placeholder="Company Phone" required="required" aria-invalid="false">
				</div>
				<div class="form-group">
					<input type="text" name="website" class="form-control valid" placeholder="Company Website (if any)" aria-invalid="false">
				</div>
				<div class="form-group">
					<input type="text" name="contact_person_name" class="form-control valid" placeholder="Contact Person Name" aria-invalid="false">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<textarea id="message" name="company_description" class="form-control valid" placeholder="Company Description" required="" aria-invalid="false"></textarea>
				</div>
			</div>
		</div>
		Files: <input type="file" id="files" name="project_photos[]" multiple>
		<br/>
		<div id="selectedFiles"></div>
		<input type="submit">
	</form>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script>
		var selDiv = "";
		var storedFiles = [];
		jQuery(document).ready(function() {
			jQuery("#files").on("change", handleFileSelect);
			selDiv = jQuery("#selectedFiles");
			jQuery("#myForm").on("submit", handleForm);
			jQuery("body").on("click", ".selFile", removeFile);
		});
		function handleFileSelect(e) {
			var files = e.target.files;
			var filesArr = Array.prototype.slice.call(files);
			filesArr.forEach(function(f) {
				if(!f.type.match("image.*")) {
					return;
				}
				storedFiles.push(f);
				var reader = new FileReader();
				reader.onload = function (e) {
					var html = "<div><img src=\"" + e.target.result + "\" data-file='"+f.name+"' class='selFile' title='Click to remove'>" + f.name + "<br clear=\"left\"/></div>";
					selDiv.append(html);
				}
				reader.readAsDataURL(f);
			});
		}
		function handleForm(e) {
			e.preventDefault();
			var data = new FormData();
			var formData = new FormData(jQuery(this)[0]);
			formData.delete('project_photos[]');
			for(var i=0, len=storedFiles.length; i<len; i++) {
				data.append('project_photos[]', storedFiles[i]);
			}
			for (var pair of formData.entries()) {
				data.append(pair[0], pair[1]);
			}
			var xhr = new XMLHttpRequest();
			xhr.open('POST', '<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=cms_formsubmit', true);
			xhr.onload = function(e) {
				if(this.status == 200) {
					console.log(e.currentTarget.responseText);
				}
			}
			xhr.send(data);
		}
		function removeFile(e) {
			var file = jQuery(this).data("file");
			for(var i=0;i<storedFiles.length;i++) {
				if(storedFiles[i].name === file) {
					storedFiles.splice(i,1);
					break;
				}
			}
			jQuery(this).parent().remove();
		}
	</script>
</body>
</html>