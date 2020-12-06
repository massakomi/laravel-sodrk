@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h2>Категории</h2>


<form action="{{ url('category/add')}}" method="POST" id="add-form">
  {{ csrf_field() }}
  <div class="form-row">
    <div class="form-group col-md-8">
      <input type="text" name="name" value="<?=$item->name?>" data-required class="form-control" placeholder="Название">
    </div>
    <div class="form-group col-md-4">
      <select name="id_parent" class="form-control">
        <?php
        foreach ($items as $item) {
            echo '<option value="'.$item->id.'">'.$item->name.'</option>';
        }
        ?>
      </select>
    </div>
  </div>


    <button class="btn btn-primary" type="submit">
      <span class="spinner-border spinner-border-sm" style="display:none;" role="status" aria-hidden="true"></span>
      <span class="text"><?=$btnText?></span>
    </button>
    <input type="hidden" name="id" value="<?=$item->id?>">

</form>


</div>

@endsection
