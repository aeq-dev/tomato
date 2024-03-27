<?php

namespace Modules\Test\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoAdmin\Facade\Tomato;

class CustomerController extends Controller
{
    public string $model;

    public function __construct()
    {
        $this->model = \Modules\Test\App\Models\Customer::class;
    }

    /**
     * @param Request $request
     * @return View|JsonResponse
     */
    public function index(Request $request): View
    {
        return Tomato::index(
            request: $request,
            model: $this->model,
            view: 'test::customers.index',
            table: \Modules\Test\App\Tables\CustomerTable::class
        );
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function api(Request $request): JsonResponse
    {
        return Tomato::json(
            request: $request,
            model: \Modules\Test\App\Models\Customer::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'test::customers.form',
            data: ['form'=>\Modules\Test\App\Forms\CustomerForm::class]
        );
    }

    /**
     * @param Request $request
     * @return RedirectResponse|JsonResponse
     */
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $response = Tomato::store(
            request: $request,
            model: \Modules\Test\App\Models\Customer::class,
            validation: [
                            'name' => 'required|max:255|string',
            'bio' => 'nullable',
            'email' => 'required|max:255|string|email',
            'phone' => 'required|max:255|min:12',
            'address' => 'nullable|max:65535'
            ],
            message: __('Customer updated successfully'),
            redirect: 'admin.customers.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }

    /**
     * @param \Modules\Test\App\Models\Customer $model
     * @return View|JsonResponse
     */
    public function show(\Modules\Test\App\Models\Customer $model): View|JsonResponse
    {
        return Tomato::get(
            model: $model,
            view: 'test::customers.show',
        );
    }

    /**
     * @param \Modules\Test\App\Models\Customer $model
     * @return View
     */
    public function edit(\Modules\Test\App\Models\Customer $model): View
    {
        \Modules\Test\App\Forms\CustomerForm::$model=$model;
        \Modules\Test\App\Forms\CustomerForm::$route="admin.customers.update";

        return Tomato::get(
            model: $model,
            view: 'test::customers.form',
            data: ['form'=>\Modules\Test\App\Forms\CustomerForm::class]
        );
    }

    /**
     * @param Request $request
     * @param \Modules\Test\App\Models\Customer $model
     * @return RedirectResponse|JsonResponse
     */
    public function update(Request $request, \Modules\Test\App\Models\Customer $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            validation: [
                            'name' => 'sometimes|max:255|string',
            'bio' => 'nullable',
            'email' => 'sometimes|max:255|string|email',
            'phone' => 'sometimes|max:255|min:12',
            'address' => 'nullable|max:65535'
            ],
            message: __('Customer updated successfully'),
            redirect: 'admin.customers.index',
        );

         if($response instanceof JsonResponse){
             return $response;
         }

         return $response->redirect;
    }

    /**
     * @param \Modules\Test\App\Models\Customer $model
     * @return RedirectResponse|JsonResponse
     */
    public function destroy(\Modules\Test\App\Models\Customer $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::destroy(
            model: $model,
            message: __('Customer deleted successfully'),
            redirect: 'admin.customers.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }
}
