		<?= sources(true); ?>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

					<div id="richbox">
						<?php generate_rich_box("El cuerpo de tu Post");?>
						<button id="btnContinuar" class = "form-control btn-default">Continuar</button>
					</div>

					<div id ="form" style="display: none">
						<button id="btnEditar" class = "form-control btn-default">Atras</button>
	      		<?php
	        		echo form_open_multipart('Articulo/insert');
						?>
						<br>
						<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Titulo del Post" required >
						<br>
						<input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Subtitulo del Post" required >
						<br>
						<input type="textarea" name="contenido" id="contenido" class="form-control" style="display: none;" required>
						<input type="text" name="seleccionado" id="seleccionado" class="form-control" style="display: none;" required>
						<?php
	        		echo form_input_file('Imagen');
						?>
						<select id ="sel" class = "select form-control" style="width: 200px;">
				      <option id = "default" style="display: none">Framework</option>
				      <option value = "Codeigniter">Codeigniter</option>
				      <option value = "Laravel">Laravel</option>
							<?php
								$usuario = $this->session->userdata('usuario');
								if($usuario == 'admin')
								{
							?>
							<option value = "Novedades">Novedades</option>
							<?php
								}
							?>
					  </select>
				    <hr>
						<input type="submit" class = "form-control btn-default">
						<?php
        			echo form_close();
	      		?>
					</div>
				</div>
  		</div>
		</div>

<script type="text/javascript">
		$(function(){
				function initToolbarBootstrapBindings() {
					var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
								'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
								'Times New Roman', 'Verdana'],
								fontTarget = $('[title=Font]').siblings('.dropdown-menu');
					$.each(fonts, function (idx, fontName) {
							fontTarget.append($('<li><a data-edit="fontName ' + fontName +'" style="font-family:\''+ fontName +'\'">'+fontName + '</a></li>'));
					});
					$('a[title]').tooltip({container:'body'});
						$('.dropdown-menu input').click(function() {return false;})
								.change(function () {$(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');})
						.keydown('esc', function () {this.value='';$(this).change();});

					$('[data-role=magic-overlay]').each(function () {
						var overlay = $(this), target = $(overlay.data('target'));
						overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
					});
					if ("onwebkitspeechchange"  in document.createElement("input")) {
						var editorOffset = $('#editor').offset();
						//$('#voiceBtn').css('position','absolute').offset({top: editorOffset.top, left: editorOffset.left+$('#editor').innerWidth()-35});
					} else {
						$('#voiceBtn').hide();
					}
				};
				function showErrorAlert (reason, detail) {
						var msg='';
						if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
						else {
								console.log("error uploading file", reason, detail);
						}
						$('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+
						 '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
				};
				initToolbarBootstrapBindings();
				$('#editor').wysiwyg({ fileUploadError: showErrorAlert} );
				window.prettyPrint && prettyPrint();
			});

			$("#btnContinuar").click(function(){
				$("#form").css("display","initial");
				$("#richbox").css("display","none");
				$("#contenido").val($("#editor").cleanHtml(true));
			});

			$("#btnEditar").click(function(){
				$("#form").css("display","none");
				$("#richbox").css("display","initial");
			});

    $(document).ready(function(){
      $("#sel").change(function(e){
        $("#seleccionado").val($('#sel option:selected').text());
      });
    });
</script>
