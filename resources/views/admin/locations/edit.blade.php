<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Locations') }}
        </h2>
    </x-slot>



	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


	<div class="bgc-white p-20 bd">
		
		<div class="mT-30">
			<form id="editForm" enctype="multipart/form-data" method="POST" action="{{route('admin.locations.edit.action')}}">

				

				<fieldset>
					<div class="form-group">
						<label>Titre</label>
						<input type="text" required class="form-control" name="name" value="@if(!empty($location->name)){{$location->name}}@endif" >
					</div>

				

				
				</fieldset>



				<fieldset>
					<div class="form-group">
						<label>status (1 /  afficher  - 0 / draft)</label>
						<input type="text" class="form-control" name="status" value="@if(!empty($location->status)){{$location->status}}@endif" >
					</div>

				

				
				</fieldset>

				<div class="mb-3">
                <label class="form-label" for="inputImage">Image:</label>
                <input
                    type="file"
                    name="image"
                    id="inputImage"
                    class="form-control @error('image') is-invalid @enderror">
					@if(!empty($location->path)){{$location->path}}@endif
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
				<div class="form-group">
						<label>tags</label>
						<input type="text"  class="form-control" name="tags" value="@if(!empty($location->tags)) @foreach($location -> tags as $tag){{ $tag->title }} @endforeach @endif" >
					</div>

				
			
				
						
			<fieldset>
						<div class="form-group">
									<label>Contenu</label>
									<textarea class="summernote form-control" name="body">
										@if(!empty($location->body)){{$location->body}}@endif
									</textarea>

								</div>
	
	
						</fieldset>
						
						<!--<div class="form-group featured-image-form">
															<label>Image (800x600px)</label>
															@if(!empty($location->thumb))
																<div><img class="loadedPicture" src="{{ asset('img/news') }}/{{$location->thumb}}" /></div>
															@endif
															<input type="file" class="form-control" name="thumb" >
															<small>Only .jpg,  .png or .jpeg images</small>
														</div>

														<div class="form-group featured-image-form">
															<label>Banner (800x600px)</label>
															@if(!empty($location->banner))
																<div><img class="loadedPicture" src="{{ asset('img/banners') }}/{{$location->banner}}" /></div>
															@endif
															<input type="file" class="form-control" name="banner" >
															<small>Only .jpg, .png or .jpeg images</small>
															
															<div class="line"><input type="checkbox" name="deletepict" value="oui">
															<label>Supprimer l'image</label>
																</div>
														</div>-->
							

								
								@csrf

								<input type="hidden" name="id" value="@if(!empty($location->id)){{$location->id}}@endif"/>
								<button type="submit" class="btn btn-primary">Envoyer</button>
			</form>
		</div>
	</div>


	</div>
</x-app-layout>
