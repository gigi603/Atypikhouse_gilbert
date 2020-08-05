$(document).ready(function(){
    $startdate = $( "#start_date" ).text()
    $localstartdate = moment($startdate).locale(navigator.language).format('LL');
    $( "#start_date" ).text($localstartdate);

    $enddate = $( "#end_date" ).text()
    $localenddate = moment($enddate).locale(navigator.language).format('LL');
    $( "#end_date" ).text($localenddate);
});