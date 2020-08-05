$(document).ready(function(){
    $("#select_category option:checked").each(function(){
        var house_id = $("#house_id").val();
        var category_id = $("#select_category option:checked").val();
        $.ajax({
            type: 'GET',
            url: site+'/admin/json_propriete/'+house_id+'/'+category_id,
            dataType: "json",
            data: "",
            success: function(data) {
                $('.proprietes').empty();
                var idArr = [];

                for (j in data.valArray){
                    idArr.push(data.valArray[j].propriete_id);
                }                

                for (i in data.proprietes) {
                    if (idArr.indexOf(data.proprietes[i].id) !== -1) {
                        $( ".proprietes" ).append(`
                        <div class="form-group">
                            <label class="col-md-4 control-label">
                                ${data.proprietes[i].propriete}
                            </label>
                            <div class="col-md-6">
                                <input type="checkbox" checked class="checkbox_propertie" name="propriete[]" autofocus value="${data.proprietes[i].id}"/>
                            </div>
                        </div>`);
                    } else {
                    
                        $( ".proprietes" ).append(`
                        <div class="form-group">
                            <label class="col-md-4 control-label">
                                ${data.proprietes[i].propriete}
                            </label>
                            <div class="col-md-6">
                                <input type="checkbox" class="checkbox_propertie" name="propriete[]" autofocus value="${data.proprietes[i].id}"/>
                            </div>
                        </div>`);
                    }
                }
            },error: function (data){
                $('.proprietes').empty();
            }
        });
    })
    $( "#select_category" ).change(function() {
        $("#select_category option:checked").each(function(){
            var category_id = $("#select_category option:checked").val();
            var house_id = $("#house_id").val();
            $.ajax({
                type: 'GET',
                url: site+'/admin/json_propriete/'+house_id+'/'+category_id,
                dataType: "json",
                data: "",
                success: function(data) {
                    $('.proprietes').empty();
                var idArr = [];

                for (j in data.valArray){
                    idArr.push(data.valArray[j].propriete_id);
                }                

                for (i in data.proprietes) {
                    if (idArr.indexOf(data.proprietes[i].id) !== -1) {
                        $( ".proprietes" ).append(`
                        <div class="form-group">
                            <label class="col-md-4 control-label">
                                ${data.proprietes[i].propriete}
                            </label>
                            <div class="col-md-6">
                                <input type="checkbox" checked class="checkbox_propertie" name="propriete[]" autofocus value="${data.proprietes[i].id}"/>
                            </div>
                        </div>`);
                    } else {       
                        $( ".proprietes" ).append(`
                        <div class="form-group">
                            <label class="col-md-4 control-label">
                                ${data.proprietes[i].propriete}
                            </label>
                            <div class="col-md-6">
                                <input type="checkbox" class="checkbox_propertie" name="propriete[]" autofocus value="${data.proprietes[i].id}"/>
                            </div>
                        </div>`);
                    }
                }
                },error: function (data){
                    $('.proprietes').empty();
                }
            });
        })  
    });
});