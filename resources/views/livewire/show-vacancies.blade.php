<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    @foreach($vacancies as $vacancy)
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="p-6 bg-white border-gray border-gray-200">
                <a href="#" class="text-xl font-bold">
                    {{$vacancy->title}}
                </a>
            </div>
        </div>
    @endforeach
</div>
