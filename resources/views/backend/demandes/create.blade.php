@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Add Car</h5>
    <div class="card-body">
      <form method="post" action="{{route('cars.store')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Titre Français <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{old('title')}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="summary" class="col-form-label">Summary Français <span class="text-danger">*</span></label>
          <textarea class="form-control" id="summary" name="summary">{{old('summary')}}</textarea>
          @error('summary')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="description" class="col-form-label">Description Français </label>
          <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
          @error('description')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label>Immatriculation</label>
          <input type="text" name="immatriculation" placeholder="Immatriculation" class="form-control @error('immatriculation') is-invalid @enderror" value="{{ old('immatriculation') }}" required autocomplete="immatriculation">
              
          @error('immatriculation')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
        <div class="form-group">
          <label>Modèle</label>
          <input type="text" name="modele" placeholder="Modele" class="form-control @error('modele') is-invalid @enderror" value="{{ old('modele') }}" required autocomplete="modele">
              
          @error('modele')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
      <div class="form-group">
          <label>Année modèle</label>
          <input type="number" name="annee_modele" placeholder="Année modèle" class="form-control @error('annee_modele') is-invalid @enderror" value="{{ old('annee_modele') }}" required autocomplete="annee_modele">
              
          @error('annee_modele')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
      <div class="form-group">
        <label>Boite de vitesses</label>
        <select class="custom-select custom-select-lg" name="boite_vitesses" class="form-control @error('boite_vitesses') is-invalid @enderror" value="{{ old('boite_vitesses') }}" required>
            <option selected>Choisissez la boite de vitesses</option>
            <option value="Automatique">Automatique</option>
            <option value="Manuelle">Manuelle</option>
        </select>

        @error('boite_vitesses')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label>Catégorie</label>
        <select class="form-control custom-select mb-3 @error('categorie') is-invalid @enderror" name="categorie" value="{{ old('categorie') }}" required autocomplete="categorie">
            <option selected>Choisissez une catégorie</option>
            <option value="cec">Citadine et compacte</option>
            <option value="pre">Premium</option>
            <option value="fem">Familiale et minibus</option>
            <option value="uti">Utilitaire</option>
            <option value="suv">SUV et 4x4</option>
        </select>
            
        @error('categorie')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label>Carburant</label>
        <select class="custom-select custom-select-lg" name="carburant" class="form-control @error('carburant') is-invalid @enderror" value="{{ old('carburant') }}" required>
            <option selected>Choisissez le carburant</option>
            <option value="Essence">Essence</option>
            <option value="Diesel">Diesel</option>
        </select>

        @error('carburant')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
      <label>Passagers</label>
      <input type="number" name="passagers" placeholder="Passagers" class="form-control @error('passagers') is-invalid @enderror" value="{{ old('passagers') }}" required autocomplete="passagers">
          
      @error('passagers')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
  <div class="form-group">
      <label>Portes</label>
      <input type="number" name="portes" placeholder="Portes" class="form-control @error('portes') is-invalid @enderror" value="{{ old('portes') }}" required autocomplete="portes">
          
      @error('portes')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
  <div class="form-group">
      <label>Prix location par jour</label>
      <input type="text" data-input-mask="money" name="prix_location" placeholder="Prix location" class="form-control @error('prix_location') is-invalid @enderror" value="{{ old('prix_location') }}" required autocomplete="prix_location">
          
      @error('prix_location')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
        <div class="form-group">
          <label for="is_featured">Is Featured</label><br>
          <input type="checkbox" name='is_featured' id='is_featured' value='1' checked> Yes                        
        </div>
        <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Photo 1 <span class="text-danger">*</span></label>
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
        <div class="form-group mt-2">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Reset</button>
           <button class="btn btn-success" type="submit">Submit</button>
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
        placeholder: "Write short description.....",
          tabsize: 2,
          height: 100
      });
    });

    $(document).ready(function() {
      $('#description').summernote({
        placeholder: "Write detail description.....",
          tabsize: 2,
          height: 150
      });
    });
    // $('select').selectpicker();

</script>

<script>
  $('#cat_id').change(function(){
    var cat_id=$(this).val();
    // alert(cat_id);
    if(cat_id !=null){
      // Ajax call
      $.ajax({
        url:"/admin/category/"+cat_id+"/child",
        data:{
          _token:"{{csrf_token()}}",
          id:cat_id
        },
        type:"POST",
        success:function(response){
          if(typeof(response) !='object'){
            response=$.parseJSON(response)
          }
          // console.log(response);
          var html_option="<option value=''>----Select sub category----</option>"
          if(response.status){
            var data=response.data;
            // alert(data);
            if(response.data){
              $('#child_cat_div').removeClass('d-none');
              $.each(data,function(id,title){
                html_option +="<option value='"+id+"'>"+title+"</option>"
              });
            }
            else{
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
  })
</script>
@endpush