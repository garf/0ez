<form action="{{ route('index') }}" method="get">
    <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Поиск..." value="{{ $q }}">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="submit">Искать</button>
      </span>
    </div>
</form>
<br />
