<div class="form-group">
    <label for="exampleInputController">{{ __('Autorisation/action/message.controller') }}</label>
    <select name="controller_id" class="form-control" id="exampleInputController" required>
        @if (isset($action))
            <option value="{{ $action->controller->id }}">{{ $action->controller->nom }}</option>
        @else
            <option value="">{{ __('Autorisation/action/message.choix') }}</option>
        @endif
        @foreach ($controllers as $item)
            @if (!isset($action) || !$action->controller || $item->id !== $action->controller->id)
                <option value="{{ $item->id }}">{{ $item->nom }}</option>
            @endif
        @endforeach
    </select>
</div>


<div class="form-group">
    <label for="nomAutorisationAction">{{ __('Autorisation/action/message.name') }}</label>
    <input name="nom" type="text" class="form-control" id="nomAutorisationAction" placeholder="Entrer le nom"
        value="{{ isset($action) ? $action->nom : null }}">
</div>
