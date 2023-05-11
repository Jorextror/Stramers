@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Settings') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.update.settings') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nick" class="col-md-4 col-form-label text-md-end">{{ __('Nick') }}</label>

                            <div class="col-md-6">
                                <input id="nick" type="text" class="form-control" name="nick" value="{{ $user->nick }}" required autocomplete="nick" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="avatar" class="col-md-4 col-form-label text-md-end">{{ __('Avatar') }}</label>
                            <div class="col-md-6">
                                <input  type="button" class="form-control" onclick="selectAvatar()" autocomplete="avatar" autofocus>
                                <input id="avatar" type="hidden" name="avatar" value="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="background" class="col-md-4 col-form-label text-md-end">{{ __('Background Profile') }}</label>
                            <div class="col-md-6">
                                <input  type="button" class="form-control" onclick="selectBackground()" autocomplete="background" autofocus>
                                <input id="background" type="hidden" name="background" value="">
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4" onclick="success()">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    function success()
    {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
            })

        Toast.fire({
                icon: 'success',
                title: '{{ __("Settings changed") }}'
                })

    }
    let imgs = JSON.parse('@json($cartas)')
    let back = JSON.parse('@json($backgrounds)')
    function selectAvatar()
    {
        let html = '';
        for (const key in imgs) {
            console.log(imgs[key])
            html += '<button class="btn" onclick=newAvatar("'+key+'")><img class="img_avatar" src="/storage/'+imgs[key]+'"></button>'
        }
        Swal.fire({
        title: '<strong>{{ __("Select Avatar") }}</strong>',
        html:html,
        showCloseButton: true,
        showConfirmButton: true,
    })
    }

    function newAvatar(name) {
        document.getElementById('avatar').value = name;
    }

    function selectBackground()
    {
        let html = '';
        for (const key in back) {
            html += '<nav onclick=newBackground("'+back[key].name+'") id="nav-bar" class="nav-top" style="background-color: '+back[key].color+'">'+
                    '<div>'+
                        '<img class="img_profile" src="/storage/{{ Auth::user()->avatar }}" alt="" srcset="">'+
                    '</div>'+
                    '<div class="info nick">'+
                        '{{ Auth::user()->nick }}'+
                    '</div>'+

                    '<span id="lvl" class="progress-bar-text float-right">1</span>'+
                    '<div class="progress">'+
                        '<div class="progress-bar" style="width:15%; background-color:#9bfd71;"></div>'+
                    '</div>'+
                '</nav>'
        }
        Swal.fire({
        title: '<strong>{{ __("Background Profile") }}</strong>',
        html:html,
        showCloseButton: true,
        showConfirmButton: true,
    })
    }

    function newBackground(name) {
        document.getElementById('background').value = name;
    }
</script>
@endsection
