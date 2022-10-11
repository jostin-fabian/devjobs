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
    {{-------------------Displaying Image and job description----------------------------------}}
    <div class="md:grid md:grid-cols-6 gap-4">
        {{-- Image --}}
        <div class="md:col-span-2">
            <img src="{{asset('storage/vacancies/'.$vacancy->image)}}" alt="{{'Vacancy Image' . $vacancy->title}}"/>
        </div>
        {{-- Job Description --}}
        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5">Job Description</h2>
            <p>{{$vacancy->description}}</p>

        </div>
    </div>
    @guest
        <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
            <p>You want to apply for this vacancy? <a class="font-bold text-indigo-600" href="{{route('register')}}">Obtain
                    an account and apply to this and other vacancies.</a>

            </p>
        </div>
    @endguest
    @cannot('create',App\Models\Vacancy::class)
        <livewire:apply-vacancy :vacancy="$vacancy"/>
    @endcannot


</div>
