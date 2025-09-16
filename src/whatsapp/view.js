import {upDateQueryParams} from '../utilities/updateQueryParams'

const insertInTotal = ( total) =>{
    const getTotal = document.querySelector('.card-list-head__total-count');
    if(getTotal){
        getTotal.innerHTML = total;
    }
}

const sendOrder = () => {
    const getOrderBtn = document.querySelector('.card-list-head__sort-order');
    if(getOrderBtn){
        getOrderBtn.addEventListener('click', () => {
            if(getOrderBtn.classList.contains('card-list-head__sort-order--desc')){
                upDateQueryParams('order', 'ASC');
                getOrderBtn.classList.remove('card-list-head__sort-order--desc');
                getOrderBtn.classList.add('card-list-head__sort-order--asc');
                getOrderBtn.innerText = 'Mayor a Menor';
                return;
            }
            if(getOrderBtn.classList.contains('card-list-head__sort-order--asc')){
                upDateQueryParams('order', 'DESC');
                getOrderBtn.classList.add('card-list-head__sort-order--desc'); 
                getOrderBtn.classList.remove('card-list-head__sort-order--asc');
                getOrderBtn.innerText = 'Menor a Mayor';
                return;
            }

        });
    }    
}


window.addEventListener('DOMContentLoaded', () => {
        const getDataTotal = document.querySelector('.card-list');
        if(getDataTotal){
            const total = getDataTotal.getAttribute('data-total');
            insertInTotal(total);
        }
        sendOrder();
    }
);