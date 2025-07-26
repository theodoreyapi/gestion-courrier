@component('mail::message')
# Bonjour Mr/Mme {{ $user->name }},

Un nouveau courrier a été initié à destination de votre département.

**Numéro** : {{ $courrier->numero_courrier }} <br>
**Nature** : {{ $courrier->nature_niveau }} <br>
**Note** : {{ $courrier->note_courrier }} <br>
**Délai de traitement** : {{ $courrier->delai_courrier }} <br>

Merci de vous connecter à la plateforme pour le consulter.

{{-- @component('mail::button', ['url' => url('/courriers/' . $courrier->id_courrier)])
Voir le courrier
@endcomponent --}}

Merci,<br>
{{ config('app.name') }}
@endcomponent
