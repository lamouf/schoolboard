@component('mail::message')
# Introduction

The body of your message.
    - {{ $student->full_name }}
    - {{ $student->email }}
    - {{ $student->schoolboard->name }}  School Board

@component('mail::button', ['url' => 'http://www.schoolboard.dev'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
