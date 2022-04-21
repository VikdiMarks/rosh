<view>
    <div class="container">
        <div class="crumbs"><a class="crumbs__arrow" href="#">
                <svg class="svgsprite _crumbs-back">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#crumbs-back"></use>
                </svg></a><a class="crumbs__link" href="/">Главная</a><a class="crumbs__link" href="{{_route.uri}}">Контакты</a>
        </div>
        <h1 class="h1">Контакты</h1>
        <div class="contacts">
            <div class="row">
                <div class="col-lg-4 contacts__left">
                    <div class="contacts__socials">
                        <p class="text-bold text-big">Соц сети</p>
                        <div class="socials socials-menu"> <a class="socials__link" href="#">
                                <svg class="svgsprite _socials-1">
                                    <use xlink:href="assets/img/sprites/svgsprites.svg#socials-1"></use>
                                </svg></a><a class="socials__link" href="#">
                                <svg class="svgsprite _socials-2">
                                    <use xlink:href="assets/img/sprites/svgsprites.svg#socials-2"></use>
                                </svg></a><a class="socials__link" href="#">
                                <svg class="svgsprite _socials-4">
                                    <use xlink:href="assets/img/sprites/svgsprites.svg#socials-4"></use>
                                </svg></a><a class="socials__link" href="#">
                                <svg class="svgsprite _socials-3">
                                    <use xlink:href="assets/img/sprites/svgsprites.svg#socials-3"></use>
                                </svg></a></div>
                    </div>
                    <button class="btn btn--black --openpopup" data-popup="--fast">Записаться</button>
                </div>
                <div class="col-lg-8">
                    <div class="contacts__info">
                        <div class="contacts__address">
                            <p class="text-small text-grey">г. Москва</p>
                            <p class="text-bold">Ростовская набережная д. 5 помещение 9, вход с фасада здания.
                            </p>
                            <p class="text-grey">Ближайшее метро — Киевская, Смоленская</p>
                        </div>
                        <div class="contacts__phones">
                            <div class="contacts__time text-grey">(с 10-00 до 21-00 ч., пн - сб)</div><a
                                class="contacts__phone" href="tel:+74951320169">8 (495) <b>132-01-69</b></a>
                            <div class="contacts__small-phones --flex --jcsb"> <a class="text-grey"
                                    href="tel:+79154563407">8 (915) 456-34-07, </a><a class="text-grey"
                                    href="tel:+74992485430">8 (499) 248-54-30,</a><a class="text-grey"
                                    href="tel:+74992485979">8 (499) 248-59-79</a></div>
                        </div>
                        <div class="contacts__emails">
                            <p class="text-grey">Email:</p><a class="contacts__email text-bold text-big"
                                href="mailto:info@medcenterrosh.ru">info@medcenterrosh.ru </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="map" id="map"></div>
</view>

<edit header="Контакты">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
</edit>