<?php

namespace App\Admin\Controllers;

use App\Sidebars;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class SidebarsController extends Controller
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

            $content->header('網站快速連結');
            $content->description('網站快速連結設定');

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

            $content->header('網站快速連結');
            $content->description('網站快速連結設定');

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

            $content->header('網站快速連結');
            $content->description('網站快速連結設定');

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
        return Admin::grid(Sidebars::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->name('標題')->editable();
            $grid->url('錨點id')->editable();
            $grid->src('圖片')->image();
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
        return Admin::form(Sidebars::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->text('name')->rules('required');
            $form->text('url')->rules('required');
            $form->image('src');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
