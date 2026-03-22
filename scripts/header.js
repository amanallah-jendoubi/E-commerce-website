//flex justify-center items-center


const quantityList=document.querySelectorAll('.js-quantity-input');
quantityList.forEach((itm)=>{
    itm.addEventListener('input',()=>{
        const counter= document.querySelector('.js-cart-counter');
        counter.classList.remove('hidden');//no error if not exists
        counter.classList.add('flex','justify-center','items-center');
        console.log(itm.value);
        counter.innerHTML=itm.value;
    });
});
