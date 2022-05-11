<div  class="modal__register">
                            <div class="modal__body">
                                <!-- Form register -->
                                <div class="auth-form">
                                    <div class="auth-form__container">
                                        <form action="" method="post" id="register-form">
                                            <?php 
                                                new controller_register();
                                            ?>
                                            <div class="auth-form__header">
                                                <h3 class="auth-form__heading">
                                                    Đăng kí
                                                </h3>
                                                <div class="auth-form__switch-btn-login">
                                                    Đăng nhập
                                                </div>
                                            </div>
    
                                            <div class="auth-form__form">
                                                <div class="auth-form__group">
                                                    <label for="" class="auth-form__title" >Nhập họ tên</label>
                                                    <input type="text" name="name" rules="required|max:25" required autocomplete="on" class="auth-form__input " placeholder="Nhập họ tên của bạn">
                                                    <span class="auth-form__error"></span>
                                                </div>
                                                <div class="auth-form__group">
                                                    <label for="" class="auth-form__title" >Nhập email</label>
                                                    <input type="text" name="email" rules="required|email" required autocomplete="on" class="auth-form__input " placeholder="Nhập email của bạn">
                                                    <span class="auth-form__error"></span>
                                                </div>
                                                <div class="auth-form__group">
                                                    <label for="" class="auth-form__title">Nhập mật khẩu</label>
                                                    <input type="password" name="password" rules="required|min:6" required autocomplete="on" class="auth-form__input" placeholder="Nhập mật khẩu của bạn">
                                                    <span class="auth-form__error"></span>
                                                </div>
                                                <div class="auth-form__group">
                                                    <label for="" class="auth-form__title">Nhập lại mật khẩu</label>
                                                    <input type="password" name="passwordX2" rules="isConfirm" required autocomplete="on" class="auth-form__input" placeholder="Nhập lại mật khẩu của bạn">
                                                    <span class="auth-form__error"></span>
                                                </div>
                                            </div>
    
                                            <div class="auth-form__aside">
                                                <p class="auth-form__text">
                                                    Để có trải nghiệm tốt nhất quý khách vui lòng đăng kí tài khoản
                                                </p>
                                            </div>
    
                                            <div class="auth-form__controls">
                                                <div class="btn auth-form__controls-back">TRỞ LẠI</div>
                                                <button class="btn btn--primary" name="signup">ĐĂNG KÍ</button>
                                            </div>
                                            

                                        </form>

                                    </div>

                                    <div class="auth-form__social">
                                        <a href="" class="btn btn--with-icon btn--size-s auth-form__social-facebook">
                                            <i class="auth-form__social-icon fa-brands fa-facebook"></i>
                                            Kết nối với Facebook
                                        </a>
                                        <a href="" class="btn btn--with-icon btn--size-s auth-form__social-google">
                                            <i class="auth-form__social-icon fa-brands fa-google"></i>
                                            Kết nối với Google
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div> 