$(document).ready(function () {
    $(".check_all").change(function () {
        const target = $(this).data('target');
        const target_selector = '#'+target+' .form-check-input';
        const targets = $(target_selector);
        targets.each(function () {
            $(this).prop('checked', !$(this).prop("checked"));
        });
    });
});