<edit header="Страница специалиста">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-3">Образование</label>
        <div class="col-sm-9">
            <input name="education" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-3">Сертификат</label>
        <div class="col-sm-9">
            <input name="certificate" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-12">
            <label>Общая информация</label>
            <textarea name="text" rows="auto" class="form-control"></textarea>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-12">
            <label>Образование и курсы</label>
            <wb-multiinput name="stages">
                <input name="year" class="col-sm-4 form-control" placeholder="Годы(ы)">
                <input name="stage" class="col-sm-8 form-control" placeholder="Стядия обучения">
            </wb-multiinput>
        </div>
    </div>
</edit>

<view>
    <div class="container">
        <div class="crumbs"><a class="crumbs__arrow" href="javascript:window.history.back();">
                <svg class="svgsprite _crumbs-back">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#crumbs-back"></use>
                </svg></a>
            <a class="crumbs__link" href="/">Главная</a>
            <a class="crumbs__link" href="/about">О клинике</a>
            <a class="crumbs__link" href="/about/experts">Специалисты</a>
            <span class="crumbs__link">{{_parent.name}}</span>
        </div>
        <div class="expert">
            <div class="expert__top row">
                <div class="col-md-4">
                    <div class="expert__photo">
                        <img src="/thumbc/338x187/src{{_parent.image.0.img}}" alt="{{_parent.name}}">
                    </div>
                </div>
                <div class="col-md-8">
                    <h2 class="h2 expert__name">{{_parent.name}}</h2>
                    <div class="expert__work">
                        <p wb-if="'{{_parent.spec}}'>''">{{_parent.spec}}</p>
                        <p wb-if="'{{education}}'>''">Образование: {{education}}</p>
                        <p wb-if="'{{certificate}}'>''">Сертификат: {{certificate}}</p>
                    </div>
                    <button class="btn btn--black --openpopup" data-popup="--fast" href="#">Записаться на прием</button>
                </div>
            </div>
            <div class="expert__information" wb-if="'{{text}}'>''">
                <div class="row">
                    <div class="col-lg-4">
                        <h5 class="h5">Общая информация</h5>
                    </div>
                    <div class="col-lg-8">
                        <div class="expert__text">
                            <p class="text-break">{{text}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="education">
                <wb-foreach wb="from=stages&tpl=false">
                <div class="education__item row" wb-if="'{{stage}}'>'' OR '{{year}}'>''">
                    <div class="col-lg-2">
                        <h5 class="h5" wb-if="_idx == '0'">Образование</h5>
                    </div>
                    <div class="col-lg-2">
                        <h2 class="h2 education__time">{{year}}</h2>
                    </div>
                    <div class="col-lg-8">
                        <div class="education__name">{{stage}}</div>
                    </div>
                </div>
                </wb-foreach>
             </div>
        </div>
    </div>
</view>

<preview>
    <div class="container page">
        <div class="expert">
            <div class="expert__top row">
                <div class="col-md-4">
                    <div class="expert__photo"> <img src="./assets/img/experts/1.jpg" alt=""></div>
                </div>
                <div class="col-md-8">
                    <h2 class="h2 expert__name">Хачатурян Любовь Андреева</h2>
                    <div class="expert__work">
                        <p>Главный врач медицинского центра Rosh</p>
                        <p>Образование: 25.10.2000, г. Москва, МГУ</p>
                        <p>Сертификат: №124124957</p>
                    </div>
                    <button class="btn btn--black --openpopup" data-popup="--fast" href="#">Записаться на прием</button>
                </div>
            </div>
            <div class="expert__information">
                <div class="row">
                    <div class="col-lg-4">
                        <h5 class="h5">Общая информация</h5>
                    </div>
                    <div class="col-lg-8">
                        <div class="expert__text">
                            <p>Главный врач медицинского центра РОШ. Доктор медицинских наук Межгосударственного университета "Ruthenia" (диплом международного образца), действительный член ОСЭМ, член Международного общества мезотерапевтов врач дерматовенеролог, косметолог, лазеротерапевт, специалист по инвазивным методикам. Закончила Тбилисский Государственный Медицинский Институт в 1987г по специальности «лечебное дело» </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="education">
                <div class="education__item row">
                    <div class="col-lg-2">
                        <h5 class="h5">Образование</h5>
                    </div>
                    <div class="col-lg-2">
                        <h2 class="h2 education__time">1987-1988</h2>
                    </div>
                    <div class="col-lg-8">
                        <div class="education__name">Работала в кардиологической бригаде скорой помощи </div>
                    </div>
                </div>
                <div class="education__item row">
                    <div class="col-lg-2"> </div>
                    <div class="col-lg-2">
                        <h2 class="h2 education__time">1988</h2>
                    </div>
                    <div class="col-lg-8">
                        <div class="education__name">Закончила интернатуру по специальности терапия при Дорожной больнице МПС СССР</div>
                    </div>
                </div>
                <div class="education__item row">
                    <div class="col-lg-2"> </div>
                    <div class="col-lg-2">
                        <h2 class="h2 education__time">1989</h2>
                    </div>
                    <div class="col-lg-8">
                        <div class="education__name">Специализация по эндокринологии при Дорожной больнице МПС СССР</div>
                    </div>
                </div>
                <div class="education__item row">
                    <div class="col-lg-2"> </div>
                    <div class="col-lg-2">
                        <h2 class="h2 education__time">1995</h2>
                    </div>
                    <div class="col-lg-8">
                        <div class="education__name">Сертификат The University of the State of New York, сертификат International institute of Management, physician-cosmetician and medical cosmetic management </div>
                    </div>
                </div>
                <div class="education__item row">
                    <div class="col-lg-2"> </div>
                    <div class="col-lg-2">
                        <h2 class="h2 education__time">1997</h2>
                    </div>
                    <div class="col-lg-8">
                        <div class="education__name">Специализация по Дерматовенерологии при РМАПО</div>
                    </div>
                </div>
                <div class="education__item row">
                    <div class="col-lg-2"> </div>
                    <div class="col-lg-2">
                        <h2 class="h2 education__time">1997</h2>
                    </div>
                    <div class="col-lg-8">
                        <div class="education__name">Курс по циклу «Современный проблемы применения биологически активных добавок к пище» при РМАПО</div>
                    </div>
                </div>
                <div class="education__item row">
                    <div class="col-lg-2"> </div>
                    <div class="col-lg-2">
                        <h2 class="h2 education__time">2001</h2>
                    </div>
                    <div class="col-lg-8">
                        <div class="education__name">Курс по циклу «Актуальные вопросы касметологии, косметические процедуры» при ММА им. Сеченова </div>
                    </div>
                </div>
                <div class="education__item row">
                    <div class="col-lg-2"> </div>
                    <div class="col-lg-2">
                        <h2 class="h2 education__time">2001</h2>
                    </div>
                    <div class="col-lg-8">
                        <div class="education__name">Курсы мезотерапии и Медицинской эстетики и Флебоэстетики у профессора Джорджа Феликса Сильвы (Аргентина) </div>
                    </div>
                </div>
                <div class="education__item row">
                    <div class="col-lg-2"> </div>
                    <div class="col-lg-2">
                        <h2 class="h2 education__time">2001</h2>
                    </div>
                    <div class="col-lg-8">
                        <div class="education__name">Участие в VI Междисциплинарном симозиуме «Новое в дерматовенерологии, андрологии, гинеологии: наука и практика» </div>
                    </div>
                </div>
                <div class="education__item row">
                    <div class="col-lg-2"> </div>
                    <div class="col-lg-2">
                        <h2 class="h2 education__time">2001</h2>
                    </div>
                    <div class="col-lg-8">
                        <div class="education__name">Участие в семинаре «Актуальные аспекты мезотерапии в эстетической медицине»</div>
                    </div>
                </div>
                <div class="education__item row">
                    <div class="col-lg-2"> </div>
                    <div class="col-lg-2">
                        <h2 class="h2 education__time">2002</h2>
                    </div>
                    <div class="col-lg-8">
                        <div class="education__name">Курс по циклу «дерматология с основами мезотерапии при «Гос. Институт усовершенствования врачей Министерства обороны РФ </div>
                    </div>
                </div>
                <div class="education__item row">
                    <div class="col-lg-2"> </div>
                    <div class="col-lg-2">
                        <h2 class="h2 education__time">2002</h2>
                    </div>
                    <div class="col-lg-8">
                        <div class="education__name">Участие во всеросийском конгрессе по мезотерапии с профессором Филиппом Пети (Франция) </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</preview>