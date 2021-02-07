<ul>
    @foreach ($categories as $category)
        <li> {{ $category->name }}</li>
        @if (count($category->sub_category))
            <ul>
                @foreach ($category->sub_category as $sub)

                    <li>{{ $sub->name }}</li>

                    <ul>
                        @foreach ($sub->sub_category as $sub1)
                            <li>{{ $sub1->name }}</li>
                        @endforeach

                    </ul>
                @endforeach
            </ul>

        @endif
    @endforeach
</ul>
