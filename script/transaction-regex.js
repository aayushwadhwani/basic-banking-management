const regexChecker = function(regex, event)
{
        console.log(regex, event);
        if( event.target.name === 'to' && event.target.value.length<=60 && regex.test(event.target.value))
        {
            // console.log('hie');
            event.target.classList.add('success');
            event.target.classList.remove('error');
            // event.target.parentElement.nextElementSibling.style.display = 'none';
        }
        else if(event.target.name !== 'to' && regex.test(event.target.value)){
            // console.log('hie there');
            event.target.classList.add('success');
            event.target.classList.remove('error');
            // event.target.parentElement.nextElementSibling.style.display = 'none';
        }
        else
        {
            // console.log('hie there there');
            event.target.classList.add('error');
            event.target.classList.remove('success');
            // event.target.parentElement.nextElementSibling.style.display = 'block';
        }
}

const regex = {
    'amount': /^[\d]+$/,
    'to':  /^([a-zA-Z\d\.-]+)@([a-zA-Z\d-]+)\.([a-zA-Z]{2,8})(\.[a-zA-Z]{2,8})?$/,
    'email':  /^([a-zA-Z\d\.-]+)@([a-zA-Z\d-]+)\.([a-zA-Z]{2,8})(\.[a-zA-Z]{2,8})?$/,
    'name': /^[a-zA-Z ]{2,50}$/,
};

// console.log("There");

let form = document.querySelector('.form-validation');

form.addEventListener('keyup',e=>{
    regexChecker(regex[e.target.name],e);
})