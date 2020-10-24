var rd = document.getElementById("requests");
rd.style.display = "none";
var cd = document.getElementById("conformed");
cd.style.display = "none";

function resetColor()
{
    document.getElementById("r").style.backgroundColor="rgba(255, 255, 255, 0.7);"
    document.getElementById("c").style.backgroundColor="rgba(255, 255, 255, 0.7);"
} 

function requests()
{
    resetColor();
    rd.style.display = "block";
    cd.style.display = "none";
    document.getElementById("r").style.backgroundColor="red";
}

function conformed()
{
    resetColor();
    rd.style.display = "none";
    cd.style.display = "block";
    document.getElementById("c").style.backgroundColor="red";
}