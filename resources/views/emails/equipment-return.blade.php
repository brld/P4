<h1>Hey there, {{ $user->first_name }}!</h1>

<h2>It looks like you've borrowed:</h2>

<div>
    <h2>{{ $equipment->item }},</h2>
    <h3>owned by {{ $equipment->owner->first_name }} {{ $equipment->owner->last_name }}</h3>
    <a href='{{ Config::get('app.url').'/equipment/edit/'.$equipment->id}}'>View now...</a>
</div>

<p>Enjoy the item! Please remember to return it to him within {{ $equipment->borrowed_for }}! Thanks!</p>

<p>
From,<br><br>
The Scout Manager Team
</p>
