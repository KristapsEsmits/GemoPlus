document.getElementById("add-btn").addEventListener("click", function() {
    document.getElementById("add-pop").style.display = "block";
    document.getElementById("add-btn").style.display = "none";
    document.getElementById("veiksmigi").style.display = "none";
});

document.getElementById("close-btn").addEventListener("click", function() {
    let getValue = document.getElementsByClassName("input");
    for (const element of getValue) {
        element.value = "";
    }
    document.getElementById("add-pop").style.display = "none";
    document.getElementById("add-btn").style.display = "block";
});

document.getElementById("labot").addEventListener("click", function() {
    let labotbtn = document.getElementById("labot");
    labotbtn.style.display='none';
    let acceptbtn = document.getElementById("acceptbtn")
    acceptbtn.style.display='block';

    let ed = document.getElementsByClassName("edits")
    for (const element of ed) {
        element.contentEditable='True';
    }
});

document.getElementById("acceptbtn").addEventListener("click", function() {
    let labotbtn = document.getElementById("labot");
    labotbtn.style.display='block';
    let acceptbtn = document.getElementById("acceptbtn")
    acceptbtn.style.display='none';

    let ed = document.getElementsByClassName("edits")
    for (const element of ed) {
        element.contentEditable='False';
    }

    
});

