<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Apply to this Vacancy</h3>
    <form class="w-96 mt-5" role="form" action="#" method="post" enctype="multipart/form-data">
        <div class="mb-4">
            {{--CV--}}
            <x-input-label for="cv" :value="__('Resume or CV (PDF)')"/>
            <x-text-input id="cv" class="block mt-1 w-full" type="file" name="cv" accept=".pdf"/>
        </div>

    </form>
</div>
