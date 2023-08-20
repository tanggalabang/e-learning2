<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class TestComponent extends Component
{
    public $selectedId;
    public $selectedOption;
    public $selectedCheckboxes = [];

    // Masukkan opsi select dan checkbox sesuai kebutuhan
    public $selectOptions = [
        ['value' => 'option1', 'label' => 'Option 1'],
        ['value' => 'option2', 'label' => 'Option 2'],
        // Tambahkan opsi lain jika diperlukan
    ];

    public function mount($id)
    {
        // Inisialisasi data yang akan diedit, misalnya dari database
        $this->selectedId = $id;
        $this->selectedOption = 'option2'; // Misalnya opsi default untuk select
        $this->selectedCheckboxes = ['option1', 'option3']; // Misalnya opsi default untuk checkboxes
    }

    public function render()
    {
        return view('livewire.edit-data-form');
    }
}
