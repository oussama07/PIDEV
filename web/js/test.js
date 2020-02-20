/*
document.addEventListener("DOMContentLoaded", function () {
    var button = document.querySelector("groupbundle_groups_Creer");

    button.addEventListener("click", function (event) {

            var exp = new RegExp("^[a-zA-Z]*$","g");
            var data = document.getElementById("idText").value;
            alert(exp.test(data));


    });

});
*/

var element = document.getElementById('groupbundle_groups_nom');

// Premier événement click
element.addEventListener('keypress', function() {
    alert("Et de un !");
});
