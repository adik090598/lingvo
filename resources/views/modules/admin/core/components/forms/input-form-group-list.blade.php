@csrf
@foreach($elements as $key => $element)
    @if($element['type'] == 'select')
        <x-admin.select-form-group :name="$key"
                             :placeholder="$element['placeholder']"
                             :label="$element['label']"
                             :errors="$errors"
                             :options="$element['options']"
                             :required="array_key_exists('required', $element) && $element['required']"
                             :type="$element['type']"/>
    @elseif($element['type'] == 'textarea')
        <x-admin.textarea-form-group :name="$key"
                                  :errors="$errors"
                                  :placeholder="$element['placeholder']"
                                  :label="$element['label']"
                                  :value="$element['value']"
                                  :required="array_key_exists('required', $element) && $element['required']"
                                  :type="$element['type']"/>
    @elseif($element['type'] == 'checkbox')
        <x-admin.checkbox-form-group :name="$key"
                                     :label="$element['label']"
                                     :errors="$errors"
                                     :options="$element['options']"
                                     :required="array_key_exists('required', $element) && $element['required']"
                                     :type="$element['type']"/>
    @else
        <x-admin.input-form-group :name="$key"
                            :errors="$errors"
                            :placeholder="$element['placeholder']"
                            :label="$element['label']"
                            :value="$element['value']"
                            :required="array_key_exists('required', $element) && $element['required']"
                            :multiple="array_key_exists('multiple', $element) && $element['multiple']"
                            :type="$element['type']"
                            :hidden="$element['hidden']"
                            :image="$element['image']"
                            />
    @endif
@endforeach
