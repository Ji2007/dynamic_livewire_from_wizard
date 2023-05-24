<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DynamicWizardComponent extends Component
{
    public $steps = [1];
    public $activeStep = 1;
    public $validateStep = 0;
    public $showStep = true;
    public $showReviewFrom = false;

    public function stepAdd()
    {
        $this->steps[] = ['data' => ''];
        if (count($this->steps) == 1) {
            $this->activeStep++;
        }
    }

    public function changeStep($value)
    {
        $this->activeStep = $value;

        $count = count(array_filter($this->steps, function ($item) {
            return !empty($item['data']);
        }));

        $this->validateStep = $count;
    }

    public function nextStep()
    {
        $thisStep = $this->activeStep - 1;

        $this->validate([
            'steps.' . $thisStep . '.data' => 'required',
        ], [
            'steps.' . $thisStep . '.data.required' =>  'Please Enter name',
        ]);

        $count = count(array_filter($this->steps, function ($item) {
            return !empty($item['data']);
        }));

        $this->validateStep = $count;

        if ($this->activeStep < count($this->steps)) {
            $this->activeStep++;
        }
    }

    public function previousStep()
    {
        $this->activeStep--;
    }

    public function removeStep($index)
    {
        unset($this->steps[$index]);
        $this->steps = array_values($this->steps);
        $this->activeStep--;

        $count = count(array_filter($this->steps, function ($item) {
            return !empty($item['data']);
        }));

        $this->validateStep = $count;
    }

    public function reviewFrom()
    {
        $this->showStep = false;
        $this->showReviewFrom = true;
    }

    public function closeReviewFrom()
    {
        $this->showStep = true;
        $this->showReviewFrom = false;
    }

    public function goToStep($value)
    {
        $this->showStep = true;
        $this->showReviewFrom = false;
        $this->activeStep = $value+1;
    }

    public function render()
    {
        return view('livewire.dynamic-wizard-component');
    }
}
