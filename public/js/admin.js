// console.log("hello");
let titres = document.getElementsByClassName("ajouter");
for (let i=0; i<titres.length; i++)
{
    titres[i].addEventListener("click", ajouterDegree);
}

function ajouterDegree()
{
    console.log("hello world");
}