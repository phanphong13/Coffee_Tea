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

var btnUser = document.querySelector('.header__user-img');
var userInfo = document.querySelector('.header__user-info');
if(btnUser) {
    userInfo.addEventListener('click', function(event) {
        event.stopPropagation();
    })
    btnUser.addEventListener('click', function() {
        userInfo.classList.toggle("display-block");
        cartList.classList.remove("display-block");

    })
    
}

// mo cart

var btnCart = document.querySelector('.header__cart');
var cartList = document.querySelector('.header__cart-products');
if(btnCart) {

    cartList.addEventListener('click', function(event) {
        event.stopPropagation();
    })
    btnCart.addEventListener('click', function() {
        cartList.classList.toggle("display-block");
        userInfo.classList.remove("display-block");

    })
    
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

var navResetPassword = document.querySelector('.header__user-info--resetPassword');
var modal__resetPassword = document.querySelector('.modal__resetPassword');

// mo resetPassword 

if (navResetPassword) {
    navResetPassword.addEventListener('click', function() {
        modal__overlay__login.setAttribute("style", "display: block;");
        modal__resetPassword.setAttribute("style", "display: block;");
    });

    navResetPassword.addEventListener('click', function(event) {
        event.stopPropagation();
    })
}

// click overlay => out
if (modal__overlay__login) {
    modal__overlay__login.onclick = function() {
        if (modal__overlay__login) {
            modal__overlay__login.setAttribute("style", "display: none;");
        }
        if (modal__login) {
            modal__login.setAttribute("style", "display: none;");
        }
        if (modal__register) {
            modal__register.setAttribute("style", "display: none;");
        }
        if (modal__resetPassword) {
            modal__resetPassword.setAttribute("style", "display: none;");
        }
        if (userInfo) {
            userInfo.classList.remove("display-block");
        }
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
     * c?? l???i return `error message`
     * kh??ng l???i return undefined
     */
    var validatorRules = {
        required: function (value) {
            return value ? undefined : 'Vui l??ng nh???p tr?????ng n??y';
        },

        email: function(value) {
            var regex =  /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            return regex.test(value) ? undefined : 'Vui l??ng nh???p email';
        },

        min: function(min) {
            return function(value) {
                return value.length >= min ? undefined : `Vui l??ng nh???p ??t nh???t ${min} k?? t???`;
            }
        },

        max: function(max) {
            return function(value) {
                return value.length <= max ? undefined : `Vui l??ng nh???p t???i ??a ${max} k?? t???`;
            }
        },
        isConfirm: function(value) {
            var registerIsConfirmPassword = document.querySelector('[name=password]').value;
            return value === registerIsConfirmPassword ? undefined : 'Nh???p l???i m???t kh???u kh??ng ch??nh kh??c';
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

// order
var number = document.querySelectorAll('.product__order-number-item-center');
var tru = document.querySelectorAll('.product__order-number-item-left');
var cong = document.querySelectorAll('.product__order-number-item-right');
var price = document.querySelectorAll('.product__order-sum-price-total');



var sum = new Array();
var sumPrice = new Array();
var sumPrice_old = new Array();
if(number) {
    for (var i = 0; i < number.length; i++ ) (function(i){ 
        sum[i] = parseInt(number[i].innerText);
    })(i);
}

if(price) {
    for (var i = 0; i < price.length; i++ ) (function(i){ 
        sumPrice[i] = parseInt(price[i].innerText) * 1000;
        sumPrice_old[i] = parseInt(price[i].innerText) * 1000;

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
                sumPrice_old[i] -= 10000;
                sumPrice[i] = sumPrice[i] - 10000 * sum[i];
                price[i].innerText = sumPrice[i].toLocaleString('en-US');
            }
        }

        sizeL[i].onclick = function() {
            if (sizeM[i].classList.contains('btn--primary')) {
                sizeM[i].classList.remove('btn--primary');
                sizeL[i].classList.add('btn--primary');
                sumPrice_old[i] += 10000;
                sumPrice[i] = sumPrice[i] + 10000 * sum[i];
                price[i].innerText = sumPrice[i].toLocaleString('en-US');
            }
        }

        tru[i].onclick = function() {
            if (sum[i]>0) {
                sum[i] = sum[i]-1;
                sumPrice[i] = sumPrice[i] - sumPrice_old[i];
            }
            number[i].innerText = sum[i];
            price[i].innerText = sumPrice[i].toLocaleString('en-US');
        }

        cong[i].onclick = function() {
            sum[i] = sum[i] + 1;
            sumPrice[i] = sumPrice[i] + sumPrice_old[i];
        
            number[i].innerText = sum[i];
            price[i].innerText = sumPrice[i].toLocaleString('en-US');
        }
    })(i);
}


function addCart(id_product, num_modal) {
    var num = document.querySelectorAll('.product__order-number-item-center');
    var size = document.querySelectorAll('.btn--primary.btn--size-s');
    var priceTotal = document.querySelectorAll('.product__order-sum-price-total');
    console.log(size[num_modal].innerText);
    $.ajax({
        url : "ajax/add.php",
		type : "post",
        data : {
            'id_product' : id_product,
            'num' : parseInt(num[num_modal].innerText),
            'size' : size[num_modal].innerText,
            'priceTotal' : parseInt(priceTotal[num_modal].innerText) * 1000
        },
        dataType : 'text',
        success: function(result){
            alert(result);
        },
        error : function(result) {
            alert("th???t b???i");      
        }
    })
}

// click => out
var container = document.getElementById("container");
if (container) {
    container.addEventListener('click', function() {
        if (userInfo) {
            userInfo.classList.remove("display-block");
        }

        if (cartList) {
            cartList.classList.remove("display-block");
        }
    })
}

// shake

logo__animation = document.querySelector('.h-left--logo');

setInterval(function() {
    logo__animation.classList.add('shake');
    setTimeout(function() {
        logo__animation.classList.remove('shake');
    }, 500)
}, 2000)