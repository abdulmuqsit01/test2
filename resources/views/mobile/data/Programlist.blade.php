@foreach ($programList as $item)
    <a href="{{ route('view_mobile_program_detail', ['slug' => $item->slug]) }}">
        <div class="result-found-bottom-wrap mt-1 single-course cards">
            <div class="result-img-sec"
                style="height: 128px; width: 128px; overflow:hidden; border-radius: 5px;border: 1px #F6F5F2 solid;">
                <img src="{{ uploads('storage/program/' . $item->image) }}" alt="course-img"
                    onerror="this.onerror=null; this.src='{{ statics('assets/images/category/alt-category.jpg') }}'"
                    class="list1"
                    style="
                width: 100%;
                height:100%;
                object-fit:contain;
                box-sizing: border-box;
                border-radius:0px;
                " />
            </div>
            <div class="result-content-sec">
                {{-- <h1 class="d-none">Search</h1> --}}
                <div class="result-content-sec-wrap mt-1">
                    <div class="content-first">
                        <div class="result-bottom-txt">
                            <p>{{ isset($item->program_kategori) ? $item->program_kategori : '-' }}</p>
                        </div>
                    </div>
                    <div class="content-second mt-1">
                        <span class="program-name">
                            <p>{{ $item->name }}</p>
                        </span>
                    </div>
                    <div class="content-fourth mt-1">
                        <div class="result-rating-sec">
                            {{-- <div class="result-rating-sec-img">
                        <img src="{{statics('assets/images/result-found/orange-star.svg') }}"
                            alt="star-img" />
                    </div> --}}
                            <div class="result-rating-txt">
                                <span class="program-tag">{{ $item->tag }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        {{-- <span class="firs-txt1 mr-8"></span> --}}
                        @if ($item->harga == 0)
                            <span class="firs-txt2">Gratis</span>
                        @else
                            <span class="firs-txt2">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </a>
@endforeach
