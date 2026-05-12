
document.querySelector('#role').addEventListener('change', function(){
    console.log("Nouveau rôle : ", this.value);
    if(this.value === 'Chauffeur'){
        document.querySelector('.forChauffeur').style.display = 'block'
    }else{
        document.querySelector('.forChauffeur').style.display = 'none'
    }
})

if(document.querySelector('#role') === 'Chauffeur'){
    document.querySelector('.forChauffeur').style.display = 'block'
}