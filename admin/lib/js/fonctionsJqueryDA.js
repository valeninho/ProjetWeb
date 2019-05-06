/*fonctions jquery pour DA */

    $("span[id]").click(function () {
      //Récupération du contenu d'origine de la zone cliquée
        var valeur1 = $.trim($(this).text());

        //s'il fallait tester si on utilise edge :
        if (/Edge\/\d./i.test(navigator.userAgent)) {
            $(this).addClass("borderInput");
        }

        //2 lignes suivantes pour firefox
        //$(this).contentEditable = "true";
        //$(this).addClass("borderInput");

       //récupération, pour la zone cliquée, des attributs id et name, pour les envoyer à la requête sql
        var ident = $(this).attr("id");
        var name = $(this).attr("name");

        $(this).blur(function () {
            $(this).removeClass("borderInput");
           //récupération de la nouveau contenu du champ qui vient de perdre le focus (blur)
            var valeur2 = $(this).text();
            valeur2 = $.trim(valeur2);

            if (valeur1 != valeur2) // Si on a fait un changement
            {
               //adjonction des paramètres qui accompagnent le nom du fichier appelé
                var parametre = 'champ=' + name + '&id=' + ident + '&nouveau=' + valeur2;
                var retour = $.ajax({
                    type: 'GET',
                    data: parametre,
                    dataType: "text",
                    url: "./admin/lib/php/ajax/ajaxUpdateProduit.php",
                    success: function (data) {
                       //rien de particulier à faire
                        console.log("success");
                    }
                });
                retour.fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                });
            };
        });
    });

$(document).ready(function () {
    $('#submit_choix_type').remove();

    $('#choix_type').change(function () {
        var param = $(this).attr('name');
        var val = $(this).val();
        var refresh = 'index.php?' + param + '=' + val + '&submit_choix_type=1';
        window.location.href = refresh;
    });

    //tests
    $('#parag1').css('color', '#FF0000');

    $('#parag2').css({
        "background-color": "lightcyan",
        "font-size": "120%"
    });

    $('#parag1').click(function () {
        $(this).css('color', '#0000FF');
        $('#parag2').css('font-size', '80%');
    });

    //alert("Coucou");
    //new (auto-complétion)
    //PREMIER AJAX : afficher les données du client
    //Code pour alimentation automatique des champs
    //1] aller créer  ajaxRechercheClient
    $('#password').blur(function () {
        email1 = $('#email1').val();
        email2 = $('#email2').val();
        password = $('#password').val();
        if (($.trim(email1) != '' && $.trim(email2 != '')) && (email1 == email2) && $.trim(password != '')) {
            //alert("email1 = "+email1+" et email2 = "+email2+ " et password = "+password);
            var recherche = "email=" + email1 + "&password=" + password;
            $.ajax({
                type: 'GET',
                data: recherche,
                dataType: "json",
                url: './admin/lib/php/ajax/ajaxRechercheClient.php',
                success: function (data) { // retournÃ© par le fichier php
                    $('#nom').val(data[0].nom_client);
                    $('#prenom').val(data[0].prenom_client);
                    $('#adresse').val(data[0].adresse_client);
                    $('#numero').val(data[0].numero);
                    $('#codepostal').val(data[0].cp);
                    $('#localite').val(data[0].localite);
                    console.log(data[0].nom_client);
                }
            });

        }
    });
    //
});
