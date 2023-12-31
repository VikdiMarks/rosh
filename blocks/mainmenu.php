<view>
    <div class="menu" id="mainmenu" wb-if="'{{_route.uri}}' !=='/english'">
        <nav class="nav">
            <wb-var menu wb-api="/api/v2/list/pages?active=on&menu=on&@sort=_sort" />
            <wb-foreach wb="from=_var.menu&tpl=false" wb-filter="path=">
                <wb-var child="0" />
                <wb-foreach wb="from=_var.menu&limit=1&tpl=false" wb-filter="path={{url}}">
                    <wb-var child="1" />
                </wb-foreach>
                <wb-var option="{{menu_title}}" wb-if="'{{menu_title}}'>''" else="{{header}}" />
                <div class="nav__link" wb-if="_var.child == 0"><a href="{{url}}">{{_var.option}}</a></div>
                <div class="nav__link ddl" wb-if="_var.child == 1">
                    <a href="{{url}}">{{_var.option}}</a>
                    <svg class="svgsprite _drop">
                        <use xlink:href="/assets/img/sprites/svgsprites.svg#drop"></use>
                    </svg>
                </div>
                <div class="nav__group ddm" wb-if="_var.child == 1">
                    <div class="nav__link-inner"><a href="{{url}}">{{_var.option}}</a></div>
                    <wb-foreach wb="from=_var.menu&tpl=false" wb-filter="path={{url}}">
                        <wb-var option="{{menu_title}}" wb-if="'{{menu_title}}'>''" else="{{header}}" />
                        <div class="nav__link-inner"><a href="{{url}}">{{_var.option}}</a></div>
                    </wb-foreach>
                </div>
            </wb-foreach>
        </nav>
        <div class="mobile-btns" wb-if="'{{_route.uri}}' !=='/english'">
            <!-- button class="mb-10 btn btn--white --openfilter">Подобрать услугу</button -->
            <div class="--flex --flex-wrap">
                <button class="pl-0 btn btn-link --openpopup" wb-if="in_array('{{_sess.user.role}}',['client','admin',''])" data-popup="--fast">Записаться на прием</button>
                <a class="pl-0 btn btn-link" href="/cabinet" wb-if="in_array('{{_sess.user.role}}',['main','client','expert'])">Мой кабинет</a>
                <button class="btn btn-link enter --openpopup" wb-if="in_array('{{_sess.user.role}}',[''])" data-popup="--enter-number">Войти</button>
	            <a class="pl-0 btn btn-link signout" wb-if="in_array('{{_sess.user.role}}',['admin','client','expert','main'])" href="/signout">Выйти</a>
            </div>
        </div>

        <div class="socials socials-menu" style="display:none">
            <a class="socials__link" href="{{_var.facebook}}" wb-if="'{{_var.facebook}}'>''">
                <svg class="svgsprite _socials-1">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#socials-1"></use>
                </svg></a>
            <a class="socials__link" href="{{_var.instagram}}" wb-if="'{{_var.instagram}}'>''">
                <svg class="svgsprite _socials-2">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#socials-2"></use>
                </svg></a>
            <a class="socials__link" href="{{_var.vkontakte}}" wb-if="'{{_var.vkontakte}}'>''">
                <svg class="svgsprite _socials-4">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#socials-4"></use>
                </svg>
            </a><a class="socials__link" href="{{_var.youtube}}" wb-if="'{{_var.youtube}}'>''">
                <svg class="svgsprite _socials-3">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#socials-3"></use>
                </svg>
            </a>
        </div>

        <div class="menu__contacts"><a class="text-small text-grey" href="/contacts">
                {{_sett.address}}
            </a>
            <a class="text-small text-grey" href="mailto:{{_sett.contactEmail}}">
                {{_sett.contactEmail}}</a>
        </div>
        <a class="en-version" href="/english" wb-if="'{{_route.uri}}' !=='/english'">
            <svg class="svgsprite _web">
                <use xlink:href="/assets/img/sprites/svgsprites.svg#web"></use>
            </svg>
            English version
            <svg class="svgsprite _arrow-link">
                <use xlink:href="/assets/img/sprites/svgsprites.svg#arrow-link"></use>
            </svg>
        </a>
        <a class="en-version" href="/" wb-if="'{{_route.uri}}' =='/english'">
            <svg class="svgsprite _web">
                <use xlink:href="/assets/img/sprites/svgsprites.svg#web"></use>
            </svg>
            Русская версия
            <svg class="svgsprite _arrow-link">
                <use xlink:href="/assets/img/sprites/svgsprites.svg#arrow-link"></use>
            </svg>
        </a>

    </div>
    <wb-module wb="module=yonger&mode=render&view=mainfilter" />
    
</view>

<edit header="Главное меню">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
</edit>