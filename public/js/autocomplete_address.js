  let pays = document.getElementById('autocompletepays');
  let ville = document.getElementById('autocompleteville');
  let adresse = document.getElementById('autocompleteadresse');
  var optionsAdresse = {
    componentRestrictions: {country: ['fr', 'be','es', 'it']},
    types: ['address']
  };

let place;

autocompleteadresse = new google.maps.places.Autocomplete(adresse, optionsAdresse);
google.maps.event.addListener(autocompleteadresse, 'place_changed', function() {
  place = autocompleteadresse.getPlace();
  pays.value = place.address_components[5].long_name; 
  adresse.value = place.formatted_address;
  ville.value = place.address_components[2].long_name;
  console.log(place);
});
function validate(){
    if(place)
    if(ville.value == "" || pays.value == "" 
    || pays.value != place.address_components[5].long_name 
    || ville.value != place.address_components[2].long_name){
      adresse.value = "";
      return true;
    }
    if(!place || adresse.value != place.formatted_address){
      adresse.value = "";
      return true;
    } else {
      pays.value = place.address_components[5].long_name;
      ville.value = place.address_components[2].long_name;
      adresse.value = place.formatted_address;
      return true;
    }
}
