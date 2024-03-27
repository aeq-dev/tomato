<?php

namespace Modules\Test\App\Forms;
use ProtoneMedia\Splade\FormBuilder\Submit;
use Illuminate\Database\Eloquent\Model;
use ProtoneMedia\Splade\SpladeForm;
use ProtoneMedia\Splade\AbstractForm;


class CustomerForm extends AbstractForm
{
      public static Model|array $model=[];
      public static string $route="admin.customers.store";

      public function configure(SpladeForm $form)
      {

              $form
              ->action(route(self::$route,self::$model))
              ->method('POST')
              ->class('space-y-4')
              ->fill(self::$model);

      }

      public function fields(): array
      {
          return [
              
              \ProtoneMedia\Splade\FormBuilder\Text::make('name')->label(__('Name')),


              \ProtoneMedia\Splade\FormBuilder\Email::make('email')->label(__('Email')),

              \ProtoneMedia\Splade\FormBuilder\Text::make('phone')->label(__('Phone')),

              \ProtoneMedia\Splade\FormBuilder\Textarea::make('address')->label(__('Address')),

              Submit::make()
                  ->label(__('Save')),
          ];
      }

}
