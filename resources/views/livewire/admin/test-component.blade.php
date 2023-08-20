<div>
    <!-- Form Edit Data -->
    <form wire:submit.prevent="submitForm">
        <!-- Input Select -->
        <div>
            <label for="selectOption">Pilih Opsi:</label>
            <select wire:model="selectedOption" id="selectOption">
                @foreach ($selectOptions as $option)
                    <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
                @endforeach
            </select>
        </div>

        <!-- Multiple Checkboxes -->
        <div>
            <label>Pilih Checkbox:</label>
            <div>
                @foreach ($selectOptions as $option)
                    <label>
                        <input type="checkbox" wire:model="selectedCheckboxes" value="{{ $option['value'] }}">
                        {{ $option['label'] }}
                    </label>
                @endforeach
            </div>
        </div>

        <!-- Tombol Simpan -->
        <button type="submit">Simpan</button>
    </form>
</div>
