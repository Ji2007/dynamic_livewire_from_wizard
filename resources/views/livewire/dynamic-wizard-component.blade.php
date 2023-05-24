<div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            @if ($showStep)
                <button wire:click="stepAdd" type="button" class="add-step">Add Step</button>
            @endif
            @if (count($steps) > 0)
                <button type="button" class="default-btn showReviewFrom" wire:click='reviewFrom'>Review</button>
            @endif
        </div>
    </div>
    <section class="signup-step-container">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    @if ($showStep)
                        <div class="wizard">
                            <div class="wizard-inner">
                                <div class="connecting-line"></div>
                                <ul class="nav nav-tabs" role="tablist">
                                    @php
                                        $progress = 0;

                                        if (count($steps) > 0) {
                                            $progress = ($validateStep / count($steps)) * 100;
                                        }
                                    @endphp
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: {{ $progress }}%">
                                        </div>
                                    </div>
                                    @foreach ($steps as $proindex => $prostep)
                                        @php
                                            $proindex++;
                                        @endphp

                                        <li role="presentation" class="{{ $activeStep === $proindex ? 'active' : '' }}">
                                            <a href="#step{{ $proindex }}"
                                                wire:click.prevent='changeStep({{ $proindex }})' data-toggle="tab"
                                                aria-controls="step{{ $proindex }}" role="tab"
                                                aria-expanded="true"><span class="round-tab">{{ $proindex }} </span>
                                                <i>Step {{ $proindex }}</i></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <form role="form" action="#" class="login-box">
                                <div class="tab-content" id="main_form">
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($steps as $index => $step)
                                        @php
                                            $index++;
                                        @endphp
                                        <div class="tab-pane {{ $activeStep === $index ? 'active' : '' }}"
                                            role="tabpanel" id="step{{ $index }}">
                                            <h4 class="text-center">Step {{ $index }}</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Name * </label>
                                                        <input type="text" class="form-control"
                                                            wire:model="steps.{{ $i }}.data">

                                                        @error('steps.' . $i . '.data')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="list-inline pull-right">
                                                @if ($index > 1)
                                                    <li><button type="button" class="default-btn prev-step"
                                                            wire:click.prevent='previousStep'>Previous</button></li>
                                                @endif

                                                <li><button type="button" class="default-btn next-step"
                                                        wire:click.prevent='nextStep'>{{ count($steps) == $activeStep ? 'Save' : 'Continue' }}</button>
                                                </li>
                                                <li><button type="button" class="default-btn remove-step"
                                                        wire:click="removeStep({{ $i }})">Remove
                                                        Step</button>
                                                </li>
                                            </ul>
                                        </div>
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach

                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    @endif

                    @if ($showReviewFrom)
                        <form role="form" action="#" class="login-box">
                            <div class="tab-content" id="main_form">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($steps as $index => $step)
                                    @php
                                        $index++;
                                    @endphp
                                    <hr />
                                    <h4 class="text-left">Step {{ $index }} <a href="#"
                                            wire:click.prevent='goToStep({{ $i }})'>
                                            <i>GoTo Step</i></a></h4>
                                    <br />
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name * </label>
                                                <input type="text" class="form-control"
                                                    wire:model="steps.{{ $i }}.data" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach

                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="default-btn closeRVFrom"
                                            wire:click="closeReviewFrom">Close</button>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
