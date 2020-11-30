<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>NOMBRE </th>
        <th>CATEGORIA</th>
        <th>PRICE</th>
        <th>FOTO</th>
    </tr>
    </thead>
    <tbody>
    @foreach($games as $game)
        <tr>
            <td>{{ $game->id}}</td>
            <td>{{ $game->name}}</td>
            <td>{{ $game->description}}</td>
            <td>{{ $game->price}}</td>
            </tr>
    @endforeach
    </tbody>
</table>
