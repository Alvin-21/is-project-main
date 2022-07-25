$(document).ready(function () {
    // Toggles occupation options when admin or employee is selected
    var occ;
    $("#admin").click(function () {
        occ = $("#occupation").detach();
    });

    $("#employee").click(function () {
        occ.appendTo("#temp_occupation");
        occ = null;
    });
});