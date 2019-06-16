
$(function () {
    var disableddates = ["05-3-2018", "05-11-2018", "05-25-2018", "05-20-2018"];
        from = $("#from")
            .datepicker({
                
                defaultDate: null,
                changeMonth: true,
                numberOfMonths: 1,
                dateFormat: 'dd/mm/yy',
                minDate: 0,
                prevText: 'Précédent',
                nextText: 'Suivant',
                currentText: 'Aujourd\'hui',
                monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
                monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
                dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
                dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
                dayNamesMin: ['Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa'],
                onSelect: function(dateText, inst){
                    var endDate = new Date($("#from").datepicker("getDate"));
                    endDate.setDate(endDate.getDate() + 1);
                    $("#to").datepicker("option","minDate",
                    endDate);
                }      
            })
            
            // .on("change", function () {
            //     to.datepicker("option", "minDate", getDate(this));
            // }),
        to = $("#to").datepicker({
            defaultDate: null,
            changeMonth: true,
            numberOfMonths: 1,
            dateFormat: 'dd/mm/yy',
            minDate: 0,
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
            //from.datepicker("option", "maxDate", getDate(this));
    //         var newDate = $(this).datepicker('from');
    //    if (newDate) { // Not null
    //            newDate.setDate(newDate.getDate() + 1);
    //    }
    //    $("#from").datepicker('setDate', newDate);
    //    datepicker('option', 'minDate', newDate);     
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

    function DisableSpecificDates(date) {

        var m = date.getMonth();
        var d = date.getDate();
        var y = date.getFullYear();

        // First convert the date in to the mm-dd-yyyy format 
        // Take note that we will increment the month count by 1 
        var currentdate = d + '-' + (m + 1) + '-' + y;

        // We will now check if the date belongs to disableddates array 
        for (var i = 0; i < disableddates.length; i++) {

            // Now check if the current date is in disabled dates array. 
            if ($.inArray(currentdate, disableddates) != -1) {
                return [false];
            }
        }
    }

    function days() {
        var a = $("#datepicker_start").datepicker('getDate').getTime(),
            b = $("#datepicker_end").datepicker('getDate').getTime(),
            c = 24*60*60*1000,
            diffDays = Math.round(Math.abs((a - b)/(c)));
        console.log(diffDays); //show difference
    }
    

});
