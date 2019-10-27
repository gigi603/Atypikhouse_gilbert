$(document).ready(function(){
    $("#select_category option:checked").each(function(){
        var house_id = $("#house_id").val();
        var category_id = $("#select_category option:checked").val();
        $.ajax({
            type: 'GET',
            url: "http://127.0.0.1:8000/json_propriete/"+house_id+'/'+category_id,
            dataType: "json",
            data: "",
            success: function(data) {
                $('.proprietes').empty();
                console.log(data)
                var idArr = [];

                for (j in data.valArray){
                    console.log(data.valArray[j].propriete_id)
                    idArr.push(data.valArray[j].propriete_id);
                }                

                console.log(idArr);
                for (i in data.proprietes) {
                    console.log(data.proprietes[i].id);
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
                url: "http://127.0.0.1:8000/json_propriete/"+house_id+'/'+category_id,
                dataType: "json",
                data: "",
                success: function(data) {
                    $('.proprietes').empty();
                    console.log(data)
                var idArr = [];

                for (j in data.valArray){
                    console.log(data.valArray[j].propriete_id)
                    idArr.push(data.valArray[j].propriete_id);
                }                

                console.log(idArr);
                for (i in data.proprietes) {
                    console.log('coucou', data.proprietes[i].id);
                    if (idArr.indexOf(data.proprietes[i].id) !== -1) {
                        console.log('oui')
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
                        console.log('no')
       
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
                    console.log('erreur')
                }
            });
        })  
    });
});

// $(document).on("click", "input[name='propriete[]']", function(){
//     $("input[name='propriete[]']").each(function () {
//         if( $(this).is(':checked') ){
//             $(this).val("true");
//         } else {
//             $(this).val("false");
//         }
//     });
// });
/*<input type="hidden" name="propriete_id[]" value="${data.proprietes[i].id}"/>*/