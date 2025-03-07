<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TODO List</title>
</head>
<body style="background-color: #fafafa">
<x-header></x-header>
<div class="container-fluid d-flex align-items-center justify-content-center">
    <div class="m-3 container p-4 d-flex gap-5" style="min-height: 85vh; background-color: white;box-shadow: 0px 2px 10px rgba(0,0,0,0.09); border-radius: 3px; ">
        <div class="w-75">
            <h3>Task</h3>
            <hr>
            <div class="">
                @if(Auth::check())
                    @if(empty($tasks))
                            <p class="message">There are no active tasks</p>
                    @else
                        <div class=" d-flex flex-column gap-2">

{{--ВЫВОД ЗАДАНИЙ--}}
                        @foreach($tasks as $task)
                            <div class="p-3" style="border: #dcdcdf 1px solid; border-radius:4px;">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-end gap-2">
                                        <h5 style="padding: 0;margin: 0;overflow-wrap:break-word;word-break: break-all ">{{$task['name']}}</h5>
                                        <div class="d-flex gap-2 " style="font-size: 12px;color: #6b7280">

                                            <p>{{$task['created_at']->format('d.m.y')}}</p>
                                        </div>
                                    </div>
{{--УДАЛЕНИЕ И РЕДАКТИРОВАНИЕ--}}
                                    <div class="decoraten_b">
{{--УДАЛЕНИЕ--}}
                                        <form action="{{(route('task.delete',$task))}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="taskId" value="{{$task['id']}}">
                                            <button><img src="/icon/dash-circle.svg"></button>
                                        </form>
{{--РЕДАКТИРОВАНИЕ--}}
                                        <div class="modalbutton" style="position: relative">
                                            <button  ><img src="/icon/pencil.svg"></button>
                                            <div class="modalwindow p-4 " style="z-index: 1000;position: absolute; background-color: white;box-shadow: 0px 2px 10px rgba(0,0,0,0.09); border-radius: 3px ">
                                                <form style="width: 250px" class="d-flex flex-column gap-2" action="{{(route('task.update', $task))}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="taskId" value="{{ $task->id }}">
                                                    <div class="">
                                                        <label>Task name</label>
                                                        <input type="text" value="{{$task['name']}}" name="name" class="form-control">
                                                    </div>
                                                    <div class="">
                                                        <label>Task description</label>
                                                        <textarea name="description" class="form-control" style="resize: none;">{{$task['description']}}</textarea>
                                                    </div>
                                                    <button style="width: 100%;background-color: var(--main);border: 1px solid var(--main);border-radius: 3px;padding: 8px 3px ;color: white;">Update</button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <p class="mt-2" style="overflow-wrap:break-word;word-break: break-all">{{$task['description']}}</p>
                            </div>
                        @endforeach
                        </div>

                    @endif


                @else
                    <div class="d-flex gap-2">
                        <p class="message">Register to use todo's list.</p>
                        <a href="/register" style="color: #4f5259;font-weight: bold;text-decoration: none;">Registration</a>
                    </div>
                @endif
            </div>
        </div>


        @if(Auth::check())
            <div class="w-25">
                <h3>Add Task</h3>
                <hr>
                <form class="d-flex flex-column gap-2 " method="post"  action="{{(route('task.create'))}}">
                    @csrf

                    <div class="">
                        <label for="name" class="mb-2" >Task name</label>
                        <input type="text" name="name" class="form-control" maxlength=50"></input>
                    </div>
                    <div class="">
                        <label for="descr" class="mb-2">Task description</label>
                        <div style="position:relative ">
                            <textarea type="text" name="description" id="description" class="form-control mb-2" maxlength="255" style="height: 300px; resize: none"></textarea>
                            <div style="position: absolute; bottom:5px; right: 7px">
                                <p style="font-size: 12px;color: #6b7280"> <span id="charCount">0</span>/255</p></div>

                        </div>
                    </div>
                    <x-button-main>{{('Add')}}</x-button-main>
                </form>
            </div>
        @endif
    </div>
</div>


</body>
</html>
<style>
    .message{
        color: #6b7280;
        font-size: 16px;
    }
    .decoraten_b{
        display: flex;
        gap: 5px;
        button{
            width:30px;
            background: transparent;
            border: 0;
        }
    }
    .modalbutton{

        .modalwindow{
            display: none;

        }
        &:hover{
          .modalwindow{
              display: block;

          }
        }
    }

</style>

<script>
    let description = document.getElementById('description')
    let charCount = document.getElementById('charCount')

    description.addEventListener('input',()=>{
        event.preventDefault()
        countText = description.value.length
        charCount.textContent = countText
    })


    let modalbutton = document.getElementById('modalbutton')
    let modalwindow = document.getElementById('modalwindow')
    modalwindow.style.display = 'none';
    modalbutton.addEventListener('click',()=>{
        event.preventDefault()
        if(modalwindow.style.display == 'none'){
            modalwindow.style.display = 'block'
        }else{
            modalwindow.style.display = 'none'
        }
    })


</script>
