<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-3 bg-accent border border-transparent rounded-lg font-bold text-xs text-white uppercase tracking-[0.2em] hover:bg-yellow-600 focus:bg-yellow-600 active:bg-accent focus:outline-none focus:ring-2 focus:ring-accent focus:ring-offset-2 transition ease-in-out duration-150 w-full justify-center']) }}>
    {{ $slot }}
</button>
