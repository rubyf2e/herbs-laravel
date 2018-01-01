<?php

namespace App\Admin\Controllers;

use App\Maps;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class MapsController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('香草地圖');
            $content->description('香草地圖設定');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('香草地圖');
            $content->description('香草地圖設定');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('香草地圖');
            $content->description('香草地圖設定');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Maps::class, function (Grid $grid) {
            $grid->id('ID')->sortable();

            $grid->name('標題')->editable();
            $grid->memo('內容')->editable();
            $grid->column('position')->openMap(function () {

                return [$this->profile['lat'], $this->profile['lng']];

            }, 'Position');
            $grid->order('排序')->orderable();

        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Maps::class, function (Form $form) {
            $form->display('id', 'ID');
            $form->text('name', '國家')->rules('required');
            $form->textarea('memo', '內容')->rules('required');
            $form->maps('lat', 'lng', '地圖位置')->useGoogleMap();
            $form->hidden('position');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
