document.getElementById("add-btn").addEventListener("click", function() {
    document.getElementById("add-user").style.display = "block";
    document.getElementById("add-btn").style.display = "none";
    document.getElementById("veiksmigi").style.display = "none";
});

document.getElementById("close-btn").addEventListener("click", function() {
    //nestrādā tīrīšana
    let getValue = document.getElementsByClassName("input");
    for (const element of getValue) {
        element.value = "";
    }
    document.getElementById("add-user").style.display = "none";
    document.getElementById("add-btn").style.display = "block";
});