console.log(document.querySelector('#changement')) 
let changement = document.querySelector('#changement') 
let prixChauffeur = document.querySelector('#prixChauffeur') 
let printPrix = document.querySelector('.printPrix') 
let accept = document.querySelector('#accept') 
let modife = document.querySelector('#modife') 
let prixVersBase = document.querySelector('#prixVersBase') 
let chaufPrix = document.querySelector('#chaufPrix') 
console.log(prixChauffeur.value); 
changement.addEventListener('click', function(){
    if(prixChauffeur == ''){
         console.log("Valeur vide"); 
    }else{ 
        console.log(prixChauffeur.value) 
        printPrix.textContent = prixChauffeur.value + 'Ar' 
        prixVersBase.value = prixChauffeur.value 
        chaufPrix.value = prixChauffeur.value 
        accept.type = 'hidden' 
        modife.type = 'submit' 
    } })