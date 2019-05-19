$(document).ready(function(){
    $startdate = $( "#start_date" ).text()
    $localstartdate = moment($startdate).locale(navigator.language).format('LL');
    console.log($localstartdate);
    $( "#start_date" ).text($localstartdate);

    $enddate = $( "#end_date" ).text()
    $localenddate = moment($enddate).locale(navigator.language).format('LL');
    console.log($localenddate);
    $( "#end_date" ).text($localenddate);
});