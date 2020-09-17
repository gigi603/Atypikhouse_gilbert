$('.form-horizontal input[type=text]').on('change invalid', function() {
    var textfield = $(this).get(0);
    
    // 'setCustomValidity not only sets the message, but also marks
    // the field as invalid. In order to see whether the field really is
    // invalid, we have to remove the message first
    textfield.setCustomValidity('');
    
    if (!textfield.validity.valid) {
      textfield.setCustomValidity('Veuillez remplir ce champ');  
    }
});

$('.form-horizontal input[type=email]').on('change invalid', function() {
    var textfield = $(this).get(0);
    
    // 'setCustomValidity not only sets the message, but also marks
    // the field as invalid. In order to see whether the field really is
    // invalid, we have to remove the message first
    textfield.setCustomValidity('');
    
    if (!textfield.validity.valid) {
      textfield.setCustomValidity('Veuillez saisir une adresse mail');  
    }
});

$('.form-horizontal input[type=password]').on('change invalid', function() {
    var textfield = $(this).get(0);
    
    // 'setCustomValidity not only sets the message, but also marks
    // the field as invalid. In order to see whether the field really is
    // invalid, we have to remove the message first
    textfield.setCustomValidity('');
    
    if (!textfield.validity.valid) {
      textfield.setCustomValidity('Veuillez remplir ce champ');  
    }
});

$('.form-horizontal input[type=checkbox]').on('change invalid', function() {
    var textfield = $(this).get(0);
    
    // 'setCustomValidity not only sets the message, but also marks
    // the field as invalid. In order to see whether the field really is
    // invalid, we have to remove the message first
    textfield.setCustomValidity('');
    
    if (!textfield.validity.valid) {
      textfield.setCustomValidity('Veuillez cocher cette case');  
    }
});

$('.form-horizontal textarea').on('change invalid', function() {
  var textfield = $(this).get(0);
  
  // 'setCustomValidity not only sets the message, but also marks
  // the field as invalid. In order to see whether the field really is
  // invalid, we have to remove the message first
  textfield.setCustomValidity('');
  
  if (!textfield.validity.valid) {
    textfield.setCustomValidity('Veuillez remplir ce champ');  
  }
});

$('.form-horizontal hidden').on('change invalid', function() {
  var textfield = $(this).get(0);
  
  // 'setCustomValidity not only sets the message, but also marks
  // the field as invalid. In order to see whether the field really is
  // invalid, we have to remove the message first
  textfield.setCustomValidity('');
  
  if (!textfield.validity.valid) {
    textfield.setCustomValidity('Veuillez remplir ce champ');  
  }
});

$('.form-horizontal select').on('change invalid', function() {
  var textfield = $(this).get(0);
  
  // 'setCustomValidity not only sets the message, but also marks
  // the field as invalid. In order to see whether the field really is
  // invalid, we have to remove the message first
  textfield.setCustomValidity('');
  
  if (!textfield.validity.valid) {
    textfield.setCustomValidity('Veuillez selectionner une valeur');  
  }
});