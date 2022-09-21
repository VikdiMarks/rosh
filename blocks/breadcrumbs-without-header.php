<view>
    <div class="container">
        <div class="crumbs">
            <a class="crumbs__arrow" href="javascript:window.history.back();">
                <svg class="svgsprite _crumbs-back">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#crumbs-back"></use>
                </svg>
            </a>
            <a class="crumbs__link" href="/">Главная</a>
            <wb-var midcrumb='{{headerByPath({{_parent.path}})}}' wb-if="'{{_parent.path}}'>'/'" else='' />

            <a class="crumbs__link" href="{{_parent.path}}" wb-if="'{{_var.midcrumb}}'>''">
                {{_var.midcrumb}}
            </a>
            <a class="crumbs__link" href="#">{{_parent.header}}</a>
        </div>
    </div>
</view>

<edit header="Хлебные крошки">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="alert alert-info">
        Данный блок не требует редактирования
    </div>
</edit>