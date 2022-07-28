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

    $("#show-deleted").click(function () {
        $("#current-users").hide();
        $("#deleted-users").show();
    });

    $("#show-current").click(function () {
        $("#deleted-users").hide();
        $("#current-users").show();
    });
});