@extends('front.layouts.master')
@section('title',"İletişim | Barış Akar")


@section('content')



    

    <div class="col-md-10 col-lg-8 col-xl-7">
        <p>Her türlü düşünceleriniz ve projeleriniz için benimle aşağıdaki adreslerden iletişime geçebilirsiniz…</p>

        <br>
        <ul class="list-inline text-center">
            @php   $socials=['facebook','twitter','instagram','linkedin','github','youtube']  @endphp
              @foreach ($socials as $social)
              @if($config->$social!=null)
            <li class="list-inline-item">
                <a href="{{$config->$social}}" target="_blank">
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-{{$social}} fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
            </li>
            @endif
            @endforeach
         
        </ul>
        <br>
    </div>




           <!-- 
<div class="col-md-10 col-lg-8 col-xl-7">
  
    <br>
        <ul class="list-inline text-center">
            <li class="list-inline-item">
                <a href="https://twitter.com/aycowka" target="_blank">
                    <span class="fa-stack fa-xs">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="https://instagram.com/akarbariis" target="_blank">
                    <span class="fa-stack fa-xs">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
            </li>          
            <li class="list-inline-item">
                <a href="mailto:info@barisakar.gq">
                    <span class="fa-stack fa-xs">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fa-solid fa-at fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
            </li>
        </ul>
        <br>
        @if(session('success'))
        <div align="center" style="background-color: transparent; color: black;">
            {{session('success')}}
        </div>
        @endif
        @if($errors->any())
        <div align="center" style="background-color: transparent; color: black;">
            
                @foreach ($errors->all() as $error)

                <p style="font-size: 15px;"> {{$error}} </p>
                    
                @endforeach
            
            </div>
        @endif
    <p></p>


    <div class="my-5">
    
        <form method="post" action="{{route('contact.post')}}" id="contactForm" data-sb-form-api-token="API_TOKEN">
            @csrf
            <div class="form-floating">
                <input class="form-control" value="{{old('name')}}" name="name" type="text" placeholder="ad ve soyad giriniz..." required />
                <label for="name">ad soyad</label>
              
            </div>
            <div class="form-floating">
                <input class="form-control" value="{{old('email')}}" name="email" type="email" placeholder="email adresi giriniz..." required />
                <label for="email">mail</label>
              
            </div>
          
            <div class="form-floating">
                <textarea class="form-control" name="message"  placeholder="mesajınızı giriniz..." style="height: 12rem" required>{{old('message')}}</textarea>
                <label for="message">mesaj</label>
             
            </div>
            <br />
         
            <div align="center">
            <button  class="btn btn-dark" id="submitButton" type="submit">gönder</button>
        </div>
        </form>
    </div>
</div>
-->
@endsection


