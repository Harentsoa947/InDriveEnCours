// document.querySelectorAll('tr').forEach(row => {

//     let changement = row.querySelector('.changement');
//     let prixChauffeur = row.querySelector('.prixChauffeur');
//     let printPrix = row.querySelector('.printPrix');
//     let accept = row.querySelector('.accept');
//     let modife = row.querySelector('.modife');
//     let prixVersBase = row.querySelector('.prixVersBase');
//     let chaufPrix = row.querySelector('.chaufPrix');

//     if(changement){

//         changement.addEventListener('click', function(){
// 
//             if(prixChauffeur.value === ''){
//                 console.log('Valeur vide');
//             }else{

//                 printPrix.textContent =
//                     prixChauffeur.value + ' Ar';

//                 prixVersBase.value =
//                     prixChauffeur.value;

//                 chaufPrix.value =
//                     prixChauffeur.value;

//                 accept.classList.add('d-none');
//                 modife.classList.remove('d-none');
//             }
//         });
//     }

// });


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