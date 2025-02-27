<button class="button_main">{{$slot}}</button>
<style>
    .button_main{
        width: 100%;
        background-color: var(--main);
        border: 1px solid var(--main);
        border-radius: 3px;
        padding: 8px 3px ;
        color: white;
        &:hover{
            color: var(--main);
            border: 1px solid var(--main);
            background-color: transparent;
            font-weight: 600;
        }

    }
</style>
