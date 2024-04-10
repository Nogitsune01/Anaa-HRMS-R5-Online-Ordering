<x-app-layout>
    <div class="panel">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($menu as $menus)
                        <tr>
                            <td>{{$menus->image}}</td>
                            <td>{{$menus->title}}</td>
                            <td>{{$menus->category}}</td>
                            <td>{{$menus->description}}</td>
                            <td>{{$menus->price}}</td>
                           
                        </tr>
                        @empty

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>