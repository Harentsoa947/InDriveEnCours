const wrapper = document.querySelector('.wrapper');

document.querySelector('.ins').addEventListener('click', function(e){
    e.preventDefault();
    wrapper.classList.add('rotate-to-auth');
});

document.querySelector('.conn').addEventListener('click', function(e){
    e.preventDefault();
    wrapper.classList.remove('rotate-to-auth');
});