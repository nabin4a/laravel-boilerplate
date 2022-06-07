<footer class="c-footer">
    <div>
        <strong>
            @lang('Copyright') &copy; {{ date('Y') }}
            <x-utils.link href="{{env('APP_URL', 'http://sarwa.com.np')}}" target="_blank" :text="__(appName())" />
        </strong>

        @lang('All Rights Reserved')
    </div>

    <div class="mfs-auto">
        @lang('Developed by')
        <x-utils.link href="http://sarwa.com.np" target="_blank" text="Sarwa Technologies" />
    </div>
</footer>
