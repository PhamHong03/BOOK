

const btnQuantity = document.querySelectorAll(".btn-quantity");
const btnQuantityArr = Array.from(btnQuantity);

for (const btn of btnQuantityArr) {
    const counter = btn.querySelector(".num-product"); 
    const elements_plus = btn.querySelector(".button-plus");
    const elements_minus = btn.querySelector(".button-minus");

    elements_plus.addEventListener("click", function() {      
        counter.value++;      
    });
    elements_minus.addEventListener("click", function() {      
      if(counter.value > 1) {
        counter.value--;
      }   
    });
}




