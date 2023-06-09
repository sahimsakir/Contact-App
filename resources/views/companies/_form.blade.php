<div class="row">
    <div class="col-md-12">
    <div class="form-group row">
        <label for="name" class="col-md-3 col-form-label">Name</label>
        <div class="col-md-9">
        <input type="text" name="name" id="name" class="form-control @error('name') invalid-feedback @enderror" value="{{ old('name', $company->name) }}">
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-3 col-form-label">Email</label>
        <div class="col-md-9">
        <input type="text" name="email" id="email" class="form-control @error('email') invalid-feedback @enderror" value="{{ old('email',$company->email) }}">
        @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="website" class="col-md-3 col-form-label">Website</label>
        <div class="col-md-9">
        <input type="text" name="website" id="website" class="form-control @error('website') invalid-feedback @enderror" value="{{ old('website', $company->website) }}">
        @error('website')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-3 col-form-label">Address</label>
        <div class="col-md-9">
        <textarea name="address" id="address" rows="3" class="form-control @error('address') invalid-feedback @enderror" >{{old('address', $company->address) }}</textarea>
            @error('address')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    {{-- <div class="form-group row">
        <label for="company_id" class="col-md-3 col-form-label">Company</label>
        <div class="col-md-9">
        <select name="company_id" id="company_id" class="form-control @error('company_id') invalid-feedback @enderror" >
            @error('company_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            @if ($companies->count())
                @foreach ($companies as $id => $name)
                    <option  {{ $id === old('company_id', $company->company_id) ? 'selected' : '' }} value="{{ $id }}">{{ $name }}</option>
                @endforeach
            @endif
        </select>
        </div>
    </div> --}}
    <hr>
    <div class="form-group row mb-0">
        <div class="col-md-9 offset-md-3">
            <button type="submit" class="btn btn-primary">{{ $company->exists ? 'Update' : 'Save' }}</button>
            <a href="{{route('companies.index')}}" class="btn btn-outline-secondary">Cancel</a>
        </div>
    </div>
    </div>
</div>
