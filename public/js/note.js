console.log("Pour le note des chauffeur");
let star1 = document.querySelector('.star1')
let star2 = document.querySelector('.star2')
let star3 = document.querySelector('.star3')
let star4 = document.querySelector('.star4')
let star5 = document.querySelector('.star5')

let retourPassa = document.querySelector('.retourPassa')

star1.addEventListener('click', function(){
    retourPassa.value = 1

    star1.classList.add('ss')

    star2.classList.remove('ss')
    star3.classList.remove('ss')
    star4.classList.remove('ss')
    star5.classList.remove('ss')
})

star2.addEventListener('click', function(){
    retourPassa.value = 2

    star1.classList.add('ss')
    star2.classList.add('ss')

    star3.classList.remove('ss')
    star4.classList.remove('ss')
    star5.classList.remove('ss')
})

star3.addEventListener('click', function(){
    retourPassa.value = 3

    star1.classList.add('ss')
    star2.classList.add('ss')
    star3.classList.add('ss')

    star4.classList.remove('ss')
    star5.classList.remove('ss')
})

star4.addEventListener('click', function(){
    retourPassa.value = 4

    star1.classList.add('ss')
    star2.classList.add('ss')
    star3.classList.add('ss')
    star4.classList.add('ss')

    star5.classList.remove('ss')
})

star5.addEventListener('click', function(){
    retourPassa.value = 5

    star1.classList.add('ss')
    star2.classList.add('ss')
    star3.classList.add('ss')
    star4.classList.add('ss')
    star5.classList.add('ss')
})