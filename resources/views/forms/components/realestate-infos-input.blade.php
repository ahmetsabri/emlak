<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">

    <div x-data="{
        state: $wire.$entangle('{{ $getStatePath() }}'),
        init() {
            console.log($wire.data.category_id)
        }

    }">
    </div>
</x-dynamic-component>
