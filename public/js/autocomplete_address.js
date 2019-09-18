  let street_number = document.getElementById('street_number');
  let route = document.getElementById('route');
  let locality = document.getElementById('locality');
  let country = document.getElementById('country');
  let adresse = document.getElementById('autocompleteadresse');

  // google.load("elements", "1", {
  //   packages: "transliteration"
  // });
  
  var optionsAdresse = {
    types: ['address'],
    language: 'fr'
  };

let place;

autocompleteadresse = new google.maps.places.Autocomplete(adresse, optionsAdresse);

autocompleteadresse.setComponentRestrictions(
  {'country': ['fr', 'be','es', 'it']});

google.maps.event.addListener(autocompleteadresse, 'place_changed', function() {
  console.log(autocompleteadresse)
  place = autocompleteadresse.getPlace();
  console.log(place)
  for (var i in place.address_components) {    
    var component = place.address_components[i];    
    
    for (var j in component.types) {  
      var type_element = document.getElementById(component.types[j]);      
      
      if (type_element) {     
        type_element.value = component.long_name;
      }    
    }
  }
});
function validate(){
  if(adresse.value != !place.formatted_address){
    console.log('hello');
    adresse.value = ""
    return true;
  }
}