<?php

namespace App\Admin\Controllers;

use App\Details;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class DetailsController extends Controller
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

            $content->header('香草介紹');
            $content->description('香草介紹設定');

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

            $content->header('香草介紹');
            $content->description('香草介紹設定');

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

            $content->header('香草介紹');
            $content->description('香草介紹設定');

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
        return Admin::grid(Details::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->title('標題')->editable();
            $grid->memo('內容')->editable();
            $grid->src('封面圖片')->image();
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
        return Admin::form(Details::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->text('title')->rules('required');
            $form->textarea('memo')->rules('required');
            $form->image('src');
            $form->multipleImage();
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
