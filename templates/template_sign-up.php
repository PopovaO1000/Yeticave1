<nav class="nav">
    <ul class="nav__list container">
        <?
        foreach ($category as $cat)
        {
            ?>
            <li class="nav__item">
                <a href="all-lots.html"><?=$cat['name_category']?></a>
            </li>
            <?
        }
        ?>
    </ul>
</nav>
<form class="form container <?=$form_class?>" action="../reg_check.php" method="post" autocomplete="off" enctype="multipart/form-data"> <!-- form
    --invalid -->
    <h2>Регистрация нового аккаунта</h2>
    <div class="form__item <?=$div_class[1]?>"> <!-- form__item--invalid -->
        <label for="email">E-mail <sup>*</sup></label>
        <input id="email" type="text" name="email" placeholder="Введите e-mail">
        <span class="form__error">Введите e-mail</span>
    </div>
    <div class="form__item <?=$div_class[2]?>">
        <label for="password">Пароль <sup>*</sup></label>
        <input id="password" type="password" name="password" placeholder="Введите пароль">
        <span class="form__error">Введите пароль</span>
    </div>
    <div class="form__item <?=$div_class[3]?>">
        <label for="name">Имя <sup>*</sup></label>
        <input id="name" type="text" name="name" placeholder="Введите имя">
        <span class="form__error">Введите имя</span>
    </div>
    <div class="form__item <?=$div_class[4]?>">
        <label for="message">Контактные данные <sup>*</sup></label>
        <textarea id="message" name="message" placeholder="Напишите как с вами связаться"></textarea>
        <span class="form__error">Напишите как с вами связаться</span>
    </div>
    <div class="form__input-file <?=$div_class[5]?>">
        <input class="visually-hidden" type="file" id="lot-img" value="<?=$form_items[5]?>" name="lot-img">
        <label for="lot-img">
            Добавить
        </label>
        <span class="form__error">Добавьте картинку</span>
    </div>
    <br>
    <br>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Зарегистрироваться</button>
    <a class="text-link" href="../login.php">Уже есть аккаунт</a>
</form>
