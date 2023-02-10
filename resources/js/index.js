function Funkcija0(){
    document.getElementById("embed").src = "nothing.php";
}

function Funkcija1(){
    document.getElementById("embed").src = "preces.php";
}

function Funkcija2(){
    document.getElementById("embed").src = "darbinieki.php";
}

function Funkcija3(){
    document.getElementById("embed").src = "kategorijas.php";
}

function Funkcija4(){
    document.getElementById("embed").src = "noliktava.php";
}

function Funkcija5(){
    document.getElementById("embed").src = "realizacija.php";
}

function Funkcija6(){
    document.getElementById("embed").src = "inventarizacija.php";
}

function Funkcija7(){
    document.getElementById("embed").src = "eksportesana.php"
}

function Funkcija8(){
    document.getElementById("embed").src = "buj.php"
}

var faq = document.getElementsByClassName("faq-page");
var i;
for (i = 0; i < faq.length; i++) {
    faq[i].addEventListener("click", function () {
        /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the panel */
        this.classList.toggle("active");
        /* Toggle between hiding and showing the active panel */
        var body = this.nextElementSibling;
        if (body.style.display === "block") {
            body.style.display = "none";
        } else {
            body.style.display = "block";
        }
    });
}