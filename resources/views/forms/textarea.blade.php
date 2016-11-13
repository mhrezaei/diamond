<?php
if(!isset($extra))
    $extra = '' ;

if(isset($class) && str_contains($class, 'form-required')) {
    $required = true;
}

if(isset($value) and is_object($value))
    $value = $value->$name ;

if(isset($disabled) and $disabled) {
    $required = false ;
    $extra .= ' disabled ' ;
}

?>

<div class="form-group">
    <label
            for="{{$name}}"
            class="col-sm-2 control-label {{$label_class or ''}}"
    >
        @if(isset($label))
            {{ $label }}
        @else
            {{Lang::has("validation.attributes.$name") ? trans("validation.attributes.$name") : $name}}
        @endif
        @if(isset($required) and $required)
            <span class="fa fa-star required-sign " title="{{trans('forms.logic.required')}}"></span>
        @endif
    </label>

    <div class="col-sm-10">
        <textarea
                id="{{$id or ''}}"
                name="{{$name}}" value="{{$value or ''}}"
                class="form-control {{$class or ''}}"
                placeholder="{{$placeholder or ''}}"
				rows="{{$rows or 5}}"
                {{$extra or ''}}
        >{{$value or ''}}</textarea>
		<span class="help-block">
			{{ $hint or '' }}
		</span>
    </div>
</div>
