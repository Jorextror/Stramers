@extends('layouts.app')

@section('content')

<div  class="container float">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Card') }}</div>
                @if(! empty($success))
                    <div class="alert alert-success d-flex alert-dismissible fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <div>
                                {{ $success  }}
                            </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

                @if(! empty($failed))
                    <div class="alert alert-warning d-flex alert-dismissible fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                            <div>
                                {{ $failed  }}
                            </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('newCard') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                <select name="category" class="form-select" multiple aria-label="multiple select" required>
                                    <option value="legendaria">{{ __('Legendary') }}</option>
                                    <option value="epica">{{ __('Epic') }}</option>
                                    <option value="comun">{{ __('Common') }}</option>
                                    <option value="pocoComun">{{ __('Uncommon') }}</option>
                                  </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="type" class="col-md-4 col-form-label text-md-end">{{ __('Type') }}</label>

                            <div class="col-md-6">
                                <select name="type" class="form-select" multiple aria-label="multiple select" required>
                                    <option value="spell">{{ __('Spell') }}</option>
                                    <option value="minion">{{ __('minion') }}</option>
                                  </select>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="dmg" class="col-md-4 col-form-label text-md-end">{{ __('Damage') }}</label>

                            <div class="col-md-6">
                                <input id="dmg" type="text" class="form-control @error('dmg') is-invalid @enderror" name="dmg" value="{{ old('dmg') }}" required autocomplete="dmg" autofocus>

                                @error('dmg')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="life" class="col-md-4 col-form-label text-md-end">{{ __('Life') }}</label>

                            <div class="col-md-6">
                                <input id="life" type="text" class="form-control @error('life') is-invalid @enderror" name="life" value="{{ old('life') }}" required autocomplete="life" autofocus>

                                @error('life')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cost" class="col-md-4 col-form-label text-md-end">{{ __('Cost') }}</label>

                            <div class="col-md-6">
                                <input id="cost" type="text" class="form-control @error('cost') is-invalid @enderror" name="cost" value="{{ old('cost') }}" required autocomplete="cost" autofocus>

                                @error('cost')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="text" class="col-md-4 col-form-label text-md-end">{{ __('Text') }}</label>

                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control @error('text') is-invalid @enderror" name="text" value="{{ old('text') }}" autocomplete="text" autofocus>

                                @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="obtainable" class="col-md-4 col-form-label text-md-end">{{ __('Obtainable') }}</label>
                            <div class="col-md-6">
                                <select name="obtainable" class="form-select" multiple aria-label="multiple select" required>
                                    <option value=1>{{ __('Yes') }}</option>
                                    <option value=0>{{ __('No') }}</option>
                                  </select>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="formFile" class="col-md-4 col-form-label text-md-end">{{ __('Card Image') }}</label>
                            <div class="col-md-6">
                                <input class="form-control" type="file" id="formFile" name="img">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
