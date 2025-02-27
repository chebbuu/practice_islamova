<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<div class="header p-3 m-3 d-flex align-items-center justify-content-between" style="background-color: white; box-shadow: 0px 2px 10px rgba(0,0,0,0.09); border-radius: 3px">
    <div class=""><h3 style="font-weight: 900; margin: 0;padding: 0; color: var(--main)">TODO LIST</h3></div>
    <div class=" d-flex gap-3 align-items-center">
        @if(Auth::check())
            <p > {{Auth::user()->name}}</p>
            <x-button href="/profile" >
                {{('Profile')}}
            </x-button>

            <form method="POST" action="{{ route('logout') }} " >
                @csrf
                <x-button href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();" style="cursor: pointer;" class="exit">
                    {{('Logout')}}
                </x-button>
            </form>
        @else
            <x-button href="/login" >
                {{('Login')}}
            </x-button>
            <x-button href="/register">
                {{('Registration')}}
            </x-button>

        @endif

    </div>

</div>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:wght@100;200;300;400;700&display=swap');

    *{
        font-family: 'Montserrat', sans-serif;
    }
    :root{
        --main:#6895fe;
    }
    a, p{
        padding: 0;
        margin: 0;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
