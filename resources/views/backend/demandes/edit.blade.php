@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Modifier voiture</h5>
    <div class="card-body">
      <form method="post" action="{{route('cars.update',$voiture->id)}}" enctype="multipart/form-data">
        @csrf 
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">titre <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{$voiture->title}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="summary" class="col-form-label">Summary  <span class="text-danger">*</span></label>
          <textarea class="form-control" id="summary" name="summary">{{$voiture->summary}}</textarea>
          @error('summary')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="description" class="col-form-label">Description </label>
          <textarea class="form-control" id="description" name="description">{{$voiture->description}}</textarea>
          @error('description')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>


        <div class="form-group">
          <label for="is_featured">Is Featured</label><br>
          <input type="checkbox" name='is_featured' id='is_featured' value='{{$voiture->is_featured}}' {{(($voiture->is_featured) ? 'checked' : '')}}> Yes                        
        </div>
              {{-- {{$categories}} --}}

        
              <div class="form-group">
                <label>Modèle</label>
                <input type="text" name="modele" placeholder="Modèle" class="form-control @error('modele') is-invalid @enderror" value="{{ $voiture->modele }}" required autocomplete="modele">
                    
                @error('modele')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Année modèle</label>
                <input type="number" name="annee_modele" placeholder="Année modèle" class="form-control @error('annee_modele') is-invalid @enderror" value="{{ $voiture->annee_modele }}" required autocomplete="annee_modele">
                    
                @error('annee_modele')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Boite de vitesses</label>
                <select class="custom-select custom-select-lg" name="boite_vitesses" class="form-control @error('boite_vitesses') is-invalid @enderror" required>
                    <option >Choisissez la boite de vitesses</option>
                    <option value="Automatique" @if($voiture->boite_vitesses == 'Automatique') selected @endif>Automatique</option>
                    <option value="Manuelle" @if($voiture->boite_vitesses == 'Manuelle') selected @endif>Manuelle</option>
                </select>

                @error('boite_vitesses')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Catégorie</label>
                <select class="form-control custom-select @error('categorie') is-invalid @enderror" name="categorie" required>
                    <option>Choisissez une catégorie</option>
                    <option value="cec" @if($voiture->categorie == 'cec') selected @endif>Citadine et compacte</option>
                    <option value="pre" @if($voiture->categorie == 'pre') selected @endif>Premium</option>
                    <option value="fem" @if($voiture->categorie == 'fem') selected @endif>Familiale et minibus</option>
                    <option value="uti" @if($voiture->categorie == 'uti') selected @endif>Utilitaire</option>
                    <option value="suv" @if($voiture->categorie == 'suv') selected @endif>SUV et 4x4</option>
                </select>
                    
                @error('categorie')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Carburant</label>
                <select class="custom-select custom-select-lg" name="carburant" class="form-control @error('carburant') is-invalid @enderror" required>
                    <option >Choisissez le carburant</option>
                    <option value="Essence" @if($voiture->carburant == 'Essence') selected @endif>Essence</option>
                    <option value="Diesel" @if($voiture->carburant == 'Diesel') selected @endif>Diesel</option>
                </select>

                @error('carburant')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Passagers</label>
                <input type="number" name="passagers" placeholder="Passagers" class="form-control @error('passagers') is-invalid @enderror" value="{{ $voiture->passagers }}" required autocomplete="passagers">
                    
                @error('passagers')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Portes</label>
                <input type="number" name="portes" placeholder="Portes" class="form-control @error('portes') is-invalid @enderror" value="{{ $voiture->portes }}" required autocomplete="portes">
                    
                @error('portes')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Immatriculation</label>
                <input type="text" name="immatriculation" placeholder="Immatriculation" class="form-control @error('immatriculation') is-invalid @enderror" value="{{ $voiture->immatriculation }}" required autocomplete="immatriculation">
                    
                @error('immatriculation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Prix location par jour</label>
                <input type="text" data-input-mask="money" name="prix_location" placeholder="Prix location" class="form-control @error('prix_location') is-invalid @enderror" value="{{ $voiture->prix_location }}" required autocomplete="prix_location">
                    
                @error('prix_location')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Photo <span class="text-danger">*</span></label>
          <div class="input-group">
            <span class="input-group-btn">
              <input type="file" class="form-control-file" name='photo'>
            </span>
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group ">
          <label for="inputPhoto" class="col-form-label">Photos Multiple <span class="text-danger">*</span></label>
          <div class="input-group">
              <span class="input-group-btn">
                <input type="file" class="form-control-file" name='images[]' multiple>
              </span>
        </div>
        
        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="active" {{(($voiture->status=='active')? 'selected' : '')}}>Active</option>
            <option value="inactive" {{(($voiture->status=='inactive')? 'selected' : '')}}>Inactive</option>
        </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Update</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>

    $(document).ready(function() {
    $('#summary').summernote({
          placeholder: "entrer une brève description.....",

        tabsize: 2,
        height: 150
    });
    });
    $(document).ready(function() {
      $('#description').summernote({
              placeholder: "entrer une  description Detaillé.....",

          tabsize: 2,
          height: 150
      });
    });
</script>

<script>
  var  child_cat_id='{{$voiture->child_cat_id}}';
        // alert(child_cat_id);
        $('#cat_id').change(function(){
            var cat_id=$(this).val();

            if(cat_id !=null){
                // ajax call
                $.ajax({
                    url:"/admin/category/"+cat_id+"/child",
                    type:"POST",
                    data:{
                        _token:"{{csrf_token()}}"
                    },
                    success:function(response){
                        if(typeof(response)!='object'){
                            response=$.parseJSON(response);
                        }
                        var html_option="<option value=''>--Select any one--</option>";
                        if(response.status){
                            var data=response.data;
                            if(response.data){
                                $('#child_cat_div').removeClass('d-none');
                                $.each(data,function(id,title){
                                    html_option += "<option value='"+id+"' "+(child_cat_id==id ? 'selected ' : '')+">"+title+"</option>";
                                });
                            }
                            else{
                                console.log('no response data');
                            }
                        }
                        else{
                            $('#child_cat_div').addClass('d-none');
                        }
                        $('#child_cat_id').html(html_option);

                    }
                });
            }
            else{

            }

        });
        if(child_cat_id!=null){
            $('#cat_id').change();
        }
</script>
@endpush