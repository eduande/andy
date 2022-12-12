<label for="message" class="form-label">Mensaje</label>
<textarea type="text" name="message" class="form-control" id="message" required> </textarea>

<label for="footer" class="form-label">Mensaje de pie de página *opcional</label>
<input type="text" name="footer" class="form-control" id="footer" >

 <label class="form-label">Imagen <span class="text-sm text-warbubg">*OPCIONAL</span></label>
                   <div class="input-group">
                     <span class="input-group-btn">
                       <a id="image" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                         <i class="fa fa-picture-o"></i> Elegir
                       </a>
                     </span>
                     <input id="thumbnail" class="form-control"  type="text" name="image" readonly>
                   </div>
                   <label class="form-label">Botón de plantilla <span class="text-sm text-warbubg">*Mínimo 1 botón de plantilla</span></label><br>
<button type="button" id="addbutton" class="btn btn-primary btn-sm">Añadir botón</button>
<button type="button" id="reduceButton" class="btn btn-danger btn-sm">Botón Reducir</button>
<div id="emailHelp" class="form-text">Plantilla = Enlace de botón o mensaje de llamada de botón,<br>
si desea enviar el botón de llamada, puede completarlo así: llamada | Su texto | Su número<br>
si desea enviar el botón Enlace, puede completarlo así: url | TuTexto | Su enlace<br>

¡el tipo solo tiene dos valores, url y call!
</div>

<label for="template1" class="form-label">Tema 1</label>
<input type="text" name="template1" value="tipo | texto | enlace o número" class="form-control" id="template1" required>

<div class="template-area">

</div>

<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    // add button when click add button maximal 3 button
    $(document).ready(function() {
        $('#image').filemanager('file')
       
        var max_fields = 3; //maximum input boxes allowed
        var wrapper = $(".template-area"); //Fields wrapper
        var add_button = $("#addbutton"); //Add button ID
        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="form-group"><label for="template' + x + '" class="form-label">Temas ' + x + '</label><input type="text" name="template' + x + '" class="form-control" id="template' + x + '" required></div>'); //add input box
            }
        });
        // reduce button when click
        $(document).on('click', '#reduceButton', function(e) {
            e.preventDefault();
            if(x > 1){
                $('.form-group:last').remove();
                x--;
            }
        });
       
    });
</script>

