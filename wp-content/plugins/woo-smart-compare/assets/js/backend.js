jQuery(document).ready(function () {
    jQuery('.wooscp_color_picker').wpColorPicker();

    jQuery(document).on('wooscpDataEndEvent', function () {
        wooscpSaveData();
    });

    jQuery('.wooscp-fields-item').arrangeable({
        dragSelector: 'label',
        dragEndEvent: 'wooscpDataEndEvent',
    });
});

function wooscpSaveData() {
    var wooscpData = new Array();
    jQuery('.wooscp-fields-item').each(function () {
        wooscpData.push(jQuery(this).find('input').val());
    });
    jQuery('#wooscp-fields-pos').val(wooscpData.join());
}