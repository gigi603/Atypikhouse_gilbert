$(document).ready(function(){
    $( "#select_category" ).change(function() {
        $("#select_category option:checked").each(function(){
            var category_id = $("#select_category option:checked").val();
            console.log(category_id);
            $.ajax({
                type: 'GET',
                url: "http://127.0.0.1:8000/json_propriete/"+category_id,
                dataType: "json",
                data: "",
                success: function(data) {
                    $('.proprietes').empty();
                    for (i in data.proprietes) {
                        console.log(data.proprietes[i].propriete);
                        
                        $( ".proprietes" ).append(`
                        <div class="form-group">
                            <label class="col-md-4 control-label">
                                ${data.proprietes[i].propriete}
                            </label>
                            <div class="col-md-6">
                                <input type="checkbox" class="checkbox_propertie" name="propriete[]" autofocus value="" />
                            </div>
                        </div>`);
                    }
                },error: function (data){
                    $('.proprietes').empty();
                }
            });
        })
        
    });
});

$(document).on("click", "input[name='propriete[]']", function(){
    $("input[name='propriete[]']").each(function () {
        if( $(this).is(':checked') ){
            $(this).val("true");
        } else {
            $(this).val("false");
        }
    });
});
/*<input type="hidden" name="propriete_id[]" value="${data.proprietes[i].id}"/>*/