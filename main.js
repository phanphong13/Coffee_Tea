// Slides show

var count = 1;
setInterval(function() {
    test = document.getElementById('r' + count);
    test.checked = true;
    count++;
    if(count>4) {
        count = 1;
    }
}, 5000);

// mo logout



// mo cart

var btnCart = document.querySelector('.header__cart');
var cartList = document.querySelector('.header__cart-products');
if(btnCart) {

    cartList.addEventListener('click', function(event) {
        event.stopPropagation();
    })
    btnCart.addEventListener('click', function() {
        cartList.classList.toggle("display-block");
    })
    
}

// order
var number = document.querySelectorAll('.product__order-number-item-center');
var tru = document.querySelectorAll('.product__order-number-item-left');
var cong = document.querySelectorAll('.product__order-number-item-right');
var price = document.querySelectorAll('.product__order-sum-price');



var sum = new Array();
var sumPrice = new Array();
var sumPrice_old = new Array();
if(number) {
    for (var i = 0; i < number.length; i++ ) (function(i){ 
        sum[i] = parseInt(number[i].innerText, 10);
    })(i);
}

if(price) {
    for (var i = 0; i < price.length; i++ ) (function(i){ 
        sumPrice[i] = parseInt(price[i].innerText);
        sumPrice_old[i] = parseInt(price[i].innerText);

    })(i);
}


var sizeM = document.querySelectorAll('.product__order-size-M');
var sizeL = document.querySelectorAll('.product__order-size-L');

if(sizeM) {
    for (var i = 0; i < sizeM.length; i++ ) (function(i){ 
        sizeM[i].onclick = function() {
            if (sizeL[i].classList.contains('btn--primary')) {
                sizeL[i].classList.remove('btn--primary');
                sizeM[i].classList.add('btn--primary');
                sumPrice_old[i] -= 10;
                sumPrice[i] = sumPrice[i] - 10 * sum[i];
                price[i].innerText = sumPrice[i] + '.000 đ';
            }
        }

        sizeL[i].onclick = function() {
            if (sizeM[i].classList.contains('btn--primary')) {
                sizeM[i].classList.remove('btn--primary');
                sizeL[i].classList.add('btn--primary');
                sumPrice_old[i] += 10;
                sumPrice[i] = sumPrice[i] + 10 * sum[i];
                price[i].innerText = sumPrice[i] + '.000 đ';
            }
        }

        tru[i].onclick = function() {
            if (sum[i]>0) {
                sum[i] = sum[i]-1;
                sumPrice[i] = sumPrice[i] - sumPrice_old[i];
            }
            number[i].innerText = sum[i];
            price[i].innerText = sumPrice[i] + '.000 đ';
        }

        cong[i].onclick = function() {
            sum[i] = sum[i] + 1;
            sumPrice[i] = sumPrice[i] + sumPrice_old[i];
        
            number[i].innerText = sum[i];
            price[i].innerText = sumPrice[i] + '.000 đ';
        }
    })(i);
}


// btn-order
var productBtnOrders = document.querySelectorAll('.body__product-btn-order');
var overlayOrders = document.querySelectorAll('.modal__overlay');
var modalOrders = document.querySelectorAll('.modal');

var btnCloses = document.querySelectorAll('.product__order-info-icon');

if(productBtnOrders) {
    for (var i = 0; i < productBtnOrders.length; i++ ) (function(i){ 
        productBtnOrders[i].onclick = function() {
            overlayOrders[i].style.display = 'block';
            modalOrders[i].style.display = 'block';
        }
      })(i);
}

if (overlayOrders) {
    for (var i = 0; i < overlayOrders.length; i++ ) (function(i) {
        overlayOrders[i].onclick = function() {
            overlayOrders[i].style.display = 'none';
            modalOrders[i].style.display = 'none';
        }
    })(i);
}

if (btnCloses) {
    for (var i = 0; i < btnCloses.length; i++ ) (function(i) {
        btnCloses[i].onclick = function() {
            overlayOrders[i].style.display = 'none';
            modalOrders[i].style.display = 'none';
        }
    })(i);
}


// switch btn dang ki dang nhap

var navLogin = document.querySelector('.h-right__text-login');
var navRegister = document.querySelector('.h-right__text-register');


var modal__register = document.querySelector('.modal__register');
var modal__login = document.querySelector('.modal__login');

var switch_register = document.querySelector('.auth-form__switch-btn-register');
var switch_login = document.querySelector('.auth-form__switch-btn-login');

var modal__overlay__login = document.querySelector('.modal__overlay-login');

var btnBack = document.querySelectorAll('.auth-form__controls-back');


// mo login
if (navLogin) {
    navLogin.onclick = function() {
        modal__overlay__login.setAttribute("style", "display: block;");
        modal__login.setAttribute("style", "display: block;");
    }
}

// mo register
if (navRegister) {
    navRegister.onclick = function() {
        modal__overlay__login.setAttribute("style", "display: block;");
        modal__register.setAttribute("style", "display: block;");
    }
}

// click overlay => out
if (modal__overlay__login) {
    modal__overlay__login.onclick = function() {
        modal__overlay__login.setAttribute("style", "display: none;");
        modal__login.setAttribute("style", "display: none;");
        modal__register.setAttribute("style", "display: none;");
    }
}

if (switch_register) {
    switch_register.onclick = function() {
        modal__login.setAttribute("style", "display: none;");
        modal__register.setAttribute("style", "display: block;");
    }
}

if (switch_login) {
    switch_login.onclick = function() {
        modal__register.setAttribute("style", "display: none;");
        modal__login.setAttribute("style", "display: block;");
    }
}

for(var i = 0; i<btnBack.length; i++) {
    btnBack[i].onclick = function() {
        modal__overlay__login.setAttribute("style", "display: none;");
        modal__login.setAttribute("style", "display: none;");
        modal__register.setAttribute("style", "display: none;");
    }
}
// validate form 

function validator(formSelector) {

    function getParent(element, selector) {
        while(element.parentElement) {
            if (element.parentElement.matches(selector)) {
                return element.parentElement;
            }
            element = element.parentElement;
        }
    }

    var formRules = {};
    

    /**
     * có lỗi return `error message`
     * không lỗi return undefined
     */
    var validatorRules = {
        required: function (value) {
            return value ? undefined : 'Vui lòng nhập trường này';
        },

        email: function(value) {
            var regex =  /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            return regex.test(value) ? undefined : 'Vui lòng nhập email';
        },

        min: function(min) {
            return function(value) {
                return value.length >= min ? undefined : `Vui lòng nhập ít nhất ${min} kí tự`;
            }
        },

        max: function(max) {
            return function(value) {
                return value.length <= max ? undefined : `Vui lòng nhập tối đa ${max} kí tự`;
            }
        },
        isConfirm: function(value) {
            var registerIsConfirmPassword = document.querySelector('#register-form [name=password]').value;
            return value === registerIsConfirmPassword ? undefined : 'Nhập lại mật khẩu không chính khác';
        }
    }

    var formElement = document.querySelector(formSelector);

    if (formElement) {

        var inputs = formElement.querySelectorAll('[name][rules]');

        for (var input of inputs) {

            var rules = input.getAttribute('rules').split('|');

            for(var rule of rules) {

                var ruleInfo;
                var isRuleHasValue = rule.includes(':');

                if (isRuleHasValue) {
                    ruleInfo = rule.split(':');
                    rule = ruleInfo[0];
                }

                var ruleFunc = validatorRules[rule];

                if (isRuleHasValue) {
                    ruleFunc = ruleFunc(ruleInfo[1]);
                }

                if(Array.isArray(formRules[input.name])) {
                    formRules[input.name].push(ruleFunc);
                } else {
                    formRules[input.name] = [ruleFunc];
                }

            }

            // lang nghe su kien de validate(onchange, onblur)
            input.onblur = handleValidate;
            input.onclick = handleClearError;
            input.oninput = handleClearError;

        }

        // ham thuc hien validate;
        function handleValidate(event) {
            var rules = formRules[event.target.name];
            var errorMessage;

            rules.find(function (rule) {
                errorMessage = rule(event.target.value);
                return errorMessage;
            });

            // neu co loi hien ra UI
            if (errorMessage) {
                var formGroup = getParent(event.target, '.auth-form__group');
                if(formGroup) {
                    event.target.classList.add('auth-form__input-error');
                    var formError = formGroup.querySelector('.auth-form__error')
                    if (formError) {
                        formError.innerText = errorMessage;
                    }
                }
            }

        }

        function handleClearError(event) {
            var formGroup = getParent(event.target, '.auth-form__group');
            if (event.target.classList.contains('auth-form__input-error')) {
                event.target.classList.remove('auth-form__input-error');
                var formError = formGroup.querySelector('.auth-form__error')
                if (formError) {
                    formError.innerText = '';
                }
            }
        }

    }
    
}