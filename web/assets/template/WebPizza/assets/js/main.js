$(document).ready(function(){

    /* Menu : On Scroll */
    var win = $(window);

    win.scroll(function(){
        var scrollTop = win.scrollTop();
        if (scrollTop > 10) {
            $('body').addClass('scrolled');
        } else {
            $('body').removeClass('scrolled');
        }
    });


    /* Order */

    //// -- AFFICHE LE NOMBRE DE PRODUIT DANS LA COMMANDE

    function refreshOrderMenu() 
    {
        // Nombre de produit de la commande
        var countProduct = order.length;
    
        // Affiche le nombre de produit dans le menu
        if (countProduct > 0) {
            $('#countProduct').text("("+countProduct+")");
        } else {
            $('#countProduct').text("");
        }
    }

    refreshOrderMenu();



    //// -- AJOUT UN PRODUIT A LA COMMANDE

    // - On ecoute le "clic" sur le bouton "btn-add-to-order"
    // - ConsoleLog du nom du produit
    // - ConsoleLog du prix du produit
    $('.btn-add-to-order').click(function(){

        // Récupèration des infos du produit 

        // PAS BIEN !
        // var price = $(this).text();
        // var name = $(this).parent().find('.card-title').text();

        var product = $(this).parents('.card');
        var name = product.data("name");
        var price = product.data("price");

        // On créer l'objet du produit (Nom + Prix)
        var productObject = {
            name: name,
            price: price
        };

        // On ajoute le produit à la commande
        order.push(productObject);

        // On rafraichis l'affichage du menu
        refreshOrderMenu();
    });


    //// -- RAFRAICHIT LA LISTE DES PRODUITS

    function refreshOrderList() {

        // On cible la zone ou sera écrite la liste des produits commandés
        var orderTarget = $('#order-target');
        // et on la vide...
        orderTarget.html("");

        // On controle si la commande possède des produits
        if ( order.length > 0 ) {

            // On cible le prototype et on récupèrée les lgnes HTML
            var orderPrototype  = $('#order-prototype').html();

            // Montant total de la commande
            var amount = 0;

            // On boucle sur la liste des produits de la commande
            $.each(order,function(index,product){

                // On modifie les chaines {__NAME__} et {__PRICE__} du prototype
                var rowData = orderPrototype
                    .replace('{__NAME__}', product.name)
                    .replace('{__PRICE__}', product.price);

                // On  affiche chaque produit
                orderTarget.append(rowData);

                // On calcul le montant final
                amount += product.price;

            });

            // On arrondi la somme total
            amount = Math.round(amount * 100) / 100;

            // On affiche le montant de la commande
            var rowAmount = orderPrototype
                .replace('{__NAME__}', "Total")
                .replace('{__PRICE__}', amount);
            
            orderTarget.append(rowAmount)
            // Et on supprime le bouton "remove" de la derniere ligne du <tbody>
            .find('button').last().remove();

            // Active le bouton de paiement
            $('.btn-checkout').removeAttr('disabled');

            // On appel la fonction qui initialise l'ecouteur d'évènement "click"
            // sur le bouton de suppression du produit
            removeProduct();
        }

        // La commande est vide
        else {
            // on affiche le message
            // Il n'y à aucun produit dans votre commande.
            orderTarget.html("Il n'y à aucun produit dans votre commande.");

            // On désactive le bouton de paiement
            $('.btn-checkout').attr('disabled', 'disabled');
        }

    }

    // On déclenche refreshOrderList juste avant l'affichage du modal
    $('#orderModal').on('show.bs.modal', function (e) {
        refreshOrderList();
    });


    //// -- SUPPRESSION DES PRODUITS DE LA COMMANDE

    function removeProduct() {
        $('.btn-remove-product').click(function(event){

            console.log(order);

            // On evite la redondance d'evenement "click"
            event.preventDefault();
            event.stopPropagation();

            // Récupère la ligne du tableau HTML
            var rowHtml = $(this).parents('tr');
            // Récupère l'index de la ligne du tableau "order"
            var rowIndex = rowHtml.index();

            // Supprime la ligne du tableau HTML
            rowHtml.remove();
            // Supprime le produit de la commande
            order.splice(rowIndex, 1);

            refreshOrderMenu();
            refreshOrderList();
        });
    }


    // Capturer l'envois du formulaire
    $('#contact').find('form').submit(function() {

        // Récupération des données du formulaire
        var firstname = $(this).find('[name=firstname]').val();
        var lastname = $(this).find('[name=lastname]').val();
        var email = $(this).find('[name=email]').val();
        var message = $(this).find('[name=message]').val();

        // On utilise cette variable pour connaitre l'état du formulaire
        var submit = true;
            
        // Controler les données saisies
        // - prénom en chaine de caractères
        if (!firstname.match(/^[a-z]+$/i)) {
            submit = false;
            alert("Erreur sur firstname");
        }

        // - Nom en chaine de caractères
        if (!lastname.match(/^[a-z]+$/i)) {
            submit = false;
            alert("Erreur sur lastname");
        }

        // - Email au format email
        if (!email.match(/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/)) {
            submit = false;
            alert("Erreur sur email");
        }

        // - Message plus de 20 caractères
        if (message.length < 20) {
            submit = false;
            alert("Erreur sur message");
        }

    
        // Autoriser l'envois vers le serveur (traitement.php) SI tous les controles sont OK
        // Annuler si UN SEUL controle échoue.
        if (!submit) {
            alert("Le fomulaire contient des erreurs.");
        } else {
            alert("Formulaire OK");
        }

        return submit;
    });

});