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
<form class="form form--add-lot container <?=$form_class?>" action="../add.php" method="post" enctype="multipart/form-data"> <!-- form--invalid -->
    <h2>Добавление лота</h2>
    <div class="form__container-two">
        <div class="form__item <?=$div_class[1]?>"> <!-- form__item--invalid -->
            <label for="lot-name">Наименование <sup>*</sup></label>
            <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" value="<?=$form_items[0]?>">
            <span class="form__error">Введите наименование лота</span>
        </div>
        <div class="form__item <?=$div_class[2]?>">
            <label for="category">Категория <sup>*</sup></label>
            <select id="category" name="category">
                <option>Выберите категорию</option>
                <?
                foreach ($category as $cat)
                {
                    ?>
                    <option><?=$cat['name_category']?></option>
                    <?
                }
                ?>
            </select>
            <span class="form__error">Выберите категорию</span>
        </div>
    </div>
    <div class="form__item form__item--wide <?=$div_class[3]?>">
        <label for="message">Описание <sup>*</sup></label>
        <textarea id="message" name="message" placeholder="Напишите описание лота"><?=$form_items[2]?></textarea>
        <span class="form__error">Напишите описание лота</span>
    </div>
    <div class="form__item form__item--file <?=$div_class[4]?>">
        <label>Изображение <sup>*</sup></label>
        <div class="form__input-file">
            <input class="visually-hidden" type="file" id="lot-img" value="<?=$form_items[3]?>" name="lot-img">
            <label for="lot-img">
                Добавить
            </label>
            <span class="form__error">Добавьте картинку</span>
        </div>
    </div>
    <div class="form__container-three">
        <div class="form__item form__item--small <?=$div_class[5]?>">
            <label for="lot-rate">Начальная цена <sup>*</sup></label>
            <input id="lot-rate" type="text" name="lot-rate" placeholder="0" value="<?=$form_items[4]?>">
            <span class="form__error">Введите начальную цену</span>
        </div>
        <div class="form__item form__item--small <?=$div_class[6]?>">
            <label for="lot-step">Шаг ставки <sup>*</sup></label>
            <input id="lot-step" type="text" name="lot-step" placeholder="0" value="<?=$form_items[5]?>">
            <span class="form__error">Введите шаг ставки</span>
        </div>
        <div class="form__item <?=$div_class[7]?>">
            <label for="lot-date">Дата окончания торгов <sup>*</sup></label>
            <input class="form__input-date" id="lot-date" type="text" name="lot-date" placeholder="Введите дату в формате ГГГГ-ММ-ДД" value="<?=$form_items[6]?>">
            <span class="form__error">Введите дату завершения торгов</span>
        </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Добавить лот</button>
</form>



