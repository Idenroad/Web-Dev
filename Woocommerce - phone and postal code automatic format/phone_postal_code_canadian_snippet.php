<?php
add_action('wp_footer', 'custom_format_phone_and_postcode');
function custom_format_phone_and_postcode() {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            // Fonction pour formater le numéro de téléphone
            function formatPhone(phone) {
                phone = phone.replace(/\D/g, ''); // Supprime les caractères non numériques
                if (phone.length === 10) {
                    return '(' + phone.substring(0, 3) + ') ' + phone.substring(3, 6) + '-' + phone.substring(6);
                }
                return phone; // Retourne le numéro tel quel s'il n'a pas 10 chiffres
            }

            // Fonction pour formater le code postal
            function formatPostcode(postcode) {
                postcode = postcode.replace(/\s+/g, ''); // Supprime les espaces
                if (postcode.length === 6) {
                    return postcode.substring(0, 3) + ' ' + postcode.substring(3);
                }
                return postcode; // Retourne le code postal tel quel s'il n'a pas 6 caractères
            }

            // Écouteur d'événements pour le numéro de téléphone
            $('#billing_phone').on('input', function() {
                var formattedPhone = formatPhone($(this).val());
                $(this).val(formattedPhone);
            });

            // Écouteur d'événements pour le code postal
            $('#billing_postcode').on('input', function() {
                var formattedPostcode = formatPostcode($(this).val());
                $(this).val(formattedPostcode);
            });
        });
    </script>
}
