
    const cancelBtns = document.querySelectorAll('.cancelbtn');
    cancelBtns.forEach(button => {
        button.addEventListener("click", () => {


        });
    });
  const  disabled = document.querySelectorAll('.disable');
  const  error = document.querySelector('.error');
   disabled.forEach(button => {
        button.addEventListener("click", () => {
         error.innerText = "You can't cancel this order. Contact the seller.";
          

        });
    });
