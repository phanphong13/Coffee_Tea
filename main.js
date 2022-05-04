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



// order
var number = document.querySelector('.product__order-number-item-center');
var tru = document.querySelector('.product__order-number-item-left');
var cong = document.querySelector('.product__order-number-item-right');
var price = document.querySelector('.product__order-sum-price');

var sum;
var sumPrice;
var sumPrice_old;
if(number) {
    sum = parseInt(number.innerText, 10);
}
if(price) {
    sumPrice = parseInt(price.innerText);

}
if(price) {
    sumPrice_old = parseInt(price.innerText);
}

var sizeM = document.querySelector('.product__order-size-M');
var sizeL = document.querySelector('.product__order-size-L');

if(sizeM) {
    sizeM.onclick = function() {
        if (sizeL.classList.contains('btn--primary')) {
            sizeL.classList.remove('btn--primary');
            sizeM.classList.add('btn--primary');
            sumPrice_old -= 10;
            sumPrice = sumPrice - 10 * sum;
            price.innerText = sumPrice + '.000 đ';
        }
    }

}

if(sizeL) {
    sizeL.onclick = function() {
        if (sizeM.classList.contains('btn--primary')) {
            sizeM.classList.remove('btn--primary');
            sizeL.classList.add('btn--primary');
            sumPrice_old += 10;
            sumPrice = sumPrice + 10 * sum;
            price.innerText = sumPrice + '.000 đ';
        }
    }

}

if(tru) {
    tru.onclick = function() {
        if (sum>0) {
            sum = sum-1;
            sumPrice = sumPrice - sumPrice_old;
        }
        number.innerText = sum;
        price.innerText = sumPrice + '.000 đ';
    }

}

if(cong) {
    cong.onclick = function() {
        sum = sum + 1;
        sumPrice = sumPrice + sumPrice_old;
    
        number.innerText = sum;
        price.innerText = sumPrice + '.000 đ';
    }

}
// btn-order
var productBtnOrder = document.querySelectorAll('.body__product-btn-order');
var overlayOrder = document.querySelector('.modal__overlay');
var modalOrder = document.querySelector('.modal');

var btnClose = document.querySelector('.product__order-info-icon');

if(productBtnOrder) {
    for(var i = 0; i < productBtnOrder.length; i++) {
        if(productBtnOrder[i].classList.contains('body__product-btn-order-disable')) {
    
            productBtnOrder[i].onclick = function() {
            }
        } else {
            
            productBtnOrder[i].onclick = function() {
                modalOrder.style.display = 'block';
                overlayOrder.style.display = 'block';
            }
        }
    
    }

}

if(overlayOrder) {
    overlayOrder.onclick = function() {
        overlayOrder.style.display = 'none';
        modalOrder.style.display = 'none';
    }

}


if (btnClose) {
    btnClose.onclick = function() {
        overlayOrder.style.display = 'none';
        modalOrder.style.display = 'none';
    }

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
navLogin.onclick = function() {
    modal__overlay__login.setAttribute("style", "display: block;");
    modal__login.setAttribute("style", "display: block;");
}

// mo register
navRegister.onclick = function() {
    modal__overlay__login.setAttribute("style", "display: block;");
    modal__register.setAttribute("style", "display: block;");
}

// click overlay => out
modal__overlay__login.onclick = function() {
    modal__overlay__login.setAttribute("style", "display: none;");
    modal__login.setAttribute("style", "display: none;");
    modal__register.setAttribute("style", "display: none;");
}

switch_register.onclick = function() {
    modal__login.setAttribute("style", "display: none;");
    modal__register.setAttribute("style", "display: block;");
}

switch_login.onclick = function() {
    modal__register.setAttribute("style", "display: none;");
    modal__login.setAttribute("style", "display: block;");
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
                return value.length >= max ? undefined : `Vui lòng nhập tối thiểu ${max} kí tự`;
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