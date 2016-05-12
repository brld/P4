<h1>Hey there, {{ $user->first_name }}!</h1>

<h2>It looks like you've borrowed:</h2>

<div>
    <h2>{{ $book->title }},</h2>
    <h3>owned by {{ $book->owner->first_name }} {{ $book->owner->last_name }}</h3>
    <a href='{{ Config::get('app.url').'/books/edit/'.$book->id}}'>View now...</a>
</div>

<p>Enjoy the book! Please remember to return it to him within {{ $book->borrowed_for }}! Thanks!</p>

<p>
From,<br><br>
The Scout Manager Team
</p>
