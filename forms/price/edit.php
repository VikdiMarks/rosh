<html>
<div class="modal effect-scale show removable" id="modalPriceEdit" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header row">
                <div class="col-5">
                    <h5>Редактирование карточки товара</h5>
                </div>
                <div class="col-7">
                    <h3 class="header"></h3>
                </div>
                <i class="cursor-pointer fa fa-close r-20 position-absolute" data-dismiss="modal" aria-label="Close"></i>
            </div>
            <div class="modal-body pd-20">
                <div class="row">
                    <div class="col-12">
                        <form id="{{_form}}EditForm">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="p-1 input-group-text">
                                            <input name="active" wb-module="swico">
                                        </span>
                                    </div>
                                    <textarea name="header" class="form-control" placeholder="Наименование" required></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-sm-4">Артикул</label>
                                <div class="col">
                                    <input name="articul" type="text" class="form-control" placeholder="Артикул" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-sm-4">Разделы</label>
                                <div class="col">
                                    <select class="form-control" wb-select2 multiple placeholder="" name="type">
                                        <wb-foreach wb="table=catalogs&item=srvcat&from=tree.data" wb-filter="active=on">
                                            <option value="{{id}}">{{name}}</option>
                                        </wb-foreach>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-sm-4">Категория</label>
                                <div class="col">
                                    <select class="form-control" wb-tree="dict=shop_category&children=false" placeholder="Категория" name="category">
                                        <option value="{{id}}">{{name}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-sm-4">Запись на приём</label>
                                <div class="col">
                                    <select class="form-control" placeholder="Запись на приём" name="quote">
                                        <option value="">Нет</option>
                                        <option value="online">Онлайн</option>
                                        <option value="clinic">В клинике</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-form-label col-sm-2">Цена</label>
                                <div class="col-form-label col-sm-2 d-flex"><span class="pr-2">от</span><input name="from" wb-module="switch"></div>
                                <div class="col">
                                    <input name="price" type="number" class="form-control" placeholder="Цена" required>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer pd-x-20 pd-b-20 pd-t-0 bd-t-0">
                <wb-include wb="{'form':'common_formsave.php'}" />
            </div>
        </div>
    </div>
</div>

<wb-lang>
    [ru]
    main = Основное
    prop = Вставки кода
    seo = Оптимизация
    images = Изображения
    visible = Отображать
    header = Заголовок
    [en]
    main = Main
    prop = Code injection
    seo = SEO
    images = Images
    visible = Visible
    header = Header
</wb-lang>

</html>