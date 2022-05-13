<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
    <ul class="promo__list">
        <!--заполните этот список из массива категорий-->
        <?
        while ($cat = current($category)) {
            ?>
            <li class="promo__item promo__item--<?=key($category) ?>">
                <a class="promo__link" href="pages/all-lots.html"><?=$cat?></a>
            </li>
            <?
            next($category);
        }
        ?>
    </ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">
        <!--заполните этот список из массива с товарами-->
        <?
        foreach ($goods as $good)
        {
            ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?=$good["URL"] ?>" width="350" height="260" alt="">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?=$good["category"] ?></span>
                    <h3 class="lot__title"><a class="text-link" href="pages/lot.html"><?=$good["name"] ?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Цена</span>
                            <span class="lot__cost"><?=num_format($good["cost"])?></span>
                        </div>
                        <div class="lot__timer timer">
                            <?=time_form()?>
                        </div>
                    </div>
                </div>
            </li>
            <?
        }
        ?>
    </ul>
</section>