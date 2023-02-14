@extends('layouts.dashboard')
@section('content')
    <div class="text-center p-12 gap-12">
        <p class="mb-12">ساخت پست جدید</p>
        <form action="{{ route('posts.store') }}" method="post" name="form" enctype="multipart/form-data">
            @csrf
            <div class="flex justify-center gap-3">
                <div class="flex justify-center items-start gap-12">
                    <div class="mt-12 flex flex-col gap-3">
                        <label for="title" class="block"> عنوان<span class="text-red-500">*</span></label>
                        <input id="title" name="title" type="text"
                               value="{{ old('title') }}"
                               class="bg-gray-300 px-4 py-2 text-blue-500 rounded  mx-auto">
                        @error('title')
                        <div class="alert alert-danger text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-center items-start gap-12">
                    <div class="mt-12 flex flex-col gap-3">
                        <label for="slug" class="block">slug <span class="text-red-500">*</span></label>
                        <input id="slug" name="slug" type="text"
                               value="{{ old('slug') }}"
                               class="bg-gray-300 px-4 py-2 text-blue-500 rounded  mx-auto">
                        @error('slug')
                        <div class="alert alert-danger text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex gap-3 w-full justify-center">
                <div>
                    <label for="message" class="block my-12 text-sm font-medium text-gray-900 dark:text-white">
                        خلاصه <span class="text-red-500">*</span></label>
                    <textarea id="message" rows="4"
                              name="excerpt"
                              class="block  p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                              placeholder="خلاصه">
                    </textarea>
                    @error('excerpt')
                    <div class="alert alert-danger text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="message" class="block my-12 text-sm font-medium text-gray-900 dark:text-white">
                        متن <span class="text-red-500">*</span></label>
                    <textarea id="message" rows="4"
                              name="body"
                              class="block  p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                              placeholder="متن">
                    </textarea>
                    @error('body')
                    <div class="alert alert-danger text-red-600">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <div class="flex flex-col gap-5 mt-5">
                {{--                type --}}
                <div>
                    <label for="countries"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نوع</label>
                    <select id="countries"
                            name="type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach($types as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                    @error('type')
                    <div class="alert alert-danger text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                {{--                published date - required --}}
                <div class="mx-auto">
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <label for="published_at" class="mb-2">تاریخ انتشار</label>
                        <input type="date"
                               min="{{  \Carbon\Carbon::tomorrow()->format('Y-m-d') }}"
                               id="published_at"
                               name="published_at"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Select date">
                    </div>
                    @error('published_at')
                    <div class="alert alert-danger text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                {{--                status - required --}}
                <div>
                    <label for="countries"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">وضعیت</label>
                    <select id="countries"
                            name="status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach($statuses as $status)
                            <option value="{{ $status }}">{{ $status }}</option>
                        @endforeach
                    </select>
                    @error('status')
                    <div class="alert alert-danger text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                {{--                category - nullable --}}
                <div>
                    <label for="countries"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">دسته بندی</label>
                    <select id="countries"
                            multiple
                            name="categories[]"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @forelse($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @empty
                            <option value="{{ null }}">دسته بندی موجود نمی باشد</option>
                        @endforelse
                        @error('categories')
                        <div class="alert alert-danger text-red-600">{{ $message }}</div>
                        @enderror
                    </select>
                </div>


                <div>
                    {{--                image - nullable --}}
                    <div>
                        <input type="file" name="image">
                    </div>
                    @error('image')
                    <div class="alert alert-danger text-red-600">{{ $message }}</div>
                    @enderror

                    {{--                tags - nullable --}}
                    <div>
                        <label class="block text-left" style="max-width: 300px">
                            <span class="text-gray-700">برچسب ها</span>
                            <select name="tags[]" class="form-multiselect block w-full mt-1" multiple>
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </label>
                        @error('tags')
                        <div class="alert alert-danger text-red-600">{{ $message }}</div>
                        @enderror
                        @error('tags.*')
                        <div class="alert alert-danger text-red-600">{{ $message }}</div>
                        @enderror

                    </div>
                </div>

            </div>
            <input type="submit" value="افزودن"
                   class="bg-slate-700 mt-12 text-white rounded px-4 py-2 cursor-pointer">
        </form>
    </div>

    <input id="newTag" name="newTag" type="newTag"
           value="{{ old('newTag') }}"
           class="bg-gray-300 px-4 py-2 text-blue-500 rounded  mx-auto">
    <button type="submit"
            style="font-family: snappFont,serif"
            class="bg-slate-700 m-5 text-white rounded px-4 py-2 cursor-pointer">
        افزودن برچسب
    </button>



    <script>

        const select = $('select');
        const newTag = $('#newTag');
        $('button').on('click', function () {
            select.append($('<option>', {
                value: newTag.val(),
                text: newTag.val()
            }));
        });

    </script>

@endsection
