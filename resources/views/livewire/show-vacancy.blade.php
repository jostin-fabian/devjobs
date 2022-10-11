<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3">{{$vacancy->title}}</h3>
        <div class=" md:grid md:grid-cols-2 bg-gray-50 p-4 my-10">
            {{--Company--}}
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Empresa: <span
                    class="normal-case font-normal">{{$vacancy->company}}</span></p>


            {{--Last Day--}}
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Last day to apply: <span
                    class="normal-case font-normal">{{$vacancy->last_day->toFormattedDateString()}}</span></p>

            {{--Category--}}
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Category: <span
                    class="normal-case font-normal">{{$vacancy->category->category}}</span></p>


            {{--Salary--}}

            <p class="font-bold text-sm uppercase text-gray-800 my-3">Salary: <span
                    class="normal-case font-normal">{{$vacancy->salary->salary}}</span></p>

        </div>

    </div>
</div>
