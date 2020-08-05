
   
$(function () {
    let startDate = $('#start_date_annonce').val().split('-').reverse().join('/');
    let endDate = $('#end_date_annonce').val().split('-').reverse().join('/');
    //startDate = new Date(startDate.split("-").reverse().join("-"));
    let dateParts = startDate.split("/");
    let dateParts2 = endDate.split("/");

    // month is 0-based, that's why we need dataParts[1] - 1
    var startDateAnnonce = new Date(+dateParts[2], dateParts[1] - 1, +dateParts[0]);
    var endDateAnnonce = new Date(+dateParts2[2], dateParts2[1] - 1, +dateParts2[0]); 
    
    var disableddates = ["05-3-2018", "05-11-2018", "05-25-2018", "05-20-2018"];
    //Page d'accueil pour la recherche 

    
    //Page de réservation
        from = $("#from")
            .datepicker({
                defaultDate: null,
                changeMonth: true,
                changeYear: true,
                numberOfMonths: 1,
                dateFormat: 'dd/mm/yy',
                minDate: 0,
                maxDate: endDateAnnonce,
                prevText: 'Précédent',
                nextText: 'Suivant',
                currentText: 'Aujourd\'hui',
                monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
                monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
                dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
                dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
                dayNamesMin: ['Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa'],
                autoclose: true,
                onSelect: function(dateText, inst){
                    let startDateAnnonce = new Date($("#from").datepicker("getDate"));
                    let endDate = new Date($("#from").datepicker("getDate"));
                    endDate.setDate(endDate.getDate() + 1);
                    $("#to").datepicker("option","minDate",
                    endDate);
                }      
            })
            
        to = $("#to").datepicker({
            defaultDate: null,
            changeMonth: true,
            changeYear: true,
            numberOfMonths: 1,
            dateFormat: 'dd/mm/yy',
            minDate: startDateAnnonce,
            maxDate: endDateAnnonce,
            prevText: 'Précédent',
            nextText: 'Suivant',
            currentText: 'Aujourd\'hui',
            monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
            dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
            dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
            dayNamesMin: ['Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa'],
        })
        .on("change", function () {  
        });

    function getDate(element) {
        var date;
        try {
            date = $.datepicker.parseDate(dateFormat, element.value);
        } catch (error) {
            date = null;
        }
        return date;
    }

    function days() {
        var a = $("#datepicker_start").datepicker('getDate').getTime(),
            b = $("#datepicker_end").datepicker('getDate').getTime(),
            c = 24*60*60*1000,
            diffDays = Math.round(Math.abs((a - b)/(c)));
     //show difference
    }

    $("#from").keydown(function(event) { 
        return false;
    });

    $("#to").keydown(function(event) { 
        return false;
    });
    

});
