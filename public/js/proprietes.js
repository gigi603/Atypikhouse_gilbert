$(document).ready(function(){
    $('#select_category').on('change', function(){
        $("#propriete_category").empty();
        var category_id= $(this).val();
        console.log("coco");
        // cache the $(this) jQuery object since we're potentially using it twice:
        if($(this).val() != "defaut"){
            $.ajax({ 
                type: 'GET', 
                url: "/json_propriete", 
                dataType: 'json',
                data: 'category_id=' + category_id,
                success: function (proprietes) {
                    if(proprietes["proprietes"].length == 0){
                        $( "div" ).remove( ".proprietediv" );
                    } else {
                        $("#propriete_category").append("<div class='form-group proprietediv'><label for='name' class='col-md-4 control-label'>Propriétés: </label><div class='col-md-6 proprietelist'></label></div></div>");
                        for(var i in proprietes["proprietes"]){     
                            var id = proprietes["proprietes"][i]["id"]        
                            var propriete = proprietes["proprietes"][i]["propriete"];
                            var typePropriete = proprietes["proprietes"][i]["typeProprietes"];
                            if(typePropriete == "checkbox") {
                                $(".proprietelist").append( "<label></label><input type='checkbox' name='valuePropriete[]'/>"+propriete+"<input type='text' name='propriete_id[]' value="+id+" style='display:none;'></div>");
                            } else {
                                $(".proprietelist").append( "<label>"+propriete+"</label><input type='text' name='valuePropriete[]'/><input type='text' name='propriete_id[]' value="+id+" style='display:none;'></div>");
                            }              
                        }
                    }                   
                },error: function (){
                }
            })
        } else {
            $(".block-properties").show();
        }
    });
});