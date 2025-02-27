@props(['href'=>''])
<a {{$attributes->merge(['href'=>$href,'class'=>'nav-b'])}}> {{$slot}}</a>

<style>
    .nav-b{
        background-color: #ececec;
        padding: 5px 10px;

        text-decoration: none;
        border-radius: 3px;
        color: #6b7280;
        transition: 0.2s;
        &:hover{
          background-color:var(--main);
            color: #fbfbfb;
        }
    }
</style>
