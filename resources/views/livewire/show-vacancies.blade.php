<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @forelse($vacancies as $vacancy)
            <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                <!-- data -->
                <div class="space-y-3">
                    <a href="{{route('vacancies.show',$vacancy->id)}}" class="text-xl font-bold">
                        {{$vacancy->title}}
                    </a>
                    <p class="text-sm text-gray-600 font-bold ">{{$vacancy->company}}</p>
                    <p class="text-sm text-gray-500">Last day: {{$vacancy->last_day->format('d/m/Y')}}</p>
                </div>
                <!-- options -->
                <div class="flex flex-col md:flex-row items-stretch gap-3  mt-5 md:mt-0">
                    <!-- show candidates -->

                    <a href="#"
                       class=" bg-slate-800 py-2 px-4 rounded-lg text-white text-sm font-bold uppercase text-center">
                        Candidates
                    </a>
                    <!-- edit -->
                    <a href="{{route('vacancies.edit',$vacancy->id)}}"
                       class=" bg-blue-800 py-2 px-4 rounded-lg text-white text-sm font-bold uppercase text-center">
                        edit
                    </a>
                    <!-- delete -->

                    <button wire:click="$emit('showAlert',{{$vacancy->id}})"
                            class=" bg-red-600 py-2 px-4 rounded-lg text-white text-sm font-bold uppercase text-center">
                        delete
                    </button>
                </div>

            </div>
        @empty
            <p class="p-3 text-center text-sm text-gray-600">There are no vacancies that </p>
        @endforelse
    </div>
    <div class="mt-10">
        {{$vacancies->links()}}

    </div>
</div>
@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('showAlert', vacancyId => {
            Swal.fire({
                title: 'Remove Vacancy ?',
                text: "A deleted Vacancy cannot be recovered",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    //Delete a vacancy from the server
                    Livewire.emit('deleteVacancy', vacancyId)

                    Swal.fire(
                        'Vacancy eliminated!!',
                        'Correctly eliminated.',
                        'success'
                    )
                }
            })

        })

    </script>

@endpush
