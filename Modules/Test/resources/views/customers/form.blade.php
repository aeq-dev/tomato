<x-tomato-admin-container :label="isset($model) ? __('Edit Customer') . ' #' .$model->id : __('Create Customer')">
       <x-splade-form :for="$form" />
</x-tomato-admin-container>
