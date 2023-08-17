@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="wrapper pt-5">
        <div class="container-fluid">
            <div class="row text-center">
                <!-- Circles which indicates the steps of the form: -->
                <div class="col step_progress d-flex d-none d-sm-block">
                    @foreach ($quiz->question as $question)
                        <span class="step bg-white rounded-pill {{ $loop->index == 0 ? 'active' : '' }}"></span>
                    @endforeach
                </div>
            </div>
        </div>
        <div>
            <form class="multisteps_form position-relative" style="margin-bottom: 200px" id="wizard" method="POST"
                action="{{ route('submitAnswer') }}">
                @csrf
                <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                @php
                    $increment = 1;
                    $totalQuestion = count($quiz->question);
                @endphp
                <!------------------------- Step-1 ----------------------------->
                @foreach ($quiz->question as $key => $question)
                    @php
                        $choices = json_decode($question->choice);
                    @endphp
                    <div class="multisteps_form_panel">
                        <!-- Form-content -->
                        <span class="text-uppercase d-flex justify-content-center align-items-center">Question
                            {{ $loop->iteration }}/{{ $totalQuestion }}</span>
                        <h1 class="question_title text-center">{{ $question->question }}?</h1>
                        <!-- Form-items -->
                        <input type="hidden" name="question_id[]" value="{{ $question->id }}">

                        <div class="form_items d-flex justify-content-center">
                            <ul class="ps-0">
                                @php
                                    $animate = 50;
                                @endphp
                                @foreach ($choices as $value)
                                    @php
                                        $answer = ['a', 'b', 'c', 'd'];
                                    @endphp
                                    <li
                                        class="{{ $loop->index == 0 ? 'active' : '' }} step_{{ $key + 1 }} rounded-pill bg-white text-start animate__animated animate__fadeInRight animate_{{ $animate }}ms">
                                        <input type="radio" id="opt_{{ $increment }}"
                                            name="answer_{{ $question->id }}" value="{{ $answer[$loop->index] }}"
                                            {{ $loop->index == 0 ? 'checked' : '' }}>
                                        <label for="opt_{{ $increment }}">{{ $value }}</label>
                                    </li>
                                    @php
                                        $animate = $animate + 50;
                                        $increment = $increment + 1;
                                    @endphp
                                @endforeach
                                {{-- <li
                                    class="step_1 rounded-pill bg-white animate__animated animate__fadeInRight animate_100ms">
                                    <input type="radio" id="opt_2" name="stp_1_select_option"
                                        value="Where ever my best friends are, that’s where i want to be">
                                    <label for="opt_2">Raja Sudhodana</label>
                                </li>
                                <li
                                    class="step_1 rounded-pill bg-white animate__animated animate__fadeInRight animate_150ms">
                                    <input type="radio" id="opt_3" name="stp_1_select_option"
                                        value="One that’s organized, structured and has workplace policies set.">
                                    <label for="opt_3">Raja Asoka</label>
                                </li>
                                <li
                                    class="step_1 rounded-pill bg-white animate__animated animate__fadeInRight animate_200ms">
                                    <input type="radio" id="opt_4" name="stp_1_select_option"
                                        value="A place where everyone knows I’m the boss.">
                                    <label for="opt_4">Raja Sri Dapunta Hyang</label>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                @endforeach

                <!---------- Form Button ---------->
                <div class="form_btn text-center ms-5 mt-5">
                    <button type="button" class="f_btn text-uppercase rounded-pill border-0" id="prevBtn"
                        onclick="nextPrev(-1)">Sebelumnya</button>
                    <button type="button" class="f_btn text-uppercase rounded-pill border-0" id="nextBtn"
                        onclick="nextPrev(1)">Selanjutnya</button>
                </div>
            </form>
        </div>
    </div>
@endsection
