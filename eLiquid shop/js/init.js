jQuery(document).ready(function ($) {
    $('#redrawSignature').signature({disabled: true});
    $('#redrawSignature').signature('draw', signatureJSON);
});
