window.addEventListener("load", function(){
    window.cookieconsent.initialise({
        "palette": {
            "popup": {
            "background": "#efefef",
            "text": "#404040"
            },
            "button": {
            "background": "#8ec760",
            "text": "#ffffff"
            }
        },
        "type": "opt-in",
        "content": {
            "message": "Atypikhouse utilise des cookies. Nos partenaires et nous-mêmes exploitons différentes technologies, telles que celle des cookies, et traitons vos données à caractère personnel, telles que les adresses IP et les identifiants de cookie, afin de personnaliser les publicités et les contenus en fonction de vos centres d’intérêt, d’évaluer la performance de ces publicités et contenus, et de recueillir des informations sur les publics qui les ont visionnés. Cliquez ci-dessous si vous consentez à l’utilisation de cette technologie et au traitement de vos données à caractère personnel en vue de ces objectifs. Vous pouvez changer d’avis et modifier votre consentement à tout moment en revenant sur ce site. Vous pouvez voir notre politique de confidentialité",
            "dismiss": "Got it",
            "allow": "Accepter les cookies",
            "deny": "Refuser",
            "link": "ici",
            "href": "{{ route('politique_de_confidentialite') }}",
            "policy": 'Cookies',
        }
    });
});